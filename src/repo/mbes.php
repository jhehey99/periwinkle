<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/7/2018
 * Time: 1:24 AM
 */


use src\models\MbesResponse;

require_once ("../models/MbesResponse.php");

function InsertMbesResponse(MbesResponse $response) : bool
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
            $response->ResponseClientId . "," .
            $response->AttemptId . "," .
            $response->QuestionIds[$i] . "," .
            $response->ScaleValues[$i] .
            "),";

        $values .= $value;
    }

    // remove last ',' in the values string
    $values = rtrim ($values, ",");

    $sql = "INSERT INTO mbesresponse(ResponseClientId, AttemptId, QuestionId, ScaleValue)
            VALUES " . $values;
    return true;
}

$r = new MbesResponse();
$r->ResponseClientId = 16;
$r->AttemptId = 1;
for($i = 0; $i < 21; $i ++)
{
    array_push ($r->QuestionIds, $i + 1);
    array_push ($r->ScaleValues, $i % 7);
}

//var_dump ($r);

InsertMbesResponse($r);