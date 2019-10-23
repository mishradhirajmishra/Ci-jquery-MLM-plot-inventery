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

<h1 class="page-title"> Reward </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('reward_history/<?php echo $sponser['user_id'];?>')">Page Refresh</a></h6>
<hr>
<!--=====================================-->
<?php // print_r($reward); ?>
<div class="guardian">
    <div class="col-sm-6 col-sm-offset-3">
       <!-- <div id="subsmsg"></div>-->
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
                    <tr><th>Possition</th><td><?php $x=$this->user_model->list_user_role_by_id($sponser['user_role']); echo $x['name'];?></td></tr>

                </table>

            </div>


        </div>

        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Reward History
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <tr><th>Id</th><th>Amount</th><th>Date</th></tr>
                    <?php  foreach ($reward as $row){?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <?php } ?>

                </table>
            </div>
        </div>

    </div>



</div>





