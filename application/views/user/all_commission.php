<style>
    #img-message {
        position: absolute;
        top: 88%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .panel-heading {
        /* background-color: black; */
        background-color: black !important;
        color: white !important;
    }

    .col-sm-12.ch, .col-sm-6.ch {
        text-align: center;
    }

    .centered {
        font-size: 30px;
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    img#image_upload_preview {
        width: 200px;
        height: 200px;
        /* width: 300px; */
    }

    .col-sm-6.ch {
        text-align: center;
    }

    input#inputFile {
        width: 200px;
        margin: 10px auto;
        border: 1px dotted yellowgreen;
        color: white;
        padding: 10px;
    }

    /*========*/
    .panel-body {
        background-color: #fafad23b;
    }

    label.radio-inline.ch {
        margin-right: 40px;
    }

    .form-group {
        border-bottom: 1px dotted yellowgreen;
    }
</style>

<h1 class="page-title"> All Commission </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('all_commission')">Page Refresh</a></h6>
<hr>
<?php //print_r($users); ?>
<!--=====================================-->
<div class="col-md-12">
<table id="example" >
    <thead>
    <tr>
        <th style="width: 8%">Id</th>
        <th>Name</th>
        <th>Commission</th>
        <th  > Already Paid </th>
        <th >Remaining </th>

        <th style="width:300px;">Action</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($users as $col) { ?>
      <?php if($col['user_role']!="admin") {?>
            <tr>
             <td><?php echo $col["user_id"];?></td>
                <td><a onclick="loadview('commission/<?php echo $col["user_id"];?>')"><?php echo $col['user_name'];?></a></td>
                <!--======================================================-->
                <?php
                $customer=$this->user_model->all_booking_by_sponser_id( $col['user_id']);
                $d_commission=0; foreach ($customer as $row){
                    $x=$this->user_model->associate_commission_m( $row['id'],$row['sponser_id']);
                    $d_commission += $x;
                }
                $i_commission= 0; $under_associate=$this->user_model->all_under_associate_by_sponser_id( $col['user_id']);
                $com=0;  foreach ($under_associate as $row){
                    $x = $this->user_model-> total_indirect_commission($row['user_id'],$row['user_role'],$col['user_role']);
                    $i_commission += $x;
                }
                $total = $d_commission + $i_commission;
                ?>
                <!--======================================================-->
             <td><?php echo $total; ?></td>
                <?php  $z= $this->user_model->total_commission_associate_id($col['user_id']) ?>
             <td><?php echo $z; ?></td>
                <?php $id=$col['user_id']; $r=$total-$z ; ?>
             <td><?php echo $r; ?></td>
             <td><?php if($r>0){ ?><a id="pay<?php echo $id; ?>" class="gold-bt" onclick="pay(<?php echo $id; ?>,<?php echo $r; ?>)">Pay</a> <?php }?></td>
            </tr>
            <?php }} ?>
    </tbody>
</table>
</div>
<!--=====================================-->



<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    function pay(id,com) {
        var x = '#pay'+id;
        $(x).hide();
        /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/pay_commission',
            data: {sponser_id:id,commission:com},
            datatype:"json",
            success: function(msg){

                $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Paid successfully. </span><div>");
               /* loadview('all_commission');*/
            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
        /*----------------------------------------------*/


    }
</script>


