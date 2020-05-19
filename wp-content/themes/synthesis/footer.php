
<?php if(! is_front_page()): ?>
    <div class="footer-bar">
        <p>Copyright &copy; <?php echo the_time('Y'); ?>  Synthesis. All rights reserved <br/><a href="mailto:info@yoursynthesis.com">info@yoursynthesis.com</a></p>
    </div>
<?php endif; ?>

<script>
    $( document ).ready(function() {
        $('.nav-trigger').click(function(e) {
            $(this).toggleClass('active');
            $('.nav-container').toggleClass('open');
            $(this).find('i').toggleClass('fa-close').toggleClass('fa-bars');
            e.preventDefault();
        });

        $(window).load(function() {
            $(".loader-container").fadeOut();
        });

        $('.member').on('click', function () {
         $(this).find('.member-details').toggleClass('active');
        }); 

        var $window = $(window);
        var $page = $('.page-container');

        var resizeTimer;

        var placeFooter = function() {
            if($window.height() > $page.height()) {
                $('.footer-bar').addClass('sticky');
            } else {
                $('.footer-bar').removeClass('sticky');
            }
        }

        $(window).load(function(){
            placeFooter();
        });

        $(window).on('resize', function(e) {

          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(function() {

            placeFooter();
                    
          }, 250);

        });

        
    })
</script>


<?php wp_footer(); ?>


<?php if(is_home()): ?>
<div class="corner-bar top horizontal"></div>
<div class="corner-bar top vertical"></div>
<div class="corner-bar bottom vertical"></div>
<div class="corner-bar bottom horizontal"></div>

<div class="view-border horizontal top"></div>
<div class="view-border vertical right"></div>
<div class="view-border vertical left"></div>
<div class="view-border horizontal bottom"></div>
<?php endif; ?>
        
</body>
</html>