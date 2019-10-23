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

<h1 class="page-title"> All Associate </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('all_associate')">Page Refresh</a></h6>
<hr>
<?php //print_r($users); ?>
<!--=====================================-->
<div class="col-md-12">
<table id="example" >
    <thead>
    <tr>
        <th  style="width: 8%">User Id</th>
        <th>Name</th>
        <th>Position</th>
        <th  >
            Status
        </th>
        <th >Joinign Date</th>

        <th style="width:300px;">Action</th>
    </tr>
    </thead>

    <tbody>
    <?php $i=1;foreach ($users as $row) { ?>
      <?php if($row['user_role']!="admin") {?>
            <tr>
                <td  style="width: 8%">
                    <a href="#"><?php echo $row['user_id'];?></a>
                </td>
                <td><a href="<?php echo base_url().'index.php/admin/user_information/'.$row['user_id'];?>" ><?php echo $row['user_name'];?></a></td>
                <td ><?php  $x=$this->user_model->list_user_role_by_id($row['user_role']); echo $x['name'];?></td>
                <!-- <td><?php echo $row['user_email'];?></td> -->
                <td >

                    <?php if( $row['status']==1){?>
                        <span class="label label-sm btn-green">Active</span>
                    <?php } else {?>
                        <span class="label label-sm btn-red">In Active</span>
                    <?php }?>

                </td>
                <td >
                    <span class="label label-sm btn-green"><?php echo $row['date'];?></span>
                </td>
                <td>
                    <!--=======================================-->

                    <div class="btn-group">
                        <button type="button" class="btn btn-green dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-left" role="menu">
                           <!-- <li><a   onclick="loadview('edit_associate/<?php /*echo $row["user_id"];*/?>')"><i class="entypo-pencil"></i> Edit </a> </li>-->
                            <li><a   onclick="loadview('commission/<?php echo $row["user_id"];?>')"><i class="entypo-pencil"></i>Commission </a> </li>
                        <!--    <li><a   onclick="loadview('print_associate/<?php /*echo $row["user_id"];*/?>')"><i class="entypo-print"></i> Print </a> </li>-->
                            <li><a   onclick="loadview('reward_history/<?php echo $row["user_id"];?>')"><i class="entypo-print"></i> Reward </a> </li>
                            <li><a   onclick="loadview('promotiom_history/<?php echo $row["user_id"];?>')"><i class="entypo-print"></i> Promotion </a> </li>
                            <li><a  data-toggle="modal" data-target="#myModal<?php echo $row['user_id'] ?>"><i class="entypo-newspaper"></i> Detail</a>
                            </li>
                        </ul>
                    </div>
                    <!--=======================================-->
                    <!-----------------MODEL FOR DISPLAY DETAIL------------------->


                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['user_id'] ?>" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">Detail</h2>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive">
                                        <tr><th>Id</th><td><?php echo $row['user_id'] ?></tr>
                                        <tr><th>Name</th><td><?php echo $row['user_name'] ?></td></tr>

                                        <tr><th>Mobile</th><td><?php echo $row['user_phone'] ?></td></tr>
                                        <tr><th>Email</th><td><?php echo $row['user_email'] ?></td></tr>
                                        <tr><th>Addhar No</th><td><?php echo $row['addhar_no'] ?></td></tr>
                                        <tr><th>Address</th><td><?php echo $row['user_address'] ?></td></tr>

                                        <tr><th>Role</th><td><?php  $x=$this->user_model->list_user_role_by_id($row['user_role']); echo $x['name'];?></td></tr>
                                        <tr><th>Bank name</th><td><?php echo $row['bank_name'] ?></td></tr>
                                        <tr><th>IFSC Code</th><td><?php echo $row['ifsc'] ?></td></tr>

                                        <tr><th>Account Number</th><td><?php echo $row['account_number'] ?></td></tr>
                                        <tr><th>A/C Holder Name</th><td><?php echo $row['acholder_name'] ?></td></tr>
                                        <tr><th>Status</th><td><?php echo $row['status'] ?></td></tr>
                          <!--              <tr><th>Login Id</th><td><?php /*echo $row['login_id'] */?></td></tr>
                                        <tr><th>Password</th><td><?php /*echo $row['password'] */?></td></tr>-->
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--=======================================-->

                    </td>
            </tr>
            <?php $i++;}} ?>
    </tbody>
</table>
</div>
<!--=====================================-->



<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


