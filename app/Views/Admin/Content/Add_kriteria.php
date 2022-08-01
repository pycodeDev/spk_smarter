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
                            Tambah Data Kriteria
                        </div>
                        <form method="POST" action="/kriteria">
                            <div class="card-body">
                                <?= csrf_field(); ?>
                                <div class="form-group" id="dynamic_form">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" name="kriteria" id="p_name" placeholder="Masukkan Kriteria" class="form-control" required>
                                        </div>
                                        <div class="button-group">
                                            <a href="javascript:void(0)" class="btn btn-warning text-white" id="plus5"><i class="fa fa-plus"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger" id="minus5"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/kriteria" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>