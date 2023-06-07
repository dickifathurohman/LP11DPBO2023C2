<?php

include_once("kontrak/KontrakForm.php");
include_once("presenter/ProsesForm.php");

class FormPasien implements KontrakFormView
{
	private $prosesform; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesform = new ProsesForm();
	}

	function addform()
	{
		$form = null;
        
        $form = 
        '<form method="post" action="form.php">
            <br><br>
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">Tambah Data Pasien</h1>
                </div><br>

                <label> NIK: </label>
                <input type="text" name="nik" class="form-control"> <br>

                <label> NAMA: </label>
                <input type="text" name="nama" class="form-control"> <br>
            
                <label> TEMPAT: </label>
                <input type="text" name="tempat" class="form-control"> <br>

                <label> TANGGAL LAHIR: </label>
                <input type="date" name="tl" class="form-control"> <br>

                <label for="gender"> GENDER: </label>
                <select class="custom-select form-control" name="gender">
                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label> EMAIL: </label>
                <input type="text" name="email" class="form-control"> <br>

                <label> NO TELEPON: </label>
                <input type="text" name="telp" class="form-control"> <br>

                <br>
                <button class="btn btn-success" type="submit" name="add"> Tambahkan </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Batalkan </a><br>

            </div>
        </form>';
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM", $form);

		// Menampilkan ke layar
		$this->tpl->write();
	}

    function editform($index)
    {
        $this->prosesform->prosesDataPasien();
        $option = ['Laki-laki', 'Perempuan'];
        $selectedoption = '<option value="" disabled>Pilih Jenis Kelamin</option>';

        foreach($option as $data){
            $selectedoption .= "<option value=" . $data . " " . (($data == $this->prosesform->getGender($index)) ? "selected" : " ") . ">" . $data . "</option>";
        }

        $form = null;
        
        $form = 
        '<form method="post" action="form.php">
            <br><br>
            <div class="card">
                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">Edit Data Pasien</h1>
                </div><br>

                <input type="hidden" name="id" value="' . $this->prosesform->getId($index) . '">

                <label> NIK: </label>
                <input type="text" name="nik" class="form-control" value="' . $this->prosesform->getNik($index) . '"> <br>

                <label> NAMA: </label>
                <input type="text" name="nama" class="form-control" value="' . $this->prosesform->getNama($index) . '"> <br>
            
                <label> TEMPAT: </label>
                <input type="text" name="tempat" class="form-control" value="' . $this->prosesform->getTempat($index) . '"> <br>

                <label> TANGGAL LAHIR: </label>
                <input type="date" name="tl" class="form-control" value="' . $this->prosesform->getTl($index) . '"> <br>

                <label for="gender"> GENDER: </label>
                <select class="custom-select form-control" name="gender">
                    PILIHAN_OPSI
                </select>

                <label> EMAIL: </label>
                <input type="text" name="email" class="form-control" value="' . $this->prosesform->getEmail($index) . '"> <br>

                <label> NO TELEPON: </label>
                <input type="text" name="telp" class="form-control" value="' . $this->prosesform->getTelp($index) . '"> <br>

                <br>
                <button class="btn btn-success" type="submit" name="update"> Update </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Batalkan </a><br>

            </div>
        </form>';
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM", $form);
        $this->tpl->replace("PILIHAN_OPSI", $selectedoption);

		// Menampilkan ke layar
		$this->tpl->write();   
    }

    function add($data)
	{
		$this->prosesform->add($data);
	}

    function update($data)
	{
		$this->prosesform->update($data);
	}

    function delete($data)
	{
		$this->prosesform->delete($data);
	}
}