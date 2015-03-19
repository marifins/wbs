<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    var $CI = null;

    function Auth() {
        $this->CI = & get_instance();
        $this->CI->load->database();
    }

    function do_login($login = NULL) {
        if (!isset($login))
            return FALSE;

        if (count($login) != 2)
            return FALSE;

        $username = $login['username'];
        $password = $login['password'];

        $password = substr(md5($password), 0, 25);
        $this->CI->db->from('user');
        $this->CI->db->where('username', $username);
        //$this->CI->db->where("user_password=PASSWORD('$password')");
        $this->CI->db->where("password", $password);
        $query = $this->CI->db->get();

        foreach ($query->result() as $row) {
            $id = $row->register;
            $username = $row->username;
            $fullname = $row->nama_lengkap;
            $count = $row->login_counter;
            $level = $row->level;
            $count++;
        }

        if ($query->num_rows() == 1) {
            $newdata = array(
                'user_id' => $id,
                'username' => $username,
                'nama' => $fullname,
                'logged_in' => TRUE,
                'login_ke' => $count,
                'level' => $level
            );
            // Our user exists, set session.
            $this->CI->session->set_userdata($newdata);
            // update counter login
            $this->CI->db->where('register', $id);
            $this->CI->db->update('user', array('login_counter' => $count));
            return TRUE;
        } else {
            // No existing user.
            return FALSE;
        }
    }


    function restrict($logged_out = FALSE) {
        if ($logged_out && is_logged_in()) {
            //echo $this->CI->fungsi->warning('Maaf, sepertinya Anda sudah login...', site_url());
            echo "2";
            die();
        }
        if (!$logged_out && !is_logged_in()) {
            redirect(base_url()); //tidak dapat mengakses, halaman di-redirect
            die();
        }
    }

    function logout() {
        $this->CI->session->sess_destroy();
        return TRUE;
    }

    function cek($id, $ret=false) {
        $menu = array(
            'manajemen_user' => '+2+',
            'view' => '+1+2+'
        );
        $allowed = explode('+', $menu[$id]);
        if (!in_array(from_session('level'), $allowed)) {
            if ($ret)
                return false;
            //echo $this->CI->fungsi->warning('Anda tidak diijinkan mengakses halaman ini.', site_url());
            redirect(base_url());
            die();
        }
        else {
            if ($ret)
                return true;
        }
    }
}