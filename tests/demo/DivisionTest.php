<?php
include_once "../../vendor/autoload.php";


use Yspay\Gathering\SDK\Factory;
use Yspay\SDK\Gathering\Base;
use Yspay\SDK\Kernel\Gathering\Util\ResponseChecker;
use Yspay\SDK\Model\DivisionOnlineAcceptRequest;
use Yspay\SDK\Model\DivisionOnlineQueryRequest;
use Yspay\SDK\Util\CommonUtil;


class DivisionTest extends Base
{
    function __construct()
    {
        parent::__construct();

        Base::instance();

    }


    /**
     * lfk
     * @Desc 分账登记
     * @DATA 2021年7月02日下午2:02:09
     */
    public function testDivisionOnlineAccept()
    {

        try {
            $request = new DivisionOnlineAcceptRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "20210712123115";
            $request->payee_usercode = "hyfz_test2";//收款商户号
            $request->total_amount = "0.03";
            $request->sys_flag = "DD";
            $request->is_divistion = "01";
            $request->is_again_division = "N";
            $request->division_mode = "02";

            $div_list = array(
                [
                    "division_mer_usercode" => "hyfz_test2",//收款商户号
                    "div_amount" => "0.01",
                    "div_ratio" => "",
                    "is_chargeFee" => "02",
                ],
                [
                    "division_mer_usercode" => "",//分账子商户号
                    "div_amount" => "0.02",
                    "div_ratio" => "",
                    "is_chargeFee" => "01",
                ]
            );
            $request->div_list = $div_list ;

            $response = Factory::divisionClient()->divisionClass()->divisionOnlineAccept($request);
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
     * @Desc 分账查询
     * @DATA 2021年7月08日下午2:02:09
     */
    public function testDivisionOnlineQuery()
    {

        try {
            $request = new DivisionOnlineQueryRequest();
            $request->src_usercode = "hyfz_test2";
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "20210712123115";
            $request->out_batch_no = "";
            $request->sys_flag = "";

            $response = Factory::divisionClient()->divisionClass()->divisionOnlineQuery($request);
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