<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Hobby.controller.php");

$hobby = new HobbyController();

if (isset($_POST['add'])) {
    $hobby->addForm();
} else if (isset($_POST['add-submit'])) {
    $hobby->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $hobby->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $hobby->edit($id);
} else{
    $hobby->index();
}