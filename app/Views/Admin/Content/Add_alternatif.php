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
                        <form method="POST" action="/alternatif">
                            <div class="card-body">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Alternatif</label>
                                    <input type="text" name="nama_alternatif" class="form-control <?= ($form_validation->hasError('nama_alternatif')) ? 'is-invalid' : ''; ?>" placeholder="Nama Alternatif" required="">
                                    <div class="invalid-feedback">
                                        <?= $form_validation->getError('nama_alternatif'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/alternatif" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>