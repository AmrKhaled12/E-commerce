<?php

namespace App\Helprs;

use NumberFormatter;

class Currancy{
    public static function format($amount,$currancy=null){
        $formatter=new NumberFormatter(config('app.locale'),NumberFormatter::CURRENCY);
        if($currancy === null){
            $currancy== 'EGP';
        }
        return $formatter->formatCurrency($amount,$currancy);
    }

}