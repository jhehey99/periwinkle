<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/16/2018
 * Time: 6:03 AM
 */

namespace api\services\client;

use src\models\AccelerometerRecord;
use src\repo\AccelerometerRecordRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$file = $_FILES['file'];
$obj = $_POST['json'];
$content = file_get_contents($file['tmp_name']);

$decoded = JsonUtils::DecodeObject ($obj);

$record = new AccelerometerRecord($decoded);

// var_dump($obj);
// var_dump($content);
// var_dump($decoded);
// var_dump($record);
// $record = new AccelerometerRecord();
// $record->Filename = "putanginang php to.txt";
// $content = "putanginang php to";

$dir = "../../../files/accel/";
$file = $dir . $record->Filename;

$accelRepo = new AccelerometerRecordRepository();

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
    if($accelRepo->AddAccelerometerRecord ($record))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();

exit();
