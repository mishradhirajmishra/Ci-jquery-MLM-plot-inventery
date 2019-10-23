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
    .chh {
        text-align: center;
    }
    .round {
        background-color: darkgreen;
        padding: 3px 10px;
        border-radius: 50%;
        /* z-index: 10; */
    }
    i.entypo-down-bold {
        font-size: 60px;
        color: green;
    }
    .ch-hover {
        width: 200px;
        margin: 5px auto;
        display: none;
    }
    a.green.btn.btn-warning:hover .ch-hover{display: block;}
</style>
<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
       /* padding: 16px;*/
        font-size: 16px;
        border: none;
        margin-bottom: 10px;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        left: -28px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<h1 class="page-title"> Genealogy Search </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('genealogy')">Page Refresh</a></h6>
<hr>
<!--=====================================-->

<div class="guardian">
    <div class="col-sm-6 col-sm-offset-3">
        <!-- <div id="subsmsg"></div>-->
        <div class="panel panel-success" data-collapsed="0">

            <div class="panel-body">
                <br>
                <!--=====================================-->

                    <label class="col-xs-4">Sponser Id:</label>
                    <div class="col-xs-5">
                        <input type="number" class="form-control" name="sec_name" onblur="search(value)">
                    </div>
                    <div class="col-xs-3">
                        <input type="button" class=" btn btn-success btn-ch"  value="Search" id="submit">
                    </div>


                <!--=====================================-->

            </div>

            <!--end panal body-->
        </div>

    </div>
    <div class="col-sm-12">

        <?php $all_ubser_sponser=$this->admin_model->all_under_associate_by_sponser_id($sponser["user_id"])?>

        <?php //print_r($all_ubser_sponser);?>

    </div>
    <hr>
    <!------------------------------------------------------------------------------------------------------>
    <div class="col-sm-12">

        <div class="chh">
            <div class="dropdown">
            <a class="green btn btn-success dropbtn"  style="background-color: black" onclick="loadview('genealogy/<?php echo $sponser["user_id"]; ?>')"><?php echo $sponser['user_name'];  ?> <span class="round"><?php $x=$this->admin_model->count_sponser($sponser["user_id"]); echo $x; ?></span> </a><br>
                <div class="dropdown-content">
                    <table class="table table-responsive">
                        <tr><th>Id</th><td><?php echo $sponser['user_id'] ?></tr>
                        <tr><th>Name</th><td><?php echo $sponser['user_name'] ?></td></tr>
                        <tr><th>Mobile</th><td><?php echo $sponser['user_phone'] ?></td></tr>
                        <tr><th>Position</th><td><?php  $x=$this->admin_model->list_user_role_by_id($sponser['user_role']); echo $x['name'];?></td></tr>
                    </table>
                </div>
            </div>
            <br>
            <i class="entypo-down-bold"></i><br>
            <?php foreach($all_ubser_sponser as $row){?>
                <div class="dropdown">
                    <a class="green btn btn-warning dropbtn"  style="background-color: black" onclick="loadview('genealogy/<?php echo $row["user_id"]; ?>')"><?php echo $row['user_name'];  ?> <span class="round"><?php $x=$this->admin_model->count_sponser($row["user_id"]); echo $x; ?></span> </a><br>
                    <div class="dropdown-content">
                        <table class="table table-responsive">
                            <tr><th>Id</th><td><?php echo $row['user_id'] ?></tr>
                            <tr><th>Name</th><td><?php echo $row['user_name'] ?></td></tr>
                            <tr><th>Mobile</th><td><?php echo $row['user_phone'] ?></td></tr>
                            <tr><th>Position</th><td><?php  $x=$this->admin_model->list_user_role_by_id($row['user_role']); echo $x['name'];?></td></tr>
                            <!--===========================-->
                            <tr><td colspan="2"></td></tr>
                            <?php $l_sponser=$this->admin_model->all_under_associate_by_sponser_id($row["user_id"])?>
                            <?php foreach($l_sponser as $row1){?>
                                <tr onclick="loadview('genealogy/<?php echo $row1["user_id"]; ?>')"><th ><?php echo $row1['user_name'] ?><th style="text-align: right"><span class="round"><?php $x=$this->admin_model->count_sponser($row1["user_id"]); echo $x; ?></span></th></td></th></tr>
                                <!--================================-->
                            <?php }?>
                        </table>
                    </div>
                </div>            <?php }?>

        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------>
</div>

<script>
    function search(id) {
        loadview('genealogy/'+id);
    }
    function display(x) {
        var y='#detail'+x;
        $(y).css('display','block');

    }
    function hide(x) {
        var y='#detail'+x;
        $(y).css('display','none');

    }
</script>



