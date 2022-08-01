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
                            Tambah Data Produk Keluar <strong><?php echo $produk[0]['nama_suku_cadang'] ?></strong>
                        </div>
                        <form method="POST" action="/produk_keluar/<?php echo $produk[0]['nomor_suku_cadang'] ?>">
                            <div class="card-body">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Suku Cadang</label>
                                    <input type="text" class="form-control" value="<?php echo $produk[0]['nomor_suku_cadang'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Suku Cadang</label>
                                    <input type="text" class="form-control" value="<?php echo $produk[0]['nama_suku_cadang'] ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control <?= ($form_validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="reservation">
                                    <div class="invalid-feedback">
                                        <?= $form_validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">QTY</label>
                                    <input type="number" name="QTY" class="form-control <?= ($form_validation->hasError('QTY')) ? 'is-invalid' : ''; ?>" placeholder="QTY" required="">
                                    <div class="invalid-feedback">
                                        <?= $form_validation->getError('QTY'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/produk_keluar/detail/<?php echo $produk[0]['nomor_suku_cadang'] ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>