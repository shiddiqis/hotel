<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h2 align="center" style="font-weight:bold;">TAMBAH KAMAR</h2>
    <hr>
    <form action="/kamar/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <table align="center" class="table-responsive table table-striped table-dark">
            <tbody>
                <tr>
                    <td>nama kamar</td>
                    <td><input class="form-control" type="text" name="nama_kamar"></td>
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
                    <td><input class="form-control" type="text" name="fasilitas"></td>
                </tr>
                <tr>
                    <td>status</td>
                    <td>
                        <select class="form-control form-control-sm" name="status">
                            <option value="open">open</option>
                            <option value="close">close</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>harga</td>
                    <td><input class="form-control" type="number" name="harga"></td>
                </tr>
                <tr>
                    <td>gambar</td>
                    <td><input class="form-control" type="file" name="gambar"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-outline-success mr-3">save</button>
                        <a href="/kamar">
                            <button type="button" class="btn btn-outline-danger mr-3">Cancel</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?= $this->endSection(); ?>