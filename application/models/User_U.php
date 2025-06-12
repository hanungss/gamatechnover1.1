<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class User_U extends CI_Model  
{  
	public function insertuser($data)  
	{  
		$this->db->insert('user', $data);  
	}  

  
	public function verifyemail($key)  
	{  
		$data = array('status' => 1);  
		$this->db->where('md5(email)', $key);  
		return $this->db->update('user', $data);    
	}   



	function get_user_all()
	{
		$query=$this->db->query("SELECT * FROM user ORDER BY id_user DESC");
		return $query->result();
	}

	function delete_user($id_user)
	{
		$query=$this->db->query("DELETE FROM user WHERE id_user='$id_user'");
	}

	function edit_user($id_user)
    {
        $q="SELECT * FROM user WHERE id_user='$id_user'";
        $query=$this->db->query($q);
        return $query->row();
    }
 
    function simpan_edit_user($id_user, $nama_user, $username, $password)
    {
        $data = array(
        	'id_user'	=> $id_user,
            'nama_user'   => $nama_user,
            'username'       => $username,
            'password'       => $password
            
        );

        $this->db->where('id_user', "$id_user");
        $this->db->update('user', $data);    
    }

    private static $table2 = 'berkas';

    public function semua($berkas){
    $this->db->select("*");
   	$this->db->from('berkas');
    $this->db->where('id_berkas', $this->session->userdata('user_id'));

   return $this->db->get();
    }

    function get_data_user(){
        
        $sesi =  $this->session->userdata("user_id");
        $query = $this->db->query("SELECT * FROM user WHERE id_user = '$sesi'");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


}  