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
                            Data Alternatif
                        </div>
                        <div class="card-body">
                            <strong>Nama Alternatif : <?php echo $alternatif[0]['nama_alternatif'] ?></strong>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <?php
                                    for ($i = 0; $i < count($d_alter); $i++) {
                                    ?>
                                        <td style="font-size:12px;text-align:center;font-weight:bold"><?php echo $d_alter[$i]['nama_kriteria'] ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < count($d_alter); $i++) {
                                    ?>
                                        <td style="font-size:12px;text-align:center;font-weight:bold"><?php echo $d_alter[$i]['bobot'] ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Tambah Data Perangkingan
                        </div>
                        <form method="POST" action="/rank/<?php echo $alternatif[0]['id'] ?>">
                            <div class="card-body">
                                <?= csrf_field(); ?>
                                <?php
                                for ($i = 0; $i < sizeof($form); $i++) {
                                ?>
                                    <div class="form-group row">
                                        <label for="nama_kriteria" class="col-sm-4 col-form-label"><?= key($form[$i]) ?></label>
                                        <div class="col-sm-8">
                                            <select name="kriteria_<?= $i + 1 ?>" class="form-control">
                                                <?php
                                                $a = 0;
                                                foreach ($form[$i][key($form[$i])][0] as $key) :
                                                ?>
                                                    <option value="<?= $key[key($key)] ?>"><?= key($key) ?></option>
                                                <?php
                                                    $a++;
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card-footer text-muted">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/rank" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>