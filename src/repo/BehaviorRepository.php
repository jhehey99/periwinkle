<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/24/2018
 * Time: 12:08 PM
 */

namespace src\repo;

use src\core\Repository;
use src\models\BehaviorGraph;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class BehaviorRepository
 * @package src\repo
 */
class BehaviorRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param BehaviorGraph $behaviorGraph
     * @return bool
     */
    public function AddBehaviorGraph(BehaviorGraph $behaviorGraph) : bool
    {
        $sql = "insert into behaviorgraph(GraphClientId, Filename, StartTime, StopTime)
                values (?,?,?,?)";

        $this->prepare ($sql);

        return $this->execute ($behaviorGraph->ToInsert ());
    }

    /**
     * @param string $clientId
     * @return array
     */
    public function GetBehaviorGraphByClientId(string $clientId) : array
    {
        $sql = "select * from behaviorgraph where GraphClientId = ?";
        $this->prepare ($sql);

        $results = $this->results ([$clientId]);

        $behaviorGraphs = [];

        foreach ($results as $result)
            array_push ($behaviorGraphs, new BehaviorGraph($result));

        return $behaviorGraphs;
    }
}