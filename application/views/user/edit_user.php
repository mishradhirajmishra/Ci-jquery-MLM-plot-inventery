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

<h1 class="page-title">Update Associate </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('edit_associate/<?php echo $user['user_id']; ?>')">Page Refresh</a></h6>
<hr>
<!--=====================================-->
<?php //print_r($user);?>
<div class="guardian">
    <div class="col-sm-8 col-sm-offset-2">
        <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Update Associate
                </div>
            </div>

            <h3 id="msg" style="color: red;text-align: center"></h3>
            <div class="panel-body">
                <?php $data = array('id'=>"fupForm")?>
                <?php echo form_open_multipart('admin/update_associate',$data) ?>
                <br>
                <!--=====================================-->
                <input type="hidden" class="form-control" name="user_id" value="<?php echo $user['user_id']?>">
                <div class="form-group">
                    <label class="col-xs-4">User ID :</label>
                    <label class="col-xs-8"><?php echo $user['user_id']?></label>
                </div>
                <div class="form-group">
                    <label class="col-xs-4">Sponser ID :</label>
                    <label class="col-xs-8"><?php echo $user['sponser_id']?></label>
                </div>
                <div class="form-group">
                    <label class="col-xs-4">User Type:</label>
                    <label class="col-xs-8"><?php  $x=$this->user_model->list_user_role_by_id($user['user_role']); echo $x['name'];?></label>
                </div>
                <!--=====================================-->
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">User Name :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="user_name" value="<?php echo $user['user_name']?>" onblur="check_name(value)" required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Login Id :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="login_id"  value="<?php echo $user['login_id']?>" required  onblur="check_login_id(value)">
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Password :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="password"  value="<?php echo $user['password']?>" required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Mobile Number :</label>
                    <div class="col-xs-8">

                        <input type="tel" class="form-control" name="user_phone" pattern="^\d{10}" required value="<?php echo $user['user_phone']?>" >
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Email Id :</label>
                    <div class="col-xs-8">

                        <input type="email" class="form-control" name="user_email"  value="<?php echo $user['user_email']?>" required onblur="check_email(value)">
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Addhar No :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="addhar_no" value="<?php echo $user['addhar_no']?>" >
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Address :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="user_address" value="<?php echo $user['user_address']?>" >
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Bank Name :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="bank_name" value="<?php echo $user['bank_name']?>" required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">IFSC Code :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="ifsc"  value="<?php echo $user['ifsc']?>" required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Account Number :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="account_number" value="<?php echo $user['account_number']?>" required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Account Holder Name :</label>
                    <div class="col-xs-8">

                        <input type="text" class="form-control" name="acholder_name" value="<?php echo $user['acholder_name']?>" required>
                    </div>
                </div>
                <!--=====================================-->
                <div class="form-group" style="display: none;">
                    <label class="col-xs-4">Status :</label>
                    <div class="col-xs-8">

                        <select class="form-control" name="status" value="<?php echo $user['acholder_name']?>" required>
                            <option value="1" <?php if($user['status']==1) echo 'selected'?>>Active</option>
                            <option value="0"  <?php if($user['status']==0) echo 'selected'?>>In Active</option>
                    </div>
                </div
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4"></label>
                    <div class="col-xs-8">

                        <input style="    margin-top: 12px;" type="submit" class=" btn btn-success btn-ch"  value="Submit" id="submit">
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>

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
    function findroal(id){
        $.ajax({
            url: '<?php echo base_url()?>index.php/admin/user_role',
            type:"POST",
            datatype:"json",
            data:{id:id},
            success: function (data) {
                document.getElementById('user_role').innerHTML= data;
            },
            error: function () { alert("Invalid Sponser ID ");
                document.getElementById('user_role').innerHTML= '';
            }

        });
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
<!--to form submit -->

<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            $("#submit").hide();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>index.php/admin/update_associate',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                    if(msg==1) {
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'>Updated successfully. </span><div>");
                        loadview('all_associate')
                    }else{
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'>Unable To Update. </span><div>");
                        loadview('edit_associate/<?php echo $user['user_id']; ?>')
                    }
                },
                error: function(){
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Somthing went wrong <span style='color: red'> Try again</span><div>");

                },

            });
        });
    });
</script>
