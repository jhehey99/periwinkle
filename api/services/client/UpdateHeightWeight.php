<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/4/2018
 * Time: 7:19 PM
 */

namespace api\services\client;

use src\models\Client;
use src\repo\ClientRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$client = new Client($decoded);

$cliRepo = new ClientRepository();

$response = new ApiResponse();

if($response->IsEmpty ())
{
    if($cliRepo->UpdateHeightWeight ($client))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();
