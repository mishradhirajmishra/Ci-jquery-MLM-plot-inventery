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
    .tile-stats.tile-red {
        text-align: center;
    }

    input#inputFile {
        width: 71%;
        margin: 10px auto;
        border: 1px solid darkgoldenrod;
        color: white;
        padding: 10px;
    }

    button#btn_upload {
        width: 71%;
    }
    .panel-body {
        text-align: center;
    }
</style>

<h1 class="page-title">Profile Image </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('profile')">Page Refresh</a></h6>
<hr>
<!--=====================================-->

<div class="guardian">
    <div class="col-sm-6 col-sm-offset-3">
        <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                   Change Profile Image
                </div>
            </div>
<?php //print_r($_SESSION);?>
            <h3 id="msg" style="color: red;text-align: center"></h3>
            <div class="panel-body">
<!------------------------------------------------------------->
                <?php $data = array('id' => 'submit') ?>
                <?php echo form_open_multipart('admin/upload_profile_image', $data); ?>
                <img id="image_upload_preview" src="<?php echo base_url() ?>uploads/<?php echo $_SESSION['profile_image']; ?>" alt="your image"/>

                <input type="file" name="userfile" size="20" id="inputFile"/>

                <br/><br/>

                <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>

                </form>
<!------------------------------------------------------------->
            </div>

            <!--end panal body-->
        </div>

    </div>
</div>
<!--to preview image-->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
</script>
<!--to upload image-->


<script type="text/javascript">
    $(document).ready(function () {

        $('#submit').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url();?>admin/upload_profile_image',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Updated successfully. </span><div>");

                },
                error: function(){
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Somthing went wrong <span style='color: red'> Try again</span><div>");

                },
            });
        });


    });

</script>