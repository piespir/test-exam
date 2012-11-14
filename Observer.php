<?php

class Observer implements SplObserver
{
    private $session;
    
    function setSession(SessionStorage $session){
        $this->session = $session;
    }
    function getSession(){
        return $this->session;
    }
    
    
    
    public function update(SplSubject $subject) {
          
        $this->session->nome = $subject->getName();
        
            
    }
}
