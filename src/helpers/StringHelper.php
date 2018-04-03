<?php
/**
 * Created by PhpStorm.
 * User: cz
 * Date: 2018/3/12
 * Time: 10:42
 */

namespace juice\helpers;


class StringHelper
{
    const ENCODING = 'UTF-8';

    /**
     * 截取字符串
     * @param string $str
     * @param int $length 截取后字符串长度
     * @param string $tail
     * @param string $encoding
     * @return mixed
     */
    public static function cut($str, $length, $tail = '...', $encoding = 'UTF-8')
    {
        $strLen = mb_strlen($str, $encoding);
        $tailLen = mb_strlen($tail, $encoding);
        if ($length < 1 || $strLen < $length || $strLen - $length <= $tailLen) {
            return $str;
        } else {
            return mb_substr($str, 0, $length, $encoding) . $tail;
        }
    }

    /**
     * 替换字符串尾部 例如：中英文混合 替换尾部两个字符  中英文**
     * @param $str
     * @param $length
     * @param string $padString
     * @param string $encoding
     * @return mixed
     */
    public static function replaceTail($str, $length, $padString = '*', $encoding = 'UTF-8')
    {
        $strLen = mb_strlen($str, $encoding);
        if ($strLen > $length && $length > 0) {
            $head = mb_substr($str, 0, $strLen - $length, $encoding);
            return $head . self::initPadString($length, $padString);
        } else {
            $length = floor($strLen / 2);
            return self::replaceTail($str, $length, $padString, $encoding);
        }
    }

    /**
     * 替换字符串头部 例如：中英文混合 替换开头两个字符  **文混合
     * @param $str
     * @param $length
     * @param string $padString
     * @param string $encoding
     * @return mixed|string
     */
    public static function replaceHead($str, $length, $padString = '*', $encoding = 'UTF-8')
    {
        $strLen = mb_strlen($str, $encoding);
        if ($strLen > $length && $length > 0) {
            $tail = mb_substr($str, $length, $strLen - $length + 1, $encoding);
            return self::initPadString($length, $padString) . $tail;
        } else {
            $length = floor($strLen / 2);
            return self::replaceHead($str, $length, $padString, $encoding);
        }
    }

    public static function replaceMiddle($str, $headLen,$tailLen, $padString = '*', $encoding = 'UTF-8')
    {
        $strLen = mb_strlen($str, $encoding);

        
    }

    private static function initPadString($length, $padString = '')
    {
        $str = '';
        while ($length-- > 0) {
            $str .= $padString;
        }
        return $str;
    }

    public static function replaceEmail($email, $length, $padString = '*', $encoding = 'UTF-8')
    {
        $strLen = mb_strlen($email, $encoding);
        $index = mb_strpos($email, '@', $encoding);
        $tail = mb_substr($email, $index);
    }

    /**
     * 随机生成手机号
     * @return string
     */
    public static function randomPhone()
    {
        $arr = array(
            130, 131, 132, 133, 134, 135, 136, 137, 138, 139,
            144, 147,
            150, 151, 152, 153, 155, 156, 157, 158, 159,
            176, 177, 178,
            180, 181, 182, 183, 184, 185, 186, 187, 188, 189,
        );
        return $arr[array_rand($arr)] . mt_rand(1000, 9999) . mt_rand(1000, 9999);
    }

    /**
     * base64编码，并且转换为url可传递数据
     * @param $input
     * @return string
     */
    public static function base64UrlEncode($input)
    {
        return strtr(base64_encode($input), '+/', '-_');
    }

    /**
     * base64解码
     * @param $input
     * @return bool|string
     */
    public static function base64UrlDecode($input)
    {
        return base64_decode(strtr($input, '-_', '+/'));
    }
}