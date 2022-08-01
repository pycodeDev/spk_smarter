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
            <!-- Card 1 -->
            <div class="card ">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-6 text-left">
                            Data Hasil Perangkingan
                        </div>
                        <div class="col-6 text-right">
                            <a href="/laporan/download" class="btn btn-sm btn-success"><i class="fas fa-print"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center">Rangking</th>
                                <th style="text-align:center">Nama Alternatif</th>
                                <th style="text-align:center">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $value) :
                            ?>
                                <tr>
                                    <td style="font-weight:bold;text-align:center"><?php echo $no++ ?></td>
                                    <td style="font-weight:bold;text-align:center"><?php echo $value['nama_alternatif'] ?></td>
                                    <td style="font-weight:bold;text-align:center"><?php echo $value['hasil'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<?= $this->endSection() ?>