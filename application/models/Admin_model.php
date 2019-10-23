<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    /*==================================================================*/
    /*                       DASHBOARD REPORT                          */
    /*==================================================================*/
    function all_business_associate(){
        $q=$this->db->get('users');
        return $q->num_rows()-1;
    }
    function total_plot(){
        $q=$this->db->get('plot');
        return $q->num_rows();
    }
    function total_sold_plot(){
        $q=$this->db->where('status',0);
        $q=$this->db->get('plot');
        return $q->num_rows();
    }
    function today_business(){
        $date=date('Y-m-d');
        $data= array('date' =>$date);
        $this->db->select_sum('stalment');
        $x= $this->db->get_where("plot_installment",$data)->row_array();
        return $x['stalment'];
    }
    function total_business(){
        $this->db->select_sum('stalment');
        $x= $this->db->get("plot_installment")->row_array();
        return $x['stalment'];
    }
    function today_sale(){
        $date=date('Y-m-d');
        $data= array('date' =>$date);
        $this->db->select_sum('total_price');
        $x= $this->db->get_where("book_plot",$data)->row_array();
        return $x['total_price'];
    }
    function total_sale(){
        $this->db->select_sum('total_price');
        $x= $this->db->get("book_plot")->row_array();
        return $x['total_price'];
    }


    /*==================================================================*/
    /*                             Sector                               */
    /*==================================================================*/
    function  list_sector(){
        $q=$this->db->get('sector');
        return $q->result_array();
    }
    function add_sector($sec_name){
        $data = array(
            'sec_id' =>"",
            'sec_name' => $sec_name,
            'Date' =>date('d-m-y')
        );
        $this->db->insert('sector',$data);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function  list_sector_byid($x){
        $data= array('sec_id'=>$x);
        $q=$this->db->get_where('sector',$data);
        return $q->row_array();
    }

    function update_sector($sec_id,$sec_name){
        $data = array( 'sec_name' => $sec_name );
        $this->db->where('sec_id',$sec_id);
        $this->db->update('sector',$data);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }

    /*==================================================================*/
    /*                             PLOT                                */
    /*==================================================================*/

    function add_plot($sr_no,$plot_no,$plot_size){
        $data = array(
            'plot_id'=>"",
            'sr_no'=>$sr_no,
            'plot_no'=>$plot_no,
            'plot_size'=>$plot_size,
            'date'=>date('d-m-y'),
            'status'=>1
        );
        $this->db->insert('plot',$data);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function update_plot($id,$area){
        $data=array('plot_size'=>$area);
        $this->db->where('plot_id',$id);
        $this->db->update('plot',$data);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function  list_plot($id){
        $data=array('sr_no'=>$id);
        $q=$this->db->get_where('plot',$data);
        return $q->result_array();
    }

    function  list_plot_byno($x,$y){
        $data=array('plot_no'=>$x,'sr_no'=>$y);
        $q=$this->db->get_where('plot',$data);
        return $q->row_array();
    }
    function  list_plot_byid($x){
        $data= array('plot_id'=>$x);
        $q=$this->db->get_where('plot',$data);
        return $q->row_array();
    }
    function  list_plot_sid($x){
        $data= array('sr_no'=>$x,'status'=>1);
        $this->db->select('plot_id');
        $this->db->select('plot_no');
        $q=$this->db->get_where('plot',$data);
        return $q->result_array();
    }
    function  list_plot_by_srid_plotno($sr_no,$plot_no){
        $data= array('plot_no'=>$plot_no,'sr_no'=>$sr_no);
        $q=$this->db->get_where('plot',$data);
        return $q->num_rows();
    }
    /*==================================================================*/
    /*                              USER ROLE                           */
    /*==================================================================*/
    function  list_user_role(){
        $q=$this->db->get('user_role');
        return $q->result_array();
    }
    function  list_user_role_by_id($id){
        $data= array('id'=>$id);
        $q=$this->db->get_where('user_role',$data);
        return $q->row_array();
    }
    function update_user_role($id,$name,$commission){
        $data=array('name'=>$name,'commission'=>$commission);
        $this->db->where('id',$id);
        $this->db->update('user_role',$data);
        if ($this->db->affected_rows() > 0)
        { return TRUE;} else{return FALSE;}
    }
    function list_promotion_role($role){
        $data=array('id<'=>$role);
        $this->db->order_by('id', 'DESC');
        $q=$this->db->get_where('user_role',$data);
        return $q->result_array();
    }
    function list_promotion_by_id($id){
        $data= array('user_id'=>$id);
        $q=$this->db->get_where('promotion',$data);
        return $q->result_array();
    }

    /*==================================================================*/
    /*                             ASSOCIATE                            */
    /*==================================================================*/
    function check_name($name){
        $data= array('user_name' =>$name);
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;
    }
    function check_login_id($name){
        $data= array('login_id' =>$name);
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;
    }
    function check_email($name){
        $data= array('user_email' =>$name);
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;
    }
    function check_mobile($name){
        $data= array('user_phone' =>$name);
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;
    }
    function user_role($sponser){
        if($sponser==1){$data= array('id>' =>0);}else{
            $x= $this->db->get_where('users',array('user_id'=>$sponser))->row_array();
            $y= $this->db->get_where('user_role',array('id'=>$x['user_role']))->row_array();
            $data= array('id>' =>$y['id']);
        }

        $z= $this->db->get_where('user_role',$data)->result_array();
        return $z;
    }
    function add_new_user($data){
        $data['year']=date('Y');
        $data['month']=date('m');
        $this->db->insert('users',$data);
        $s_id = $this->db->insert_id();
        $data2=array(
            'user_id'=>$s_id,
            'role'=>$data['user_role'],
            'date'=>date('Y-m-d'),
            'year'=>date('Y'),
            'month'=>date('m'),
        );
        $this->db->insert('promotion',$data2);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function add_promotion($id,$role){
        $data2=array(
            'user_id'=>$id,
            'role'=>$role,
            'date'=>date('Y-m-d'),
            'year'=>date('Y'),
            'month'=>date('m'),
        );
        $this->db->insert('promotion',$data2);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}


    }
    function update_role($id,$role){
        $this->db->where('user_id', $id);
        $data=array('user_role'=>$role);
        $this->db->update('users',$data);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function all_user(){
        $query = $this->db->get('users');
        return $query->result_array();
    }
    function all_user_date($year,$month){
        $data= array('month <='=>$month,'year'=>$year);
        $this->db->where($data);
        $this->db->or_where('year <', $year);
        $query = $this->db->get('users');
        return $query->result_array();
    }
    function user_by_id($id){
        $data= array('user_id' =>$id);
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;
    }
    function update_user($data){
        $this->db->where('user_id', $data['user_id']);
        unset($data['user_id']);
        $this->db->update('users',$data);
        if ($this->db->affected_rows() > 0)
        { return TRUE;} else{return FALSE;}
    }
    function update_profile_image($id,$img){
        $this->db->where('user_id', $id);
        $data=array('profile_image'=>$img);
        $this->db->update('users',$data);
        if ($this->db->affected_rows() > 0)
        { return TRUE;} else{return FALSE;}
    }
    function find_sponser($id){
        $data= array('user_id' =>$id);
        $x= $this->db->get_where("users",$data)->row_array();
        return $x;

    }
    function direct_business($s_id){
        $data= array('sponser_id' =>$s_id);
        $this->db->select_sum('stalment');
        $x= $this->db->get_where("plot_installment",$data)->row_array();
        return $x['stalment'];
    }
    function yearly_sale($year){
       /* $year= date('Y');*/
        $data= array('year' =>$year);
        $this->db->select_sum('stalment');
        $this->db->group_by("month");
        $x= $this->db->get_where("plot_installment",$data)->result_array();
        $z=array(); $k=1;$l=0;
        foreach ($x as $row){
            $m=$year."-".$k++;
            $z[$l]['y']=$m;
            $z[$l]['a']=$row['stalment']/100000;
            $l++;
        }
        return json_encode($z);

    }
    function monthaly_sale($year,$month){
       /* $month= date('m');*/
        $data= array('year' =>$year,'month' =>$month);
        $this->db->select('date');
        $this->db->select_sum('stalment');
        $this->db->group_by("date");
        $x= $this->db->get_where("plot_installment",$data)->result_array();
        $z=array(); $k=1;$l=0;
        foreach ($x as $row){

            $z[$l]['y']=$row['date'];
            $z[$l]['a']=$row['stalment']/100000;
            $l++;
        }
        return json_encode($z);

    }

    /*==================================================================*/
    /*                            PLOT BOOKING                          */
    /*==================================================================*/
    function book_plot($data){
        $booking_amt=$data['booking_price'];
        unset($data['booking_price']);
        /* add data to book plot*/
        $data['date']= date('Y-m-d');
        $data['month']= date('m');
        $data['year']= date('Y');
        $this->db->insert('book_plot',$data);
        $c_id = $this->db->insert_id();
        /* add booking ammount to plot_installment table*/
        $percent=$this->admin_model->list_user_role_by_id($data['sponser_role']);
        $per=$percent['commission'];
        $commission= ($booking_amt * $per )/100;
        $st_data= array(
            'cust_id'=>$c_id,
            'stalment'=>$booking_amt,
            'sponser_id'=>$data['sponser_id'],
            'sponser_role'=>$data['sponser_role'],
            'comm_percent'=>$per,
            'commission'=>$commission,
            'type'=>'b',
            'date'=> date('Y-m-d'),
            'year'=>  date('Y'),
            'month'=> date('m')
        );
        $this->db->insert('`plot_installment',$st_data);
        /* change plot status to booked */
        $data3= array('status'=>'0');
        $this->db->where('plot_id', $data['plot_id']);
        $this->db->update('plot',$data3);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function booking_amt($id){
        $data= array('cust_id'=>$id,'type'=>'b');
        $x=$this->db->get_where('plot_installment', $data)->row_array();
        return $x['stalment'];
    }

    function all_booking(){
        $query = $this->db->get('book_plot');
        return $query->result_array();
    }
    function all_booking_by_date($year,$month){
        $data= array('month <'=>$month,'year'=>$year);
        $this->db->where($data);
        $this->db->or_where('year <', $year);
        $query = $this->db->get('book_plot');
        return $query->result_array();
    }
    function booking_by_id($id=""){
        $data= array('id' =>$id);
        $x= $this->db->get_where("book_plot",$data)->row_array();
        return $x;
    }
    function update_booking($data){
        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('book_plot',$data);
        if ($this->db->affected_rows() > 0)
        { return TRUE;} else{return FALSE;}
    }
    /*==================================================================*/
    /*                           INSTALMENT                             */
    /*==================================================================*/
    function add_plot_installment($data){
        $this->db->insert('`plot_installment',$data);
    }
    function all_instalment($id){
        $data= array('cust_id'=>$id);
        $x=$this->db->get_where('plot_installment', $data)->result_array();
        return $x;
    }
    function all_instalment_bydate($id){
        $month = date('m');
        $data= array('cust_id'=>$id,'month'=>$month);
        $x=$this->db->get_where('plot_installment', $data)->num_rows();
        return $x;
    }
    function all_instalment_by_date($id,$month,$year){
        $data= array('cust_id'=>$id,'month'=>$month,'year'=>$year,);
        $x=$this->db->get_where('plot_installment', $data)->num_rows();
        return $x;
    }
    /*==================================================================*/
    /*                             REWARD                               */
    /*==================================================================*/
    function add_reward($data){
        $data['date']=date('Y-m-d');
        $data['year']=date('Y');
        $data['month']=date('m');
        $this->db->insert('reward',$data);
        if ($this->db->affected_rows() > 0)
        {return TRUE;}else{return FALSE;}
    }
    function reward_by_sponser_id($id){
        $data= array('sponser_id'=>$id);
        $x=$this->db->get_where('reward', $data)->result_array();
        return $x;
    }
    function reward_sum_by_sponser_id($id){
        $data= array('sponser_id'=>$id);
        $this->db->select_sum('amount');
        $x=$this->db->get_where('reward', $data)->row_array();
        return $x['amount'];
    }

    /*==================================================================*/
    /*                           COMMISSION                             */
    /*==================================================================*/
    function all_booking_by_sponser_id($id){
        $data= array('sponser_id' =>$id);
        $x= $this->db->get_where("book_plot",$data)->result_array();
        return $x;
    }
    function all_under_associate_by_sponser_id($id){
        $data= array('sponser_id' =>$id);
        $x= $this->db->get_where("users",$data)->result_array();
        return $x;
    }
    function count_sponser($id){
        $data= array('sponser_id' =>$id);
        $x= $this->db->get_where("users",$data)->num_rows();
        return $x;
    }
    function all_under_associate_by_sponser_id_and_his_role($id,$role){
        $data= array('sponser_id' =>$id,'user_role'=>$role);
        $x= $this->db->get_where("users",$data)->result_array();
        return $x;
    }
    function associate_commission_m($id,$s_id){
        $data= array('cust_id'=>$id,'sponser_id' =>$s_id);
        $this->db->select_sum('commission');
        $x= $this->db->get_where("plot_installment",$data)->row_array();
        return $x['commission'];
    }
    /*-------------------------------------------------------------------*/
    function add_commission($data){
        $this->db->insert('`user_commission',$data);
    }
    function all_commission($id){
        $data= array('sponser_id'=>$id);
        $x=$this->db->get_where('user_commission', $data)->result_array();
        return $x;
    }
    function total_commission_associate_id($s_id){
        $data= array('sponser_id' =>$s_id);
        $this->db->select_sum('commission');
        $x= $this->db->get_where("user_commission",$data)->row_array();
        return $x['commission'];
    }
    function all_commission_by_id_date($id,$month,$year){
        $data= array('sponser_id'=>$id,'year'=>$year,'month'=>$month);
        $x=$this->db->get_where('user_commission', $data)->row_array();
        return $x;
    }
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*==================================================================*/
    /*                 BUSINESS ASSOCIATE COMMISSION                    */
    /*==================================================================*/
    function direct_commission($id){
        $customer=$this->admin_model->all_booking_by_sponser_id( $id);
        $total_direct_commission=0;
        foreach ($customer as $row){
            $x=$this->admin_model->associate_commission_m( $row['id'],$row['sponser_id']);
            $total_direct_commission += $x;
        }
        return $total_direct_commission;
    }
    /*============================================================================================================*/
    function associate_commission($id){
        $commission=$this->direct_commission($id);
        return $commission;
    }
    /*============================================================================================================*/
    function bdm_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total_associate_commission = ($total_associate_commission * 3)/7;
        $total = $direct_comm + $total_associate_commission;
        return round($total);
    }
    /*============================================================================================================*/
    function asm_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From Bdm==============*/
        $under_bdm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,7);
        $total_bdm_commission = 0;
        foreach ( $under_bdm as $row) {
            $total_bdm_commission += $this->admin_model->bdm_commission($row['user_id']);
        }
        $total_bdm_commission =  ($total_bdm_commission * 1) / 5 ;
        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total=$direct_comm + $total_associate_commission + $total_bdm_commission;
        return round($total);
    }
    /*============================================================================================================*/
    function ap_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From Asm==============*/
        $under_asm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,6);
        $total_asm_commission = 0;
        foreach ( $under_asm as $row) {
            $total_asm_commission += $this->admin_model->asm_commission($row['user_id']);
        }
        $total_asm_commission =  $total_asm_commission /6;
        /*=============Indirect Commission From Bdm==============*/
        $under_bdm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,7);
        $total_bdm_commission = 0;
        foreach ( $under_bdm as $row) {
            $total_bdm_commission += $this->admin_model->bdm_commission($row['user_id']);
        }
        $total_bdm_commission = ($total_bdm_commission * 2)/5;
        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total_associate_commission = ($total_associate_commission * 4 )/ 3;
        $total=$direct_comm + $total_associate_commission + $total_bdm_commission +  $total_asm_commission ;
        return round($total);
    }
    /*============================================================================================================*/
    function bp_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From Ap==============*/
        $under_ap=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,5);
        $total_ap_commission = 0;
        foreach ( $under_ap as $row) {
            $total_ap_commission += $this->admin_model->ap_commission($row['user_id']);
        }
        $total_ap_commission = ($total_ap_commission * 1 )/7;
        /*=============Indirect Commission From Asm==============*/
        $under_asm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,6);
        $total_asm_commission = 0;
        foreach ( $under_asm as $row) {
            $total_asm_commission += $this->admin_model->asm_commission($row['user_id']);
        }
        $total_asm_commission = ($total_asm_commission *1)/3;
        /*=============Indirect Commission From Bdm==============*/
        $under_bdm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,7);
        $total_bdm_commission = 0;
        foreach ( $under_bdm as $row) {
            $total_bdm_commission += $this->admin_model->bdm_commission($row['user_id']);
        }
        $total_bdm_commission = ($total_bdm_commission * 3)/5;
        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total_associate_commission = ($total_associate_commission * 5 )/ 3;
        $total=$direct_comm + $total_associate_commission + $total_bdm_commission +  $total_asm_commission + $total_ap_commission ;
        return round($total);
    }
    /*============================================================================================================*/
    function vp_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From Bp==============*/
        $under_bp=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,4);
        $total_bp_commission = 0;
        foreach ( $under_bp as $row) {
            $total_bp_commission += $this->admin_model->bp_commission($row['user_id']);
        }
        $total_bp_commission = ($total_bp_commission * 1 )/8;

        /*=============Indirect Commission From Ap==============*/
        $under_ap=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,5);
        $total_ap_commission = 0;
        foreach ( $under_ap as $row) {
            $total_ap_commission += $this->admin_model->ap_commission($row['user_id']);
        }
        $total_ap_commission = ($total_ap_commission * 2 )/7;
        /*=============Indirect Commission From Asm==============*/
        $under_asm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,6);
        $total_asm_commission = 0;
        foreach ( $under_asm as $row) {
            $total_asm_commission += $this->admin_model->asm_commission($row['user_id']);
        }
        $total_asm_commission = ($total_asm_commission *1)/2;
        /*=============Indirect Commission From Bdm==============*/
        $under_bdm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,7);
        $total_bdm_commission = 0;
        foreach ( $under_bdm as $row) {
            $total_bdm_commission += $this->admin_model->bdm_commission($row['user_id']);
        }
        $total_bdm_commission = ($total_bdm_commission * 4)/5;
        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total_associate_commission = ($total_associate_commission * 2);
        $total=$direct_comm + $total_associate_commission + $total_bdm_commission +  $total_asm_commission + $total_ap_commission + $total_bp_commission ;
        return round($total);
    }

    /*============================================================================================================*/
    function dd_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From Bp==============*/
        $under_vp=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,3);
        $total_vp_commission = 0;
        foreach ( $under_vp as $row) {
            $total_vp_commission += $this->admin_model->vp_commission($row['user_id']);
        }
        $total_vp_commission = ($total_vp_commission * 1 )/18;
        /*=============Indirect Commission From Bp==============*/
        $under_bp=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,4);
        $total_bp_commission = 0;
        foreach ( $under_bp as $row) {
            $total_bp_commission += $this->admin_model->bp_commission($row['user_id']);
        }
        $total_bp_commission = ($total_bp_commission * 3 )/16;

        /*=============Indirect Commission From Ap==============*/
        $under_ap=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,5);
        $total_ap_commission = 0;
        foreach ( $under_ap as $row) {
            $total_ap_commission += $this->admin_model->ap_commission($row['user_id']);
        }
        $total_ap_commission = ($total_ap_commission * 5 )/14 ;
        /*=============Indirect Commission From Asm==============*/
        $under_asm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,6);
        $total_asm_commission = 0;
        foreach ( $under_asm as $row) {
            $total_asm_commission += $this->admin_model->asm_commission($row['user_id']);
        }
        $total_asm_commission = ($total_asm_commission *7)/12;
        /*=============Indirect Commission From Bdm==============*/
        $under_bdm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,7);
        $total_bdm_commission = 0;
        foreach ( $under_bdm as $row) {
            $total_bdm_commission += $this->admin_model->bdm_commission($row['user_id']);
        }
        $total_bdm_commission = ($total_bdm_commission * 9)/10;
        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total_associate_commission = ($total_associate_commission * 13)/6;
        $total=$direct_comm + $total_associate_commission + $total_bdm_commission +  $total_asm_commission + $total_ap_commission + $total_bp_commission + $total_vp_commission;
        return round($total);
    }
    /*============================================================================================================*/
    function director_commission($id){
        /*==========Direct Commission==============*/
        $direct_comm=$this->direct_commission($id);
        /*=============Indirect Commission From DD==============*/
        $under_dd=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,3);
        $total_dd_commission = 0;
        foreach ( $under_dd as $row) {
           $total_dd_commission += $this->admin_model->dd_commission($row['user_id']);
        }
        $total_dd_commission = ($total_dd_commission )/19;

        /*=============Indirect Commission From Bp==============*/
        $under_vp=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,3);
        $total_vp_commission = 0;
        foreach ( $under_vp as $row) {
            $total_vp_commission += $this->admin_model->vp_commission($row['user_id']);
        }
        $total_vp_commission = ($total_vp_commission * 1 )/9;
        /*=============Indirect Commission From Bp==============*/
        $under_bp=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,4);
        $total_bp_commission = 0;
        foreach ( $under_bp as $row) {
            $total_bp_commission += $this->admin_model->bp_commission($row['user_id']);
        }
        $total_bp_commission = ($total_bp_commission * 2 )/8;

        /*=============Indirect Commission From Ap==============*/
        $under_ap=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,5);
        $total_ap_commission = 0;
        foreach ( $under_ap as $row) {
            $total_ap_commission += $this->admin_model->ap_commission($row['user_id']);
        }
        $total_ap_commission = ($total_ap_commission * 3 )/7 ;
        /*=============Indirect Commission From Asm==============*/
        $under_asm=$this->admin_model->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,6);
        $total_asm_commission = 0;
        foreach ( $under_asm as $row) {
            $total_asm_commission += $this->admin_model->asm_commission($row['user_id']);
        }
        $total_asm_commission = ($total_asm_commission * 2)/3;
        /*=============Indirect Commission From Bdm==============*/
        $under_bdm=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,7);
        $total_bdm_commission = 0;
        foreach ( $under_bdm as $row) {
            $total_bdm_commission += $this->admin_model->bdm_commission($row['user_id']);
        }

        /*=============Indirect Commission From Associate==============*/
        $under_associate=$this->admin_model->all_under_associate_by_sponser_id_and_his_role( $id,8);
        $total_associate_commission=0;
        foreach ($under_associate as $row) {
            $total_associate_commission += $this->admin_model->associate_commission($row['user_id']);
        }
        $total_associate_commission = ($total_associate_commission * 7)/3;
        $total=$direct_comm + $total_associate_commission + $total_bdm_commission +  $total_asm_commission + $total_ap_commission + $total_bp_commission + $total_vp_commission + $total_dd_commission;
        return round($total);
    }
    function total_commission($id,$role){
        $com=0;
        if( $role==1){$com = $this->admin_model->director_commission($id);}
        if( $role==2){$com = $this->admin_model->dd_commission($id);}
        if( $role==3){$com = $this->admin_model->vp_commission($id);}
        if( $role==4){$com = $this->admin_model->bp_commission($id);}
        if( $role==5){$com = $this->admin_model->ap_commission($id);}
        if( $role==6){$com = $this->admin_model->asm_commission($id);}
        if( $role==7){$com = $this->admin_model->bdm_commission($id);}
        if( $role==8){$com = $this->admin_model->associate_commission($id);}
        return round($com);
    }
    function total_indirect_commission($user_id,$user_role,$sponser_role){
        $com=0;
       
        if( $sponser_role==1 && $user_role==2){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/19;}
        if( $sponser_role==1 && $user_role==3){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/9;}
        if( $sponser_role==1 && $user_role==4){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 2)/8;}
        if( $sponser_role==1 && $user_role==5){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 3)/7;}
        if( $sponser_role==1 && $user_role==6){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 2)/3;}
        if( $sponser_role==1 && $user_role==7){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1);}
        if( $sponser_role==1 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 7)/3;}

        if( $sponser_role==2 && $user_role==3){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/18;}
        if( $sponser_role==2 && $user_role==4){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 3)/16;}
        if( $sponser_role==2 && $user_role==5){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 5)/14;}
        if( $sponser_role==2 && $user_role==6){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 7)/12;}
        if( $sponser_role==2 && $user_role==7){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 9)/10;}
        if( $sponser_role==2 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 13)/6;}

        if( $sponser_role==3 && $user_role==4){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/8;}
        if( $sponser_role==3 && $user_role==5){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 2)/7;}
        if( $sponser_role==3 && $user_role==6){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/2;}
        if( $sponser_role==3 && $user_role==7){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 4)/5;}
        if( $sponser_role==3 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 2);}

        if( $sponser_role==4 && $user_role==5){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/7;}
        if( $sponser_role==4 && $user_role==6){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/3;}
        if( $sponser_role==4 && $user_role==7){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 3)/5;}
        if( $sponser_role==4 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 5)/3;}


        if( $sponser_role==5 && $user_role==6){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/6;}
        if( $sponser_role==5 && $user_role==7){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 2)/5;}
        if( $sponser_role==5 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 4)/3;}

        if( $sponser_role==6 && $user_role==7){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1)/5;}
        if( $sponser_role==6 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 1) ;}

        if( $sponser_role==7 && $user_role==8){$com = $this->admin_model->total_commission($user_id,$user_role); $com= ($com * 2)/6;}  
   
        return round($com);
    }


}