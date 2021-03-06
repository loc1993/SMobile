<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Sanpham_model extends CI_Model{

	var $table = 'sanpham';

	function __construct(){
		parent:: __construct();
	}

	function get_sanpham(){				
		$query = $this->db->query("SELECT B1.*, (SELECT B2.TENLOAI FROM loaisanpham B2 WHERE B1.LOAI = B2.ID ) LOAISANPHAM , (SELECT B3.TENNCC FROM nhacungcap B3 WHERE B1.NHACUNGCAP = B3.ID ) TENNHACUNGCAP FROM `".$this->table."` B1 ORDER BY `ID` DESC ");
		return $query->result_array();
	}

	function edit($id){
		echo $id;
		$query = $this->db->get_where($this->table,array('ID'=>$id));
		return $query->result_array();
	}

	function insert($Tensanpham, $Loai, $Nhacungcap, $Soluong, $Hinh, $Mota, $Mota_en, $Dongia)
	{
		$data = array(
			"Tensanpham" => $Tensanpham,
			"Loai" => $Loai,
			"Nhacungcap"	=>	$Nhacungcap,
			"Soluong" => $Soluong,
			"Hinh" => $Hinh,
			"Mota" => $Mota,
			"Mota_en"	=> $Mota_en,
			"Dongia" => $Dongia
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}

	function update($Id, $Tensanpham, $Loai, $Nhacungcap, $Soluong, $Hinh, $Mota, $Mota_en, $Dongia)
	{
		$data = array(
			"Tensanpham" => $Tensanpham,
			"Loai" => $Loai,
			"Nhacungcap"	=>	$Nhacungcap,
			"Soluong" => $Soluong,
			"Hinh" => $Hinh,
			"Mota" => $Mota,
			"Mota_en" => $Mota_en,
			"Dongia" => $Dongia
		);
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}

	function delete($id)
	{
		$this->db->delete($this->table,array('id'=>$id));
		if($this->db->affected_rows() > 0 ) return TRUE;
		return FALSE;
	}
}