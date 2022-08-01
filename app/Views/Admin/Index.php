<?php
$uri = current_url(true);
$a =  (string)$uri;
$a = explode("/", $a);
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->include('Admin/Layout/Header') ?>
    <?= $this->include('Admin/Layout/Css') ?>
</head>

<div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('Admin/Layout/Sina') ?>
        <?= $this->renderSection('content') ?>
        <?= $this->include('Admin/Layout/Footer') ?>
    </div>
    <?= $this->include('Admin/Layout/Js') ?>
    <?= $this->include('Admin/Layout/Toast') ?>
    <?php
    if ($a[3] == 'eksekusi') {
        $this->include('Admin/Layout/Chart');
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $("#example1").DataTable();
            });
            
        <?php
        if ($a[3] == 'dashboard' || $a[3] == 'eksekusi') {
        ?>
            $(function() {
                var nama = [];
                var hasil = [];
                $.ajax({
                    url: "/chart",
                    dataType: 'json',
                    success: function(data) {
                        for (let index = 0; index < data.length; index++) {
                            nama.push(data[index].nama_alternatif)
                            hasil.push(parseFloat(data[index].hasil))
                        }
                        var areaChartData = {
                          labels  : nama,
                          datasets: [
                            {
                              label               : 'Hasil Ranking',
                              backgroundColor     : 'rgba(60,141,188,0.9)',
                              borderColor         : 'rgba(60,141,188,0.8)',
                              pointRadius          : false,
                              pointColor          : '#3b8bba',
                              pointStrokeColor    : 'rgba(60,141,188,1)',
                              pointHighlightFill  : '#fff',
                              pointHighlightStroke: 'rgba(60,141,188,1)',
                              data                : hasil,
                            },
                          ]
                        }

                        //-------------
                        //- BAR CHART -
                        //-------------
                        var barChartCanvas = $('#barChart').get(0).getContext('2d')
                        var barChartData = $.extend(true, {}, areaChartData)
                        var temp0 = areaChartData.datasets[0]
                        barChartData.datasets[0] = temp0
                    
                        var barChartOptions = {
                          responsive              : true,
                          maintainAspectRatio     : false,
                          datasetFill             : false
                        }
                    
                        new Chart(barChartCanvas, {
                          type: 'bar',
                          data: barChartData,
                          options: barChartOptions
                        })
                    }
                });
                var aa = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
                console.log(aa[0])
                
                
            });
        <?php
        }
        ?>
            $(".filter-data").click(function() {
                var id = $("#myselect").val();
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                get_data(id, csrfName, csrfHash);
            });
        });
        
        function get_data(id, csrfName, csrfHash) {
            $.ajax({
                url: "/search",
                method: "POST",
                data: {
                    id: id,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {
                    var len = data[0]['data'].length;
                    var no = 1;
                    var hasil = [];
                    $('.txt_csrfname').val(data[0]['token']);
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            var row = $('<tr>' +
                                '<td>' + no + '</td>' +
                                '<td>' + data[0]['data'][i].nama_kriteria + '</td>' +
                                '<td>' + data[0]['data'][i].nama_sub_kriteria + '</td>' +
                                '<td>' + data[0]['data'][i].rank + '</td>');

                            hasil.push(row);
                            no = no + 1;
                            // console.log(data)
                        }
                        $('#dataTable tbody').html(hasil);

                        var id_krit = data[0].id_kriteria;
                        var a = '<a class="btn btn-sm btn-danger float-right" href="/sub_kriteria/del/' + id + '"><i class="fas fa-trash-alt"></i> Hapus</a>';
                        $('#btn').html(a);
                    } else {
                        var b = '<a href="/sub_kriteria/add/' + id + '" class="btn btn-success btn-sm float-right text-white"><i class="fas fa-plus"></i> Tambah Data</a>';
                        $('#dataTable tbody').html('<td colspan="5" align="center">Data Tidak Ada</td>');
                        $('#btn').html(b);
                    }
                },
                error: function() {
                    $('#dt tbody').html('<td colspan="5" align="center">Error</td>');
                }
            });
        }
    </script>
    </ </html>