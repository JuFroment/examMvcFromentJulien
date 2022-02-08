<?php
    class UserManager extends DbManager{
        public function findByUsername($username){
            $user = null;

            $query = $this->bdd->prepare ("SELECT * FROM user WHERE username = :username");
            $query->execute([
                "username"=>$username
            ]);

            $result = $query->fetch();

            if($result){
                $user = new User ($result["id"], $result["username"], $result["password"], $result["email"], $result["isAdmin"]);
            }
            return $user;
        }
    }
?>