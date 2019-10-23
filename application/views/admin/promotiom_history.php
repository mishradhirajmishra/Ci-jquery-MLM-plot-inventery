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

<h1 class="page-title">Promotion </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('promotiom_history/<?php echo $sponser["user_id"] ?>')">Page Refresh</a></h6>
<hr>
<!--=====================================-->

<div class="guardian">
    <div class="col-sm-6 col-sm-offset-3">
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
                    <tr><th>Possition</th><td><?php $x=$this->admin_model->list_user_role_by_id($sponser['user_role']); echo $x['name'];?></td></tr>

                </table>

            </div>


        </div>
        <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Promotion History
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <tr><th>Id</th><th>Position</th><th>Date</th></tr>
                    <?php $xx=1; foreach ($reward_history as $row){?>
                        <tr>
                            <td><?php echo $xx++; ?></td>
                            <td><?php  $x=$this->admin_model->list_user_role_by_id($row['role']); echo $x['name'];?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
        <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Promotion
                </div>
            </div>

            <h3 id="msg" style="color: red;text-align: center"></h3>
            <div class="panel-body">
                <?php $role_list = $this->admin_model->list_promotion_role($sponser['user_role'])?>
                <?php $data = array('id'=>"fupForm")?>
                <?php echo form_open_multipart('admin/add_promotion',$data) ?>
                <input type="hidden" name="user_id" value="<?php echo $sponser['user_id'] ?>">
                <div class="form-group">
                    <label class="col-xs-3">Promote To :</label>
                    <div class="col-xs-6">
                        <select name="user_role" class="form-control" required="required"  >
                            <?php foreach ($role_list as $row){ ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" class=" btn btn-success btn-ch"  value="Submit" id="submit">
                    </div>
                <!--=====================================-->
                <?php echo form_close() ?>
            </div>

            <!--end panal body-->
        </div>

    </div>
</div>

<!--to form submit upload image-->
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            $("#submit").hide();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>index.php/admin/add_promotion',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                    if(msg==1) {
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Promoted successfully. </span><div>");
                        loadview('promotiom_history/<?php echo $sponser["user_id"] ?>');
                    }else{
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Unable to Promote .  </span><div>");

                    }
                },
                error: function(){
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Somthing went wrong <span style='color: red'> Try again</span><div>");

                },

            });
        });
    });
</script>

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


