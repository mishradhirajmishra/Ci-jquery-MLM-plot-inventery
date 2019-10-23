<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->library('session');
        $this->load->helper('sendsms_helper');
    }

    public function index()
    {
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $this->load->view('user/header');
        $this->load->view('user/sidebar');
        $this->load->view('user/container');
        $this->load->view('user/container');
        $this->load->view('user/footer');
    }
    /*==================================================================*/
    /*                             PROFILE                              */
    /*==================================================================*/
    function profile_detail($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['user']=$this->user_model-> user_by_id($id);
        $this->load->view('user/profile_detail',$data);
    }
    function profile()
    {
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['profile_image'] = $this->user_model->user_by_id($_SESSION ['user_id']);
        $this->load->view('user/profile');
    }
    function upload_profile_image()
    {
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $this->load->library('image_lib');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $upload_data = $this->upload->data();
        $image_name = $upload_data['file_name'];
        $new_image_name = $upload_data['raw_name']. '_thumb' .$upload_data['file_ext'];
        $id= $_SESSION ['user_id'];

        if ($new_image_name) {
            $this->user_model->update_profile_image($id, $new_image_name);
            $this->session->set_userdata('profile_image',$new_image_name);
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['width'] = 300;
            $config['height'] = 300;
            $config['x_axis'] = ($upload_data['image_width']/2-150);
            $config['y_axis'] = ($upload_data['image_height']/2-150);
            $config['maintain_ratio'] = FALSE;
            $config['source_image'] = './uploads/' . $image_name;
            $config['create_thumb'] = TRUE;
            $this->image_lib->initialize($config);
            $this->image_lib->crop();
        }
        $source="uploads/$image_name"; /* Delete Original image after crop*/
        unlink ($source);
    }
    public function dashboard($x='')
    {
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        if($x==''){$x=date('Y-m');}
        $data['date']=$x;
        $year=substr($x,0,4);
        $month=substr($x,5,2);
        $data['sale']=$this->user_model->yearly_sale($year);
        $data['sale_m']=$this->user_model->monthaly_sale($year,$month);
        $monthNum  = $month;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $data['month'] = $dateObj->format('F');
        $data['year']=$year;
        $this->load->view('user/dashboard',$data);
    }
    public function report($x='')
    {
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        if($x==''){$x=date('Y-m');}
        $data['date']=$x;
        $year=substr($x,0,4);
        $month=substr($x,5,2);
        $data['sale']=$this->user_model->yearly_sale($year);
        $data['sale_m']=$this->user_model->monthaly_sale($year,$month);
        $monthNum  = $month;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $data['month'] = $dateObj->format('F');
        $data['year']=$year;
        $this->load->view('user/report',$data);
    }
    public  function test(){
        $this->load->view('user/chart');
    }
    /*==================================================================*/
    /*                             Sector                               */
    /*==================================================================*/
    function block(){
        {
            if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
            $data['all_sec']=$this->user_model->list_sector();
            $this->load->view('user/block',$data);
        }

    }
    function add_block(){
        $sec_name = $this->input->post('sec_name');
        $x = $this->user_model->add_sector($sec_name);
        print_r($x);
    }
    function edit_block($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['block']=$this->user_model->list_sector_byid($id);
        $this->load->view('user/edit_block',$data);

    }
    function update_block(){
        $sec_id = $this->input->post('sec_id');
        $sec_name = $this->input->post('sec_name');
        $x = $this->user_model->update_sector($sec_id,$sec_name);
        print_r($x);

    }
    /*==================================================================*/
    /*                              PLOT                                */
    /*==================================================================*/
    function plot(){
        {
            if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
            $data['block']=$this->user_model->list_sector();
            $this->load->view('user/plot',$data);
        }
    }
    function add_plot(){
        $sr_no = $this->input->post('sr_no');
        $plot_no = $this->input->post('plot_no');
        $plot_size= $this->input->post('plot_size');
        $x=$this->user_model->add_plot($sr_no,$plot_no,$plot_size);
        print_r($x);
    }
    function all_plot($id=''){
        $data['plot1']=$this->user_model->list_plot($id);
        $this->load->view('user/all_plot',$data);
    }
    function edit_plot($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['plot']=$this->user_model->list_plot_byid($id);
        $data['block']=$this->user_model->list_sector();
        $this->load->view('user/edit_plot',$data);
    }
    function update_plot(){
        $plot_id= $this->input->post('plot_id');
        $plot_size= $this->input->post('plot_size');
        $x=$this->user_model->update_plot( $plot_id,$plot_size);
        print_r( $x);
    }
    function check_plot_exist(){
        $sr_no= $this->input->post('sr_no');
        $plot_no= $this->input->post('plot_no');
        $x=$this->user_model->list_plot_by_srid_plotno($sr_no,$plot_no);
        print_r($x);
    }

    function list_plot_sec()
    {
        $x=$this->input->post('id');
        $d = $this->user_model->list_plot_sid($x);
        foreach ($d as $row) {
            echo '<option value="' . $row["plot_id"] . '">' . $row["plot_no"] . '</option>';
        }
    }
    function plot_size($x=""){
        $plot = $this->user_model->list_plot_byid($x);
        echo ( $plot['plot_size']);
    }

    /*==================================================================*/
    /*                        BUSINESS ASSOCIATE                        */
    /*==================================================================*/
    function associate(){
        {
            if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
            /*$data['sec']=$this->user_model->list_sector();*/
            $this->load->view('user/new_user');
        }
    }
    function edit_associate($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['user']=$this->user_model-> user_by_id($id);
        $this->load->view('user/edit_user',$data);
    }
    function print_associate($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['user']=$this->user_model-> user_by_id($id);
        $this->load->view('user/print_user',$data);
    }
    function update_associate(){
        $data=$this->input->post();
        $x=$this->user_model->update_user($data);
        print_r($x);
    }
    function all_associate(){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['users']=$this->user_model->all_user_by_sponser_id();
        $this->load->view('user/all_user',$data);
    }
    function add_new_associate(){
        $data=$this->input->post();
        $role=$this->user_model->add_new_user($data);
        print_r($role);
    }
    function check_name(){
        $name= $this->input->post('name');
        $x=$this->user_model->check_name($name);
        print_r($x);
    }
    function check_login_id(){
        $name= $this->input->post('login_id');
        $x=$this->user_model->check_login_id($name);
        print_r($x);
    }
    function check_email(){
        $name= $this->input->post('name');
        $x=$this->user_model->check_email($name);
        print_r($x);
    }
    function commission($id=''){
        $data['sponser'] = $this->user_model->user_by_id($id);

        $this->load->view('user/commission',$data);
    }

    function achievement(){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['users']=$this->user_model->all_user();
        $this->load->view('user/achievement',$data);
    }

    /*==================================================================*/
    /*                                ROLE                              */
    /*==================================================================*/
    function role(){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['role'] = $this->user_model->list_user_role();
        $this->load->view('user/role',$data);
    }
    function edit_role($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['role']=$this->user_model->list_user_role_by_id($id);
        $this->load->view('user/edit_role',$data);

    }
    function update_role(){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $commission=$this->input->post('commission');
        $x=$this->user_model->update_user_role($id,$name,$commission);
        print_r($x);
    }
    function user_role(){
        $sponser=$this->input->post('id');
        $role=$this->user_model->user_role($sponser);
        foreach ($role as $row) { 
          if($row["id"] >5){
             echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
             }
        }
    }
    function add_promotion(){
        $user_id=$this->input->post('user_id');
        $user_role=$this->input->post('user_role');
        $this->user_model->add_promotion($user_id,$user_role);
        $x=$this->user_model->update_role($user_id,$user_role);
        print_r($x);
    }
    /*==================================================================*/
    /*                         PLOT  BOOKING                            */
    /*==================================================================*/
    function book_plot(){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['sec']=$this->user_model->list_sector();
        $this->load->view('user/book_plot',$data);
    }
    function sponser_detail(){
        $id=$this->input->post('id');

        $data=$this->user_model->user_by_id($id);
        if($data) {
            $x=$this->user_model->list_user_role_by_id($data['user_role']);
            echo '<div class="form-group"><input type="hidden" name="sponser_role" value="'.$data["user_role"].'">';
            echo '<label class="col-xs-4">Sponser Name :</label>';
            echo '<label class="col-xs-3" style="color: red">' . $data["user_name"] . '</label>';
            echo '<label class="col-xs-2">Possition :</label>';
            echo '<label class="col-xs-3" style="color: red">' . $x["name"] . '</label></div>';
        }else{
            echo '<div class="form-group"><label class="col-xs-4 col-xs-offset-4" style="color: red">No record found </label></div>';
        }
        //print_r($data);
    }
    function sponser_detail_for_sponser(){
        $id=$this->input->post('id');

        $data=$this->user_model->user_by_id($id);
        if($data) {
            $x=$this->user_model->list_user_role_by_id($data['user_role']);
            echo '<div class="form-group">';
            echo '<label class="col-xs-4">Sponser Name :</label>';
            echo '<label class="col-xs-3" style="color: red">' . $data["user_name"] . '</label>';
            echo '<label class="col-xs-2">Possition :</label>';
            echo '<label class="col-xs-3" style="color: red">' . $x["name"] . '</label></div>';
        }else{
            echo '<div class="form-group"><label class="col-xs-4 col-xs-offset-4" style="color: red">No record found </label></div>';
        }
        //print_r($data);
    }
    function book_new_plot(){
        $data=$this->input->post();
        $x=$this->user_model->book_plot($data);
        print_r($x);
    }
    function update_plot_booking(){
        $data=$this->input->post();
        $x=$this->user_model->update_booking($data);
        print_r($x);
    }
    function all_plot_booking(){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['booking']=$this->user_model->all_booking();
        $this->load->view('user/all_plot_booking',$data);
    }
    function edit_booking($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['sec']=$this->user_model->list_sector();
        $data['booking']=$this->user_model->booking_by_id($id);
        $this->load->view('user/edit_book_plot',$data);
    }
    function print_booking($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['booking']=$this->user_model->booking_by_id($id);
        $this->load->view('user/print_booking',$data);
    }
    function instalment($id=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['sec']=$this->user_model->list_sector();
        $data['booking']=$this->user_model->booking_by_id($id);
        $data['booking_amt']=$this->user_model->booking_amt($id);
        $data['all_intalment']=$this->user_model->all_instalment($id);
        $this->load->view('user/instalment',$data);
    }
    function pay_installment(){
        $data=$this->input->post();
        $percent=$this->user_model->list_user_role_by_id($data['sponser_role']);
        $per=$percent['commission'];
        $commission= ($data['stalment'] * $per )/100;
        $data['comm_percent']=$per;
        $data['commission']=$commission;
        $data['type']='s';
        $data['date']=date('Y-m-d');
        $data['year']=date('Y');
        $data['month']=date('m');
        $x=$this->user_model->add_plot_installment($data);
        print_r($x);
    }

    function pay_commission(){
        $data=$this->input->post();
        $data['date']=date('Y-m-d');
        $data['year']=date('Y');
        $data['month']=date('m');
        $x=$this->user_model->add_commission($data);
        print_r($x);
    }
    function all_commission(){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['users']=$this->user_model->all_user();
        $this->load->view('user/all_commission',$data);
    }

    function all_instalment($x=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        if($x==''){$x=date('Y-m');}
        $data['date']=$x;
        $year=substr($x,0,4);
        $month=substr($x,5,2);
        $data['month']=$month;
        $data['year']=$year;
        $data['booking']=$this->user_model->all_booking_by_date($year,$month);
        $this->load->view('user/all_instalment',$data);
        print($month);
        print($year);
    }
    function all_commission_history($x=''){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        if($x==''){$x=date('Y-m');}
        $data['date']=$x;
        $year=substr($x,0,4);
        $month=substr($x,5,2);
        $data['month']=$month;
        $data['year']=$year;
        $data['users']=$this->user_model->all_user_date($year,$month);
        $this->load->view('user/all_commission_history',$data);
    }
    function notify_not_paid_installment(){
        $data=$this->input->post();
        print_r($data);
    }

    /*==================================================================*/
    /*                         GENOLOGY                            */
    /*==================================================================*/

    function genealogy($id=2){
        if ($_SESSION["user_role"] != 'user') redirect(base_url() . "login", 'refresh');
        $data['sponser']=$this->user_model->find_sponser($id);
        $this->load->view('user/genealogy',$data);
    }
    function ttt($year,$month){
        $x=$this->user_model->monthaly_sale($year,$month);
        print_r($x);
    }
    /*==================================================================*/
    /*                             REWARD                               */
    /*==================================================================*/
    function pay_reward(){
        $data=$this->input->post();
        $x=$this->user_model->add_reward($data);
        print_r($x);
    }
    function reward_history($id=''){
        $data['sponser'] = $this->user_model->user_by_id($id);
        $data['reward'] = $this->user_model->reward_by_sponser_id($id);

        $this->load->view('user/reward_history',$data);
    }
    function promotiom_history($id=''){
        $data['sponser'] = $this->user_model->user_by_id($id);
        $data['reward'] = $this->user_model->reward_by_sponser_id($id);
        $data['reward_history'] = $this->user_model->list_promotion_by_id($id);

        $this->load->view('user/promotiom_history',$data);
    }

}
