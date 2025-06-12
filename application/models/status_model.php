<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class status_model extends CI_Model{

function tampil_status()
{
$query=$this->db->query("SELECT * FROM berkas ORDER BY id_berkas ASC");
return $query->result();
}

function tampil_user()
{
$query=$this->db->query("SELECT * FROM user ORDER BY id_user DESC");
return $query->result();
}

function del_user(){ 
    $query=$this->db->query("DELETE FROM `user` WHERE `user`.`id_user` = $get_id"); 
    // $this->db->delete('user'); //eksekusi
    return $query->result();
}

}