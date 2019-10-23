
<?php 
$customer=$this->user_model->all_booking_by_sponser_id( $sponser['user_id']);
 $d_commission=0; foreach ($customer as $row){ 
 $x=$this->user_model->associate_commission_m( $row['id'],$row['sponser_id']);
 $d_commission += $x;
}
 $i_commission= 0; $under_associate=$this->user_model->all_under_associate_by_sponser_id( $sponser['user_id']);
$com=0;  foreach ($under_associate as $row){
$x = $this->user_model-> total_indirect_commission($row['user_id'],$row['user_role'],$sponser['user_role']);
$i_commission += $x;
}
$total = $d_commission + $i_commission;
?>
