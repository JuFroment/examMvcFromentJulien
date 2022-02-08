<?php
class VoyageController extends AdminController {

    private $categoryManager;
    private $voyageManager;

    public function __construct()
    {
        parent::__construct();
        $this->voyageManager = new VoyageManager();
        $this->categoryManager = new CategoryManager();
    }

    public function voyageListByCategory($id){

        $category = $this->categoryManager->findOne($id);
        $voyage = $this->voyageManager->findAllByCategory($id);

        require 'View/Voyage/list.php';
    }

    public function addVoyage($id)
    {
        $category = $this->categoryManager->findOne($id);
        $voyage = $this->voyageManager->findAllByCategory($category->getIdCategory());
        $errors = [];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //verif du form
            if(empty($_POST["nom"])){
                $errors[] = "Veuillez saisir le nom du voyage.";
            }
            if(empty($_POST["lattitude"])){
                $errors[] = "Veuillez saisir la lattitude du voyage.";
            }
            if(empty($_POST["longitude"])){
                $errors[] = "Veuillez saisir la longitude du voyage.";
            }

            //verif d'upload
            if (count($errors) == 0 && $_FILES["picture"]["error"] != 4) {
                $upload = $this->uploadImage($errors);
                $uniqFilename = $upload["filename"];
                $errors = $upload["errors"];
            }

            //enregistrement en DB
            if(count($errors) == 0){
                $voyage = new Voyage(null, $uniqFilename, $_POST["nom"],  $_POST["lattitude"], $_POST["longitude"], $category->getIdCategory(),  );
                $this->voyageManager->add($voyage, $category);
            }

            //redirection utilisateur
            header("Location: index.php?controller=category&action=list");
        }


        require 'View/Voyage/form.php';
    }

    private function uploadImage($errors){

        $uniqFilename = null;
        if ($_FILES["picture"]["error"] != 0) {
            $errors[] = "Une erreur s'est produite dans l'upload";
        }
        $types = ["image/jpeg", "image/png"];
        if (!in_array($_FILES["picture"]["type"], $types)) {
            $errors[] = "Désolé, nous n'acceptons que les formats JPEG & PNG.";
        }
        if ($_FILES["picture"]["size"] > 2 * 1048576) {
            $errors[] = "Désolé, votre image fait plus de 2mb";
        }

        if(count($errors) == 0) {
            $extension = explode("/", $_FILES["picture"]["type"])[1];
            $uniqFilename = uniqid().'.'.$extension;

            move_uploaded_file($_FILES["picture"]["tmp_name"], 'Public/uploads/'.$uniqFilename);
        }

        return ["errors"=>$errors, 'filename'=>$uniqFilename];
    }

    public function editVoyage($id)
    {
        $errors = [];
        $category = $this->categoryManager->findOne($id);
        $editVoyage = $this->voyageManager->findOneVoyage($id);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uniqFilename = null;
            if (empty($_POST["nom"])) {
                $errors[] = "Veuillez saisir le titre de la catégorie";
            }
            if (count($errors) == 0 && $_FILES["picture"]["error"] !=4) {
                $upload = $this->uploadImage($errors);
                $uniqFilename = $upload["filename"];
                $errors = $upload["errors"];
            } else {
                $uniqFilename = $editVoyage->getPicture();
            }

            if(count($errors) == 0){
                $editVoyage->setPicture($uniqFilename);
                $editVoyage->setNom($_POST["nom"]);
                $editVoyage->setLattitude($_POST["lattitude"]);
                $editVoyage->setLongitude($_POST["longitude"]);


                $this->voyageManager->update($editVoyage);
                var_dump($editVoyage);
                header("Location: index.php?controller=category&action=list");
            }
        }

        require 'View/Voyage/form.php';
    }

    public function deleteVoyage($id)
    {
        //on supprime la catégorie
        $this->voyageManager->delete($id);
        //On redirige l'utilisateur
        header("Location: index.php?controller=category&action=list");
    }

    public function voyageDetail($id)
    {
        $category = $this->categoryManager->findOne($id);
        $voyageDetail = $this->voyageManager->findOneVoyage($id);
        require 'View/Voyage/voyageDetail.php';
    }
}
?>