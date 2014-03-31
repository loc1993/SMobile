<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Danhgia_model extends CI_Model{

	var $table = 'danhgia';

	function __construct(){
		parent:: __construct();
	}

	function get_danhgia(){		
		$query = $this->db->query("SELECT B.MASANPHAM, A.TENSANPHAM, B.LUOTXEM, B.LUOTMUA, B.LUOTDANHGIA, B.TONGDIEM, B.DIEMDANHGIA FROM SANPHAM A, danhgia B WHERE A.ID = B.MASANPHAM");
		return $query->result_array();
	}

	function insert($Masanpham, $Luotxem, $Luotmua, $Luotdanhgia, $Tongdiem, $Diemdanhgia)
	{
		$Matkhau = do_hash($Matkhau, 'md5');
		$data = array(
			"Masanpham" => $Masanpham,
			"Luotxem" => $Luotxem,
			"Luotmua"	=>	$Luotmua,
			"Luotdanhgia" => $Luotdanhgia,
			"Tongdiem" => $Tongdiem,
			"Diemdanhgia" => $Diemdanhgia			
		);
		$this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}


	function edit($id){
		echo $id;
		$query = $this->db->query("SELECT B.MASANPHAM, A.TENSANPHAM, B.LUOTXEM, B.LUOTMUA, B.LUOTDANHGIA, B.TONGDIEM, B.DIEMDANHGIA FROM SANPHAM A, danhgia B WHERE A.ID = B.MASANPHAM AND B.MASANPHAM = ".$id);
		return $query->result_array();		
	}

	function update($Masanpham, $Luotxem, $Luotmua, $Luotdanhgia, $Tongdiem, $Diemdanhgia)
	{
		$data = array(
			"Masanpham" => $Masanpham,
			"Luotxem" => $Luotxem,
			"Luotmua"	=>	$Luotmua,
			"Luotdanhgia" => $Luotdanhgia,
			"Tongdiem" => $Tongdiem,
			"Diemdanhgia" => $Diemdanhgia,			
		);
		$this->db->where("MASANPHAM", $Masanpham);
		$query = $this->db->update($this->table, $data);
		if($this->db->affected_rows() > 0) return TRUE;
		return FALSE;
	}

}