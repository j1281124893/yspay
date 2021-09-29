<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Yspay\SDK\Gathering\Payment\Common\Models;



class Response  {

    public function toMap() {
        $res = [];
        if (null !== $this->response) {
            $res['response'] = $this->response;
        }

        return $res;
    }
    /**
     * @param array $map
     * @return
     */
    public static function fromMap($map = [],$response_name) {
        $model = new self();
        if(isset($map[$response_name])){
            $model->response = $map[$response_name];
        }

        return $model;
    }

     /**
     * @param array $map
     * @return
     */
    public static function setMap($map = []) {
        $model = new self();
        if(isset($map)){
            $model->response = $map;
        }

        return $model;
    }



    /**
     * @description 响应原始字符串
     * @var string
     */
    public $response;


     /**
     * @description sdk错误信息
     * @var string
     */
    public $responseMeg;

    /**
     * @description sdk错误信息
     * @var string
     */
    public $errno_code;


    /**
     * @var boolean
     */
    public $checkFlag;

}
