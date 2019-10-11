<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 10/2/2018
 * Time: 1:23 AM
 */

namespace api\services\files;

use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

class Image64
{
    public $ImageString;

    public function __construct ($data = [])
    {
        if($data == null)
            return;

        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }
}

//TODO KAILANGAN I-ASSOCIATE TONG IMAGE SA JOURNAL ID AT CLIENT ID HEHE

$img = new Image64($decoded);

function generateImage($img) : bool
{
    $imgDir = "../../../files/img/";
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = $imgDir . uniqid() . '.png';
    return file_put_contents($file, $data);
}

$response = new ApiResponse();

if(generateImage ($img->ImageString))
    $response->Add (Response::UploadSuccess());
else
    $response->Add (Response::UploadFailed());

$response->Respond ();

