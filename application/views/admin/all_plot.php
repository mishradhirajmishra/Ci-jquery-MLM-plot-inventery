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

<h1 class="page-title"> All Plot </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('all_plot')">Page Refresh</a></h6>
<hr>
<?php //print_r($plot1); ?>
<!--=====================================-->
<div class="col-md-12">
<table id="example" >
<thead>
    <tr> <td>Id</td><td>Sector </td><td>Plot No </td><td>Plot Size </td><td>Plot Status </td><td>Action </td></tr>
    </thead>
    <tbody>
    <?php $x=1; foreach ( $plot1 as $row) { ?>
        <tr>
            <td><?php echo $x++; ?></td>
            <td class="skin-green"> <?php $s=$this->admin_model->list_sector_byid($row['sr_no']);echo $s ['sec_name'];?></td>
            <td><?php echo $row['plot_no'] ?></td>
            <td><?php echo $row['plot_size'] ?></td>
            <td><?php if($row['status']==0){ echo '<span class="label label-sm btn-red">';echo "<i class='entypo-star'></i>   Booked "; echo '</button>';}
                else{ echo '<span class="label label-sm btn-green">'; echo "<i class='entypo-star-empty'></i> Available"; echo '</button>';}?></td>
            <td><a class="btn btn-success btn-ch" onclick="loadview('edit_plot/<?php echo $row['plot_id']; ?>')" ><i class="entypo-pencil"></i>  Edit</a></td>
        </tr>
    <?php }?>
    </tbody>
</table>
</div>
<!--=====================================-->



<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


