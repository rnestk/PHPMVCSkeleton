<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\lib;

class jQHelper {

    public static function pileCssOn($target, $css) {
        return "<script type = 'text/javascript' >"
                . "$('#$target').addClass('$css');"
                . "$('#$target').effect('pulsate', 'slow');"
                . "</script>";
    }

    public static function includeJQScript($fileName) {
        echo "<script type = 'text/javascript'>";
        include('src/js/inputs/' . $fileName . '.js');
        echo "</script>";
    }

    public static function notification($info = 'Wiadomość.') {
        return "<script type = 'text/javascript'>"
        . "$(document).ready(function(){"
        . "$('#notification').fadeIn(1000);"
                . "$('#info').text('$info');"
                . "$('#end').click(function(){" .
                "$('#notification').fadeOut(1000);" .
                "});"
                . "});</script>";
    }

}
