<?php
$user_id = $_GET['id_user'] ?? '';
$queryUser = mysqli_query($koneksi, "SELECT users.fullname, levels.level_name, user_levels.* FROM user_levels LEFT JOIN users ON users.id = user_levels.user_id LEFT JOIN levels ON levels.id = user_levels.level_id WHERE user_id = '$user_id' ORDER BY user_levels.id DESC");
?>

<div class="mb-3" align="right">
    <a href="?pg=tambah-user-role&id_user=<?php echo urlencode($user_id) ?>" class="btn btn-primary">Tambah User Role</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($rowUser = mysqli_fetch_assoc($queryUser)): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $rowUser['fullname'] ?></td>
                <td><?php echo $rowUser['level_name'] ?></td>
                <td>
                    <a class="btn btn-success btn-xs" href="?pg=tambah-user-role&edit=<?php echo $rowUser['id'] ?>">Edit</a> |
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="?pg=tambah-user-role&delete=<?php echo $rowUser['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>

<div class="mt-3 mb-3" align="left">
    <a href="?pg=user" class="btn btn-danger">Kembali</a>
</div>