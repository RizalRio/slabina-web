<?= $this->extend("admin/core") ?>

<?= $this->section("content") ?>
<div class="container-fluid">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 my-auto">
                    <h5 class="m-0">Data <?= $title ?></h5>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-success float-right"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-danger float-right mr-2"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover w-100" id="tbl-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div><!-- /.container-fluid -->
<?= $this->endSection() ?>