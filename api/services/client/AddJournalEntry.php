<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/25/2018
 * Time: 9:54 PM
 */

use src\models\JournalEntry;
use src\repo\JournalRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode();

$journal = new JournalEntry($decoded);

$jRepo = new JournalRepository();

$response = new ApiResponse();



if($response->IsEmpty ())
{
    if($jRepo-> InsertJournalEntry($journal))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();

exit();
