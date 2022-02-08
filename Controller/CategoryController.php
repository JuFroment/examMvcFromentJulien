<?php

class CategoryController extends AdminController
{
    private $categoryManager;

    public function __construct()
    {
        parent::__construct();
        $this->categoryManager = new CategoryManager();
    }

    public function categoryList()
    {
        //aller chercher toutes les categories dans la DB
        $category = $this->categoryManager->findAll();
        //Puis les afficher
        require 'View/Category/list.php';
    }

    public function addCategory()
    {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //vérification du form
            if (empty($_POST["titre"])) {
                $errors[] = "Veuillez saisir le titre de la catégorie";
            }

            //upload de l'image
            $uniqFilename = null;

            if (count($errors) == 0 && $_FILES["image"]["error"] != 4) {
                $upload = $this->uploadImage($errors);
                $uniqFilename = $upload["filename"];
                $errors = $upload["errors"];
            }


            //enregistrer en DB
            if(count($errors) == 0) {
                $category = new Category(null, $_POST["titre"], $uniqFilename);
                $this->categoryManager->add($category);
            }
            //rediriger l'utilisateur
            header("Location: index.php?controller=category&action=list");
        }
        //afficher le formulaire
        require 'View/Category/form.php';
    }

    public function editCategory($id)
    {
        $errors = [];
        $editCategory = $this->categoryManager->findOne($id);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uniqFilename = null;
            if (empty($_POST["titre"])) {
                $errors[] = "Veuillez saisir le titre de la catégorie";
            }
            if (count($errors) == 0 && $_FILES["image"]["error"] !=4) {
                $upload = $this->uploadImage($errors);
                $uniqFilename = $upload["filename"];
                $errors = $upload["errors"];
            } else {
                $uniqFilename = $editCategory->getImage();
            }

            if(count($errors) == 0){
            $editCategory->setImage($uniqFilename);
            $editCategory->setTitre($_POST["titre"]);

            $this->categoryManager->update($editCategory);

            header("Location: index.php?controller=category&action=list");
            }
        }

        require 'View/Category/form.php';
    }


    //méthode pour ne pas répété la vérification d'image
    private function uploadImage($errors){

        $uniqFilename = null;
        if ($_FILES["image"]["error"] != 0) {
            $errors[] = "Une erreur s'est produite dans l'upload";
        }
        $types = ["image/jpeg", "image/png"];
        if (!in_array($_FILES["image"]["type"], $types)) {
            $errors[] = "Désolé, nous n'acceptons que les formats JPEG & PNG.";
        }
        if ($_FILES["image"]["size"] > 2 * 1048576) {
            $errors[] = "Désolé, votre image fait plus de 2mb";
        }

        if(count($errors) == 0) {
            $extension = explode("/", $_FILES["image"]["type"])[1];
            $uniqFilename = uniqid().'.'.$extension;

            move_uploaded_file($_FILES["image"]["tmp_name"], 'Public/uploads/'.$uniqFilename);
        }

        return ["errors"=>$errors, 'filename'=>$uniqFilename];
    }

    public function deleteCategory( $id)
    {
        //on supprime la catégorie
        $this->categoryManager->delete($id);
        //On redirige l'utilisateur
        header("Location: index.php?controller=category&action=list");
    }

}

?>