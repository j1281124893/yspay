<?php
namespace Yspay\SDK\Gathering;


use PHPUnit\Framework\TestCase;
use Yspay\Gathering\SDK\Factory;
use Yspay\SDK\Gathering\Kernel\Config;


class Base extends TestCase
{

    public static $Factory;

    function __construct()
    {
        parent::__construct();
        Factory::instance($this->getOptions());
    }

    public static function instance()
    {
        self::$Factory = new self();
        return self::$Factory;
    }

    //设置未付款交易的超时时间，一旦超时，该笔交易就会自动被关闭。(需申请业务权限，权限未开通情况下该参数不生效，默认未付款交易的超时时间为7d)
    //取值范围：1m～15d。
    //m-分钟，h-小时，d-天。
    const TIMEOUT_EXPRESS = "30m";
    //业务代码，固定值 由银盛生成分配，请联系银盛人员
    const BUSINESS_CODE = "3010002";
    //收款方银盛支付用户号
    const SELLER_ID = "hyfz_test";
    //收款方银盛支付客户名
    const SELLER_NAME = "银盛支付服务股份有限公司行业发展部";

    function getOptions()
    {
        //以下数据皆为测试数据,生产环境数据请自行切换
        $options = new Config();
        //<-- 环境 prd为生产环境 test测试环境-->;
        $options->postType = 'prd';
        //<-- 加签私钥证书文件路径 -->
        $options->private_key = dirname(__FILE__).'\certs\hyfz_test2.pfx';  //生产环境需 切换成自己的商户私钥,公钥上传银盛门户网站 https://www.ysepay.com/
        //<-- 加签私钥证书文件密码 ,生产环境需 换成自己的商户秘钥-->
        $options->pfxpassword = "123456";
        //商户在银盛支付平台开设的发起方用户号[商户号] 生产环境需 换成自己的商户编号
        $options->partner_id = "hyfz_test2";
        //生产环境 需换成自己异步通知地址
        $options->notify_url = "http://wiki.easybuycloud.com:8082/ysmp-notify-ci/testnotify";
        return $options;
    }


    /**
     * 此方法仅为测试使用,商户可自行定义规则
     * 生成18位订单号
     * $length：随机数长度
     */
    function generateOrderNumber($length=4){
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

}