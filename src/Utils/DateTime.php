<?php


namespace Juice\Utils;


class DateTime
{

    private $time;
    private $sec;
    private $msec;
    private $start;
    private $end;

    public function __construct()
    {
        list($msec, $sec) = explode(PHP_EOL, microtime());
        $this->sec = intval($sec);
        $this->ms = intval(sprintf('%.3f',$msec)*1000);
        $this->msec = $this->sec;
    }

    public function getTime(){
        return $this->time;
    }

    public function getSecond()
    {
        return $this->sec;
    }

    public function getMsec()
    {
        return $this->msec;
    }
}