
<h1 class="page-title">Profile Detail</h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('profile_detail/<?php echo $user["user_id"] ?>')">Page Refresh</a></h6>

<hr>

<div class="col-sm-12" id="guardian">

    <table class="table table-responsive">
        <tr><th>Id</th><td style="text-align: center"><?php echo $user['user_id'] ?></tr>
        <tr><th>Name</th><td style="text-align: center"><?php echo $user['user_name'] ?></td></tr>

        <tr><th>Mobile</th><td style="text-align: center"><?php echo $user['user_phone'] ?></td></tr>
        <tr><th>Email</th><td style="text-align: center"><?php echo $user['user_email'] ?></td></tr>
        <tr><th>Addhar No</th><td style="text-align: center"><?php echo $user['addhar_no'] ?></td></tr>
        <tr><th>Address</th><td style="text-align: center"><?php echo $user['user_address'] ?></td></tr>

        <tr><th>Role</th><td style="text-align: center"><?php  $x=$this->user_model->list_user_role_by_id($user['user_role']); echo $x['name'];?></td></tr>
        <tr><th>Bank name</th><td style="text-align: center"><?php echo $user['bank_name'] ?></td></tr>
        <tr><th>IFSC Code</th><td style="text-align: center"><?php echo $user['ifsc'] ?></td></tr>

        <tr><th>Account Number</th><td style="text-align: center"><?php echo $user['account_number'] ?></td></tr>
        <tr><th>A/C Holder Name</th><td style="text-align: center"><?php echo $user['acholder_name'] ?></td></tr>
        <tr><th>Status</th><td style="text-align: center"><?php echo $user['status'] ?></td></tr>
        <tr><th>Login Id</th><td style="text-align: center"><?php echo $user['login_id'] ?></td></tr>
        <tr><th>Password</th><td style="text-align: center"><?php echo $user['password'] ?></td></tr>

    </table>
</div>



<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

