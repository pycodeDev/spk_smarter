<?= $this->extend('Admin/Index') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 card">
                    <div class="card-body">
                        <h5><?= $content_header ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Card -->
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            Tambah Data Produk
                        </div>
                        <form method="POST" action="/produk">
                            <div class="card-body">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Suku Cadang</label>
                                    <input type="text" name="no_produk" class="form-control <?= ($form_validation->hasError('nomor_suku_cadang')) ? 'is-invalid' : ''; ?>" placeholder="Id Produk" required="">
                                    <div class="invalid-feedback">
                                        <?= $form_validation->getError('nomor_suku_cadang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Suku Cadang</label>
                                    <input type="text" name="nama_produk" class="form-control <?= ($form_validation->hasError('nama_suku_cadang')) ? 'is-invalid' : ''; ?>" placeholder="Nama Produk" required="">
                                    <div class="invalid-feedback">
                                        <?= $form_validation->getError('nama_suku_cadang'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control <?= ($form_validation->hasError('status')) ? 'is-invalid' : ''; ?>" data-dropdown-css-class="select2-danger" name="status" style="width: 100%;" required="">
                                        <option value="" selected="">Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $form_validation->getError('status'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/produk" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>