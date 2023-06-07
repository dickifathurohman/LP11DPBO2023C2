<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");
include_once("view/FormPasien.php");

$tp = new FormPasien();

if (isset($_POST['add'])) {
    $tp->add($_POST);
}
else if (isset($_GET['id_hapus'])){
    $id = $_GET['id_hapus'];
    $tp->delete($id);
}
else if (isset($_GET['id_edit'])) {
     $id = $_GET['id_edit'];
     $tp->editform($id);
}
else if (isset($_POST['update'])) {
    $tp->update($_POST);
}
else {
    $data = $tp->addform();
}