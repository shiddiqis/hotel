<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h3 align="center" style="font-weight:bold;"> EDIT KAMAR</h2>
        <form action="/kamar/update" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="put">
            <?php foreach ($kamar as $row) : ?>
                <table align="center" class="table-responsive table table-striped table-dark">
                    <tbody>
                        <tr>
                            <td>ID_kamar</td>
                            <td><input class="form-control" type="number" value="<?= $row['id_kamar']; ?>" name="id_kamar"></td>
                        </tr>
                        <tr>
                            <td>nama kamar</td>
                            <td><input class="form-control" type="text" value="<?= $row['nama_kamar']; ?>" name="nama_kamar"></td>
                        </tr>
                        <tr>
                            <td>tipe kamar</td>
                            <td>
                                <select class="form-control form-control-sm" name="tipe_kamar">
                                    <option value="Standart">Standart</option>
                                    <option value="Superior">Superior</option>
                                    <option value="Presidential">Presidential</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>fasilitas</td>
                            <td><input class="form-control" type="text" value="<?= $row['fasilitas']; ?>" name="fasilitas"></td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>
                                <select class="form-control form-control-sm" name="status">
                                    <option value="close">kosong</option>
                                    <option value="open">tersedia</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>harga</td>
                            <td><input class="form-control" type="number" value="<?= $row['harga']; ?>" name="harga"></td>
                        </tr>
                        <tr>
                            <td>gambar</td>
                            <td><input class="form-control" type="file" value="<?= $row['gambar']; ?>" name="gambar"></td>
                        </tr>
                        <!--  -->
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-outline-success mr-3">Update</button>
                                <a href="/kamar">
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