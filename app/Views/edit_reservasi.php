<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h3 align="center">EDIT RESERVASI</h3>
    <form action="/reservasi/update" method="post">
        <?= csrf_field(); ?>
        <?php foreach ($reservasi as $row) : ?>
            <input type="hidden" name="id_reservasi" value="<?= $row['id_reservasi'] ?>">
            <table align="center" class="table-responsive table table-striped table-dark">
                <tbody>
                    <tr>
                        <td>status</td>
                        <td>
                            <select class="form-control form-control-sm" name="statusr">
                                <option value="sudah bayar">sudah dibayar</option>
                                <option value="belum bayar">belum dibayar</option>
                                <option value="keluar">keluar</option>
                            </select>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success mr-3">Tambah</button>
                            <a href="/reservasi">
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