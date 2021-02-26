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
    $tenantName = array_unique(array_column($data->result_array(),'nama_tenant'));
    foreach ($tenantName as $tenant) {       
?>
<h1 style="text-align:center">Transstudio Mall Makassar</h1>
<table border="0" align="center" style="border:none;">
        <tr>
            <th style="text-align:left;padding-right:10px">No Faktur</th>
            <th style="text-align:left;padding-right:10px">: <?php echo $b['jual_nofak'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;padding-right:10px">Tanggal</th>
            <th style="text-align:left;padding-right:10px">: <?php echo $b['jual_tanggal'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;padding-right:10px">Tenant</th>
            <th style="text-align:left;padding-right:10px">: <?php echo $tenant;?></th>
        </tr>
</table>
<br>
<table border="0" align="center" class="items" style="margin-bottom:5px;">
<thead>
    <tr>
        <th>Nama Barang</th>
        <th>Harga Jual</th>
        <th>Qty</th>
        <th>SubTotal</th>
    </tr>
</thead>
<tbody>
<?php
    $subTotal = 0;
    foreach ($data->result_array() as $i) {
        if ($i['nama_tenant'] == $tenant) {
            $nabar=$i['d_jual_barang_nama'];
            $harjul=$i['d_jual_barang_harjul'];
            $qty=$i['d_jual_qty'];
            $total=$i['d_jual_total'];
            $subTotal+=$total;
?>
    <tr>
        <td><?php echo $nabar;?></td>
        <td><?php echo 'Rp.'.number_format($harjul);?></td>
        <td><?php echo $qty;?></td>
        <td><?php echo 'Rp.'.number_format($total);?></td>
    </tr>
    <?php }} ?>
</tbody>
<tfoot>
    <tr>
        <td colspan="3" style="text-align:center;"><b>Total</b></td>
        <!-- <td style="text-align:right;"><b><?php echo 'Rp.'.number_format($b['jual_total']);?></b></td> -->
        <td style="text-align:right;"><b><?php echo 'Rp.'.number_format($subTotal);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:300px; border:none;margin-top:5px;margin-bottom:5px;">
    <tr>
        <td align="right">Makassar, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:5px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
<?php } ?>
</div>
</body>
</html>