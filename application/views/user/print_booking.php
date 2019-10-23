
<h1 class="page-title">Print Booking </h1>
<h6 class="cent-refresh"><a class="gold-bt" onclick="loadview('print_booking/<?php echo $booking["id"] ?>')">Page Refresh</a></h6>

<hr>

<a class="gold-bt"  onclick="pdftDiv('guardian')">Download Pdf</a>
<a class="gold-bt float-r"  onclick="printDiv('guardian')">Print Booking</a>


<div class="col-sm-12" id="guardian">
    <h1 class="page-title">Booking Details</h1>
    <hr>
    <table class="table table-responsive">
        <tr><th>Name</th><td style="text-align: center"><?php echo $booking['user_name'] ?></tr>
        <tr><th>Father's Name</th><td style="text-align: center"><?php echo $booking['father_name'] ?></td></tr>
        <tr><th>Mobile</th><td style="text-align: center"><?php echo $booking['user_phone'] ?></td></tr>
        <tr><th>Email</th><td style="text-align: center"><?php echo $booking['user_email'] ?></td></tr>
        <tr><th>Address</th><td style="text-align: center"><?php echo $booking['user_address'] ?></td></tr>
        <tr><th>Block</th><td style="text-align: center"><?php $x=$this->user_model->list_sector_byid($booking['sector']); echo $x['sec_name'];?> </td></tr>
        <tr><th>Plot</th><td style="text-align: center"><?php $x=$this->user_model->list_plot_byid($booking['plot_id']); echo $x['plot_no'];?> </td></tr>
        <tr><th>Total Price</th><td style="text-align: center"><?php echo $booking['total_price'] ?></td></tr>
        <tr><th>Plc Applied</th><td style="text-align: center"><?php if($booking['plc']=='1.1'){echo 'Yes';} else{echo 'No';} ?></td></tr>
        <tr><th>Total Price</th><td style="text-align: center"><?php echo $booking['total_price'] ?></td></tr>
        <tr><th>Total Time</th><td style="text-align: center"><?php echo $booking['emi_time'] ?> Month</td></tr>
        <tr><th>Sponser</th><td style="text-align: center"><?php echo $booking['sponser_id'] ?></td></tr>
        <tr><th>Booking Date </th><td style="text-align: center"><?php $timestamp = $booking['date'];  echo date("F jS, Y", strtotime($timestamp)); ?></td></tr>
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

