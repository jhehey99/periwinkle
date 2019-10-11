<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 11:46 AM
 */

namespace src\core;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class Repositories
 * @package core
 */
class Repository
{

    private static $_db;
    private $stmt;

    /**
     * Repositories constructor.
     * @param Database $db
     */
    public function __construct ()
    {
        self::$_db = null;
        $this->stmt = new \PDOStatement();
    }

    /**
     * @return Database
     */
    protected function db() : Database
    {
        if(self::$_db == null)
        {
            self::$_db = new Database(DBVENDOR,
                                      DBHOST,
                                      DBNAME,   // TODO: PRODUCTION DB LANG TO
                                      DBUSER,
                                      DBPASS);
        }
        return self::$_db;
    }

    /**
     * @param string $sql
     * @param array $params
     */
    protected function prepare(string $sql, $params = [])
    {
        $this->stmt = $this->db ()->prepare ($sql, $params);
    }

    /**
     * @param array $exec_params
     * @return bool
     */
    protected function execute($exec_params = []) : bool
    {
        return $this->stmt->execute ($exec_params);
    }

    /**
     * @param array $exec_params
     * @param array $fetch_params
     * @return array
     */
    protected function result($exec_params = [], $fetch_params = []) : array
    {
        if(!$this->stmt->execute ($exec_params))
            return [];

        if($fetch_params != [])
            $res = $this->stmt->fetch ($fetch_params);
        else
            $res = $this->stmt->fetch (\PDO::FETCH_ASSOC);

        if(!$res)
            return [];

        return $res;
    }

    /**
     * @param array $exec_params
     * @param array $fetch_params
     * @return array
     */
    protected function results($exec_params = [], $fetch_params = []) : array
    {
        if(!$this->stmt->execute ($exec_params))
            return [];

        if($fetch_params != [])
            $res = $this->stmt->fetchAll ($fetch_params);
        else
            $res = $this->stmt->fetchAll (\PDO::FETCH_ASSOC);

        if(!$res)
            return [];

        return $res;
    }
}


