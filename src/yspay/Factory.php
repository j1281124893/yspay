<?php

namespace Yspay\Gathering\SDK;



use Yspay\SDK\Pay as payClass;
use Yspay\SDK\Fastpay as fastpayClass;
use Yspay\SDK\PagePay as pagePayClass;
use Yspay\SDK\Replcepay as replcePayClass;
use Yspay\SDK\OrderRefund as orderRefundClass;
use Yspay\SDK\Merchant as merchantClass;
use Yspay\SDK\Division as divisionClass;
use Yspay\SDK\WeChatAuthenticate as weChatAuthenticateClass;



class Factory
{
    public $kernel = null;
    public $factory = null;
    private static $instance;
    public static $payClient;
    public static $fastpayClient;
    public static $pagePayClient;
    public static $replcePayClient;
    public static $orderRefundClient;
    public static $divisionClient;
    public static $merchantClient;
    public static $weChatAuthenticateClient;


    protected static $util;

    private function __construct($config)
    {
        $postType = $config->postType;
        if (null != $config) {
            if ($postType == "test"){
                $config->url = 'https://openapi.ysepay.com/gateway.do';
                $config->dfUrl = 'https://df.ysepay.com/gateway.do';
                $config->dfOderUrl = 'https://searchdf.ysepay.com/gateway.do';
                $config->commonUrl = 'https://commonapi.ysepay.com/gateway.do';
                $config->qrcodeUrl = 'https://qrcode.ysepay.com/gateway.do';
                $config->trusteeshipUrl = 'https://trusteeship.ysepay.com/gateway.do';
                $config->searchUrl = 'https://search.ysepay.com/gateway.do';
            }else if ($postType == "prd"){
                $config->url = 'https://openapi.ysepay.com/gateway.do';
                $config->dfUrl = 'https://df.ysepay.com/gateway.do';
                $config->dfOderUrl = 'https://searchdf.ysepay.com/gateway.do';
                $config->commonUrl = 'https://commonapi.ysepay.com/gateway.do';
                $config->qrcodeUrl = 'https://qrcode.ysepay.com/gateway.do';
                $config->trusteeshipUrl = 'https://trusteeship.ysepay.com/gateway.do';
                $config->searchUrl = 'https://search.ysepay.com/gateway.do';
            }else{
                var_dump( "环境类型不存在");
            }
        }
        self::$payClient = new PayClient($config);
        self::$fastpayClient = new FastpayClient($config);
        self::$pagePayClient = new PagePayClient($config);
        self::$replcePayClient = new ReplcePayClient($config);
        self::$orderRefundClient = new OrderRefundClient($config);
        self::$divisionClient = new DivisionClient($config);
        self::$merchantClient = new MerchantClient($config);
        self::$weChatAuthenticateClient = new WeChatAuthenticateClient($config);


    }


    public static function instance($config)
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    private function __clone()
    {
    }


    public static function payClient()
    {
        return self::$payClient;
    }
    public static function fastpayClient()
    {
        return self::$fastpayClient;
    }
    public static function pagePayClient()
    {
        return self::$pagePayClient;
    }
    public static function replcePayClient()
    {
        return self::$replcePayClient;
    }
    public static function orderRefundClient()
    {
        return self::$orderRefundClient;
    }
    public static function divisionClient()
    {
        return self::$divisionClient;
    }
    public static function merchantClient()
    {
        return self::$merchantClient;
    }
    public static function weChatAuthenticateClient()
    {
        return self::$weChatAuthenticateClient;
    }



}


class PayClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function payClass()
    {
        return new payClass($this->kernel);
    }

}

class fastpayClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function fastpayClass()
    {
        return new fastpayClass($this->kernel);
    }

}

class PagePayClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function pagePayClass()
    {
        return new pagePayClass($this->kernel);
    }

}


class ReplcePayClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function replcePayClass()
    {
        return new replcePayClass($this->kernel);
    }

}

class OrderRefundClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function orderRefundClass()
    {
        return new orderRefundClass($this->kernel);
    }

}

class DivisionClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function divisionClass()
    {
        return new divisionClass($this->kernel);
    }

}

class MerchantClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function merchantClass()
    {
        return new merchantClass($this->kernel);
    }

}


class WeChatAuthenticateClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function weChatAuthenticateClass()
    {
        return new weChatAuthenticateClass($this->kernel);
    }

}

