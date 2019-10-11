<?php

namespace api\services\mbes;

use src\models\Client;
use src\models\Mbes;
use src\repo\ClientRepository;
use src\repo\MbesRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$mbes = new Mbes($decoded);

$mbesRepo = new MbesRepository();

$response = new ApiResponse();

$mbesId = $mbesRepo->InsertMbes ($mbes);

echo $mbesId;
