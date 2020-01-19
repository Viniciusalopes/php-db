<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 2020-01-19
 * Project : php-db
 * Goal    : Create, Read, Update and Delete
 * ---------------------------------------------------------------------------------------
 */
const DB_CONFIG_JSON = './cfg/dbconfig.json';
require_once dirname(__DIR__) . '/model/DbMySql.php';
require_once dirname(__DIR__) . '/model/MySql.php';

class Crud {

    private static $db;

    static function create($obj) {
        Crud::create($obj);
    }

    static function read($table, $where, $comparator) {

        self::$db = new DbMySql(DB_CONFIG_JSON);

        if (self::$db->getType() === 'mysql') {
            $query = MySql::getQuery($table, $where, $comparator);
            $params = [];

            if (is_array($where) && count($where) > 0) {
                foreach ($where as $w) {
                    $params[] = ($comparator === 'LIKE') ? "%$w[1]%" : $w[1];
                }
            }
        }

        return self::$db->search($query, $params);
    }

    static function update($obj) {
        Crud::update($obj);
    }

    static function delete($obj) {
        Crud::delete($obj);
    }

}
