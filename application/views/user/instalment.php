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

<h1 class="page-title">Instalment</h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('instalment/<?php echo $booking['id'] ?>')">Page Refresh</a></h6>
<hr>

<?php //print_r($all_intalment); ?>
<?php $intalment = ($booking['total_price']-$booking_amt)/$booking['emi_time'] ; ?>
<div class="guardian">

    <div class="col-sm-6">
        <table id="example" >
            <thead>
            <tr>
                <th style="width: 12%">Id</th>
                <th>Type</th>
                <th >Amount</th>
                <th >Date</th>
            </tr>
            </thead>

            <tbody>
            <?php $total=0;$x=1; foreach($all_intalment as $row) { ?>
                <tr><td style="width: 12%"><?php echo $x++; ?></td><td>  <?php if($row['type']=='b'){echo 'Booking Amt.';}else{echo 'Instalment';};  ?></td><td>  <?php $total +=$row['stalment']; echo $row['stalment']; ?></td><td>  <?php echo $row['date']; ?></td></tr>
            <?php } ?>
            </tbody>
        </table>
        <!--==================================================================-->

    </div>
    <div class="col-sm-6">
       <!-- <div id="subsmsg"></div>-->



        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Booking Detail
                </div>
            </div>
            <!--=====================================-->
            <table class="table table-responsive">
                <tr><th>Name</th><td><?php echo $booking['user_name'] ?></tr>
                <tr><th>Father's Name</th><td><?php echo $booking['father_name'] ?></td></tr>
                <tr><th>Mobile</th><td><?php echo $booking['user_phone'] ?></td></tr>
                <tr><th>Email</th><td><?php echo $booking['user_email'] ?></td></tr>
                <tr><th>Address</th><td><?php echo $booking['user_address'] ?></td></tr>
                <tr><th>Block</th><td><?php $x=$this->user_model->list_sector_byid($booking['sector']); echo $x['sec_name'];?> </td></tr>
                <tr><th>Plot</th><td><?php $x=$this->user_model->list_plot_byid($booking['plot_id']); echo $x['plot_no'];?> </td></tr>
                <tr><th>Plc Applied</th><td><?php if($booking['plc']=='1.1'){echo 'Yes';} else{echo 'No';} ?></td></tr>
                <tr><th>Total Price</th><td><?php echo $booking['total_price'] ?></td></tr>
                <tr><th>Already Paid</th><td><?php echo $total ?></td></tr>
                <tr><th>Total Remaining</th><td><?php echo $booking['total_price']-$total ?></td></tr>
                <tr><th>Total Time</th><td><?php echo $booking['emi_time'] ?> Month</td></tr>
                <tr><th>Sponser ID</th><td><?php echo $booking['sponser_id'] ?></td></tr>
                <tr><th>Booking Amount </th><td><?php echo $booking_amt; ?></td></tr>
                <tr><th>Booking Date </th><td><?php $timestamp = $booking['date'];  echo date("F jS, Y", strtotime($timestamp)); ?></td></tr>
            </table>
            <!--=====================================-->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<!--to form submit upload image-->
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            $("#submit1").hide();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>index.php/admin/pay_installment',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){

                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Updated successfully. </span><div>");
                        loadview('instalment/<?php echo $booking['id'] ?>');

                },
                error: function(){
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Somthing went wrong <span style='color: red'> Try again</span><div>");

                },

            });
        });
    });
</script>
