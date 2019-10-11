<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/14/2018
 * Time: 11:38 PM
 */

use src\models\BehaviorGraph;
use src\repo\BehaviorRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$file = $_FILES['file'];
$obj = $_POST['json'];
$content = file_get_contents($file['tmp_name']);

$decoded = JsonUtils::DecodeObject ($obj);

$behaviorGraph = new BehaviorGraph($decoded);

$dir = "../../../files/graphs/";
$file = $dir . $behaviorGraph->Filename;

$bgRepo = new BehaviorRepository();

$response = new ApiResponse();


if($response->IsEmpty ())
{
    if(!file_put_contents($file, $content)) {
        $response->Add ((Response::UploadFailed ()));
        $response->Respond ();
        exit();
    }

    // na-upload na ung file. use the python script
}


if($response->IsEmpty ())
{
    if($bgRepo->AddBehaviorGraph ($behaviorGraph))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();

exit();
