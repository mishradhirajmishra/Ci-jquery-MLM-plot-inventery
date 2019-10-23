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

<h1 class="page-title"> Commission </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('commission/<?php echo $sponser['user_id'];?>')">Page Refresh</a></h6>
<hr>
<!--=====================================-->
<?php //print_r($sponser); ?>
<div class="guardian">
    <div class="col-sm-10 col-sm-offset-1">
       <!-- <div id="subsmsg"></div>-->
        <!--============================-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Associate Detail
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <tr><th>Id</th><td><?php echo $sponser['user_id'] ?></tr>
                    <tr><th>Name</th><td><?php echo $sponser['user_name'] ?></td></tr>
                    <tr><th>Possition</th><td><?php $x=$this->user_model->list_user_role_by_id($sponser['user_role']); echo $x['name'];?></td></tr>

                </table>

            </div>


        </div>
        <!--============================-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Direct Commission
                </div>
            </div>
            <div class="panel-body">
                <?php $customer=$this->user_model->all_booking_by_sponser_id( $sponser['user_id']); ?>
                <table class="table table-responsive">
                    <tr><th>Customer Name</th><th>Sponser Id</th><th>Commission Made</th></tr>
                    <?php $total_direct_commission=0; foreach ($customer as $row){  //print_r($row)?>

                        <tr><td><?php echo $row['user_name']; ?></td><td><?php echo $row['sponser_id']; ?></td><td>
                                <?php $x=$this->user_model->associate_commission_m( $row['id'],$row['sponser_id']); echo $x; $total_direct_commission += $x; ?>
                            </td></tr>
                    <?php } ?>
                    <tr><th colspan="2">Total Direct Commission</th><td><?php echo $total_direct_commission;?></td></tr>
                </table>
            </div>

            <!--end panal body-->
        </div>
        <!--============================-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Indirect Commission
                </div>
            </div>
            <div class="panel-body"> <?php $total_ind= 0;?>
                <?php $under_associate=$this->user_model->all_under_associate_by_sponser_id( $sponser['user_id']); ?>
                <table class="table table-responsive">
                    <tr><th>Under Associate Name</th><th>Commission Made</th><th>Possition</th> <th>Indirect Commission</th></tr>

                    <?php $com=0;  foreach ($under_associate as $row){  //print_r($row)?>
                    <tr><td><?php echo $row['user_name'];?></td>

                        <td>
                            <?php  $x = $this->user_model-> total_commission($row['user_id'],$row['user_role']);
                          echo $x;?>

                        </td>
                        <td><?php $x=$this->user_model->list_user_role_by_id($row['user_role']); echo $x['name'];?></td>

                        <td>
                            <!--=================================================-->
                            <?php  $x = $this->user_model-> total_indirect_commission($row['user_id'],$row['user_role'],$sponser['user_role']);
                            $total_ind += $x;  echo $x;?>
                            <!--=================================================-->
                        </td>
                    </tr>
                    <?php } ?>
                    <tr><th colspan="3">Total Indirect Commission</th><td><?php echo $total_ind ;?></td></tr>
                </table>
            </div>
        </div>


            <!--=============+++++++++++++++++++++++++++++++++++++===============-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Commission Payment history
                </div>
            </div>
            <div class="panel-body">
                <?php  $commis = $this->user_model->all_commission($sponser['user_id']);?>
                <table class="table table-responsive" >
                    <tr><th>Date</th><th>Ammount</th></tr>

                    <?php $t_com=0;  foreach ($commis as $row){ ?>
                        <tr>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['commission']; $t_com +=$row['commission']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr><th >Total Paid Commission</th><td><?php echo $t_com ;?></td></tr>
                </table>
            </div>
        </div>
            <!--=============+++++++++++++++++++++++++++++++++++++===============-->

            <!--============================-->
            <div class="panel panel-success" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="entypo-plus-circled"></i>
                        Total Commission
                    </div>
                </div>
                <div class="panel-body">
                    <?php $customer=$this->user_model->all_booking_by_sponser_id( $sponser['user_id']); ?>
                    <table class="table table-responsive">
                        <tr><th>Direct Commission</th><td style="text-align: center"><?php echo $total_direct_commission ;?></td></tr>
                        <tr><th>Indirect Commission</th><td style="text-align: center"><?php echo $total_ind ;?></td></tr>

                        <tr><th>Total Commission</th><td style="text-align: center"><?php  $total = $total_direct_commission + $total_ind; echo $total; ?></td></tr>
                        <tr><th>Already Paid Commission</th><td style="text-align: center"><?php echo $t_com;?></td></tr>
                        <tr><th>Remaining  Commission</th><td style="text-align: center"><?php  $rem=$total-$t_com; echo $rem;?></td></tr>
                    </table>
                </div>

                <!--end panal body-->
            <!--============================-->

            <!--end panal body-->
        </div>

    </div>



</div>
<!--to form submit upload image-->

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


