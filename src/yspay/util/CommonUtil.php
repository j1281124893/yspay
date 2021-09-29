<?php

namespace Yspay\SDK\Util;

class CommonUtil
{

    /**
     * 此方法仅为测试使用,商户可自行定义规则
     * 生成18位订单号
     * $length：随机数长度
     */
    public static function generateOrderNumber($length = 4){
        //14位的日期（年月日时分秒）
        $date=trim(date('Ymdhis ',time()));
        //初始化变量为0
        $connt = 0;
        //建一个新数组
        $temp = array();
        while($connt < $length){
            //在一定范围内随机生成一个数放入数组中
            $temp[] = mt_rand(0, 9);
            //$data = array_unique($temp);
            //去除数组中的重复值用了“翻翻法”，就是用array_flip()把数组的key和value交换两次。这种做法比用 array_unique() 快得多。
            $data = array_flip(array_flip($temp));
            //将数组的数量存入变量count中
            $connt = count($data);
        }
        //为数组赋予新的键名
        shuffle($data);
        //数组转字符串
        $str=implode(",", $data);
        //替换掉逗号
        $number=str_replace(',', '', $str);
        return $date.$number;
    }

    public static function getShopDate(){
       return date('Ymd');
    }

}