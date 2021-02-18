<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Faktur Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>

</head>
<body onload="window.print()">
<div id="laporan">
<!-- <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>
</table>

<table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    
</tr>
                       
</table> -->
<?php 
    $b=$data->row_array();
?>
<h2 style="text-align:center">Transstudio Mall Makassar</h2>
<table border="0" align="center" style="border:none;">
        <tr>
            <th style="text-align:left;padding-right:10px">No Resi</th>
            <th style="text-align:left;padding-right:10px">: <?php echo $b['jual_nofak'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;padding-right:10px">Tanggal</th>
            <th style="text-align:left;padding-right:10px">: <?php echo $b['jual_tanggal'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;padding-right:10px">Tenant</th>
            <th style="text-align:left;padding-right:10px">: <?php echo $b['nama_tenant'];?></th>
        </tr>
</table>
<br>
<table border="0" align="center" class="items" style="width:250px;margin-bottom:20px;">
<thead>
    <tr>
        <th style="text-align: left;">Nama Barang</th>
        <th style="width: 50px;">Qty</th>
        <th>SubTotal</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $nabar=$i['d_jual_barang_nama'];
        $harjul=$i['d_jual_barang_harjul'];
        $qty=$i['d_jual_qty'];
        $total=$i['d_jual_total'];
?>
    <tr>
        <td><?php echo $nabar;?></td>
        <td style="text-align: center;"><?php echo $qty;?></td>
        <td style="text-align: right;"><?php echo 'Rp.'.number_format($total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="2" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp.'.number_format($b['jual_total']);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:250px; border:none;margin-top:2px;">
    <tr>
        <td align="right">Makassar, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<!-- <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table> -->
</div>
</body>
</html>