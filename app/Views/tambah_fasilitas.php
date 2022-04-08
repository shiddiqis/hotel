<?= $this->extend('template/layout') ?>
<?= $this->section('content'); ?>
<div class="content">
    <h3 align="center" style="font-weight:bold;">TAMBAH FASILITAS</h2>
        <hr>class="form-control"
        <form action="/fasilitas" method="post">
            <?= csrf_field(); ?>
            <table align="center" class="table-responsive table table-striped table-dark">
                <tbody>
                    <tr>
                        <td>id fasilitas</td>
                        <td><input class="form-control" type="text" name="id_fasilitas"></td>
                    </tr>
                    <tr>
                        <td>Nama fasilitas</td>
                        <td><input class="form-control" type="text" name="nama_fasilitas"></td>
                    </tr>
                    <tr>
                        <td>detail fasilitas</td>
                        <td>
                            <inputclass="form-control" type="text" name="detail_fasilitas">
                        </td>
                    </tr>
                    <tr>
                        <td>hotel fasilitas</td>
                        <td><input class="form-control" type="text" name="hotel_fasilitas"></td>
                    </tr>
                    <tr>
                        <td>logo</td>
                        <td><input class="form-control" type="text" name="logo"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success mr-3">Save</button>
                            <a href="/fasilitas">
                                <button type="button" class="btn btn-outline-danger mr-3">Cancel</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
</div>
<?= $this->endSection(); ?>