<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/27/2018
 * Time: 4:39 PM
 */

namespace api\services\password;

// tatanggapin mo is Username and PasswordHash
// kunin mo AccountId using Username, then insert mo sa Password kasama ung Hash

use src\models\Password;
use src\repo\PasswordRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$username = $decoded['PsUsername'];
$password = new Password($decoded['UPassword']);

$passRepo = new PasswordRepository();
$response = new ApiResponse();


// pag nag fail ung password registration, ibigsabihin may registered password na
// kailangan UPDATE na ung gawin para mabago
if($passRepo->InsertPassword ($username, $password))
    $response->Add (Response::RegisterSuccess ());
else
    $response->Add (Response::RegisterFailed ());

$response->Respond ();
