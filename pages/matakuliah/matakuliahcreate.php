<h2>Tambah Data Mata Kuliah</h2>
<?php

include_once("../database/database.php");

if (isset($_POST['button_simpan'])) {
    // print_r($_POST);
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $dosen_id = $_POST['dosen_id'];

    // $createSQL = "INSERT INTO `matakuliah` (`id`, `nama_matakuliah`, `hari`, `jam`, `dosen_id`) VALUES (NULL, '$nama_matakuliah', '$hari', '$jam', `$dosen_id`)";
    $createSQL = "INSERT INTO `matakuliah` (`id`, `nama_matakuliah`, `hari`, `jam`, `dosen_id`) VALUES (NULL, ?, ?, ?, ?)";

    $database = new Database;
    $connection = $database->getConnection();
    $statement = $connection->prepare($createSQL);
    $statement->bindParam(1, $nama_matakuliah);
    $statement->bindParam(2, $hari);
    $statement->bindParam(3, $jam);
    $statement->bindParam(4, $dosen_id);
    $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil simpan data";
    header('Location: main.php?page=matakuliah');
}
?>
<div class="row">
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_matakuliah" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" placeholder="Isi Nama Mata Kuliah" required>
        </div>
        <div>
            <label for="hari">Hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Senin" type="radio" name="hari" id="hari1" required>
            <label class="form-check-label" for="hari">
                Senin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Selasa" type="radio" name="hari" id="hari2">
            <label class="form-check-label" for="hari">
                Selasa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Rabu" type="radio" name="hari" id="hari3">
            <label class="form-check-label" for="hari">
                Rabu
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Kamis" type="radio" name="hari" id="hari4">
            <label class="form-check-label" for="hari">
                Kamis
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Jumat" type="radio" name="hari" id="hari5">
            <label class="form-check-label" for="hari">
                Jumat
            </label>
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="text" class="form-control" id="jam" name="jam" placeholder="Isi Waktu" required>
        </div>
            <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select class="form-select" aria-label="Default select example" name="dosen_id">
                <option selected>Pilih Dosen</option>
                <?php
                    $selectDosentSQL = "SELECT * FROM dosen";
                    $database = new Database;
                    $connection = $database->getConnection();
                    $statement = $connection->prepare($selectDosentSQL);
                    $statement->execute();

                    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_dosen']?></option>
                    <?php
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>
</div>