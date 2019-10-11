<?php

use src\repo\MbesRepository;

require_once "../../../.autoload.php";

$rawMbesId = isset($_GET) ? $_GET['MbesId'] : '';

if($rawMbesId == '')
    exit();

$mbesId = (int) $rawMbesId;

$mbesRepo = new MbesRepository();

$mbes = $mbesRepo->GetResponseByMbesId ($mbesId);

//var_dump ($mbes);

if(!empty($mbes))
    echo json_encode ($mbes);

exit();
