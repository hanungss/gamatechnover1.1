<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class Berkas_U extends CI_Model  
{

  function logged_id()
  {
    return $this->session->userdata('user_id');
  }

  private static $table = 'berkas';
  private static $pk = 'id_berkas';

  public function is_exist($where)
  {
    return $this->db->where($where)->get(self::$table)->row_array();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('berkas');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  

  public function get_by_id($id_berkas)
  {
    $this->db->where('id_berkas', $id_berkas);
    return $this->db->get('berkas')->row();
  }

  public function insert($data)
  {
    $this->db->insert('berkas', $data);
  }

  function delete_berkas($id_row)
  {
    $query=$this->db->query("DELETE FROM berkas WHERE id_row='$id_row'");
  }

  function edit_berkas($id_row)
  {
    // $sesi =  $this->session->userdata("user_id");
    $q="SELECT * FROM berkas WHERE id_row='$id_row'";
    $query=$this->db->query($q);
    return $query->row();
  }

  function otal($id_berkas)
  {
    $t="SELECT COUNT(berkas) FROM berkas WHERE id_berkas = '$id_berkas'";
    $query=$this->db->query($t);
    return $query->row();
  }

  function simpan_edit_berkas($id_berkas, $nama_berkas, $keterangan, $tanggal, $jenis, $berkas)
  {
    $data = array(
     'id_berkas'	=> $id_berkas,
     'nama_berkas'   => $nama_berkas,
     'keterangan'       => $keterangan,
     'tanggal'       => $tanggal,
     'jenis'      => $jenis,
     'berkas' => $berkas

   );

    $this->db->where('id_berkas', "$id_berkas");
    $this->db->update('berkas', $data);      
  }

  public function add($data)
  {
    return $this->db->insert(self::$table, $data);
  }

    // Fungsi untuk melakukan proses upload file
  public function upload(){
    $config['upload_path'] = 'C:/Users/Hanung/Dropbox/upload';
    $config['allowed_types'] = 'avi|mpeg|mp4|pdf|docx|doc|jpg|png|jpeg';
    $config['max_size']  = '5120';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('input_berkas')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  

  // Fungsi untuk menyimpan data ke database
  public function save($upload){
    $data = array(
      'nama_berkas'=>$this->input->post('nama_berkas'),
      'keterangan'=>$this->input->post('keterangan'),
      'tanggal'=>$this->input->post('tanggal'),
      'berkas' => $upload['file']['berkas']
      
    );
    
    $this->db->insert('berkas', $data);
  }

  function get_data_berkas(){

    $sesi =  $this->session->userdata("user_id");
    $query = $this->db->query("SELECT * FROM berkas WHERE id_berkas = '$sesi'");

    if($query->num_rows() > 0){
      foreach($query->result() as $data){
        $hasil[] = $data;
      }
      return $hasil;
    }
  }

  public function file_total()
  {
   $sesi =  $this->session->userdata("user_id");
   $query = $this->db->query("SELECT COUNT(berkas) FROM berkas WHERE id_berkas ='$sesi'");
   return $query->result();


 }

 public function download()
 {

 }

 public function berkas_gambar()
 {
   $sesi =  $this->session->userdata("user_id");
   $query = $this->db->query("SELECT * FROM berkas WHERE jenis LIKE 'Gambar' AND id_berkas ='$sesi'");
   if($query->num_rows() > 0){
    foreach($query->result() as $data){
      $hasil[] = $data;
    }
    return $hasil;
  }
}

public function berkas_dokumen()
{
  $sesi =  $this->session->userdata("user_id");
  $query = $this->db->query("SELECT * FROM berkas WHERE jenis LIKE 'Dokumen' AND id_berkas ='$sesi'");
  if($query->num_rows() > 0){
    foreach($query->result() as $data){
      $hasil[] = $data;
    }
    return $hasil;
  }
}

public function berkas_video()
{
  $sesi =  $this->session->userdata("user_id");
  $query = $this->db->query("SELECT * FROM berkas WHERE jenis LIKE 'Video' AND id_berkas ='$sesi'");
  if($query->num_rows() > 0){
    foreach($query->result() as $data){
      $hasil[] = $data;
    }
    return $hasil;
  }
}

public function berkas_lain()
{
  $sesi =  $this->session->userdata("user_id");
  $query = $this->db->query("SELECT * FROM berkas WHERE jenis LIKE 'Lain' AND id_berkas ='$sesi'");
  if($query->num_rows() > 0){
    foreach($query->result() as $data){
      $hasil[] = $data;
    }
    return $hasil;
  }
}

public function kadaluarsa()
{
  $sesi =  $this->session->userdata("user_id");
  $query = $this->db->query("SELECT * FROM berkas WHERE tanggal <= now() AND id_berkas='$sesi'");
  if($query->num_rows() > 0){
    foreach($query->result() as $data){
      $hasil[] = $data;
    }
    return $hasil;
  }
}


function read()
{
  $sesi =  $this->session->userdata("user_id");
  $query = $this->db->query("SELECT email FROM user WHERE id_user='$sesi'");
  return $query->result();
}

}
