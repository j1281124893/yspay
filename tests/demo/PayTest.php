<?php

include_once "../../vendor/autoload.php";

use Yspay\Gathering\SDK\Factory;
use Yspay\SDK\Gathering\Base;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Kernel\Gathering\Util\ResponseChecker;
use Yspay\SDK\Model\AlijsapiRequest;
use Yspay\SDK\Model\BarcodepayRequest;
use Yspay\SDK\Model\CupgetmulappUseridRequest;
use Yspay\SDK\Model\CupmulappQrcodepayRequest;
use Yspay\SDK\Model\MobileControlsPayRequest;
use Yspay\SDK\Model\QrcodepayRequest;
use Yspay\SDK\Model\TradeDeliveredRequest;
use Yspay\SDK\Model\WeixinPayRequest;
use Yspay\SDK\Util\CommonUtil;


class PayTest extends Base
{
    function __construct()
    {
        parent::__construct();

        Base::instance();

    }


    /**
     *反扫码支付
     */
    public function testBarcodepay()
    {

        try {
            $request = new BarcodepayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "20210712123116";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期
            $request->subject = "标题";
            $request->total_amount = "0.03";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->scene = "bar_code";
            $request->bank_type = Common::ALIPAY; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002 Base::ALIPAY; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002
            $request->auth_code = "288409611882850720";
            $response = Factory::payClient()->payClass()->barcodepay($request);
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
     *担保交易发货通知
     */
    public function testTradeDelivered()
    {

        try {
            $request = new TradeDeliveredRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "2018052568431922806471182";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20180525";
            $request->trade_no = "";
            $response = Factory::payClient()->payClass()->tradeDelivered($request);
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
     *担保交易确认收货
     */
    public function testTradeConfirm()
    {

        try {
            $request = new TradeDeliveredRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "2018052568431922806471182";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20180525";
            $request->trade_no = "";
            $response = Factory::payClient()->payClass()->tradeConfirm($request);
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
     * @Desc 支付宝生活号支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function testAlijsapi()
    {

        try {
            $request = new AlijsapiRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "2020525684371184";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210712";
            $request->subject = "测试支付宝生活号";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extend_params = "";
            $request->extra_common_param = "";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->buyer_logon_id = "";
            $request->buyer_id = "2088702911485456";
            $request->consignee_info = "";
            $request->province = "";
            $request->city = "";
            $request->limit_credit_pay = "";
            $request->hb_fq_num = "";
            $request->allow_repeat_pay = "";
            $request->fail_notify_url = "";
            $response = Factory::payClient()->payClass()->alijsapi($request);
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
     * @Desc 微信公众号、小程序支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function testWeixinPay()
    {

        try {
            $request = new WeixinPayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "2021072421111";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210724";
            $request->subject = "测试微信小程序";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->seller_id = "yangjie";
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extend_params = "";
            $request->extra_common_param = "extra_common_param";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->sub_openid = "oNHjy5AQ32qz7-7-oWVgP9vlyehlQ";
            $request->is_minipg = "1";
            $request->appid = "wx1529d89448f9985e";
            $request->province = "";
            $request->city = "";
            $request->mer_amount = "";
            $request->limit_credit_pay = "";
            $request->allow_repeat_pay = "";
            $request->fail_notify_url = "";

            $response = Factory::payClient()->payClass()->weixinPay($request);
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
     * @Desc 行业码获取用户标识
     * @DATA 2021年7月01日下午2:02:09
     */
    public function testCupgetmulappUserid()
    {

        try {
            $request = new CupgetmulappUseridRequest();
            $request->userAuthCode = "testSameAuthCode";
            $request->appUpIdentifier = "UnionPay/1.0 TESTPAY";


            $response = Factory::payClient()->payClass()->cupgetmulappUserid($request);
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
     * @Desc 行业码支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function testCupmulappQrcodepay()
    {

        try {
            $request = new CupmulappQrcodepayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202052568431922806471182";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210712";
            $request->subject = "行业码支付";
            $request->total_amount = "0.02";
            $request->currency = "CNY";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extend_params = "";
            $request->extra_common_param = "";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->spbill_create_ip = "172.17.249.8";
            $request->bank_type = Common::ALIPAY; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002 Base::ALIPAY; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002
            $request->userId = "2088702911485456";
            $request->limit_credit_pay = "";
            $request->allow_repeat_pay = "";
            $request->fail_notify_url = "http://wiki.easybuycloud.com:8082/ysmp-notify-ci/testnotify";
            $request->consignee_info = "";
            $request->device_info = "";
            $request->terminal_info = "";

            $response = Factory::payClient()->payClass()->cupmulappQrcodepay($request);
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
     * @Desc 正扫支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function testQrcodepay()
    {

        try {
            $request = new QrcodepayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202052568431922806471185";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210712";
            $request->subject = "正扫支付";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extend_params = "";
            $request->extra_common_param = "";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->bank_type = Common::WE_CHAT; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002 ;
            $request->consignee_info = "";
            $request->cross_border_info = "";
            $request->appid = "";
            $request->province = "";
            $request->city = "";
            $request->limit_credit_pay = "";
            $request->hb_fq_num = "";
            $request->tran_type = "1";  //交易类型，说明：1或者空：即时到账，2：担保交易
            $request->return_url = "";  //同步通知地址


            $response = Factory::payClient()->payClass()->qrcodepay($request);
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
     * @Desc 手机控件支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function testMobileControlsPay()
    {

        try {
            $request = new MobileControlsPayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "20205261231";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210712";
            $request->subject = "手机控件支付";
            $request->total_amount = "0.03";
            $request->currency = "CNY";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extend_params = "";
            $request->extra_common_param = "";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->bank_type = Common::UNIONPAY; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002
            $request->bank_account_type = "personal";
            $request->support_card_type = "debit";
            $request->cross_border_info = "";
            $request->consignee_info = "";


            $response = Factory::payClient()->payClass()->mobileControlsPay($request);
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
