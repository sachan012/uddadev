<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery/popper.min.js"></script>    
<script src="<?php echo base_url();?>assets/plugins/jquery/bootstrap.min.js"></script>
<!----------------------------Button Loader css ------------------->
<script src="<?php echo base_url();?>assets/plugins/buttonLoader/jquery.buttonLoader.js"></script>
<script>
$('.btn').click(function () {
  var btn = $(this);
  $(btn).buttonLoader('start');
  setTimeout(function () {
    $(btn).buttonLoader('stop');
  }, 3000);
});
</script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    $(document).ready(function() {
        // Get current page URL
        var url = window.location.href;
        $('.nav.list-group li').each(function() {
            var href = $(this).find('a').attr('href');                             
            // Check filename
            if (url == href) {
                // Add active class
                $(this).addClass('activeLink');
            }
        });
    });
</script>