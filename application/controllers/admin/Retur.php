<?php
class Retur extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_penjualan');
		$this->load->model('m_retur');
	}
	function index(){
		if($this->session->userdata('akses')=='1'){
			$this->load->view('admin/v_retur');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	function cari_penjualan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		if ($this->input->post('nofak') != "") {
			$nofak=$this->input->post('nofak');
			$data['data']=$this->m_retur->cari_penjualan($nofak);
			$data['nofak']=$nofak;
			$this->load->view('admin/v_retur',$data);
		}else{
			redirect('admin/retur');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function hapus_retur(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->uri->segment(4);
		$this->m_penjualan->hapus_retur($kode);
		redirect('admin/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	public function void_penjualan()
	{
		if($this->session->userdata('akses')=='1'){
			$nofak = $this->input->post('nofak');
			$data = $this->m_retur->get_penjualan($nofak);
			$data_void = array(
				'nofak'			=> $data->jual_nofak,
				'tanggal_jual' 	=> $data->jual_tanggal,
				'total_jual'	=> $data->jual_total,
				'jumlah_uang'	=> $data->jual_jml_uang,
				'kembalian'		=> $data->jual_kembalian,
				'kasir_id'		=> $data->jual_user_id,
				'void_by'		=> $this->session->userdata('idadmin'),
				'keterangan'	=> $this->input->post('keterangan')
			);
			$this->m_retur->copy_detail_penjualan($nofak);
			$this->m_retur->simpan_retur($data_void);
			$this->m_retur->delete_penjualan($nofak);
			echo $this->session->set_flashdata('msg','<label class="label label-success">Data '.$nofak.' berhasil di Void</label>');
			redirect('admin/retur');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}
}