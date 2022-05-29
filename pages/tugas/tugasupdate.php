<h2>Ubah Data Tugas</h2>
<?php
include_once("../database/database.php");
$database = new Database;
$connection = $database->getConnection();

$id = $_GET['id'];

$findSQL = "SELECT * FROM tugas WHERE id = ?";
$statement = $connection->prepare($findSQL);
$statement->bindParam(1, $id);
$statement->execute();
$data = $statement->fetch();

if (isset($_POST['button_simpan'])) {
    $nama_tugas = $_POST['nama_tugas'];
    $matakuliah_id = $_POST['matakuliah_id'];
    $keterangan = $_POST['keterangan'];
    $deadline = $_POST['deadline'];
    $id = $_POST['id'];

    $updateSQL = "UPDATE `tugas` SET `nama_tugas` = ?, `matakuliah_id` = ?, `keterangan` = ?, `deadline` = ? WHERE `tugas`.`id` = ?";

    $statement = $connection->prepare($updateSQL);
    $statement->bindParam(1, $nama_tugas);
    $statement->bindParam(2, $matakuliah_id);
    $statement->bindParam(3, $keterangan);
    $statement->bindParam(4, $deadline);
    $statement->bindParam(5, $id);
    $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil ubah data";
    header('Location: main.php?page=tugas');
}
?>


<div class="row">
    <form action="" method="post">
        <!-- <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
        </div> -->
        <div class="mb-3">
            <label for="nama_tugas" class="form-label">Nama Tugas</label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" value="<?php echo $data['nama_tugas'] ?>" placeholder="Isi Nama Tugas" required>
        </div>
        <div class="mb-3">
            <label for="matakuliah_id" class="form-label">ID Mata Kuliah</label>
            <input type="text" class="form-control" id="matakuliah_id" name="matakuliah_id" value="<?php echo $data['matakuliah_id'] ?>" placeholder="Isi ID Matakuliah" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Isi Keterangan" value="<?php echo $data['keterangan'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="text" class="form-control" id="deadline" name="deadline" placeholder="Isi Deadline" value="<?php echo $data['deadline'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>
</div>