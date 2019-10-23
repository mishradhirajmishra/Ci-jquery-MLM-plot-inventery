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

<h1 class="page-title" style=" margin-top: -10px;"> Commission History</h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('all_commission_history')">Page Refresh</a></h6>
<hr>
<?php //print_r($booking); ?>
<!--=====================================-->
<div class="col-md-12">
            <!--=====================================-->
            <label class="col-xs-2">Sellect:</label>
            <div class="col-xs-3">
                <input type="text" id="demo-2"  class="form-control" onchange="getinstal(value)" value="<?php echo($date); ?>">
            </div>
              <div class="col-xs-7">
              <h5 class="page-title" style="text-align:right;font-weight: bold;color: darkgoldenrod;margin: 0px"> <?php echo($date); ?></h5>
              </div>
            <!--=====================================-->
        <!--end panal body-->

    </div>

</div>
<br>
<div class="col-md-12">
    <br>
    <table id="example" >
        <thead>
        <tr>
            <th style="width: 8%">Id</th>
            <th>Name</th>
            <th>Commission</th>
            <th style="width:300px;">Date</th>
            <th style="width:300px;">Detail</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $col) { ?>
            <?php if($col['user_role']!="admin") {?>
                <tr>
                    <td><?php echo $col["user_id"];?></td>
                    <td><a onclick="loadview('commission/<?php echo $col["user_id"];?>')"><?php echo $col['user_name'];?></a></td>
                    <?php $id=$col["user_id"]; $x=$this->user_model->all_commission_by_id_date($id,$month,$year); ?>
                    <td> <?php echo $x['commission']; ?></td>
                    <td><?php echo $x['date']; ?></td>
                    <td><a class="green btn btn-success" onclick="loadview('commission/<?php echo $col["user_id"];?>')">Detail</td>
                     </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
<!--=====================================-->

<script>
    $('#demo-2').monthpicker({pattern: 'yyyy-mm',
        selectedYear: 2108,
        startYear: 2018,
        finalYear: <?php echo date('Y')+1; ?>,});
    var options = {
        selectedYear:2018,
        startYear: 2108,
        finalYear: <?php echo date('Y')+1; ?>,
        openOnFocus: false // Let's now use a button to show the widget
    };
</script>
<script>
    function getinstal(x){
        loadview('all_commission_history/'+x)
    }









    $(document).ready(function() {
        $('#example').DataTable();
    } );
    function pay(id,mo,name) {
        var x = '#pay'+id;
        $(x).hide();
        /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/notify_not_paid_installment',
            data: {id:id,mo:mo,name:name},
            datatype:"json",
            success: function(msg){
                /*alert(msg);*/
                $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'>Message Sent successfully. </span><div>");
                /* loadview('all_commission');*/
            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
        /*----------------------------------------------*/

    }
</script>


