<?php

use src\repo\MbesRepository;

require_once "../../../.autoload.php";

$rawClientId = isset($_GET) ? $_GET['MbesClientId'] : '';

if($rawClientId == '')
    exit();

$clientId = (int) $rawClientId;

$mbesRepo = new MbesRepository();

$mbes = $mbesRepo->GetMbesByClientId ($clientId);

if(!empty($mbes))
    echo json_encode ($mbes);

exit();
