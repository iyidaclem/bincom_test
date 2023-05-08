<?php

require_once "./models/AnnouncedPuResult.php";

$pur = new AnnouncedPuResult();
$pur->addResult($_POST);
?>