<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/17/2018
 * Time: 8:26 PM
 */

namespace api\services\client;

use src\repo\SensorRecordRepository;

require_once "../../../.autoload.php";

$rawClientId = isset($_GET) ? $_GET['clientId'] : '';

if($rawClientId == '')
    exit();

$clientId = base64_decode (urldecode ($rawClientId));

$repo = new SensorRecordRepository();

$records = $repo->GetRecordsByClientId ($clientId);

echo json_encode ($records);

exit();
