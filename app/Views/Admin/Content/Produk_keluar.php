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
                    Data Produk
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Suku Cadang</th>
                                <th>Nama Suku Cadang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($produk) != 0) {
                                $i = 1;
                                foreach ($produk as $data) : ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $data['nomor_suku_cadang']; ?></td>
                                        <td><?php echo $data['nama_suku_cadang'] ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($data['status'] == 1) { ?>
                                                <a style="border-radius:50%" href="/produk_keluar/detail/<?php echo $data['nomor_suku_cadang'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye text-white"></i></a>
                                            <?php
                                            } elseif ($data['status'] == 0) {
                                                echo 'Silahkan Aktifkan Produk';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Ada Data</td>
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