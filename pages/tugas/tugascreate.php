<h2>Tambah Data Tugas</h2>
<?php
if (isset($_POST['button_simpan'])) {
    $nama_tugas = $_POST['nama_tugas'];
    $matakuliah_id = $_POST['matakuliah_id'];
    $keterangan = $_POST['keterangan'];
    $deadline = $_POST['deadline'];

    $createSQL = "INSERT INTO `tugas` (`id`, `nama_tugas`, `matakuliah_id`, `keterangan`, `deadline`) VALUES (NULL, ?, ?, ?, ?)";

    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();
    $statement = $connection->prepare($createSQL);
    $statement->bindParam(1, $nama_tugas);
    $statement->bindParam(2, $matakuliah_id);
    $statement->bindParam(3, $keterangan);
    $statement->bindParam(4, $deadline);
    $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil simpan data";
    header('Location: main.php?page=tugas');
}
?>
<div class="row">
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_tugas" class="form-label">Nama Tugas</label>
            <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" placeholder="Isi Nama Tugas" required>
        </div>
        <div class="mb-3">
            <label for="matakuliah_id" class="form-label">ID Matakuliah</label>
            <input type="text" class="form-control" id="matakuliah_id" name="matakuliah_id" placeholder="Isi ID Mata Kuliah" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Isi Keterangan" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="text" class="form-control" id="deadline" name="deadline" placeholder="Isi Deadline" required>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>
</div>