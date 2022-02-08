<?php
    abstract class AdminController{
        protected $user;
        public function __construct(){
            $session = new SessionService();
            if(isset($session->user)){
                $this->user = unserialize($session->user);
            } else {
                header("Location: index.php?controller=security&action=login");
            }
        }
    }
?>