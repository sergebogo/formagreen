<?php
/**
 * Created by PhpStorm.
 * User: zenon
 * Date: 03/09/2021
 * Time: 1:06 PM
 */

namespace App\Helper;


class Toolkit
{
    static public function getDateTimeNow()
    {
        $time = new \DateTime();
        return $time;
    }

    /**
     * @param string $format
     * @return string
     */
    static public function getDateTimeNowFormat($format = 'Y-m-d H:i:s')
    {
        $time = new \DateTime();
        return $time->format($format);
    }

    static public function getDateNow()
    {
        $time = new \DateTime();
        return $time->format('Y-m-d');
    }

    static public function getTimeNow()
    {
        $time = new \DateTime();
        return $time->format('H:i:s');
    }

    static public function getTimeStamp(){
        $time = new \DateTime();
        return $time->getTimestamp();
    }
}