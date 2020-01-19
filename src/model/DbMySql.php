<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 18/01/2020
 * Project : php-db
 * Goal    : Model for MySql database connection
 * ---------------------------------------------------------------------------------------
 */

require_once dirname(__DIR__) . '/model/Db.php';

class DbMySql extends Db {

    function __construct($url_dbconfig) {
        parent::__construct($url_dbconfig);
        if (self::$type == 'mysql') {
            self::setConnection();
        }
    }

    private static function setConnection() {
        try {
            self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$database . ''
                    , '' . self::$user . ''
                    , '' . self::$password . ''
            );
            self::$connection->exec("SET CHARACTER SET utf8"); // Sets encoding UTF-8  
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $_SESSION['connection']->status = self::$connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            unset($_SESSION['connection']->err);
        } catch (PDOException $err) {
            $_SESSION['connection']->status = $err->getMessage();
            $_SESSION['connection']->err = $err;
        }
    }

}
