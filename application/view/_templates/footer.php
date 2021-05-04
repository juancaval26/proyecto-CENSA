</div>
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
<div class="pull-right">
Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
</div>
<div class="clearfix"></div>
</footer>
<!-- /footer content -->

<!-- jQuery -->
<script src="<?php echo URL; ?>Gentelella/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL; ?>Gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL; ?>Gentelella/vendors/fastclick/lib/fastclick.js"></script>
<script src="<?php echo URL; ?>js/select2.full.min.js"></script>
<script src="<?php echo URL; ?>js/select2.min.js"></script>
<!-- NProgress -->
<script src="<?php echo URL; ?>Gentelella/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo URL; ?>Gentelella/build/js/custom.min.js"></script>

<script src="<?php echo URL; ?>js/sweetalert.min.js"></script>

<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo URL; ?>Gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

<script type="text/javascript">
   //$("#e19").select2({ maximumSelectionSize: 1 });
   $("#e19").select2({  multiple: true});

</script>

<script type="text/javascript">
  $(document).ready(function(){
    <?php
    if (isset($_SESSION['alerta']) && $_SESSION['alerta'] != null) {
    echo $_SESSION['alerta'];
    $_SESSION['alerta'] = null;
    }
     ?>
  });
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<script type="text/javascript">
   var url = "<?php echo URL; ?>";
</script>

</body>
</html>
