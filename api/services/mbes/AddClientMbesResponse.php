<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/7/2018
 * Time: 12:23 PM
 */


namespace api\services\mbes;

use src\models\Client;
use src\models\MbesResponse;
use src\repo\ClientRepository;
use src\repo\MbesRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$mbesResponse = new MbesResponse($decoded);

$mbesRepo = new MbesRepository();

$response = new ApiResponse();

// to make sure lng na same count questions at answers
$idsLength = count ($mbesResponse->QuestionIds);
$valsLength = count($mbesResponse->ScaleValues);

if($idsLength != $valsLength)
    $response->Add (Response::UploadFailed ());

// convert to string ung values needed para sa query
$values = "";

for($i = 0; $i < $idsLength; $i ++)
{
    $value = "(" .
        $mbesResponse->MbesResponseId . "," .
        $mbesResponse->AttemptId . "," .
        $mbesResponse->QuestionIds[$i] . "," .
        $mbesResponse->ScaleValues[$i] .
        "),";

    $values .= $value;
}

// remove last ',' in the values string
$values = rtrim ($values, ",");

if($response->IsEmpty ())
{
    if($mbesRepo->InsertMbesResponse ($values))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();
