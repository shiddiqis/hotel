<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content" align="center">
    <h3 align="center" style="font-weight:bold;"> EDIT USER</h3>
    <hr>
    <form action="/admin/update" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="put">
        <?php foreach ($admin as $row) : ?>
            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
            <table align="center" class="table-responsive table table-striped table-dark">
                <tbody>
                    <tr>
                        <td>User</td>
                        <td>
                            <?= $row['username'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Akses</td>
                        <td>
                            <select class="form-control form-control-sm" name="akses">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="resepsionis">Resepsionis</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success mr-3">Update</button>
                            <a href="/admin">
                                <button type="button" class="btn btn-outline-danger mr-3">Cancel</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
    </form>
</div>
<?= $this->endSection(); ?>