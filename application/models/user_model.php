<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function main_query($tanggal = 0){
        if($tanggal == 0)
            $query = $this->db->query('SELECT * FROM user');
        else
            $query = $this->db->query('SELECT * FROM user');
        return $query;
    }

    function get_all($tanggal = 0)
    {
        $query = $this->main_query($tanggal);
        return $query->result();
    }
    function get_rows($tanggal = 0){
        $query = $this->main_query($tanggal);
        return $query->num_rows();
    }

    function get_last_ten($limit,$offset)
    {
        $query = $this->db->query('SELECT * FROM user LIMIT ' .$offset .',' .$limit);
        return $query->result();
    }

    function count(){
        $query = $this->db->query('SELECT * FROM user');
        return $query->num_rows();
    }
    
    function get_details($register){
        $query = $this->db->query('SELECT * FROM user WHERE register = "'.$register.'"');
        return $query->row();
    }

    function get_level(){
        $query = $this->db->query('SELECT lu.id_level, lu.nama_level FROM user AS u JOIN level_user AS lu WHERE u.level = lu.id_level');
        return $query->result();
    }
    
    function cur_password($username){
        $query = $this->db->query('SELECT password FROM user WHERE username = "'.$username.'"');
        return $query->row();
    }
    
    function ubah_password(){
        $username = $this->input->post('username');
        $new_pass = $this->input->post('new_pass');
        $new_pass = substr(md5($new_pass), 0, 25);
        $data = array(
            'password'=>$new_pass
        );
        $this->db->where('username',$username);
        $this->db->update('user',$data);
    }
    
    function getAll(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(5);
        $this->db->order_by('register','ASC');
        $query = $this->db->get();

        return $query->result();
  }
  function save(){
    $register = $this->input->post('register');
    $nama_lengkap = $this->input->post('nama_lengkap');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $password = substr(md5($password), 0, 25);
    $level = $this->input->post('level');
    
    $data = array(
      'register'=>$register,
      'nama_lengkap'=>$nama_lengkap,
      'username'=>$username,
      'password'=>$password,
      'level'=>$level
    );
    $this->db->insert('user',$data);
  }

  function update(){
    //$register_old = $this->input->post('register_old');
    $register = $this->input->post('register');
    $nama_lengkap = $this->input->post('nama_lengkap');
    $username = $this->input->post('username');
    $level = $this->input->post('level');
    
    $data = array(
      //'register_old'=>$register_old,
      //'register'=>$register,
      'nama_lengkap'=>$nama_lengkap,
      'username'=>$username,
      'level'=>$level
    );
    $this->db->where('register',$register);
    $this->db->update('user',$data);
  }

  function delete(){
      $register = $this->input->post('register');
      $this->db->delete('user', array('register' => $register));
  }
}
?>