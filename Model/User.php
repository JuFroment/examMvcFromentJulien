<?php
    class User{
        private $id_user;
        private $username;
        private $password;
        private $email;
        private $isAdmin;

        public function __construct($id_user, $username, $password, $email, $isAdmin)
        {
            $this->id_user = $id_user;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->isAdmin = $isAdmin;
        }

        /**
         * @return mixed
         */
        public function getIdUser()
        {
            return $this->id_user;
        }

        /**
         * @param mixed $id_user
         */
        public function setIdUser($id_user): void
        {
            $this->id = $id_user;
        }

        /**
         * @return mixed
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * @param mixed $username
         */
        public function setUsername($username): void
        {
            $this->username = $username;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getIsAdmin()
        {
            return $this->isAdmin;
        }

        /**
         * @param mixed $isAdmin
         */
        public function setIsAdmin($isAdmin): void
        {
            $this->isAdmin = $isAdmin;
        }


    }
?>