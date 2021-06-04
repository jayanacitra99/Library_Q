<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation', 'session');
		//Do your magic here
	}
/*
	if($this->session->userdata('logged_in') == TRUE) {

		}else {
			redirect('admin');
		}
*/
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			redirect(base_url('index.php/admin/dashboard'));
		}else {
			$this->load->view('login_view');
		}
	}

	public function do_login()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin_model->do_login()){

					redirect(base_url('index.php/admin/dashboard'));

				}else {

					$data['notif'] = 'Gagal Login !!';
					$this->load->view('login_view');

				}
			} else {

				$data['notif'] = validation_errors();
				$this->load->view('login_view');

			}
		}else {

			$this->load->view('login_view');

		}
	}

	public function logout()
	{
		$data = array(
				'username' => '',
				'logged_in'=> FALSE
			);
		$this->session->sess_destroy();
		redirect(base_url('index.php/admin'));
	}

	public function data_admin()
	{
		$data['admin'] = $this->admin_model->get_data_admin();
	}

	/*public function do_sign_up()
	{
		if($this->input->post('signup')){

			$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin_model->do_sign_up()){

					$data['notif'] = 'Berhasil Sign Up !!';
					$this->load->view('login_view');

				}else {

					$data['notif'] = 'Gagal Sign Up !!';
					$this->load->view('sign_up_view');

				}
			} else {

				$data['notif'] = validation_errors();
				$this->load->view('sign_up_view');

			}
		}else {

			$this->load->view('sign_up_view');

		}
	}

	public function sign_up()
	{
		$this->load->view('sign_up_view');
	}*/

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'dashboard_view';
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function lihat_data_buku()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'lihat_data_buku_view';
			$data['buku'] = $this->admin_model->get_data_buku();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	

	public function delete_supplier(){
		if($this->session->userdata('logged_in') == TRUE) {
			$KD_SUPPLIER = $this->uri->segment(3);

			if($this->admin_model->delete_supplier($KD_SUPPLIER) == TRUE) {
				$this->session->set_flashdata('notif','Hapus Sukses');
				redirect(base_url('index.php/admin/data_supplier'));
			}else {
				$this->session->set_flashdata('notif','Hapus Gagal !!');
				redirect(base_url('index.php/admin/data_supplier'));
			}
		}else {
			redirect('admin');
		}
	}

	public function delete_transaksi(){
		if($this->session->userdata('logged_in') == TRUE) {
			$KD_TRANSAKSI = $this->uri->segment(3);

			if($this->admin_model->delete_transaksi($KD_TRANSAKSI) == TRUE) {
				$this->session->set_flashdata('notif','Hapus Sukses');
				redirect(base_url('index.php/admin/data_transaksi'));
			}else {
				$this->session->set_flashdata('notif','Hapus Gagal !!');
				redirect(base_url('index.php/admin/data_transaksi'));
			}
		}else {
			redirect('admin');
		}
	}

	public function delete_buku(){
		if($this->session->userdata('logged_in') == TRUE) {
			$KD_BUKU = $this->uri->segment(3);

			if($this->admin_model->delete_buku($KD_BUKU) == TRUE) {
				$this->session->set_flashdata('notif','Hapus Sukses');
				redirect(base_url('index.php/admin/lihat_data_buku'));
			}else {
				$this->session->set_flashdata('notif','Hapus Gagal !!');
				redirect(base_url('index.php/admin/lihat_data_buku'));
			}
		}else {
			redirect('admin');
		}
	}

	public function lihat_stok_buku()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'lihat_stok_buku_view';
			$data['buku'] = $this->admin_model->get_data_buku();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function data_transaksi()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'data_transaksi_view';
			$data['transaksi'] = $this->admin_model->get_data_transaksi();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function data_supplier()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'data_supplier_view';
			$data['supplier'] = $this->admin_model->get_data_supplier();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function tambah_data_supplier()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'tambah_data_supplier_view';
			$data['admin_insert'] = $this->admin_model->get_admin();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function tambah_data_transaksi()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'tambah_data_transaksi_view';
			$data['admin_insert'] = $this->admin_model->get_admin();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function tambah_buku_baru()
	{
		if($this->session->userdata('logged_in') == TRUE){
		$data['main_view'] = 'tambah_buku_baru_view';
		$data['supplier_insert'] = $this->admin_model->get_supplier();
		$data['admin_insert'] = $this->admin_model->get_admin();
		$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function do_insert_buku_baru()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('kode_buku', 'Kode_buku', 'trim|required');
			$this->form_validation->set_rules('kode_supplier', 'Kode_supplier', 'trim|required');	
			$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
			$this->form_validation->set_rules('nama_buku', 'Nama_buku', 'trim|required');
			$this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
			$this->form_validation->set_rules('jumlah_stok', 'Jumlah_stok', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2000';

				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('foto')){
				

					if ($this->admin_model->do_insert_buku_baru($this->upload->data()) == TRUE) {
						
						redirect(base_url('index.php/admin/lihat_data_buku'));
					} else {
						
						$data['notif'] = 'Tambah Gagal!';
						$data['main_view'] = 'lihat_data_buku_view';
						$this->load->view('template', $data);
					}
				} else {
					$data['main_view'] = 'lihat_data_buku_view';
					$data['notif'] = $this->upload->display_errors();
					$this->load->view('template', $data);
				}
				
			} else {
				$data['notif'] = validation_errors();

				$data['main_view'] = 'lihat_data_buku_view';
				$this->load->view('template', $data);
			}
		} 
	}

	public function do_insert_supplier_baru()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('kode_supplier', 'Kode_supplier', 'trim|required');
			$this->form_validation->set_rules('nama_supplier', 'Nama_supplier', 'trim|required');
			$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
			$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin_model->do_insert_supplier_baru()){

					redirect(base_url('index.php/admin/data_supplier'));
				}else {

					$data['notif'] = 'Gagal Menambahkan !!';
					$this->load->view('tambah_data_supplier_view');

				}
			} else {

				$data['notif'] = validation_errors();
				$this->load->view('tambah_data_supplier_view');

			}
		}else {

			$this->load->view('tambah_data_supplier_view');

		}
	}

	public function do_insert_transaksi_baru()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('kode_transaksi', 'Kode_transaksi', 'trim|required');
			$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
			$this->form_validation->set_rules('nama_pembeli', 'Nama_pembeli', 'trim|required');
			$this->form_validation->set_rules('total', 'Total', 'trim|required');
			$this->form_validation->set_rules('tanggal_beli', 'Tanggal_beli', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin_model->do_insert_transaksi_baru()){

					redirect(base_url('index.php/admin/data_transaksi'));
				}else {

					$data['notif'] = 'Gagal Menambahkan !!';
					$this->load->view('tambah_data_transaksi_view');

				}
			} else {

				$data['notif'] = validation_errors();
				$this->load->view('tambah_data_transaksi_view');

			}
		}else {

			$this->load->view('tambah_data_transaksi_view');

		}
	}

	public function edit_supplier()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'edit_supplier_view';
			$KD_SUPPLIER = $this->uri->segment(3);
			$data['admin_insert'] = $this->admin_model->get_admin();
			$data['edit_supplier'] = $this->admin_model->get_data_supplier_by_KODESUPPLIER($KD_SUPPLIER);

			$this->load->view('template', $data);
		} else {
			redirect('admin','refresh');
		}
	}

	public function do_edit_supplier()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$KD_SUPPLIER = $this->uri->segment(3);

			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('kode_supplier', 'Kode_supplier', 'trim|required');
				$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
				$this->form_validation->set_rules('nama_supplier', 'Nama_supplier', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
				$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					if ($this->admin_model->update_supplier($KD_SUPPLIER) == TRUE) {
						
						redirect(base_url('index.php/admin/data_supplier'));
					} else {
						
						$data['notif'] = 'Update Gagal!';
						$data['main_view'] = 'data_supplier_view';
						$this->load->view('template', $data);
					}
					
				} else {
					$data['notif'] = validation_errors();

					$data['main_view'] = 'data_supplier_view';
					$this->load->view('template', $data);
				}
			}
		}
	}
	
	public function edit_transaksi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'edit_transaksi_view';
			$KD_TRANSAKSI = $this->uri->segment(3);
			$data['admin_insert'] = $this->admin_model->get_admin();
			$data['edit_transaksi'] = $this->admin_model->get_data_transaksi_by_KODETRANSAKSI($KD_TRANSAKSI);

			$this->load->view('template', $data);
		} else {
			redirect('admin','refresh');
		}
	}

	public function do_edit_transaksi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$KD_TRANSAKSI = $this->uri->segment(3);

			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('kode_transaksi', 'Kode_transaksi', 'trim|required');
				$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
				$this->form_validation->set_rules('nama_pembeli', 'Nama_pembeli', 'trim|required');
				$this->form_validation->set_rules('total', 'Total', 'trim|required');
				$this->form_validation->set_rules('tanggal_beli', 'Tanggal_beli', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					if ($this->admin_model->update_transaksi($KD_TRANSAKSI) == TRUE) {
						
						redirect(base_url('index.php/admin/data_transaksi'));
					} else {
						
						$data['notif'] = 'Update Gagal!';
						$data['main_view'] = 'data_transaksi_view';
						$this->load->view('template', $data);
					}
					
				} else {
					$data['notif'] = validation_errors();

					$data['main_view'] = 'data_transaksi_view';
					$this->load->view('template', $data);
				}
			}
		}
	}

	public function edit_buku()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'edit_buku_view';
			$KD_BUKU = $this->uri->segment(3);
			$data['admin_insert'] = $this->admin_model->get_admin();
			$data['supplier_insert'] = $this->admin_model->get_supplier();
			$data['edit_buku'] = $this->admin_model->get_data_buku_by_KODEBUKU($KD_BUKU);

			$this->load->view('template', $data);
		} else {
			redirect('admin','refresh');
		}
	}

	public function do_edit_buku()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$KD_BUKU = $this->uri->segment(3);

			if($this->input->post('submit')){

			$this->form_validation->set_rules('kode_buku', 'Kode_buku', 'trim|required');
			$this->form_validation->set_rules('kode_supplier', 'Kode_supplier', 'trim|required');	
			$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
			$this->form_validation->set_rules('nama_buku', 'Nama_buku', 'trim|required');
			$this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
			$this->form_validation->set_rules('jumlah_stok', 'Jumlah_stok', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2000';

				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('foto')){
				

					if ($this->admin_model->update_buku($KD_BUKU,$this->upload->data()) == TRUE) {
						
						
					redirect(base_url('index.php/admin/lihat_data_buku'));

					} else {
						
						$data['notif'] = 'Tambah Gagal!';
						$data['main_view'] = 'lihat_data_buku_view';
						$this->load->view('template', $data);
					}
				} else {
					$data['main_view'] = 'lihat_data_buku_view';
					$data['notif'] = $this->upload->display_errors();
					$this->load->view('template', $data);
				}
				
			} else {
				$data['notif'] = validation_errors();

				$data['main_view'] = 'lihat_data_buku_view';
				$this->load->view('template', $data);
			}
		} 
		}
	}

	public function tambah_stok(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'tambah_stok_buku_view';
			$KD_BUKU = $this->uri->segment(3);
			$data['admin_insert'] = $this->admin_model->get_admin();
			$data['edit_stokbuku'] = $this->admin_model->get_data_stokbuku_by_KODEBUKU($KD_BUKU);

			$this->load->view('template', $data);
		} else {
			redirect('admin','refresh');
		}
	}

	public function do_edit_stokbuku()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$KD_BUKU = $this->uri->segment(3);

			if($this->input->post('submit')){

			$this->form_validation->set_rules('jumlah_stok', 'Jumlah_stok', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

					if ($this->admin_model->update_stokbuku($KD_BUKU) == TRUE) {
						
						redirect(base_url('index.php/admin/lihat_stok_buku'));
					} else {
						
						$data['notif'] = 'Update Gagal!';
						$data['main_view'] = 'lihat_stok_buku_view';
						$this->load->view('template', $data);
					}
					
				} else {
					$data['notif'] = validation_errors();

					$data['main_view'] = 'lihat_stok_buku_view';
					$this->load->view('template', $data);
				}
			} 
		}
	}

	public function detil_transaksi()
	{
		if($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'detil_transaksi_view';

			$data['table_join'] = $this->admin_model->get_table_join();

			$this->load->view('template',$data);
		}else {
			redirect('admin');
		}
	}

	public function jual_buku(){
		if($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'penjualan_buku_view';
			$this->load->view('template',$data);
		}else {
			redirect('admin');
		}
	}

	public function do_jual_buku()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$KD_BUKU = $this->uri->segment(3);

			if($this->input->post('submit')){

			$this->form_validation->set_rules('jumlah_stok', 'Jumlah_stok', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

					if ($this->admin_model->jual_buku($KD_BUKU) == TRUE) {
						
						redirect(base_url('index.php/admin/lihat_stok_buku'));
					} else {
						
						$data['notif'] = 'Update Gagal!';
						$data['main_view'] = 'lihat_stok_buku_view';
						$this->load->view('template', $data);
					}
					
				} else {
					$data['notif'] = validation_errors();

					$data['main_view'] = 'lihat_stok_buku_view';
					$this->load->view('template', $data);
				}
			} 
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */