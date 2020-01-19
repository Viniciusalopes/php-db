<?php

/*
 * ---------------------------------------------------------------------------------------
 * License : MIT - Copyright 2020 Viniciusalopes (Vovolinux) <suporte@vovolinux.com.br>
 * Date    : 2020-01-19
 * Project : php-db
 * Goal    : QueryString composer
 * ---------------------------------------------------------------------------------------
 */

class MySql {

    private static $query;

    public static function getQuery($table, $where, $comparator) {

        switch ($table) {
            case 'tab_usuario':

                self::$query = 'SELECT u.*, s.*, t.*, x.* FROM tab_usuario u '
                        . 'INNER JOIN tab_status s ON u.usuario_status_id = s.status_id '
                        . 'INNER JOIN tab_tipo t ON u.usuario_tipo_id = t.tipo_id '
                        . 'INNER JOIN tab_sexo x ON u.usuario_sexo_id = x.sexo_id ';
                if (is_array($where) && count($where) > 0) {
                    self::$query .= 'WHERE ';

                    foreach ($where as $key => $value) {
                        if ($key > 0)
                            self::$query .= 'AND ';

                        self::$query .= $value[0] . ' ' . $comparator . ' ? ';
                    }
                }

                self::$query .= 'ORDER BY u.usuario_id';

                return self::$query;

            default:
                break;
        }
    }

}
