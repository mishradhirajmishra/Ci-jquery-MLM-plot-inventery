<style>
    #img-message {
        position: absolute;
        top: 8120px;
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

<h1 class="page-title"> Achievement </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('achievement')">Page Refresh</a></h6>
<hr>
<?php //print_r($users); ?>
<!--=====================================-->
<div class="col-md-12">
<table id="example" >
    <thead>
    <tr>
        <th style="width: 120px">Id</th>
        <th>Name</th>
        <th>Position</th>
        <th>Business ( D + I ) = T</th>
        <th style="width: 120px" >Used </th>
        <th style="width: 120px">Remaining </th>
        <th style="width:110px" >Select </th>
        <th style="width:110px" >Pay </th>
        <th style="width:300px;">Action</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($users as $col) { ?>
      <?php if($col['user_role']!="admin") {?>
            <tr>
             <td><?php echo $col["user_id"];?></td>
              <td ><?php echo $col['user_name'];?></td>
                <td ><?php  $x=$this->user_model->list_user_role_by_id($col['user_role']); echo $x['name'];?></td>

                <?php $d_bus=$this->user_model->direct_business($col["user_id"]); ?>
                <?php $under_ass=$this->user_model->all_under_associate_by_sponser_id($col["user_id"]); ?>
                <?php $ind=0;foreach($under_ass as $row){ $i_bus=$this->user_model->direct_business($row['user_id']); $ind += $i_bus;}?>
             <td><?php echo $d_bus; ?> + <?php echo $ind; ?> = <?php $total=$ind+$d_bus; echo $total ?>

             </td>
                <?php $used=$this->user_model->reward_sum_by_sponser_id($col["user_id"]);  $rem=$total-$used;?>
             <td style="width: 120px">  <?php echo $used; ?></td>
             <td style="width: 120px">  <?php echo $rem; ?></td>
                <?php $id=$col["user_id"]; ?>
           <td style="width: 110px"><select id="sel<?php echo $id?>" class="form-control" onchange="chk(<?php echo $id?>,<?php echo $rem; ?>,value)" >
                      <option value="">select</option>
                      <option value="600000">6 Lacks</option>
                      <option value="2500000">25 Lacks</option>
                      <option value="50000000">5 Crore</option>
                      <option value="250000000">25 Crore</option>
                      <option value="500000000">50 Crore</option>
                      <option value="1000000000">100 Crore</option>
                </select>
            </td>
            <td><a style="display: none" id="pay<?php echo $id?>"  class="gold-bt" onclick="pay(<?php echo $id?>)">Pay</a></td>
                <td >
                    <!--=======================================-->

                    <div class="btn-group">
                        <button type="button" class="btn btn-green dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-left" role="menu">
                            <li><a   onclick="loadview('reward_history/<?php echo $col["user_id"];?>')"><i class="entypo-pencil"></i> Reward </a> </li>
                            <li><a   onclick="loadview('promotiom_history/<?php echo $col["user_id"];?>')""><i class="entypo-pencil"></i>Promotion </a> </li>

                            </li>
                        </ul>
                    </div>
                    <!--=======================================-->
                </td>
           </tr>
            <?php }} ?>
    </tbody>
</table>
</div>
<!--=====================================-->

<?php print_r($_SESSION['user_id']); ?>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    function chk(id,rem,v) {
        var x = '#pay'+id;
        if(v > rem ){
            $(x).hide();
            $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Not applicable </span><div>");

        }
        else {
            $(x).show();
            $('#subsmsg').hide();
        }
/*        alert(id);
        alert(rem);
        alert(v);*/

    }
    function pay(id,com) {
        var x = '#pay'+id;
        var y = '#sel'+id;
        $(x).hide();
       var a= $(y).val();


        /*----------------------------------------------*/
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>index.php/admin/pay_reward',
            data: {sponser_id:id,amount:a},
            datatype:"json",
            success: function(msg){

                $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <span style='color: red'> Paid successfully. </span><div>");
                loadview('achievement');
            },
            error: function(){
                $('#msg').html("Unable To check ");
            },

        });
        /*----------------------------------------------*/



    }
</script>



