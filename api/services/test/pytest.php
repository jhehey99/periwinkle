<?php




echo "haha";

$command = "../../../py/venv/Scripts/python.exe ../../../py/ComputeBehaviorParameters.py";
$out = exec ($command);

var_dump ($out);

