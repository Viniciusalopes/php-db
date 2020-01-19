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
        //clear_session();
        require_once dirname(__FILE__) . '/model/Usuario.php';

        $Usuario = new DaoUsuario();
        $_SESSION['usuarios1'] = $Usuario->getAll();
        $_SESSION['usuarios2'] = $Usuario->getEquals([['usuario_id', 2]]);
        $_SESSION['usuarios3'] = $Usuario->getLikeAs([['usuario_nome', 'Vin']]);

        print_session();
        ?>
    </body>
</html>
