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
        $this->assertEquals('中文 ...',StringHelper::cut($str,3));
        $this->assertEquals('中文 english 混合',StringHelper::cut($str,10));
        $this->assertEquals('中文 english 混合',StringHelper::cut($str,12));
        $this->assertEquals('中文 english 混合',StringHelper::cut($str,16));
        $this->assertEquals('中文 english 混合',StringHelper::cut($str,-1));
    }

    public function testReplaceTail()
    {
        $str = '中文english混合';// string's length 11
        $this->assertEquals('中文englis***',StringHelper::replaceTail($str,3));
        $this->assertEquals('中文engl*****',StringHelper::replaceTail($str,11));
        $this->assertEquals('中文engl*****',StringHelper::replaceTail($str,0));
        $this->assertEquals('中文engl*****',StringHelper::replaceTail($str,-1));
    }

    public function testReplaceHead(){
        $str = '中文english混合';// string's length 11
        $this->assertEquals('***nglish混合',StringHelper::replaceHead($str,3));
        $this->assertEquals('******ish混合',StringHelper::replaceHead($str,6));
        $this->assertEquals('*****lish混合',StringHelper::replaceHead($str,11));
        $this->assertEquals('*****lish混合',StringHelper::replaceHead($str,15));
        $this->assertEquals('*****lish混合',StringHelper::replaceHead($str,0));
        $this->assertEquals('*****lish混合',StringHelper::replaceHead($str,-1));
    }
}