<footer class="main-footer">
    <div class="pull-right hidden-xs">
        All rights reserved
    </div>
    <strong>Copyright &copy; 2017</strong>
</footer>
</div><!-- ./wrapper -->

<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url().'/assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'/assets/plugins/datatables/datatables.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'/assets/dist/js/app.min.js'?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url().'/assets/plugins/select2/select2.full.min.js'?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url().'/assets/plugins/iCheck/icheck.min.js'?>"></script>
<!-- Chart -->
<script src="<?php echo base_url().'/assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<!-- Sweet Alert -->
<script src="<?php echo base_url().'/assets/plugins/sweetalert-master/dist/sweetalert.min.js'?>"></script>
<script src="<?php echo base_url().'/assets/plugins/sweetalert-master/dist/sweetalert.min.js'?>"></script>


    
<script>
  
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
     $(function () {
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

      //Timepicker
        $(".timepicker").timepicker({
          showInputs: false,
          orientation:"top right"
        });
        $('#date').datepicker({format: 'yyyy-mm-dd'});

</script>

</body>
</html>
