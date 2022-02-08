<?php
    class SecurityController{

        private $userManager;


        public function __construct(){
            $this->userManager = new UserManager();
        }
        public function loginForm(){
            $errors = [];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["username"])){
                    $errors[] = "Veuillez saisir un nom d'utilisateur";
                }
                if(empty($_POST["password"])){
                    $errors[] = "Veuillez saisir un mot de passe";
                }

                if(count($errors) == 0){
                    $user = $this->userManager->findByUsername($_POST["username"]);

                    if(!$user){
                        $errors[] = "Utilisateur inconnu";
                    } else {
                        if(password_verify($_POST["password"], $user->getPassword())){
                            $errors[] = "Les identifiants sont incorrects";
                        } else {
                            $session = new SessionService();
                            $session->user = serialize($user);

                            header("Location: index.php?controller=category&action=list");
                        }
                    }
                }

            }

            require 'View/Security/login.php';
        }

        public function logout()
        {
            session_destroy();
            header ("Location: index.php?controller=security&action=login");
        }
    }

?>