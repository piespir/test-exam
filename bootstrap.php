<?php

function __autoload($classname)
{
    require "{$classname}.php";
}