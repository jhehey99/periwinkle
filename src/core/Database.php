<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 11:44 AM
 */

namespace src\core;

require_once "config.php";

/**
 * Class Database
 * @package src\core
 */
class Database extends \PDO
{
    /**
     * Database constructor.
     * @param string $DBVENDOR
     * @param string $DBHOST
     * @param string $DBNAME
     * @param string $DBUSR
     * @param string $DBPWD
     */
    public function __construct (string $DBVENDOR,
                                 string $DBHOST,
                                 string $DBNAME,
                                 string $DBUSR,
                                 string $DBPWD)
    {
        parent::__construct ($DBVENDOR.':host='.$DBHOST.'; dbname='.$DBNAME,
                             $DBUSR,
                             $DBPWD,
                            [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);


    }
}