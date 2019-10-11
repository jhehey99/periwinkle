<?php

use src\models\BehaviorGraph;
use src\repo\BehaviorRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$dir = "../../../files/graphs/";
$file = $dir . "testest.txt";

$content = "mama mo";

echo $file;

if(!file_put_contents($file, $content)) {
	echo "Error";
} else {
	echo "nice";
}
