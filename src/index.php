<!DOCTYPE html>
<!--
---------------------------------------------------------------------------------------
License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
Date    : 2020-01-19
Project : php-db
Goal    : HTML page for development test
---------------------------------------------------------------------------------------
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP-DB |Viniciusalopes</title>
    </head>
    <body>
        <?php
        require_once dirname(__FILE__) . '/bin/session.php';
        clear_session();
        require_once dirname(__FILE__) . '/model/DbMySql.php';
        $db = new DbMySql('./cfg/dbconfig.json');
        print_session();
        ?>
    </body>
</html>
