<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 19/01/2020
 * Project : php-db
 * Goal    : Manage session
 * ---------------------------------------------------------------------------------------
 */

session_start();

function clear_session() {
    session_destroy();
    clearstatcache();
}

function print_session() {
    echo '<pre>';

    if (isset($_SESSION))
        print_r($_SESSION);
    else
        echo 'sessao vazia.';

    echo '</pre>';
}
