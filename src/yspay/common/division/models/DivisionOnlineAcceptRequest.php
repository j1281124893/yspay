<?php


namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class DivisionOnlineAcceptRequest
{

    /**
     * 原订单号
     */
    public $out_trade_no;
    /**
     * 主商户号（原交易收款方）
     */
    public $payee_usercode;
    /**
     * 原订单交易金额
     */
    public $total_amount;
    /**
     * 系统标志 DD：订单交易，DS：代收交易，默认是DD，订单交易
     */
    public $sys_flag;
    /**
     * 原订单是否参与分账01：是，02否
     */
    public $is_divistion;
    /**
     * 是否重新分账Y：是，N：否
     */
    public $is_again_division;
    /**
     * 分账模式01 ：比例，02：金额
     */
    public $division_mode;
    /**
     * 分账明细,包含division_mer_usercode,
     *  div_amount, div_ratio, is_chargeFee等4个属性
     */
    public $div_list;



    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'payee_usercode' => $model->payee_usercode,
            'total_amount' => $model->total_amount,
            'sys_flag' => $model->sys_flag,
            'is_divistion' => $model->is_divistion,
            'is_again_division' => $model->is_again_division,
            'division_mode' => $model->division_mode,
            'div_list' => $model->div_list,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'divisionOnlineAcceptRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'payee_usercode' => [
                    Validator::MAX_LEN => 20,
                ],
                'total_amount' => [
                ],
                'is_divistion' => [
                    Validator::MAX_LEN => 2,
                ],
                'is_again_division' => [
                    Validator::MAX_LEN => 1,
                ],
                'division_mode' => [
                    Validator::MAX_LEN => 2,
                ],

            ],

        );

        return $checkRules['divisionOnlineAcceptRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "payee_usercode" => $model->payee_usercode,
            "total_amount" => $model->total_amount,
            "sys_flag" => $model->sys_flag,
            "is_divistion" => $model->is_divistion,
            "is_again_division" => $model->is_again_division,
            "division_mode" => $model->division_mode,
            "div_list" => $model->div_list,
            "division_mer_usercode" => $model->division_mer_usercode,
        );

        return $bizReqJson;
    }
}