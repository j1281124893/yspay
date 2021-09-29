<?php
namespace Yspay\SDK\Gathering\Kernel;
class Validator {
    // 长度校验
    const MIN_LEN = "minLen";
    const MAX_LEN = "maxLen";

    // 取值范围校验
    const RANGE = "range";
    const POSITIVE = "positive";
    const NEGATIVE = "negative";
    const NOT_POSITIVE = "notPositive";
    const NOT_NEGATIVE = "notNegative";

    // 数据类型校验
    const NUMERIC = "numeric";
    const INT = "int";


    static protected $_typeMap = [
        self::RANGE => 'self::isInRange',
        self::MIN_LEN => 'self::checkMinLen',
        self::MAX_LEN => 'self::checkMaxLen',
        self::INT => 'self::isInt',
        self::POSITIVE => 'self::isPositive',
        self::NEGATIVE => 'self::isNegative',
        self::NOT_POSITIVE => 'self::isNotPositive',
        self::NOT_NEGATIVE => 'self::isNotNegative',
        self::NUMERIC => 'self::isNumeric',
    ];

    public static function check($type, $v, $rule) {
        return call_user_func_array(self::$_typeMap[$type], [$v, $rule]);
    }

    private static function isNumeric($v, $cond) {
        return is_numeric($v);
    }

    private static function isInRange($v, $range) {
        if (!is_array($range) || count($range) != 2) {
            return false;
        }

        return $v >= $range[0] && $v <= $range[1];
    }

    private static function checkMinLen($v, $len) {
        return iconv_strlen($v,"UTF-8") >= $len;
    }

    private static function checkMaxLen($v, $len) {
        return iconv_strlen($v,"UTF-8") <= $len;
    }

    private static function isInt($v, $cond) {
        if (is_int($v)) {
            return true;
        }

        $i = intval($v);

        return "{$i}" == $v;
    }

    private static function isPositive($v, $cond) {
        return is_numeric($v) && intval($v) > 0;
    }

    private static function isNegative($v, $cond) {
        return is_numeric($v) && intval($v) < 0;
    }

    private static function isNotPositive($v, $cond) {
        return is_numeric($v) && intval($v) <= 0;
    }

    private static function isNotNegative($v, $cond) {
        return is_numeric($v) && intval($v) >= 0;

    }
}