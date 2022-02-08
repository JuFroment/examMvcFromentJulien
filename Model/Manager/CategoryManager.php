<?php
    class CategoryManager extends DbManager {
        public function findAll(){
            $query = $this->bdd->prepare("SELECT * FROM category");
            $query->execute();
            $results = $query->fetchAll();
            $categoryArray = [];
            foreach ($results as $result) {
                $category = new Category($result["id_category"], $result["titre"], $result["image"]);
                $categoryArray[] = $category;
            }
            return $categoryArray;
        }

        public function add(Category $category)
        {
            $query = $this->bdd->prepare ("INSERT INTO category (titre, image) VALUES (:titre, :image)");
            $query->execute([
                "titre"=>$category->getTitre(),
                "image"=>$category->getImage()
            ]);
        }

        public function findOne($id)
        {
            $query = $this->bdd->prepare("SELECT * FROM category WHERE id_category = :id_category");
            $query->execute(["id_category"=>$id]);
            $result = $query->fetch();
            $category = new Category($result["id_category"], $result["titre"], $result["image"]);
            return $category;
        }

        public function update(Category $editCategory)
        {
            $query = $this->bdd->prepare("UPDATE category SET titre = :titre, image = :image WHERE id_category = :id_category");
            $query->execute([
                "titre"=>$editCategory->getTitre(),
                "image"=>$editCategory->getImage(),
                "id_category"=>$editCategory->getIdCategory()
            ]);
        }

        public function delete($id)
        {
            $query = $this->bdd->prepare("DELETE FROM category WHERE id_category = :id_category");
            $query->execute([
                "id_category"=> $id
            ]);
        }
    }
?>