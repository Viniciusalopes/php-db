<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 2020-01-19
 * Project : php-db
 * Goal    : DAO 
 * ---------------------------------------------------------------------------------------
 */
require_once dirname(__DIR__) . '/model/Crud.php';

class DaoUsuario {

    private $table;

    function __construct() {
        $this->table = 'tab_usuario';
    }

    function getAll() {
        return Crud::read($this->table, [], '');
    }

    function getEquals($where) {
        return Crud::read($this->table, $where, '=');
    }

    function getLikeAs($where) {
        return Crud::read($this->table, $where, 'LIKE');
    }

}
