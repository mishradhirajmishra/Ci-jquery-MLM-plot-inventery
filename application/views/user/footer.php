<!-- Footer -->
<footer class="main">


</footer>
</div>



</div>






<!-- jquery date month picker -->
<script src="<?php echo  base_url();?>assets/js/jquery.mtz.monthpicker.js"></script>
<!-- Imported styles on this page -->

<link rel="stylesheet" href="<?php echo  base_url();?>assets/js/dropzone/dropzone.css">
<link rel="stylesheet" href="<?php echo  base_url();?>assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo  base_url();?>assets/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo  base_url();?>assets/js/gsap/TweenMax.min.js"></script>
<script src="<?php echo  base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo  base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url();?>assets/js/joinable.js"></script>
<script src="<?php echo  base_url();?>assets/js/resizeable.js"></script>
<script src="<?php echo  base_url();?>assets/js/neon-api.js"></script>
<script src="<?php echo  base_url();?>assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="<?php echo  base_url();?>assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo  base_url();?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo  base_url();?>assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo  base_url();?>assets/js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo  base_url();?>assets/js/raphael-min.js"></script>
<script src="<?php echo  base_url();?>assets/js/morris.min.js"></script>
<script src="<?php echo  base_url();?>assets/js/toastr.js"></script>
<script src="<?php echo  base_url();?>assets/js/neon-chat.js"></script>
<script src="<?php echo  base_url();?>assets/js/dropzone/dropzone.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="<?php echo  base_url();?>assets/js/neon-custom.js"></script>


<!-- Dte picker  -->
<script src="<?php echo  base_url();?>assets/js/datepicker.js"></script>


<script>
    /*================load Page==================*/
    function  loadview(page) {
        var url='<?php echo base_url() ?>index.php/user/'+page;
      /*  alert(url);*/
        $("#main_container").load(url);
    }
    /*================Default dasgboard load==================*/
    $(document).ready(function(){
        var page = 'dashboard';
        var url="<?php echo base_url() ?>index.php/user/"+page;
        $("#main_container").load(url);
    });
</script>
<script>
    $(document).ready(function () {
        $('#alert').delay(4000).fadeOut();
    });
</script>
       <script>
            $(':submit').on('click', function(){
                alert('Button clicked. Disabling...');
                $(':submit').attr("disabled", true);
            });
        </script>

</body>
</html>