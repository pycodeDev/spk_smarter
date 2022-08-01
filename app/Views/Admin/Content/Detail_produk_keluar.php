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
                            Data Produk
                        </div>
                        <div class="col-6 text-right">
                            <?php
                            if ($jml_pk > 0) { ?>
                                <a href="/produk_keluar/add/<?php echo $produk[0]['nomor_suku_cadang'] ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-plus"> Tambah Data</i></a>
                            <?php
                            } else { ?>
                                <button type="button" class="btn btn-sm btn-success text-white" title="Stok Produk 0" disabled>
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center">Nomor Suku Cadang</th>
                                <th style="text-align:center">Nama Suku Cadang</th>
                                <th style="text-align:center">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-weight:bold;text-align:center"><?php echo $produk[0]['nomor_suku_cadang'] ?></td>
                                <td style="font-weight:bold;text-align:center"><?php echo $produk[0]['nama_suku_cadang'] ?></td>
                                <td style="font-weight:bold;text-align:center"><?php echo $produk[0]['stok'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card ">
                <div class="card-header ">
                    Data Produk Keluar <strong><?php echo $produk[0]['nama_suku_cadang'] ?></strong>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Qty</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($produk_keluar) > 0) {
                                $i = 1;
                                foreach ($produk_keluar as $data) :
                            ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $data['tahun']; ?></td>
                                        <td><?php echo $data['bulan']; ?></td>
                                        <td><?php echo $data['qty']; ?></td>
                                        <td class="text-center"><a href="/produk_keluar/<?php echo $data['id'] ?>/<?php echo $data['nomor_suku_cadang'] ?>" style="border-radius:50%" class="btn btn-sm btn-danger"><i class="fa fa-trash text-white"></i></a></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak Ada Data</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>