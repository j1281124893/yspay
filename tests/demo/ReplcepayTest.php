<?php
include_once "../../vendor/autoload.php";

use Yspay\Gathering\SDK\Factory;
use Yspay\SDK\Gathering\Base;
use Yspay\SDK\Kernel\Gathering\Util\ResponseChecker;
use Yspay\SDK\Model\DfBillDownloadurlGetRequest;
use Yspay\SDK\Model\DfSingleQuickAcceptRequest;
use Yspay\SDK\Model\DfSingleQuickInnerAcceptReq;
use Yspay\SDK\Model\DSingleQuickQueryRequest;
use Yspay\SDK\Util\CommonUtil;


class ReplcepayTest extends Base
{
    function __construct()
    {
        parent::__construct();

        Base::instance();

    }


    /**
     * lfk
     * @Desc 单笔代付对账单
     * @DATA 2021年7月08日下午2:02:09
     */
    public function testDfBillDownloadurlGet()
    {

        try {
            $request = new DfBillDownloadurlGetRequest();
            $request->account_date = "2018-04-13";
            $request->proxy_password = "";
            $request->merchant_usercode = "";

            $response = Factory::replcePayClient()->replcePayClass()->dfBillDownloadurlGet($request);
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
     * @Desc 单笔代付交易（银行卡）
     * @DATA 2021年7月08日下午2:02:09
     */
    public function testDfSingleQuickAccept()
    {

        try {
            $request = new DfSingleQuickAcceptRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202107141231231";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210714";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->bank_city = "深圳市";
            $request->bank_province = "广东省";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->subject = "单笔代付交易";
            $request->bank_name = "中信银行深圳分行";  //支行名称
            $request->bank_account_name = "";
            $request->bank_card_type = "debit";
            $request->bank_telephone_no = "";
            $request->bank_account_type = "personal";
            $request->bank_account_no = "";
            $request->cert_type = "00";
            $request->cert_no = "";
            $request->cert_expire = "";
            $request->proxy_password = "";
            $request->merchant_usercode = "";

            $response = Factory::replcePayClient()->replcePayClass()->dfSingleQuickAccept($request);
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
     * @Desc 单笔代付交易（平台内）
     * @DATA 2021年7月08日下午2:02:09
     */
    public function testDfSingleQuickInnerAccept()
    {

        try {
            $request = new DfSingleQuickInnerAcceptReq();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202107141231233";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210714";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->subject = "单笔代付交易";
            $request->payee_cust_name = "";
            $request->payee_user_code = "";
            $request->telephone_no = "";
            $request->proxy_password = "";
            $request->merchant_usercode = "";




            $response = Factory::replcePayClient()->replcePayClass()->dfSingleQuickInnerAccept($request);
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
     * @Desc 单笔代付查询
     * @DATA 2021年7月08日下午2:02:09
     */
    public function testDfSingleQuickQuery()
    {

        try {
            $request = new DSingleQuickQueryRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202107141231233";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期 "20210714";

            $response = Factory::replcePayClient()->replcePayClass()->dfSingleQuickQuery($request);
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