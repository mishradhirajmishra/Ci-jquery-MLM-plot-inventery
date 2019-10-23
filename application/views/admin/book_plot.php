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

<h1 class="page-title">Book Plot</h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('book_plot')">Page Refresh</a></h6>
<hr>
<!--=====================================-->

<div class="guardian">
    <div class="col-sm-8 col-sm-offset-2">
       <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Book Plot
                </div>
            </div>
            <h3 id="msg" style="color: red;text-align: center"></h3>
            <div class="panel-body">
                <?php $data = array('id'=>"fupForm")?>
                <?php echo form_open_multipart('admin/book_new_plot',$data) ?>
                <br>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Block Name:</label>
                    <div class="col-xs-8">
                        <select name="sector" id="sec_id" class="form-control" onchange="myFunction(value)" required="required">
                            <option value="">Select Block </option>
                            <?php foreach ($sec as $row) { ?>
                                <option value="<?php echo $row['sec_id'] ?>"><?php echo $row['sec_name'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Plot No :</label>
                    <div class="col-xs-8">
                        <select name="plot_id" id="plot" class="form-control" required="required" onchange="getPlotsize(this.value)" >
                        </select>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Plot Size :</label>
                    <div class="col-xs-8">
                        <input type="number" id="plot_size" class="form-control" required="required" disabled>                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Plot Rate :</label>
                    <div class="col-xs-8">
                        <select id="plot_rate"  class="form-control" required="required" onblur="remove_plot_price()">
                            <option >Sellect </option>
                            <option value="800">800</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">PLC Applied :</label>
                    <div class="col-xs-8">
                        <select name="plc" class="form-control" required="required" onchange="getPlotPrice(this.value)">
                            <option >Sellect </option>
                            <option value="1.1">Yes</option>
                            <option value="1">No</option>
                        </select>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Plot Total Price :</label>
                    <div class="col-xs-8">
                        <input type="number" id="total_price" name="total_price" value="" placeholder="" class="form-control" required="required" diabled>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Booking Amount :</label>
                    <div class="col-xs-8">
                        <input type="text"  name="booking_price"   class="form-control" required="required">
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Emi Type:</label>
                    <div class="col-xs-8">
                        <select name="emi_time" class="form-control">
                            <option value="36">3 Year </option>
                            <option value="60">5 Year</option>
                        </select>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Mode of Payment</label>
                    <div class="col-xs-8">
                        <select name="payment_mode" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                        </select>
                    </div>
                </div>



                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Sponser ID :</label>
                    <div class="col-xs-8">
                        <input type="number" id="sponser_id" class="form-control" name="sponser_id"  required onblur="finddetail(value)">
                    </div>
                </div>
                <span id="user_role"></span>
                <!--=====================================-->
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Customer Name :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="user_name"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4">Customer Father's Name :</label>
                    <div class="col-xs-8">
                        <input type="text" class="form-control" name="father_name"  required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Mobile Number :</label>
                    <div class="col-xs-8">

                        <input type="tel" class="form-control" name="user_phone" pattern="^\d{10}" required >
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Email Id :</label>
                    <div class="col-xs-8">
                        <input type="email" class="form-control" name="user_email"  required ">
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Address :</label>
                    <div class="col-xs-8">
                        <input type="text" class="form-control" name="user_address" >
                    </div>
                </div>

                <!--=====================================-->

                <div class="form-group222">
                    <label class="col-xs-4"></label>
                    <div class="col-xs-8">
                        <input type="submit" class=" btn btn-success btn-ch"  value="Submit" id="submit">
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>

            <!--end panal body-->
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script>
    function check_abhilable(x) {
       var y =  $('#sr_no').val();
       /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/check_plot_exist',
            data: {sr_no:y,plot_no:x},
            datatype:"json",
            success: function(msg){
           /* alert(msg);*/
              if(msg==0) {$('#msg').html(""); $("#submit").prop('disabled', false); }
              else {$('#msg').html("Plot No already exist");
                  $("#submit").prop('disabled', true);
              }

            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
       /*----------------------------------------------*/

    }
    function clear_plot() {
        $('#plot_no').val('');
    }
</script>

<!--=========================================================================================-->

<script>
    function finddetail(id){

        $.ajax({
            url: '<?php echo base_url()?>index.php/admin/sponser_detail',
            type:"POST",
            datatype:"json",
            data:{id:id},
            success: function (data) {
               /* alert(data);*/
                if (data=='<label class="col-xs-4 col-xs-offset-4" style="color: red">No record found </label>')
                {
                    $('#sponser_id').val('');
                }
                document.getElementById('user_role').innerHTML= data;

            },
            error: function () { alert("Invalid Sponser ID ");
                document.getElementById('user_role').innerHTML= '';
            }

        });
    }

    function myFunction(id){
        $('#plot_size').val('');
        $('#plot_rate').val('');
        $('#plot_rate').val('');
        $('#plot_price').val('');
      $.ajax({
            url: '<?php echo base_url()?>index.php/admin/list_plot_sec',
            type:"POST",
            datatype:"json",
            data:{id:id},
            success: function (data) {
                document.getElementById('plot').innerHTML= data;
            },
            error: function () { alert("fail");}
        });
    }
    function getPlotsize(id){
        var x = document.getElementById("plot").value;
        $('#plot_rate').val('');
        $('#plot_rate').val('');
        $('#plot_price').val('');

        $.ajax({
            url:'<?php echo base_url()?>index.php/admin/plot_size/' + id,
            type:"GET",
            datatype:"json",
            data:{id:x},
            success: function (data) {

                document.getElementById('plot_size').value= data;
            },
            error: function () { alert("fail");}
        });
    }
    function getPlotPrice(plc){

        var plotsize= document.getElementById('plot_size').value;
        var plotrate=document.getElementById('plot_rate').value;
        total=plotsize *  plotrate * plc;
        total=total.toFixed();
        document.getElementById('total_price').value = total;
    }
    function remove_plot_price() {
        $('#total_price').val('');
    }
</script>
<script>
    function check_name(x) {
     /*   alert(x);*/
        /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/check_name',
            data: {name:x},
            datatype:"json",
            success: function(msg){
                /* alert(msg);*/
                if(msg==0) {$('#msg').html(""); $("#submit").prop('disabled', false); }
                else {$('#msg').html(" Name already exist");
                    $("#submit").prop('disabled', true);
                }

            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
        /*----------------------------------------------*/

    }
    function check_login_id(x) {
        /*   alert(x);*/
        /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/check_login_id',
            data: {name:x},
            datatype:"json",
            success: function(msg){
                /* alert(msg);*/
                if(msg==0) {$('#msg').html(""); $("#submit").prop('disabled', false); }
                else {$('#msg').html(" Name already exist");
                    $("#submit").prop('disabled', true);
                }

            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
        /*----------------------------------------------*/

    }
    function check_email(x) {
        /*   alert(x);*/
        /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/check_email',
            data: {name:x},
            datatype:"json",
            success: function(msg){
                /* alert(msg);*/
                if(msg==0) {$('#msg').html(""); $("#submit").prop('disabled', false); }
                else {$('#msg').html(" Name already exist");
                    $("#submit").prop('disabled', true);
                }

            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
        /*----------------------------------------------*/

    }

</script>

<!--to form submit upload image-->
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            $("#submit").hide();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php /*echo base_url()*/?>index.php/admin/book_new_plot',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                    if(msg==1) {
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> One record inserted successfully. </span><div>");
                        loadview('all_plot_booking')
                    }else{
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Unable to insert record . </span><div>");
                        loadview('book_plot')

                    }
                },
                error: function(){
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Somthing went wrong <span style='color: red'> Try again</span><div>");

                },

            });
        });
    });
</script>
