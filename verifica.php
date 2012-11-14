<?php

include 'bootstrap.php';
$l = new Login;
$o = new Observer;
$o->setSession(new SessionStorage());
$l->attach($o);
$l->setUserData($_POST);
$l->notify();
