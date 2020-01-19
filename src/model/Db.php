<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 18/01/2020
 * Project : php-db
 * Goal    : Generic coonection model
 * ---------------------------------------------------------------------------------------
 */
require_once dirname(__DIR__) . '/bin/session.php';
require_once dirname(__DIR__) . '/model/Json.php';

abstract class Db {

    protected static $host;
    protected static $type;
    protected static $database;
    protected static $user;
    protected static $password;
    protected static $connection;

    protected function __construct($url_dbconfig) {
        $dbconfig = Json::json_decode($url_dbconfig);

        self::$host = $dbconfig->host;
        self::$type = $dbconfig->type;
        self::$database = $dbconfig->database;
        self::$user = $dbconfig->user;
        self::$password = $dbconfig->password;

        self::save_on_session($dbconfig);
    }

    private static function save_on_session($dbconfig) {
        $_SESSION['connection'] = (object) ['dbconfig' => $dbconfig];
        unset($_SESSION['connection']->dbconfig->password);
    }

    static function getType() {
        return self::$type;
    }

}
