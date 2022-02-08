<?php

class VoyageManager extends DbManager
{
    public function findAllByCategory($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM voyage INNER JOIN category ON voyage.id_category = category.id_category WHERE category.id_category = :id_category");
        $query->execute(["id_category" => $id]);
        $results = $query->fetchAll();
        $voyageArray = [];
        foreach ($results as $result) {
            $category = new Category($result["id_category"], $result["titre"], $result["image"]);
            $voyage = new Voyage($result["id_voyage"], $result["picture"], $result["nom"], $result["lattitude"], $result["longitude"], $category->getIdCategory());
            $voyageArray[] = $voyage;
        }
        return $voyageArray;
    }


    public function add(Voyage $voyage, Category $category)
    {
        $query = $this->bdd->prepare("INSERT INTO voyage (nom, lattitude, longitude, id_category, picture) VALUES(:nom, :lattitude, :longitude, :id_category, :picture)");
        $query->execute([
            "nom" => $voyage->getNom(),
            "lattitude" => $voyage->getLattitude(),
            "longitude" => $voyage->getLongitude(),
            "id_category" => $category->getIdCategory(),
            "picture" => $voyage->getPicture()
        ]);
    }

    public function findOneVoyage($id)
    {
        $voyage = null;
        $query = $this->bdd->prepare("SELECT * FROM voyage INNER JOIN category ON voyage.id_category = category.id_category  WHERE id_voyage = :id_voyage");
        $query->execute(["id_voyage" => $id]);
        $result = $query->fetch();

        if ($result) {
            $category = new Category($result["id_category"], $result["titre"], $result["image"]);
            $voyage = new Voyage($result["id_voyage"], $result[1], $result["nom"], $result["lattitude"], $result["longitude"], $category);
        }
        return $voyage;
    }

    public function update(Voyage $editVoyage)
    {
        $query = $this->bdd->prepare("UPDATE voyage SET nom = :nom, picture = :picture, lattitude = :lattitude, longitude = :longitude, id_category = :id_category WHERE id_voyage = :id_voyage");
        $query->execute([
            "nom" => $editVoyage->getNom(),
            "picture" => $editVoyage->getPicture(),
            "lattitude" => $editVoyage->getLattitude(),
            "longitude" => $editVoyage->getLongitude(),
            "id_category" => $editVoyage->getIdCategory(),
            "id_voyage" => $editVoyage->getIdVoyage()
        ]);
    }

    public function delete($id)
    {
        $query = $this->bdd->prepare("DELETE FROM voyage WHERE id_voyage = :id_voyage");
        $query->execute([
            "id_voyage" => $id
        ]);
    }
}

?>