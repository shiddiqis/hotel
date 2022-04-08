<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h3 align="center" style="font-weight:bold;">EDIT FASILITAS</h3>
    <form action="/fasilitas/update" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="put">
        <?php foreach ($fasilitas as $row) : ?>
            <table align="center" class="table-responsive table table-striped table-dark">
                <tbody>
                    <tr>
                        <td>id_fasilitas</td>
                        <td><input class="form-control" type="number" value="<?= $row['id_fasilitas']; ?>" name="id_fasilitas"></td>
                    </tr>
                    <tr>
                        <td>nama fasilitas</td>
                        <td><input class="form-control" type="text" value="<?= $row['nama_fasilitas']; ?>" name="nama_fasilitas"></td>
                    </tr>
                    <tr>
                        <td>detail fasilitas</td>
                        <td><input class="form-control" type="text" value="<?= $row['detail_fasilitas']; ?>" name="detail_fasilitas"></td>
                    </tr>
                    <tr>
                        <td>logo</td>
                        <td><input class="form-control" type="text" name="logo" value="<?= $row['logo']; ?>"></td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success mr-3">Update</button>
                            <a href="/fasilitas">
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