<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 18/01/2020
 * Project : php-db
 * Goal    : Encode and Decode .json files
 * ---------------------------------------------------------------------------------------
 */

class Json {

    public static function json_decode($url) {
        $contents = file_get_contents($url);
        $contents = utf8_encode($contents);
        $results = (object) json_decode($contents);

        return (json_last_error() == JSON_ERROR_NONE) ?
                $results :
                (object) ['exc' => 'Error on decode file the file <' . $url . '>'];
    }

    public static function json_encode($url, $data) {
        $fp = fopen($url, 'w');
        fwrite($fp, json_encode($data));
        fclose($fp);
    }

}
