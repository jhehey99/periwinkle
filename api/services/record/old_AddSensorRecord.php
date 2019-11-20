<?php

namespace api\services\client;

use src\models\SensorRecord;
use src\repo\SensorRecordRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$file = $_FILES['file'];
$obj = $_POST['json'];
$content = file_get_contents($file['tmp_name']);

$decoded = JsonUtils::DecodeObject ($obj);

$record = new SensorRecord($decoded);

$dir = "";

$Piezo = "0";
$Acceleration = "1";


//TODO: Single file nalang sya, "time,piezo,ax,ay,az" line format

if($record->RecordType == $Piezo)
	$dir = "../../../files/graphs/";
else if ($record->RecordType == $Acceleration)
	$dir = "../../../files/accel/";

$file = $dir . $record->Filename;

$repo = new SensorRecordRepository();

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
    if($repo->AddSensorRecord ($record))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();

exit();
