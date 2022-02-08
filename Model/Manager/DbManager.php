<?php
abstract class DbManager {
    protected $bdd;

    public function __construct(){
        $this->bdd = new PDO("mysql:dbname=exammvc;host=localhost","root","");
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>