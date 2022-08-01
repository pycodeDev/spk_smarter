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
            <div class="card ">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-6">Kelola Kriteria</div>
                        <div class="col-md-6">
                            <div id="btn"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="col">
                            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <select class="form-control" name="kriteria" id="myselect">
                                <?php
                                foreach ($kriteria as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama_kriteria'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success mb-2 filter-data">Pilih</button>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Kriteria</th>
                                <th>Nama Sub Kriteria</th>
                                <th>Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="4" class="text-center">Pilih Kriteria</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>