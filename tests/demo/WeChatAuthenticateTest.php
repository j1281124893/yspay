<?php
include_once "../../vendor/autoload.php";

use Yspay\Gathering\SDK\Factory;
use Yspay\SDK\Gathering\Base;
use Yspay\SDK\Kernel\Gathering\Util\ResponseChecker;
use Yspay\SDK\Model\AuthenticateApplyQueryRequest;
use Yspay\SDK\Model\DivisionOnlineAcceptRequest;
use Yspay\SDK\Model\MerchantBalanceQueryRequest;
use Yspay\SDK\Model\MerchantWithdrawRequest;
use Yspay\SDK\Model\WeChatAuthenticateApplyRequest;
use Yspay\SDK\Model\WechatAuthenticateRequest;
use Yspay\SDK\Model\WeChatUploadPicRequest;


class WeChatAuthenticateTest extends Base
{
    function __construct()
    {
        parent::__construct();

        Base::instance();

    }


    /**
     * lfk
     * @Desc 微信实名认证开户意愿申请
     * @DATA 2021年7月12日下午2:02:09
     */
    public function testWeChatAuthenticateApply()
    {

        try {
            $request = new WeChatAuthenticateApplyRequest();
            $request->usercode = "X2107061649551231243";
            $request->cust_name = "商户_刘志林";
            $request->contact_cert_type = "00";
            $request->contact_cert_no = "360781199608035113";
            $request->legal_cert_initial = "20180503";
            $request->legal_cert_expire = "20380503";
            $request->bus_license_initial = "";
            $request->bus_license_expire = "";
            $request->store_type = "01";
            $request->store_name = "01";
            $request->token = "TK20210713163354185OlsfgAkC";

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->WeChatAuthenticateApply($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     * lfk
     * @Desc 图片上传口令获取
     * @DATA 2021年7月12日下午2:02:09
     */
    public function testRegisterTokenGet()
    {

        try {

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->registerTokenGet();
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }

    /**
     * lfk
     * @Desc 图片上传
     * @DATA 2021年7月12日下午2:02:09
     */
    public function testWeChatUploadPic()
    {

        try {
            $request = new WeChatUploadPicRequest();
            $request->superUsercode = "X2107061649551231243";
            $request->picType = "34";
            $request->token = "TK20210713163354185OlsfgAkC";
            $request->filePath = "E:/tp/jpg/34.jpg";
            $request->filename = "demo.jpg";

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->weChatUploadPic($request);
            var_dump($response, true);

            $request = new WeChatUploadPicRequest();
            $request->superUsercode = "X2107061649551231243";
            $request->picType = "50";
            $request->token = "TK20210713163354185OlsfgAkC";
            $request->filePath = "E:/tp/jpg/50.jpg";
            $request->filename = "demo.jpg";

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->weChatUploadPic($request);
            var_dump($response, true);

        }
        catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }

    /**
     * lfk
     * @Desc 微信实名认证-撤销申请单
     * @DATA 2021年7月12日下午2:02:09
     */
    public function testAuthenticateApplyCancel()
    {

        try {
            $request = new WechatAuthenticateRequest();
            $request->apply_no = "R0713173333527707823";

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->authenticateApplyCancel($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }

    /**
     * lfk
     * @Desc 查询微信实名认证申请单状态
     * @DATA 2021年7月12日下午2:02:09
     */
    public function testAuthenticateQuery()
    {

        try {
            $request = new WechatAuthenticateRequest();
            $request->apply_no = "R0713173333527707823";

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->authenticateQuery($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     * lfk
     * @Desc 查询微信实名认证授权状态
     * @DATA 2021年7月12日下午2:02:09
     */
    public function testAuthenticateApplyQuery()
    {

        try {
            $request = new AuthenticateApplyQueryRequest();
            $request->usercode = "X2107061649551231243";

            $response = Factory::weChatAuthenticateClient()->weChatAuthenticateClass()->authenticateApplyQuery($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


}