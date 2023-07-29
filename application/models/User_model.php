<?php

class User_model extends CI_Model
{
    public function doLogin($username,$password){
        // cari user berdasarkan email dan username
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();
        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($password, $user->password);
            // $isPasswordTrue = $this->bcrypt->check_password($password, $user->password);

            // jika password benar
            if($isPasswordTrue){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->id);
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id){
        $sql = "UPDATE users SET last_login=now() WHERE id={$id}";
        $this->db->query($sql);
    }

    function data($number,$offset){
        // return $query = $this->db->get('artikel',$number,$offset)->result();
        return $this->db->query("Select * From artikel order by id desc limit ".$number.",".$offset);
    }
 
    function jumlah_data(){
        return $this->db->get('artikel')->num_rows();
    }
}