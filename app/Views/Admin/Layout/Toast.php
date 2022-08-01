<script>
    $(document).ready(function() {
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            // sukses login
            <?php
            if (isset($_SESSION['s_l'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Selamat <?= $_SESSION['name'] ?> Anda Berhasil Login"
                })
            <?php
                unset($_SESSION['s_l']);
            }
            ?>

            // sukses input produk
            <?php
            if (isset($_SESSION['s_i_produk'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Data Produk"
                })
            <?php
                unset($_SESSION['s_i_produk']);
            }
            ?>

            // Gagal input produk
            <?php
            if (isset($_SESSION['f_i_produk'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Produk"
                })
            <?php
                unset($_SESSION['f_i_produk']);
            }
            ?>

            // sukses update input produk
            <?php
            if (isset($_SESSION['u_i_produk'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Mengupdate Data Produk"
                })
            <?php
                unset($_SESSION['u_i_produk']);
            }
            ?>

            // Gagal update input produk
            <?php
            if (isset($_SESSION['fu_i_produk'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Mengupdate Data Produk"
                })
            <?php
                unset($_SESSION['fu_i_produk']);
            }
            ?>

            // sukses delete input produk
            <?php
            if (isset($_SESSION['d_produk'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Produk"
                })
            <?php
                unset($_SESSION['d_produk']);
            }
            ?>

            // Gagal delete input produk
            <?php
            if (isset($_SESSION['fd_produk'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Produk"
                })
            <?php
                unset($_SESSION['fd_produk']);
            }
            ?>

            // sukses input produk masuk
            <?php
            if (isset($_SESSION['s_i_produk_masuk'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Data Produk Masuk"
                })
            <?php
                unset($_SESSION['s_i_produk_masuk']);
            }
            ?>

            // Gagal input produk masuk
            <?php
            if (isset($_SESSION['f_i_produk_masuk'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Produk Masuk"
                })
            <?php
                unset($_SESSION['f_i_produk_masuk']);
            }
            ?>

            // Gagal input produk masuk karena sudah ada tanggal sebelumnya
            <?php
            if (isset($_SESSION['f_i_produk_masuk2'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Produk Masuk Karena Sudah Diinput"
                })
            <?php
                unset($_SESSION['f_i_produk_masuk2']);
            }
            ?>

            // sukses delete input produk masuk
            <?php
            if (isset($_SESSION['d_produk_masuk'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Produk Masuk"
                })
            <?php
                unset($_SESSION['d_produk_masuk']);
            }
            ?>

            // Gagal delete input produk masuk
            <?php
            if (isset($_SESSION['fd_produk_masuk'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Produk Masuk"
                })
            <?php
                unset($_SESSION['fd_produk_masuk']);
            }
            ?>

            // Gagal input produk keluar karena stok
            <?php
            if (isset($_SESSION['f_i_produk_keluar_s'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Input Produk, Stok Terlalu Sedikit"
                })
            <?php
                unset($_SESSION['f_i_produk_keluar_s']);
            }
            ?>

            // sukses input produk keluar
            <?php
            if (isset($_SESSION['s_i_produk_keluar'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Data Produk Keluar"
                })
            <?php
                unset($_SESSION['s_i_produk_keluar']);
            }
            ?>

            // Gagal input produk keluar
            <?php
            if (isset($_SESSION['f_i_produk_keluar'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Produk Keluar"
                })
            <?php
                unset($_SESSION['f_i_produk_keluar']);
            }
            ?>

            // Gagal input produk keluar karena sudah ada tanggal sebelumnya
            <?php
            if (isset($_SESSION['f_i_produk_keluar2'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Produk Keluar Karena Sudah Diinput"
                })
            <?php
                unset($_SESSION['f_i_produk_keluar2']);
            }
            ?>

            // sukses delete input produk keluar
            <?php
            if (isset($_SESSION['d_produk_keluar'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Produk Keluar"
                })
            <?php
                unset($_SESSION['d_produk_keluar']);
            }
            ?>

            // Gagal delete input produk keluar
            <?php
            if (isset($_SESSION['fd_produk_keluar'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Produk Keluar"
                })
            <?php
                unset($_SESSION['fd_produk_keluar']);
            }
            ?>

            // sukses input kriteria
            <?php
            if (isset($_SESSION['s_i_kriteria'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Kriteria"
                })
            <?php
                unset($_SESSION['s_i_kriteria']);
            }
            ?>

            // Gagal input kriteria
            <?php
            if (isset($_SESSION['f_i_kriteria'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Kriteria"
                })
            <?php
                unset($_SESSION['f_i_kriteria']);
            }
            ?>

            // sukses delete kriteria
            <?php
            if (isset($_SESSION['d_kriteria'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Kriteria"
                })
            <?php
                unset($_SESSION['d_kriteria']);
            }
            ?>

            // Gagal delete kriteria
            <?php
            if (isset($_SESSION['fd_kriteria'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Kriteria"
                })
            <?php
                unset($_SESSION['fd_kriteria']);
            }
            ?>

            // sukses delete sub kriteria
            <?php
            if (isset($_SESSION['d_sub_kriteria'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Sub Kriteria"
                })
            <?php
                unset($_SESSION['d_sub_kriteria']);
            }
            ?>

            // Gagal delete sub kriteria
            <?php
            if (isset($_SESSION['fd_sub_kriteria'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Sub Kriteria"
                })
            <?php
                unset($_SESSION['fd_sub_kriteria']);
            }
            ?>

            // sukses input kriteria
            <?php
            if (isset($_SESSION['s_i_s_kriteria'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Sub Kriteria"
                })
            <?php
                unset($_SESSION['s_i_s_kriteria']);
            }
            ?>

            // Gagal input kriteria
            <?php
            if (isset($_SESSION['f_i_s_kriteria'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Sub Kriteria"
                })
            <?php
                unset($_SESSION['f_i_s_kriteria']);
            }
            ?>

            // sukses input alternatif
            <?php
            if (isset($_SESSION['s_i_alternatif'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Alternatif"
                })
            <?php
                unset($_SESSION['s_i_alternatif']);
            }
            ?>

            // Gagal input alternatif
            <?php
            if (isset($_SESSION['f_i_alternatif'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Alternatif"
                })
            <?php
                unset($_SESSION['f_i_alternatif']);
            }
            ?>

            // sukses update input alternatif
            <?php
            if (isset($_SESSION['u_i_alternatif'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Mengupdate Data Alternatif"
                })
            <?php
                unset($_SESSION['u_i_alternatif']);
            }
            ?>

            // Gagal update input produk
            <?php
            if (isset($_SESSION['fu_i_alternatif'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Mengupdate Data Alternatif"
                })
            <?php
                unset($_SESSION['fu_i_alternatif']);
            }
            ?>

            // sukses delete Alternatif
            <?php
            if (isset($_SESSION['d_alternatif'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Alternatif"
                })
            <?php
                unset($_SESSION['d_alternatif']);
            }
            ?>

            // Gagal delete Alternatif
            <?php
            if (isset($_SESSION['fd_alternatif'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Alternatif"
                })
            <?php
                unset($_SESSION['fd_alternatif']);
            }
            ?>

            // sukses delete Perangkingan
            <?php
            if (isset($_SESSION['d_perangkingan'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menghapus Data Perangkingan"
                })
            <?php
                unset($_SESSION['d_perangkingan']);
            }
            ?>

            // Gagal delete Alternatif
            <?php
            if (isset($_SESSION['fd_perangkingan'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menghapus Data Perangkingan"
                })
            <?php
                unset($_SESSION['fd_perangkingan']);
            }
            ?>

            // sukses input Perangkingan
            <?php
            if (isset($_SESSION['s_i_perangkingan'])) { ?>
                Toast.fire({
                    type: 'success',
                    title: "Berhasil Menambahkan Perangkingan"
                })
            <?php
                unset($_SESSION['s_i_perangkingan']);
            }
            ?>

            // Gagal input Perangkingan
            <?php
            if (isset($_SESSION['f_i_perangkingan'])) { ?>
                Toast.fire({
                    type: 'error',
                    title: "Gagal Menambahkan Data Perangkingan"
                })
            <?php
                unset($_SESSION['f_i_perangkingan']);
            }
            ?>
        });
    });
</script>