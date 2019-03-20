<?php

class M_paket extends CI_Model{
    function get_data($table){
  		return $this->db->get($table);
  	}
    function insert_data($data,$table){
  		$this->db->insert($table,$data);
  	}

  	function update_data($where,$data,$table){
  		$this->db->where($where);
  		$this->db->update($table,$data);
  	}

  	function delete_data($where,$table){
  		$this->db->where($where);
  		$this->db->delete($table);
  	}

    function edit_data($where,$table){
		  return $this->db->get_where($table,$where);
	  }

    function detail_data($where,$table){
		  return $this->db->get_where($table,$where);
	  }

    public function get_data_paket() {
       $this->db->select('*');
       $this->db->from('paket');
       $this->db->join('santri','santri.nis=paket.penerima_paket');
       $this->db->join('kategori_paket','kategori_paket.id_kategori=paket.kategori_paket');
       $this->db->join('asrama','asrama.id_asrama=santri.asrama');
       // $this->db->where($aktif);
       $query = $this->db->get();
       return $query->result();
    }
}
