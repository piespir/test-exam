<?php

class Login implements SplSubject {

    private $observers = array();
    private $data = array();

    public function attach(SplObserver $observer) {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer) {

        $count = count($this->observers);
        for ($i = 0; $i < $count; $i++) {
            if ($this->observers[$i] === $observer) {
                unset($this->observers[$i]);
            }
        }
    }

    public function setUserData(array $data) {
        $this->data = $data;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function notify() {

        $pdo = new mysqli('localhost', 'root', 'igorWWQ', 'test');
        $q = $pdo->query("select * from users where login='{$this->data['login']}' and senha=MD5('{$this->data['senha']}')");
        $r = $q->fetch_object();

        if ($r) {
            $this->setName($r->nome);
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
            header("location: protegido.php");
        }
    }
}