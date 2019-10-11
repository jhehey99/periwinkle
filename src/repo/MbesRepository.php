<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/7/2018
 * Time: 1:05 AM
 */

namespace src\repo;

use src\core\Repository;
use src\models\Mbes;
use src\models\MbesResponse;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class MbesRepository
 * @package src\repo
 */
class MbesRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param MbesResponse $response
     * @return bool
     */
    public function InsertMbesResponses(MbesResponse $response) : bool
    {
        $idsLength = count ($response->QuestionIds);
        $valsLength = count($response->ScaleValues);

        if($idsLength != $valsLength)
            return false;

        $length = $idsLength;

        $values = "";

        for($i = 0; $i < $length; $i ++)
        {
            $value = "(" .
                $response->MbesResponseId . "," .
                $response->AttemptId . "," .
                $response->QuestionIds[$i] . "," .
                $response->ScaleValues[$i] .
                "),";

            $values .= $value;
        }

        // remove last ',' in the values string
        $values = rtrim ($values, ",");

        $sql = "INSERT INTO mbesresponse(MbesResponseId, AttemptId, QuestionId, ScaleValue)
            VALUES " . $values;

        $this->prepare ($sql);

        $this->execute ([]);
        return true;
    }

    /**
     * @param string $values
     * @return bool
     */
    public function InsertMbesResponse (string $values) : bool
    {
        $sql = "INSERT INTO mbesresponse(MbesResponseId, AttemptId, QuestionId, ScaleValue)
                VALUES " . $values;

        $this->prepare ($sql);

        return $this->execute ([]);
    }

    /**
     * @param Mbes $mbes
     * @return bool
     */
    public function InsertMbes(Mbes $mbes) : int
    {
        $sql = "INSERT INTO mbes(mbesclientid, height, weight, bmi, datecreated) VALUES(?,?,?,?,?)";

        $this->prepare ($sql);

        if ($this->execute ($mbes->ToInsertResponse ()))
        {
            $idsql = "SELECT LAST_INSERT_ID() as MbesId;";
            $this->prepare ($idsql);
            $result = $this->result ([]);
            return empty($result) ? -1 : $result["MbesId"];
        }
        return -1;
    }

    /**
     * @param int $clientId
     * @return array
     */
    public function GetMbesByClientId(int $clientId) : array
    {
        $sql = "SELECT * FROM mbes WHERE MbesClientId = ?";

        $this->prepare ($sql);

        $results = $this->results ([$clientId]);

        $mbes = [];

        foreach ($results as $result)
            array_push ($mbes, new Mbes ($result));

        return $mbes;
    }

    /**
     * @param int $mbesId
     * @return Mbes
     */
    public function GetResponseByMbesId(int $mbesId) : MbesResponse
    {
        $sql = "SELECT * FROM mbesresponse WHERE MbesResponseId = ?";

        $this->prepare ($sql);

        $results = $this->results ([$mbesId]);

//        var_dump ($results);

        if(empty($results))
            return null;


        $firstResponse = new MbesResponse($results[0]);

        $questionsIds = [];
        $scaleValues = [];

        foreach ($results as $result)
        {
            array_push ($questionsIds, $result["QuestionId"]);
            array_push ($scaleValues, $result["ScaleValue"]);
        }

        $response = new MbesResponse();
        $response->MbesResponseId = $firstResponse->MbesResponseId;
        $response->AttemptId = $firstResponse->AttemptId;
        $response->QuestionIds = $questionsIds;
        $response->ScaleValues = $scaleValues;

        return $response;
    }
}

