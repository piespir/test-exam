<?php


class SessionStorage
{
    public function __construct(){
        if(!session_start()){
            session_start();
        }
    }
    
    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }
    
    public function __get($name) {
        return $_SESSION[$name];
    }
}