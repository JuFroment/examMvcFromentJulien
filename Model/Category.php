<?php
    class Category{
        private $id_category;
        private $titre;
        private $image;

        public function __construct($id_category, $titre, $image)
        {
            $this->id_category = $id_category;
            $this->titre = $titre;
            $this->image = $image;
        }

        public function getIdCategory()
        {
            return $this->id_category;
        }

        public function setIdCategory($id_category): void
        {
            $this->id_category = $id_category;
        }

        public function getTitre()
        {
            return $this->titre;
        }

        public function setTitre($titre): void
        {
            $this->titre = $titre;
        }

        public function getImage()
        {
            return $this->image;
        }

        public function setImage($image): void
        {
            $this->image = $image;
        }


    }
?>