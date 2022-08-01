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
                    <a href="/produk_masuk" class="btn btn-success btn-sm text-white"><i class="fas fa-plus"></i> Barang Masuk</a>
                    <a href="/produk_keluar" class="btn btn-success btn-sm text-white"><i class="fas fa-plus"></i> Barang Keluar</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Suku Cadang</th>
                                <th>Status</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($produk) != 0) {
                                $no = 1;
                                foreach ($produk as $data) :
                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nomor_suku_cadang']; ?></td>
                                        <td><?php echo $data['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                                        <td><?php echo $data['stok'] ?></td>
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