<?php
/**
 * Created by PhpStorm.
 * User: cz
 * Date: 2018/4/3
 * Time: 15:44
 */

namespace juice\tests;


use juice\helpers\StringHelper;
use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testCut()
    {
        $str = '中文 english 混合';// string's length 13
        $this->assertEquals('中文 ...', StringHelper::cut($str, 3));
        $this->assertEquals('中文 english 混合', StringHelper::cut($str, 10));
        $this->assertEquals('中文 english 混合', StringHelper::cut($str, 12));
        $this->assertEquals('中文 english 混合', StringHelper::cut($str, 16));
        $this->assertEquals('中文 english 混合', StringHelper::cut($str, -1));
        $this->assertEquals('中', StringHelper::cut('中', 1));
    }

    public function testReplaceTail()
    {
        $str = '中文english混合';// string's length 11
        $this->assertEquals('中文englis***', StringHelper::replaceTail($str, 3));
        $this->assertEquals('中文engl*****', StringHelper::replaceTail($str, 11));
        $this->assertEquals('中文engl*****', StringHelper::replaceTail($str, 0));
        $this->assertEquals('中文engl*****', StringHelper::replaceTail($str, -1));
    }

    public function testReplaceHead()
    {
        $str = '中文english混合';// string's length 11
        $this->assertEquals('***nglish混合', StringHelper::replaceHead($str, 3));
        $this->assertEquals('******ish混合', StringHelper::replaceHead($str, 6));
        $this->assertEquals('*****lish混合', StringHelper::replaceHead($str, 11));
        $this->assertEquals('*****lish混合', StringHelper::replaceHead($str, 15));
        $this->assertEquals('*****lish混合', StringHelper::replaceHead($str, 0));
        $this->assertEquals('*****lish混合', StringHelper::replaceHead($str, -1));
        $this->assertEquals('中', StringHelper::replaceHead('中', -1));
        $this->assertEquals('', StringHelper::replaceHead('', -1));
    }

    public function testReplaceMiddle(){
        $phone = '15812345678';
        $this->assertEquals('158****5678',StringHelper::replaceMiddle($phone,3,4));
        $this->assertEquals('1581***5678',StringHelper::replaceMiddle($phone,11,0));
        $this->assertEquals('1581***5678',StringHelper::replaceMiddle($phone,7,4));
        $this->assertEquals('1581***5678',StringHelper::replaceMiddle($phone,0,11));
        $this->assertEquals('1581***5678',StringHelper::replaceMiddle($phone,12,12));
        $this->assertEquals('1',StringHelper::replaceMiddle('1',12,12));
        $this->assertEquals('**',StringHelper::replaceMiddle('12',1,1));
        $this->assertEquals('1*',StringHelper::replaceMiddle('12',1,0));
        $this->assertEquals('*2',StringHelper::replaceMiddle('12',0,1));
        $this->assertEquals('**',StringHelper::replaceMiddle('12',2,2));
    }

    public function testReplaceEmail(){
        $email = 'foobar@gmail.com';
        $this->assertEquals('fo**ar@gmail.com',StringHelper::replaceEmail($email,2,2));
        $this->assertEquals('fo**ar@gmail.com',StringHelper::replaceEmail($email,8,0));
        $this->assertEquals('fo**ar@gmail.com',StringHelper::replaceEmail($email,0,8));
        $this->assertEquals('fo**ar@gmail.com',StringHelper::replaceEmail($email,3,3));
        $this->assertEquals('fo**ar@gmail.com',StringHelper::replaceEmail($email,3,3));
    }
}