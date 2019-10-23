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
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('edit_block/<?php echo $block['sec_id']; ?>')">Page Refresh</a></h6>
<hr>
<?php //print_r($block);?>
<!--=====================================-->

<div class="guardian">
    <div class="col-md-12">
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
                <?php echo form_open_multipart('admin/update_block',$data) ?>
                <br>
                <input type="hidden" value="<?php echo $block['sec_id']; ?>" name="sec_id">
                <!--=====================================-->
                <div class="form-group">
                    <label class="col-sm-2 col-xs-4">Block Name:</label>
                    <div class="col-sm-3 col-xs-4">
                        <input type="text" class="form-control" name="sec_name" value="<?php echo $block['sec_name']; ?>">
                    </div>
                    <div class="col-sm-2 col-xs-4">
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


<!--to form submit upload image-->
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){
            $("#submit").hide();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php /*echo base_url()*/?>index.php/admin/update_block',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                    if(msg==1) {
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'>Updated successfully. </span><div>");
                        loadview('block')
                    }else{
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'>Unable To Update. </span><div>");
                        loadview('edit_block/<?php echo $block['sec_id']; ?>')
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


