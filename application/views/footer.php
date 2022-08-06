
 
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; SISTEM INFORMASI AGENDA KEGIATAN DAN DATA E-ARSIP SURAT MENYURAT DINAS PEMUDA DAN OLAHRAGA KABUPATEN TAPIN. </span>
    </p>
  </footer>
   <noscript>
   <P class="alert bg-danger alert-dismissible mb-2" role="alert">
      <strong>MOHON MAAF HALAMAN INI WAJIB MENGGUNAKAN JAVASCRIPT, HARAP AKTIFKAN JAVASCRIPT ANDA</strong>
    </P>
   <style>div { display:none; }</style>
 </noscript>
  <!-- BEGIN VENDOR JS-->
<!--   <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script> -->
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/forms/validation/form-validation.js"
  type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/myscript.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.js-example-basic-multiple').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
</script>


 <script src="<?php echo base_url();?>assets/alert/query.js"></script>
<script type="text/javascript">
    $( '.uang' ).mask('00.000.000.000', {reverse: true});
</script>
</body>
</html>

<?php if($this->session->flashdata('notif_withdrawal_admin') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: '-',
})
 </script>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $('#mySelect2').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
});

</script>

