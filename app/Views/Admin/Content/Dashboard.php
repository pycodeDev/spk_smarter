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
            <!-- Small boxes (Stat box) -->
            <div class="row my-3">
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-8">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo count($kriteria) ?></h3>
            
                                        <p>Jumlah Kriteria</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-list"></i>
                                    </div>
                                    <a href="/kriteria" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="col-8">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3><?php echo count($alternatif) ?></h3>
            
                                        <p>Jumlah Alternatif</p>
                                    </div>
                                    
                                    <a href="/alternatif" class="small-box-footer ">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card ">
                        <div class="card-header ">
                            Grafik Hasil Perangkingan
                        </div>
                        <div class="card-body">
                            <div class="chart">
                              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>