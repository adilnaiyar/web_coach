	  </div>
  </div>
<hr>
<footer class="fixed-bottom">
    <div class="container" >
        <p class="copyright text-center pull-right" >

            &copy; <?php echo date("Y");?> <em> <strong>Web Coach</strong>, Coach your future with us!</em>
        </p>
    </div>
</footer>
</div>
</div>
</body>

<!--Jquery file-->
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/jquery.3.2.1.min.js');?>" type="text/javascript"> </script>
<!--popper file-->
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/popper.min.js');?>" type="text/javascript"></script>
<!--Datepicker file-->
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/jquery-ui.js');?>"></script>
<!--bootstrap file-->
<script src="<?php echo base_url(THEME_PATH.'assets/js/core/bootstrap.min.js ');?>" type="text/javascript"></script>
<!--Datatable file-->
<script src="<?php echo base_url(THEME_PATH.'datatable/js/jquery.dataTables.min.js');?>"></script> 

<script src="<?php echo base_url(THEME_PATH.'datatable/js/dataTables.jqueryui.min.js');?>"></script> 

<script src="<?php echo base_url(THEME_PATH.'assets/js/light-bootstrap-dashboard.js?v=2.0.1');?>" type="text/javascript"></script>
<script>
     $( function() {
        $("#dob").datepicker({
                defaultDate: +0,
                showOtherMonths:true, 
                autoSize: true,
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                changeYear: true,
                maxDate: "+0",
                yearRange: "-120:+0", 
                });

        $('#datatable').DataTable({
                "pageLength" : 5,
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            });
        } );
 </script>
</html>