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
                    Kelola Kriteria
                    <?php
                    if (count($kriteria) != 0) { ?>
                        <a href="/kriteria/del" class="btn btn-danger btn-sm float-right text-white"><i class="fa fa-trash"></i> Hapus Data</a>
                    <?php
                    } else { ?>
                        <a href="/kriteria/add" class="btn btn-success btn-sm float-right text-white"><i class="fas fa-plus"></i> Tambah Data</a>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Kriteria</th>
                                <th>Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($kriteria) != 0) {
                                $no = 1;
                                foreach ($kriteria as $data) :
                            ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama_kriteria'] ?></td>
                                        <td><?php echo $data['rank'] ?></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak Ada Data</td>
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