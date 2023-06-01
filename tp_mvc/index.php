<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['add'])) {
    $member->addForm();
} else if (isset($_POST['add-submit'])) {
    $member->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $member->edit($id);
} else{
    $member->index();
}