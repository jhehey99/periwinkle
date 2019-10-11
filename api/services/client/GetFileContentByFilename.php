<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/27/2018
 * Time: 11:17 PM
 */

require_once "../../../.autoload.php";


$rawFilename = isset($_GET) ? $_GET['filename'] : '';

$rawDirectory = isset($_GET) ? $_GET['directory'] : '';

if($rawFilename == '' || $rawDirectory)
    exit();

$filename = base64_decode (urldecode ($rawFilename));
$directory = base64_decode (urldecode ($rawDirectory));

$file = "../../../files/" . $directory . "/" . $filename;
$contents = file_get_contents($file);

echo json_encode ($contents);

exit();
