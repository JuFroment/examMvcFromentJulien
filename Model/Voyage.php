<?php
    class Voyage{
        private $id_voyage;
        private $nom;
        private $lattitude;
        private $longitude;
        private $idCategory;
        private $picture;


        public function __construct($id_voyage,$picture, $nom, $lattitude, $longitude, $idCategory)
        {
            $this->id_voyage = $id_voyage;
            $this->picture = $picture;
            $this->nom = $nom;
            $this->lattitude = $lattitude;
            $this->longitude = $longitude;
            $this->idCategory = $idCategory;
        }

        /**
         * @return mixed
         */
        public function getIdVoyage()
        {
            return $this->id_voyage;
        }

        /**
         * @param mixed $id
         */
        public function setIdVoyage($id_voyage): void
        {
            $this->id = $id_voyage;
        }

        /**
         * @return mixed
         */
        public function getPicture()
        {
            return $this->picture;
        }

        /**
         * @param mixed $picture
         */
        public function setPicture($picture): void
        {
            $this->picture = $picture;
        }

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @param mixed $nom
         */
        public function setNom($nom): void
        {
            $this->nom = $nom;
        }

        /**
         * @return mixed
         */
        public function getLattitude()
        {
            return $this->lattitude;
        }

        /**
         * @param mixed $lattitude
         */
        public function setLattitude($lattitude): void
        {
            $this->lattitude = $lattitude;
        }

        /**
         * @return mixed
         */
        public function getLongitude()
        {
            return $this->longitude;
        }

        /**
         * @param mixed $longitude
         */
        public function setLongitude($longitude): void
        {
            $this->longitude = $longitude;
        }

        /**
         * @return mixed
         */
        public function getIdCategory()
        {
            return $this->idCategory;
        }

        /**
         * @param mixed $idCategory
         */
        public function setIdCategory($idCategory): void
        {
            $this->idCategory = $idCategory;
        }


    }
?>