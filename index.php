<?php
session_start();
require 'autoload.php';


if ($_GET["controller"] == "category") {
    $controller = new CategoryController();

    if ($_GET["action"] == "list") {
        $controller->categoryList();
    }

    if ($_GET["action"] == "add") {
        $controller->addCategory();

    }

    if ($_GET["action"] == "edit" && isset($_GET["id"])) {
        $controller->editCategory($_GET["id"]);
    }

    if ($_GET["action"] == "delete" && isset($_GET["id"])) {
        $controller->deleteCategory($_GET["id"]);
    }
}
if ($_GET["controller"] == "voyage") {
    $controller = new VoyageController();

    if ($_GET["action"] == "list" && isset($_GET["id"])) {
        $controller->voyageListByCategory($_GET['id']);
    }

    if ($_GET["action"] == "add" && isset($_GET["id"])) {
        $controller->addVoyage($_GET["id"]);
    }
    if ($_GET["action"] == "edit" && isset($_GET["id"])) {
        $controller->editVoyage($_GET["id"]);
    }

    if ($_GET["action"] == "delete" && isset($_GET["id"])) {
        $controller->deleteVoyage($_GET["id"]);
    }
    if($_GET["action"] == "map" && isset($_GET["id"])){
        $controller->voyageDetail($_GET["id"]);
    }
}

if ($_GET["controller"] == "security") {
    $controller = new SecurityController();

    if($_GET["action"] == "login"){
        $controller->loginForm();
    }
    if($_GET["action"] == "logout"){
        $controller->logout();
    }
}
?>