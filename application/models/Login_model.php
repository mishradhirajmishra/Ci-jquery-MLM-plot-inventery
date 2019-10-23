<?php

if (!defined('BASEPATH'))
    exit('Ohhh... This is Cheating you are not suppose to do this.Cheater :)');
class Login_model extends CI_Model {
    function validate_login($user, $password){
        $data= array('login_id' =>$user,'password' =>$password,'status' => 1 );
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;
    }

}