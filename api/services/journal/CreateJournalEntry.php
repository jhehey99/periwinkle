<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 10/1/2018
 * Time: 9:26 PM
 */


namespace api\services\journal;

use src\models\JournalEntry;
use src\repo\JournalRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();
JsonUtils::Dump ();
//
//$entry = new JournalEntry($decoded);
//
//$jouRepo = new JournalRepository();
//
//$response = new ApiResponse();
//
//if($jouRepo->InsertJournalEntry ($entry))
//    $response->Add (Response::UploadSuccess());
//else
//    $response->Add (Response::UploadFailed ());
//
//$response->Respond ();

//TODO LAGAY MO KO SA services/client
// TODO GAWIN MO KO
