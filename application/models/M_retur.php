<?php
class M_retur extends CI_Model{

	function hapus_retur($kode){
		$hsl=$this->db->query("DELETE FROM tbl_retur WHERE retur_id='$kode'");
		return $hsl;
	}

	public function cari_penjualan($nofak)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak=$nofak");
		return $hsl;
	}

	function get_penjualan($nofak){
		$hsl=$this->db->query("SELECT * FROM tbl_jual WHERE jual_nofak = $nofak");
		return $hsl->row();
	}

	function simpan_retur($data){
		$hsl=$this->db->query("INSERT INTO tbl_void(nofak,tanggal_jual,total_jual,jumlah_uang,kembalian,kasir_id,void_by,keterangan) VALUES ('$data[nofak]','$data[tanggal_jual]','$data[total_jual]','$data[jumlah_uang]','$data[kembalian]','$data[kasir_id]','$data[void_by]','$data[keterangan]')");
		return $hsl;
	}
	
	public function copy_detail_penjualan($nofak)
	{
		$hsl=$this->db->query("INSERT INTO tbl_detail_void (d_jual_nofak,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total,nama_tenant) SELECT d_jual_nofak,d_jual_barang_id,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total,nama_tenant FROM tbl_detail_jual WHERE d_jual_nofak=$nofak");
		return $hsl;
	}

	public function delete_penjualan($nofak)
	{
		$this->db->query("DELETE FROM tbl_detail_jual WHERE d_jual_nofak=$nofak");
		$hsl = $this->db->query("DELETE FROM tbl_jual WHERE jual_nofak=$nofak");
		return $hsl;
	}
}