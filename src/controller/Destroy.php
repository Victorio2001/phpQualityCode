<?php
declare(strict_types=1);
require_once("../../config/globalConfig.php");
require_once("../../config/localConfig.php");

$_SESSION=[];
session_destroy();
header('location: ../../src/view/Connect.php');
