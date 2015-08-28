<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 8/28/15
 * Time: 11:14 AM
 */
namespace App\Services\DateTime;
use Carbon\Carbon;

class DateHelper {
    public static $months = [
        'spanish'=>[
                '01'=>'enero',
                '02'=>'febrero',
                '03'=>'marzo',
                '04'=>'abril',
                '05'=>'mayo',
                '06'=>'junio',
                '07'=>'julio',
                '08'=>'agosto',
                '09'=>'septiembre',
                '10'=>'octubre',
                '11'=>'noviembre',
                '12'=>'diciembre'
            ]

    ];

    public static function getMonthsOfYear($language){
        return static::$months[$language];
    }

    public static function getMonthByName($name,$language){

        foreach(static::$months[$language] as $number=>$month){
            if($name==$month){
                return $number;
            }
        }
    }
    public static function getUnixTimeStamp($language,$year,$month,$day=1){
        $month = self::getMonthByName($month,$language);
        $endTimeStamp = Carbon::createFromDate($year,$month,$day)->timestamp;
        return $endTimeStamp;
    }






}