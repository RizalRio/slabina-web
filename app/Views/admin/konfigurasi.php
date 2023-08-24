<?= $this->extend("admin/core") ?>

<?= $this->section("content") ?>
<div class="container-fluid">
    <div class="card card-primary card-outline">
        <form id="form">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 my-auto">
                        <h5 class="m-0">Data <?= $title ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama.....">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Masukkan alamat....."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Masukkan No.....">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email.....">
                        </div>
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Masukkan Facebook.....">
                        </div>
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Masukkan Instagram.....">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Logo</label>
                            <br>
                            <input type="file" name="logo" id="logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-info">Ubah</button>
            </div>
        </form>
    </div>
</div><!-- /.container-fluid -->

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/js/admin/konfigurasi.js"></script>
<?= $this->endsection() ?>