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
                    <a href="/produk/add" class="btn btn-success btn-sm float-right text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Suku Cadang</th>
                                <th>Nama Suku Cadang</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($produk) != 0) {
                                $no = 1;
                                foreach ($produk as $data) :
                            ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nomor_suku_cadang'] ?></td>
                                        <td><?php echo $data['nama_suku_cadang'] ?></td>
                                        <td><?php echo $data['status'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                        <td class="text-center">
                                            <a style="border-radius:50%" href="/produk/edit/<?php echo $data['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil text-white"></i></a>
                                            <a href="/produk/<?php echo $data['id'] ?>" style="border-radius:50%" class="btn btn-sm btn-danger"><i class="fa fa-trash text-white"></i></a>
                                        </td>
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