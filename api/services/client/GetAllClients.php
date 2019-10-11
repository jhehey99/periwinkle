<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 9:03 PM
 */

namespace api\services\client;

use src\repo\ClientRepository;

require_once "../../../.autoload.php";

$cliRepo = new ClientRepository();

echo json_encode ($cliRepo->GetAllClients ());
