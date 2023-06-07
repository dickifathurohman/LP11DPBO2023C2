<?php

interface KontrakFormView {
    public function addform();
    public function editform($id);
}

interface KontrakFormPresenter {
    public function prosesDataPasien();
    public function getId($i);
    public function getNik($i);
    public function getNama($i);
    public function getTempat($i);
    public function getTl($i);
    public function getGender($i);
    public function getSize();
    public function add($data);
    public function update($data);
    public function delete($id);
}