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

<h1 class="page-title"> All Plot Booking </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('all_plot_booking')">Page Refresh</a></h6>
<hr>
<?php // print_r($booking); ?>
<!--=====================================-->
<div class="col-md-12">
<table id="example" >
    <thead>
    <tr>

        <th>Id</th>
        <th>Name</th>
        <th>Fathert's Name</th>
        <th>Block</th>
        <th>Plot No</th>
        <th style="width:300px;">Action</th>
    </tr>
    </thead>

    <tbody>
    <?php $i=1;foreach ($booking as $row) { ?>
       <!-- --><?php /*if($row['user_role']=="user") {*/?>
            <tr>
                <td><?php echo $row['id'];?>  </td>
                <td><?php echo $row['user_name'];?>  </td>
                <td><?php echo $row['father_name'];?>  </td>
                <td><?php $x=$this->admin_model->list_sector_byid($row['sector']); echo $x['sec_name'];?>  </td>
                <td><?php $x=$this->admin_model->list_plot_byid($row['plot_id']); echo $x['plot_no'];?>  </td>

                <td>
                    <!--=======================================-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-green dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-left" role="menu">
                            <li><a   onclick="loadview('edit_booking/<?php echo $row["id"];?>')"><i class="entypo-pencil"></i> Edit </a> </li>
                            <li><a   onclick="loadview('instalment/<?php echo $row["id"];?>')"><i class="entypo-pencil"></i> Instalment</a> </li>
                            <li><a   onclick="loadview('print_booking/<?php echo $row["id"];?>')"><i class="entypo-print"></i> Print </a> </li>
                            <li><a  data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>"><i class="entypo-newspaper"></i> Detail</a>
                            </li>
                        </ul>
                    </div>
                    <!--=======================================-->
                    <!-----------------MODEL FOR DISPLAY DETAIL------------------->


                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">Detail</h2>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive">
                                        <tr><th>Name</th><td><?php echo $row['user_name'] ?></tr>
                                        <tr><th>Father's Name</th><td><?php echo $row['father_name'] ?></td></tr>
                                        <tr><th>Mobile</th><td><?php echo $row['user_phone'] ?></td></tr>
                                        <tr><th>Email</th><td><?php echo $row['user_email'] ?></td></tr>
                                        <tr><th>Address</th><td><?php echo $row['user_address'] ?></td></tr>
                                        <tr><th>Block</th><td><?php $x=$this->admin_model->list_sector_byid($row['sector']); echo $x['sec_name'];?> </td></tr>
                                        <tr><th>Plot</th><td><?php $x=$this->admin_model->list_plot_byid($row['plot_id']); echo $x['plot_no'];?> </td></tr>
                                        <tr><th>Plc Applied</th><td><?php if($row['plc']=='1.1'){echo 'Yes';} else{echo 'No';} ?></td></tr>
                                        <tr><th>Total Price</th><td><?php echo $row['total_price'] ?></td></tr>
                                        <tr><th>Total Time</th><td><?php echo $row['emi_time'] ?> Month</td></tr>
                                        <tr><th>Sponser</th><td><?php echo $row['sponser_id'] ?></td></tr>
                                       <tr><th>Booking Date </th><td><?php $timestamp = $row['date'];  echo date("F jS, Y", strtotime($timestamp)); ?></td></tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--=======================================-->

                    </td>
            </tr>
            <?php $i++;}/*}*/ ?>
    </tbody>
</table>
</div>
<!--=====================================-->



<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


