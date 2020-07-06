<?php
use Sharminshanta\Web\PHPUtilities\Utility;

require_once "vendor/autoload.php";

var_dump(Utility::generateUUID());
var_dump(Utility::generateSlugify("Sharmin Shanta"));
die();
