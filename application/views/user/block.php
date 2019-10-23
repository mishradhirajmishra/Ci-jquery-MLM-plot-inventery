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

<h1 class="page-title"> Block </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('block')">Page Refresh</a></h6>
<hr>
<!--=====================================-->

<div class="guardian">
    <div class="col-sm-6 col-sm-offset-3">
       <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Add Block
                </div>
            </div>


            <div class="panel-body">
                <?php $data = array('id'=>"fupForm")?>
                <?php echo form_open_multipart('admin/add_block',$data) ?>
                <br>
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-xs-4">Block Name:</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" name="sec_name" value="">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" class=" btn btn-success btn-ch"  value="Submit" id="submit">
                    </div>
                </div>

                <!--=====================================-->



                <?php echo form_close() ?>
            </div>

            <!--end panal body-->
        </div>

    </div>
</div>
<!--=====================================-->
<div class="col-sm-6 col-sm-offset-3">
<table id="example"  >
    <thead>
    <tr><td style="width: 20%">Block Id </td><td>Block Name</td><td>Action</td></tr>
    </thead>
    <tbody>
    <?php foreach ( $all_sec as $row) { ?>
        <tr>
            <td style="width: 20%" ><?php echo $row['sec_id']?></td>
            <td><?php echo $row['sec_name']?></td>

            <td><a class="btn btn-success btn-ch" onclick="loadview('edit_block/<?php echo $row['sec_id']; ?>')"><i class="entypo-pencil"></i>  Edit</a></td>

        </tr>
    <?php }?>
    </tbody>
</table>
</div>
<!--=====================================-->

<!--to form submit upload image-->
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            $("#submit").hide();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php /*echo base_url()*/?>index.php/admin/add_block',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                    if(msg==1) {
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> One record inserted successfully. </span><div>");
                        loadview('block');
                    }else{
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Unable to insert record . </span><div>");
                        loadview('block');

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


