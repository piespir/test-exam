<?php
include 'bootstrap.php';
$s = new SessionStorage();

if(!$s->nome){
    header('location: index.php');
}
echo 'protegido';
?>
