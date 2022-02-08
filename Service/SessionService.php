<?php
class SessionService {

    private $attributsSimules = [];
    private $sleepingTime = null;


    // Le but de cette fonction sera de réccupérer ma session stockée.
    // Si il y a des valeurs, elle ira remplir notre objet (hydrate)
    // Sinon ça veut dire que nos attributs sont vides
    public function __construct(){
        // Ici on vérifie qu'on a pas déjà stocké notre objet session dans la variable $_SESSION['serialized']
        if(array_key_exists("serialized", $_SESSION)){
            // Ici : c'est le cas, on réccupére notre chaine de caractère pour la retransformer en objet
            // Ceci va lancer la màthode magique wakeup
            $sessionUnSerialize = unserialize($_SESSION['serialized']);
            // J'initialise mes attributs simulés avec l'objet présent en session
            $this->attributsSimules = $sessionUnSerialize->attributsSimules;
            // J'initialise le temps d'endormissement depuis l'objet stocké.
            $this->sleepingTime = $sessionUnSerialize->sleepingTime;
        }
    }

    // Cette fonction sera appelé automatiquement à la fin du script
    // Elle va sauvegarder notre objet dans une session HTTP avec l'utilisation de la variable super globale $_SESSION
    public function __destruct(){
        // La session est un stockage clé valeur. Cette valeur ne peut etre qu'une chaine de caractère
        // Je stocke la représentation textuelle de l'objet courant ($this)
        // Quand la fonction serialize est appelé, la mèthode magique __sleep est déclanchée.
        $_SESSION['serialized'] = serialize($this);
    }

    // Cette méthode est lancé à la ligne 25 avec le serialize
    // Elle le timestamp actuel et l'assigne à l'attribut sleepingTime
    // Elle retourne notre objet en prenant en compte ces 2 attributs (attributsSimules et sleeping time)
    public function __sleep(){
        $this->sleepingTime = time();
        return ['attributsSimules', 'sleepingTime'];
    }

    // On calcul ici la différence entre l'heure actuelle et l'heure stockée dans notre objet
    // On attribue cette différence à l'attribut sleeping time
    public function __wakeup(){
        $this->sleepingTime = time() - $this->sleepingTime;
    }


    // ICI : La méthode magique GET. Elle est appelée quand on essaie d'accéder à un attribut inaccessible
    // (privé, protected, inexistant)
    // Prend en paramètre le nom de l'attribut auquel j'ai souhaité accéder
    public function __get($name){
        return $this->attributsSimules[$name];
    }

    // __set sera appelée quand je souhaite assigner une valeur à un objet inaccessible (privé, protected, inexistant)
    // Prend 2 paramètres : le nom de l'attribut et la valeur que j'ai voulu ajouter.
    public function __set($name, $value){
        $this->attributsSimules[$name] = $value;
    }

    // La méthode magique isset est appelée en fonction d'evenement
    // Elle prend un paramètre : le nom de l'attribut sur lequel a été appelé la fonction PHP isset
    public function __isset($name){
        return isset($this->attributsSimules[$name]);
    }


    // La méthode magique unset est appelé quand on utilise la fonction php unset sur un attribut inaccessible
    // Elle prend 1 paramètre : le nom de l'attribut
    public function __unset($name){
        unset($this->attributsSimules[$name]);
    }


}
?>