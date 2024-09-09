<?php
$queryUser = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
?>

<div class="mb-3" align="right">
    <a href="?pg=tambah-user" class="btn btn-primary">Tambah Pengguna</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($rowUser = mysqli_fetch_assoc($queryUser)): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $rowUser['fullname'] ?></td>
                <td><?php echo $rowUser['email'] ?></td>
                <td>
                    <a class="btn btn-info btn-xs" href="?pg=user-role&id_user=<?php echo $rowUser['id'] ?>">User Level</a> |
                    <a class="btn btn-success btn-xs" href="?pg=tambah-user&edit=<?php echo $rowUser['id'] ?>">Edit</a> |
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?pg=tambah-user&delete=<?php echo $rowUser['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>