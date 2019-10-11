<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 6:20 PM
 */

namespace api\services\consultant;

use src\repo\ConsultantRepository;

require_once "../../../.autoload.php";

$conRepo = new ConsultantRepository();

echo json_encode ($conRepo->GetAllPendingConsultants ());
