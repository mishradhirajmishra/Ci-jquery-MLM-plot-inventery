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

<h1 class="page-title"> Role & Commission </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('role')">Page Refresh</a></h6>
<hr>
<!--=====================================-->
<?php //print_r($role);?>
<div class="col-sm-6 col-sm-offset-3">
<table id="example"  >
    <thead>
    <tr><td style="width: 20%">Id </td><td>Role</td><td>Commission % </td><!--<td>Action</td>--></tr>
    </thead>
    <tbody>
    <?php foreach ( $role as $row) { ?>
        <tr>
            <td style="width: 20%" ><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['commission']?></td>
<!--            <td><a class="btn btn-success btn-ch" onclick="loadview('edit_role/<?php /*echo $row['id']; */?>')"><i class="entypo-pencil"></i>  Edit</a></td>
-->        </tr>
    <?php }?>
    </tbody>
</table>
</div>
<!--=====================================-->

<!--to form submit upload image-->
<script>
    $(document).ready(function(e){

        $("#fupForm").on('submit', function(e){

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php /*echo base_url()*/?>index.php/admin/add_block',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                  /*  alert(msg);*/
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> One record inserted successfully. </span><div>");
                    loadview('block');
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


