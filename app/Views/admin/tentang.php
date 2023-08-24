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
                    <button class="btn btn-success float-right btn-add" type="button" data-toggle="modal" onclick="add()" data-target="#modal"><i class="fas fa-plus"></i></button>
                    <!-- <button class="btn btn-danger float-right mr-2"><i class="fas fa-trash"></i></button> -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover w-100" id="tbl-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="formDialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="id" id="id" class="form-control" type="text" hidden>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat yang Disematkan</label>
                                    <textarea name="embed_address" id="embed_address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <br>
                                    <input type="file" id="logo" name="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="btn-submit"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="deleteMdl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk mengahapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-delete">Delete</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/js/admin/tentang.js"></script>
<?= $this->endsection() ?>