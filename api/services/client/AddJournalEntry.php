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

$file = null;
$obj = null;

if(isset($_FILES['file']))
    $file = $_FILES['file'];

if(isset($_POST['json']))
    $obj = $_POST['json'];


$decoded = JsonUtils::DecodeObject ($obj);

$journal = new JournalEntry($decoded);

// image part
if($file != null)
{
    $dir = "../../../files/journals/";
    $content = file_get_contents($file['tmp_name']);
    $imgFile = $dir . $journal->ImageFileName;
    file_put_contents($imgFile, $content);
}

// journal part part
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
