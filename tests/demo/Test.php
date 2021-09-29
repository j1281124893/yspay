<?php
use PHPUnit\Framework\TestCase;
use Yspay\SDK\Gathering\Kernel\Common;

include_once "../../src/yspay/util/Validator.php";
include_once "../../src/yspay/Common.php";

class Test extends TestCase
{


    function checkFields($rules, $data) {
        foreach ($rules as $field => $fieldRules) {
            if (!isset($data[$field])) {
                echo "$field 不能为空";
                return false;
            }
        }


        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $type => $rule) {
                $ret = Validator::check($type, $data[$field], $rule);
                if ($ret == false) {
                    echo "param $field 参数错误";
                    return false;
                }
            }
        }

        return true;
    }




    function test02(){
      // $common = new Common("123");
      // echo $encryptDes = $common->encryptDes(123, 123);
      //  $jiami = $this->jiami('123', '125');
        $generateOrderNumber = $this->generateOrderNumber();
        echo $generateOrderNumber;
    }

    public function encrypt($input,$key)
    {
        $data = openssl_encrypt($input, 'DES-ECB', $key, OPENSSL_RAW_DATA, $this->hexToStr(""));
        $data = base64_encode($data);
        return $data;
    }

    public function decrypt($input,$key)
    {
        $decrypted = openssl_decrypt(base64_decode($input), 'DES-ECB', $key, OPENSSL_RAW_DATA, $this->hexToStr(""));
        return $decrypted;
    }


    function hexToStr($hex)
    {

        $string='';

        for ($i=0; $i < strlen($hex)-1; $i+=2)

        {

            $string .= chr(hexdec($hex[$i].$hex[$i+1]));

        }

        return $string;
    }


        function jiami($key, $str)

        {

            /* Open module, and create IV */

            $td = mcrypt_module_open('des', '', 'ecb', '');

            //$td = mcrypt_module_open(MCRYPT_DES, '', MCRYPT_MODE_CBC, '');

            //$td = mcrypt_module_open('des', '', 'cbc', '');

            $key = substr($key, 0, mcrypt_enc_get_key_size($td));

            $iv_size = mcrypt_enc_get_iv_size($td);

            $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

            /* Initialize encryption handle */

            if (mcrypt_generic_init($td, $key, $iv) === -1)

            {

                return FALSE;

            }

            /* Encrypt data */

            $c_t = mcrypt_generic($td, $str);

            /* Clean up */

            mcrypt_generic_deinit($td);

            mcrypt_module_close($td);

            return $c_t;

        }

        function jiemi($key, $str)

        {

            /* Open module, and create IV */

            $td = mcrypt_module_open('des', '', 'ecb', '');

            //$td = mcrypt_module_open(MCRYPT_DES, '', MCRYPT_MODE_CBC, '');

            //$td = mcrypt_module_open('des', '', 'cbc', '');

            $key = substr($key, 0, mcrypt_enc_get_key_size($td));

            $iv_size = mcrypt_enc_get_iv_size($td);

            $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

            /* Initialize encryption handle */

            if (mcrypt_generic_init($td, $key, $iv) === -1)

            {

                return FALSE;

            }

            /* Reinitialize buffers for decryption */

            $p_t = mdecrypt_generic($td, $str);

            /* Clean up */

            mcrypt_generic_deinit($td);

            mcrypt_module_close($td);

            return trim($p_t);

        }







    function test01(){
        global $checkRules;

        $checkRules = array(
            '/a/b' => [
                'name' => [
                    Validator::MIN_LEN => 1,
                    Validator::MAX_LEN => 7,
                ],
                'age' => [
                    Validator::MAX_LEN => 3,
                ],
            ],

        );



        $params = array(
            'name' => 'zhoumin',
        );
        $ret = $this->checkFields($checkRules['/a/b'], $params);
        if ($ret == false) {
            echo "参数错误";
            return;
        } else {
            echo "参数正确";
        }




    }




}