<?php

namespace Yspay\SDK\Gathering\Kernel;

use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;

include_once "Response.php";

class Common
{
    public $param;
    private $kernel;

    //*****************************************************
    //bank_type 二维码行别，
    const WE_CHAT = "1902000";
    const ALIPAY = "1903000";
    const UNIONPAY = "9001002";
    //*****************************************************

    /**
     * 构造函数
     *
     * @access  public
     * @param
     * @return void
     */
    function __construct($kernel)
    {
        $this->build();
        $this->kernel = $kernel;
    }

    /**
     * 实例化固定参数值
     */
    function build()
    {

        $this->param = array();
        $this->param['unknow'] = 'unknow';
        $this->param['unknowMsg'] = '网络异常，状态未知';

        $this->param['fail'] = 'fail';
        $this->param['failMsg'] = '网络异常，此请求为失败';

        $this->param['verify_sign_fail'] = '验证渠道响应签名失败';
        $this->param['sign_fail'] = '签名失败，请检查证书文件是否存在，密码是否正确';
        $this->param['errorCode'] = 'error';
        $this->param['successCode'] = 'success';

    }

    //加签排序
    public function signSort($headParams)
    {
        $signStr = "";
        foreach ($headParams as $key => $val) {
            if (!empty($val)) {
                $signStr .= $key . '=' . $val . '&';
            }
        }
        return rtrim($signStr, '&');
    }

    //过滤值为空的参数
    public function unsetArry($bizReqJson)
    {
        foreach ($bizReqJson as $k => $v) {
            if (!$v)
                unset($bizReqJson[$k]);
        }
        return $bizReqJson;
    }


    //验签排序
    public function attestationSignSort($headParams)
    {
        $signStr = "";
        foreach ($headParams as $key => $val) {
            if ($key == "ysepay_df_single_quick_accept_response") {
                $val = substr($val, 1, -1);
            }

            $signStr .= $key . '=' . $val . '&';
        }
        return rtrim($signStr, '&');
    }

    /**
     * post发送请求
     *
     * @param $url
     * @param $headParams
     * @param $response_name
     * @return Response
     */
    function post_url($url, $headParams, $response_name, $flag = false)
    {
        //echo PHP_EOL . "渠道请求参数" . json_encode($headParams, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES) . PHP_EOL;
        $responses = new Response();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($headParams));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $response = curl_exec($ch);
        //var_dump(PHP_EOL . "POST请求响应信息" . $response . PHP_EOL);

        if (curl_errno($ch)) {
            $curl_errno = curl_errno($ch);
            $curl_error = curl_error($ch);
            var_dump($curl_error);
            curl_close($ch);
            //超时的处理代码
            throw new YSNetworkException( PHP_EOL.'请求银盛服务器超时,结果未知' . PHP_EOL. 'errno_code : ' .  $curl_errno
                . PHP_EOL . 'errorMsg : '. $curl_error ,$curl_errno);

        } else {
            curl_close($ch);
            $response = json_decode($response, true);
            //echo PHP_EOL . "渠道响应报文" . json_encode($response, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES) . PHP_EOL;

            //var_dump($response);
            if ($response["sign"]   != null) {
                $sign = $response["sign"];
                $data = json_encode($response[$response_name], JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES);
                // 验证签名 仅作基础验证
                if ($this->sign_check($sign, $data) == true) {
                    //echo "验证签名成功!";
                    return Response::fromMap($response, $response_name);
                } else {
                    if ($response_name == 'ysepay_online_trade_order_query_response') {
                        return Response::fromMap($response, $response_name);
                    }
                    //echo '验证签名失败!';
                    $responses->responseMeg = $this->param['verify_sign_fail'];
                    return $responses;
                }
            }
        }
    }


    /**
     * 转码
     */
    function str_to_utf8($str = '')
    {

        $current_encode = mb_detect_encoding($str, array("ASCII", "GB2312", "GBK", 'BIG5', 'UTF-8'));

        $encoded_str = mb_convert_encoding($str, 'UTF-8', $current_encode);

        return $encoded_str;

    }

    /**
     * 验签转明码
     * @param $sign 签名字符串
     * @param $data
     *
     * @return $success
     */
    function sign_check($sign, $data)
    {
        //  $publickeyFile = $this->kernel->businessgatecerpath; //公钥
        //  $certificateCAcerContent = file_get_contents($publickeyFile);
        //   $certificateCApemContent = '-----BEGIN CERTIFICATE-----' . PHP_EOL . chunk_split(base64_encode($certificateCAcerContent), 64, PHP_EOL) . '-----END CERTIFICATE-----' . PHP_EOL;
        //  print_r($certificateCApemContent);
        // 签名验证
        $success = openssl_verify($data, base64_decode($sign), openssl_get_publickey($this->kernel->publicKey), OPENSSL_ALGO_SHA1);
        return $success;
    }


    /**
     * 签名加密
     * @param input data
     * @return Response
     * @return check
     * @return msg
     */
    function sign_encrypt($input)
    {

        try {
            $MERCHANT_PRX = $this->kernel->private_key;
            $MERCHANT_PRX_PWD = $this->kernel->pfxpassword;
            //$return = array('success' => 0, 'msg' => '', 'check' => '');
            $pkcs12 = file_get_contents($MERCHANT_PRX);
            if (openssl_pkcs12_read($pkcs12, $certs, $MERCHANT_PRX_PWD)) {
                //var_dump('证书,密码,正确读取');
                $privateKey = $certs['pkey'];
                $publicKey = $certs['cert'];
                $signedMsg = "";
                // print_r("加密密钥" . $privateKey);
                //echo "加密数据" . $input['data'];
                if (openssl_sign($input['data'], $signedMsg, $privateKey, OPENSSL_ALGO_SHA1)) {
                    //var_dump('签名正确生成');
                    $return['success'] = 1;
                    $return['check'] = base64_encode($signedMsg);
                    $return['msg'] = base64_encode($input['data']);
                }
            }
            return $return;
        } catch (Exception $e) {
            throw new Exception($this->param['sign_fail'].'原因 : '.$e->getMessage());
        }

    }


    function checkFields($rules, $data)
    {
        $response = new Response();
        foreach ($rules as $field => $fieldRules) {
            if (!isset($data[$field]) || iconv_strlen($data[$field], "UTF-8") <= 0) {
                //  $response->responseCode = "error";
                $response->responseMeg = "$field 不能为空";
                $response->checkFlag = false;
                return $response;
            }
        }

        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $type => $rule) {
                $ret = Validator::check($type, $data[$field], $rule);
                if ($ret == false) {

                    //    $response->responseCode = "error";
                    $response->responseMeg = "param : $field 参数错误";
                    $response->checkFlag = false;
                    return $response;
                }
            }
        }
        $response->checkFlag = true;
        return $response;
    }


    /**
     * des加密函数
     */
    public function encryptDes($input, $key)
    {
        if (!isset($input) || !isset($key)) {
            return "";
        }
        $key = substr($this->kernel->partner_id, 0, 8);
        if (iconv_strlen($key, "UTF-8") < 8) {
            $key = sprintf("% s", $key);
        }


        return $this->encrypt($input, $key);
    }


    public function encrypt($input, $key)
    {
        $data = openssl_encrypt($input, 'DES-ECB', $key, OPENSSL_RAW_DATA, $this->hexToStr(""));
        $data = base64_encode($data);
        return $data;
    }

    public function decrypt($input, $key)
    {
        $decrypted = openssl_decrypt(base64_decode($input), 'DES-ECB', $key, OPENSSL_RAW_DATA, $this->hexToStr(""));
        return $decrypted;
    }

    function hexToStr($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }


    /**
     * http Heads参数组装
     */
    public function commonHeads($method, $kernel, $model)
    {
        $headParams = array();
        $headParams['method'] = $method;
        $headParams['partner_id'] = $kernel->partner_id;
        $headParams['timestamp'] = date('Y-m-d H:i:s');
        $headParams['charset'] = $kernel->charset;
        $headParams['sign_type'] = $kernel->sign_type;
        $headParams['notify_url'] = $kernel->notify_url;
        $headParams['version'] = $kernel->version;
        $headParams['tran_type'] = $model->tran_type;
        $headParams['return_url'] = $model->return_url;
        $headParams['proxy_password'] = $model->proxy_password;
        $headParams['merchant_usercode'] = $model->merchant_usercode;
        return $this->unsetArry($headParams);
    }


    /**
     * 加密参数组装
     */
    public function encodeParams($headParams, $bizReqJson)
    {
        $bizReqJson = $this->unsetArry($bizReqJson);
        $headParams['biz_content'] = json_encode($bizReqJson, 320);//构造字符串
        ksort($headParams);
        $signStr = $this->signSort($headParams);
        $sign = $this->sign_encrypt(array('data' => $signStr));
        $headParams['sign'] = trim($sign['check']);
        return $headParams;
    }
}