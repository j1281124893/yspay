<?php
namespace Yspay\SDK\Exception;
use Exception;

class YSNetworkException extends Exception

{
    // 重定义构造器使 message 变为必须被指定的属性
    public function __construct($message, $code) {
        // 这里写用户的代码
        echo $message;
        echo $code;

        // 确保所有变量都被正确赋值
        parent::__construct($message, $code);
    }

    // 自定义字符串输出的格式
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}