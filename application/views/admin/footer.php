<!-- Footer -->
<footer class="main">

 <!--   &copy; 2015 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>-->

</footer>
</div>


<!--<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

    <div class="chat-inner">


        <h2 class="chat-header">
            <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

            <i class="entypo-users"></i>
            Chat
            <span class="badge badge-success is-hidden">0</span>
        </h2>


        <div class="chat-group" id="group-1">
            <strong>Favorites</strong>

            <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
            <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
            <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
        </div>


        <div class="chat-group" id="group-2">
            <strong>Work</strong>

            <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
            <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
            <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
        </div>


        <div class="chat-group" id="group-3">
            <strong>Social</strong>

            <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
            <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
            <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
        </div>

    </div>

    <!-- conversation template -->
<!--    <div class="chat-conversation">

        <div class="conversation-header">
            <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

            <span class="user-status"></span>
            <span class="display-name"></span>
            <small></small>
        </div>

        <ul class="conversation-body">
        </ul>

        <div class="chat-textarea">
            <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
        </div>

    </div>-->

</div>


<!-- Chat Histories -->
<!--<ul class="chat-history" id="sample_history">
    <li>
        <span class="user">Art Ramadani</span>
        <p>Are you here?</p>
        <span class="time">09:00</span>
    </li>

    <li class="opponent">
        <span class="user">Catherine J. Watkins</span>
        <p>This message is pre-queued.</p>
        <span class="time">09:25</span>
    </li>

    <li class="opponent">
        <span class="user">Catherine J. Watkins</span>
        <p>Whohoo!</p>
        <span class="time">09:26</span>
    </li>

    <li class="opponent unread">
        <span class="user">Catherine J. Watkins</span>
        <p>Do you like it?</p>
        <span class="time">09:27</span>
    </li>
</ul>-->




<!-- Chat Histories -->
<!--<ul class="chat-history" id="sample_history_2">
    <li class="opponent unread">
        <span class="user">Daniel A. Pena</span>
        <p>I am going out.</p>
        <span class="time">08:21</span>
    </li>

    <li class="opponent unread">
        <span class="user">Daniel A. Pena</span>
        <p>Call me when you see this message.</p>
        <span class="time">08:27</span>
    </li>
</ul>-->


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
        var url='<?php echo base_url() ?>index.php/admin/'+page;
      /*  alert(url);*/
        $("#main_container").load(url);
    }
    /*================Default dasgboard load==================*/
    $(document).ready(function(){
        var page = 'dashboard';
        var url="<?php echo base_url() ?>index.php/admin/"+page;
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