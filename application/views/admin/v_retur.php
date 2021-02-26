<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="TSM Makassar">

    <title>Retur Penjualan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Void
                    <small>Penjualan</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/retur/cari_penjualan'?>" method="post">
            <table>
                <tr>
                    <th>Nomor Resi</th>
                </tr>
                <tr>
                    <th><input type="text" name="nofak" id="nofak" class="form-control input-sm"></th>  
                    <th style="padding-left: 10px;"><button type="submit" class="btn btn-sm btn-info" title="Pilih"><span class="fa fa-search"></span> Cari </button></th>
                </tr>
                    <div id="detail_barang" style="position:absolute;">
                    </div>
            </table>
             </form>
             <br/>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;" id="mydata2">
                <thead>
                    <tr>
                        <th>Nomor Resi</th>
                        <th>Tanggal</th>
                        <th>Nama Tenant</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Jumlah</th>
                        <th style="text-align:center;">Subtotal(Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                        if (isset($data)) {
                        foreach ($data->result_array() as $items): ?>
                    <tr>
                        <td><?php echo $items['jual_nofak']; ?></td> 
                        <td><?php echo $items['jual_tanggal'];?></td>
                        <td><?php echo $items['nama_tenant'];?></td>
                        <td><?php echo $items['d_jual_barang_id'];?></td>
                        <td style="text-align:left;"><?php echo $items['d_jual_barang_nama'];?></td>
                        <td style="text-align:center;"><?php echo $items['d_jual_barang_satuan'];?></td>
                        <td style="text-align:center;"><?php echo number_format($items['d_jual_barang_harjul']);?></td>
                        <td style="text-align:center;"><?php echo $items['d_jual_qty'];?></td>
                        <td style="text-align:center;"><?php echo number_format($items['d_jual_total']);?></td>
                    </tr>
                    
                    <?php endforeach; } ?>
                </tbody>
            </table>
            </div>
        </div>
        <?php
        if (isset($data)) { ?>
        <div class="row">
            <div class="col-12" style="margin: 15px;">
                <form action="<?php echo base_url().'admin/retur/void_penjualan'?>" method="POST">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control input-sm">
                    <br>
                    <input type="hidden" value="<?php echo $nofak;?>" name="nofak" id="nofak" class="form-control input-sm">
                    <button type="submit" class="btn btn-xl btn-danger" title="Pilih"><span class="fa fa-trash"></span> Hapus </button>     
                </form>
            </div>  
        </div>
        <?php } ?>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2021';?> by TSM Makassar</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata2').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
</body>

</html>
