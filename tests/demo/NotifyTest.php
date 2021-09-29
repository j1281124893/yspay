<?php

class NotifyTest
{



    /**
     *商户进件异步通知接口
     */
    public function notifyTest()
    {
        $publicKey
        ="-----BEGIN CERTIFICATE-----
MIICizCCAfSgAwIBAgIEIL4JYzANBgkqhkiG9w0BAQQFADBcMQ8wDQYDVQQDDAZ5
c2VwYXkxDzANBgNVBAsMBnlzZXBheTERMA8GA1UECgwIb3JnYW5pemUxCzAJBgNV
BAcMAnN6MQswCQYDVQQGEwJjbjELMAkGA1UECAwCZ2QwHhcNMTMwMzA0MDgwMzUy
WhcNNDMwMjI1MDgwMzUyWjBcMQ8wDQYDVQQDDAZ5c2VwYXkxDzANBgNVBAsMBnlz
ZXBheTERMA8GA1UECgwIb3JnYW5pemUxCzAJBgNVBAcMAnN6MQswCQYDVQQGEwJj
bjELMAkGA1UECAwCZ2QwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBALtI+SYh
R/Zq7CSBtVyEzJ94IOAgK4DUYqtLBFsMjbhQxWHMOBwjEJSYUbn8N9w8nPR3ehX0
aCR3j/s2a15G+Y2c44Y06eZHoAYQpp8OkvWYB2md2amQBnR/o5Wjc/LkkODbC3x3
67d0XQAVbB3auuuqxxa/ElUHnkOe5l9eXYLJAgMBAAGjWjBYMB0GA1UdDgQWBBQB
rC+ShJLjpMYmmEbcr6p6Ma6FTDAfBgNVHSMEGDAWgBTNRc1cSoLvynQarb/pETbg
WClymDAJBgNVHRMEAjAAMAsGA1UdDwQEAwIEkDANBgkqhkiG9w0BAQQFAAOBgQBB
5m8oxrt1KnfbFP+akJvctjhbta5JzenDlCfYcZtykYLSMwkmhd670/y4tJc35P0Z
X/x1bJiAS+2i90L6f8P/WuBMxeI1KuX4Grk22ivw3nweWbGOUCN/PEC5YwUqHope
qHzs09O12ANXXgS35L2wgUxQOB1jcuhLXy2Z94pGYg==
-----END CERTIFICATE-----";

        //获取请求参数
        $out_trade_no = $_REQUEST["out_trade_no"];
        $trade_status = $_REQUEST["trade_status"];
        $trade_status_description = $_REQUEST["trade_status_description "];
        $total_amount = $_REQUEST["total_amount"];
        $account_date = $_REQUEST["account_date"];
        $trade_no = $_REQUEST["trade_no"];
        $fee = $_REQUEST["fee"];
        $partner_fee = $_REQUEST["partner_fee"];
        $payee_fee = $_REQUEST["payee_fee"];
        $payer_fee = $_REQUEST["payer_fee"];
        $notify_type = $_REQUEST["notify_type"];
        $notify_time = $_REQUEST["notify_time"];
        $sign_type = $_REQUEST["sign_type"];
        $sign = $_REQUEST["sign"];
        //返回参数封装
        $data = array(
            'out_trade_no' =>  $out_trade_no,
            'trade_status' =>  $trade_status,
            'trade_status_description' =>  $trade_status_description,
            'total_amount' =>  $total_amount,
            'account_date' =>  $account_date,
            'trade_no' =>  $trade_no,
            'fee' =>  $fee,
            'partner_fee' =>  $partner_fee,
            'payee_fee' =>  $payee_fee,
            'payer_fee' =>  $payer_fee,
            'notify_type' =>  $notify_type,
            'notify_time' =>  $notify_time,
            'sign_type' =>  $sign_type,
           
        );


        //验签
        $success = openssl_verify($data, base64_decode($sign), openssl_get_publickey($publicKey), OPENSSL_ALGO_SHA1);
        if ($success){
            echo "验签成功";
            var_dump($data);
        }else{
            echo "验签失败";
        }




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
}