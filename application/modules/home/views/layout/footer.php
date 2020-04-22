	</div>
</div>
<hr>
<footer class="fixed-bottom">
                <div class="container">
                    <p class="copyright text-center pull-right">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="">Web Coach</a>, Coach your future with us!
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="<?php echo base_url(THEME_PATH.'assets/js/core/jquery.3.2.1.min.js');?>" type="text/javascript"> </script>
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/popper.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/jquery-ui.js');?>"></script>
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/bootstrap.min.js ');?>" type="text/javascript"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url(THEME_PATH.'assets/js/light-bootstrap-dashboard.js?v=2.0.1');?>" type="text/javascript"></script>
<script>
     $( function() {
        $("#dob").datepicker({
                defaultDate: +0,
                showOtherMonths:true, 
                autoSize: true,
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                maxDate: "+0",
                yearRange: "-120:+0", 
                });
        } );
 </script>



</html>