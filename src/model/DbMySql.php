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
        try {
            parent::__construct($url_dbconfig);
        } catch (Exception $exc) {
            throw new Exception($exc->getMessage());
        }
    }

    private static function open() {
        try {
            self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$database . ''
                    , '' . self::$user . ''
                    , '' . self::$password . ''
            );
            self::$connection->exec("SET CHARACTER SET utf8"); // Sets encoding UTF-8  
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $_SESSION['connection']->status = self::$connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            unset($j_SESSION['connection']->exc);
        } catch (PDOException $exc) {
            $_SESSION['connection']->status = $exc->getMessage();
            $_SESSION['connection']->exc = $exc;
            throw new Exception($exc->getMessage());
        }
    }

    private static function close() {
        self::$connection = NULL;
    }

    static function search($query, $params) {
        try {
            self::open();
            $command = self::$connection->prepare($query);
            $command->execute($params);

            $collection = NULL;
            while ($item = $command->fetch(PDO::FETCH_OBJ)) {
                $collection[] = $item;
            }
            self::close();
            return $collection;
        } catch (PDOException $exc) {
            self::close();
            throw new Exception($exc->getMessage() . " | SqlQuery: " . $query);
        }
    }

    static function run($query, $params) {
        try {
            $command = self::$connection->prepare($query);
            $command->execute($params);
            self::close();
        } catch (PDOException $exc) {
            self::close();
            throw new Exception($exc->getMessage() . " | SqlQuery: " . $query);
        }
    }

}
