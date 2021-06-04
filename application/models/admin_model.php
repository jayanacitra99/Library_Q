<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db 	->where('username',$username)
							->where('password', $password)
							->get('admin'); 

		if($query->num_rows() > 0 ) {
			$data = array (
					'username'	=> $username,
					'logged_in'	=> TRUE
				);
			$this->session->set_userdata($data);

			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*public function do_sign_up()
	{
		$data = array (
				'ID_ADMIN' => $this->input->post('id_admin'),
				'USERNAME' => $this->input->post('username'),
				'PASSWORD' => $this->input->post('password')
			);
		$this->db->insert('admin', $data);

		if($this->db->affected_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}
	}*/

	public function get_data_supplier()
	{
		return $this->db->order_by('KD_SUPPLIER','ASC')
						->get('supplier')
						->result();
	}

	public function get_data_transaksi()
	{
		return $this->db->order_by('KD_TRANSAKSI','ASC')
						->get('transaksi')
						->result();
	}

	public function get_data_sth($params)

	public function get_supplier(){
		return $this->db->get('supplier')
						->result();
	}

	public function get_admin()
	{
		return $this->db->get('admin')
						->result();
	}

	public function get_buku()
	{
		return $this->db->get('buku')
						->result();
	}

	public function get_data_buku()
	{
		return $this->db->order_by('KD_BUKU', 'ASC')
						->get('buku')
						->result();
	}

	public function do_insert_supplier_baru()
	{
		$data = array (
				'KD_SUPPLIER' 	=> $this->input->post('kode_supplier'),
				'ID_ADMIN' 		=> $this->input->post('id_admin'),
				'NM_SUPPLIER' 	=> $this->input->post('nama_supplier'),
				'ALAMAT' 		=> $this->input->post('alamat'),
				'KOTA' 			=> $this->input->post('kota'),
				'TELP' 			=> $this->input->post('telepon'),
			);
		$this->db->insert('supplier', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function do_insert_buku_baru($foto)
	{
		$data = array(
				'KD_BUKU' 		=> $this->input->post('kode_buku'),
				'KD_SUPPLIER' 	=> $this->input->post('kode_supplier'),
				'ID_ADMIN' 		=> $this->input->post('id_admin'),
				'NM_BUKU' 		=> $this->input->post('nama_buku'),
				'PRODUSEN' 		=> $this->input->post('produsen'),
				'FOTO' 			=> $foto['file_name'],
				'JML_STOK' 		=> $this->input->post('jumlah_stok'),
				'HARGA' 		=> $this->input->post('harga'),
				);

		$this->db->insert('buku', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function do_insert_transaksi_baru()
	{
		$data = array (
				'KD_TRANSAKSI' 	=> $this->input->post('kode_transaksi'),
				'ID_ADMIN' 		=> $this->input->post('id_admin'),
				'NM_PEMBELI' 	=> $this->input->post('nama_pembeli'),
				'TOTAL' 		=> $this->input->post('total'),
				'TGL_BELI' 		=> $this->input->post('tanggal_beli'),
			);
		$this->db->insert('transaksi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function delete_supplier($KD_SUPPLIER){
		$this->db 	->where('KD_SUPPLIER', $KD_SUPPLIER)
					->delete('supplier');

			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
	}

	public function delete_transaksi($KD_TRANSAKSI){
		$this->db 	->where('KD_TRANSAKSI', $KD_TRANSAKSI)
					->delete('transaksi');

			if($this->db->affected_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
	}

	public function delete_buku($KD_BUKU){
		$this->db 	->where('KD_BUKU', $KD_BUKU)
					->delete('buku');

			if($this->db->affected_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
	}

	public function get_data_supplier_by_KODESUPPLIER($KD_SUPPLIER)
	{
		return $this->db->where('KD_SUPPLIER', $KD_SUPPLIER)
						->get('supplier')
						->row();
	}

	public function update_supplier($KD_SUPPLIER)
	{
		$data = array(
			'KD_SUPPLIER' 	=> $this->input->post('kode_supplier'), 
			'ID_ADMIN' 		=> $this->input->post('id_admin'),
			'NM_SUPPLIER'	=> $this->input->post('nama_supplier'), 
			'ALAMAT' 		=> $this->input->post('alamat'),
			'KOTA' 			=> $this->input->post('kota'), 
			'TELP' 			=> $this->input->post('telepon'),  
			);

		$this->db->where('KD_SUPPLIER', $KD_SUPPLIER)
				->update('supplier', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	

	public function get_data_transaksi_by_KODETRANSAKSI($ID_TRANSACTION)
	{
		return $this->db->where('ID_TRANSACTION', $ID_TRANSACTION)
						// ->get('transaksi')
						// ->row();
		return $this->db->get_data_update_transaksi($ID_TRANSACTION);
	}

	public function update_transaksi($ID_TRANSACTION)
	{
		$data = array(
				'ID_TRANSACTION' 	=> $this->input->post('kode_transaksi'),
				'ID_ADMIN' 		=> $this->input->post('id_admin'),
				'NM_PEMBELI' 	=> $this->input->post('nama_pembeli'),
				'TOTAL' 		=> $this->input->post('total'),
				'TGL_BELI' 		=> $this->input->post('tanggal_beli'), 
			);

		$this->db->where('ID_TRANSACTION', $ID_TRANSACTION);
		// 		->update('transaksi', $data);

		// if ($this->db->affected_rows() > 0) {
		// 	return TRUE;
		// } else {
		// 	return FALSE;
		// }
		return $this->db->get_data_update_transaksi($ID_TRANSACTION);
	}

	public function get_data_update_transaksi($params){
		if( is_array($params) )
	    {
	        $this->db->where($params);
	    }

	    else
	    {
	        $this->db->where('ID_TRANSACTION', $params);
	    } 

	    return $this->db->affected_rows('transaksi') > 0; 
	}

	public function get_data_buku_by_KODEBUKU($KD_BUKU)
	{
		return $this->db->where('KD_BUKU', $KD_BUKU)
						->get('buku')
						->row();
	}

	public function update_buku($KD_BUKU, $foto)
	{
		$data = array(
				'KD_BUKU' 		=> $this->input->post('kode_buku'),
				'KD_SUPPLIER' 	=> $this->input->post('kode_supplier'),
				'ID_ADMIN' 		=> $this->input->post('id_admin'),
				'NM_BUKU' 		=> $this->input->post('nama_buku'),
				'PRODUSEN' 		=> $this->input->post('produsen'),
				'FOTO' 			=> $foto['file_name'],
				'JML_STOK' 		=> $this->input->post('jumlah_stok'),
				'HARGA' 		=> $this->input->post('harga'),
				);

		$this->db->where('KD_BUKU', $KD_BUKU)
				->update('buku', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_data_stokbuku_by_KODEBUKU($KD_BUKU)
	{
		return $this->db->where('KD_BUKU', $KD_BUKU)
						->get('buku')
						->row();
	}

	public function get_table_join()
	{
		return $this->db->select('detil_transaksi.KD_BUKU, detil_transaksi.KD_TRANSAKSI, buku.NM_BUKU, detil_transaksi.JUMLAH, detil_transaksi.SUB_TOTAL, transaksi.NM_PEMBELI')
						->join('buku detil_transaksi.KD_BUKU = buku.KD_BUKU')
						->join('transaksi detil_transaksi.KD_TRANSAKSI = transaksi.KD_TRANSAKSI')
						->get('detil_transaksi')
						->result();
	}

	public function update_stokbuku($KD_BUKU)
	{
		$data = array(
				'JML_STOK' 		=> $this->input->post('jumlah_stok')
				);

		$this->db->where('KD_BUKU', $KD_BUKU)
				->update('buku', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function kurang($KD_BUKU){

		$buku = $this->input->post('kode_buku');
		$jumlah = $this->input->post('jumlah');
		$this->db->where('KD_BUKU', $KD_BUKU)->get('buku')->row()->$jumlahstok;
		$hasil = $jumlahstok - $jumlah;
		$data = array(
				'JML_STOK' => $hasil
			);
		$this->db->where('KD_BUKU', $KD_BUKU)
				->update('buku', $data);

		if($this->db->affected_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */