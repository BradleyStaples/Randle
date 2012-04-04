<?php
include("pwd.php");
$rp = new randomPassword();
$data = $rp->generate();
echo json_encode($data);
?>