<?php
if (isset($_POST['simpan'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $insert = mysqli_query($koneksi, "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password') ");
    header("location:?pg=user&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete']; // 1, 2, 3 , 4

    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id' ");
    header("location:?pg=user&hapus=berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id' ");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $id = $_GET['edit'];
    $update = mysqli_query($koneksi, "UPDATE users SET fullname='$fullname', email='$email', password='$password' WHERE id='$id'");
    header("location:?pg=user&ubah=berhasil");
}

?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Lengkap</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required value="<?php echo $rowEdit['fullname'] ?? '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email</label>
        </div>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" placeholder="Email" required value="<?php echo $rowEdit['email'] ?? '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Password</label>
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
    </div>

    <div class="mb-3 offset-md-2">
        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Ubah' : 'Simpan' ?></button>
        <a href="?pg=user" class="btn btn-danger">Kembali</a>
    </div>
</form>