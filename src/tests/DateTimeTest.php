<?php
/**
 * Created by PhpStorm.
 * User: cz
 * Date: 2018/3/27
 * Time: 16:26
 */

namespace juice\tests;


use juice\helpers\DateTimeHelper;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
    private $time = 1522139668;

    private $startOfDay = 1522080000;
    private $endOfDay = 1522166399;

    private $startOfWeek = 1521993600;
    private $endOfWeek = 1522598399;

    private $startOfMonth = 1519833600;
    private $endOfMonth = 1522511999;


    public function testStartOfDay()
    {
        $this->assertEquals($this->startOfDay, DateTimeHelper::startOfDay($this->time));
    }

    public function testEndOfDay()
    {
        $this->assertEquals($this->endOfDay, DateTimeHelper::endOfDay($this->time));
    }

    public function testStartOfWeek()
    {
        $this->assertEquals($this->startOfWeek, DateTimeHelper::startOfWeek($this->time));
    }

    public function testEndOfWeek()
    {
        $this->assertEquals($this->endOfWeek, DateTimeHelper::endOfWeek($this->time));
    }

    public function testStartOfMonth()
    {
        $this->assertEquals($this->startOfMonth, DateTimeHelper::startOfMonth($this->time));
    }

    public function testEndOfMonth()
    {
        $this->assertEquals($this->endOfMonth, DateTimeHelper::endOfMonth($this->time));
    }

}