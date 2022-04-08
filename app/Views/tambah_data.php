<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h3 align="center" style="font-weight:bold;">GANTI AKSES</h3>
    <hr>
    <form action="/admin" method="post">
        <?= csrf_field(); ?>
        <table align="center" class="table-responsive table table-striped table-dark">
            <tbody>
                <tr>
                    <td>ID_User</td>
                    <td><input class="form-control" type="text" name="id_user"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input class="form-control" type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input class="form-control" type="text" name="username"></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td><input class="form-control" type="number" name="NIK"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select class="form-control form-control-sm" name="gender">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>akses</td>
                    <td>
                        <inputclass="form-control" type="text" name="akses">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input class="form-control" type="password" name="password" id="" rows="5"></input>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-outline-success mr-3">Save</button>
                        <a href="/admin">
                            <button type="button" class="btn btn-outline-danger mr-3">Cancel</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>