  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url("/public/vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?=base_url("/public/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url("/public/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?=base_url("/public/vendor/chart.js/Chart.min.js") ?>"></script>
    <script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
    <script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url("/public/js/sb-admin.min.js") ?>"></script>
   
    <script src="<?=base_url("/public/js/setup.js") ?>"></script>

    <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>

    <script src="<?php echo base_url() ?>public/js/additional-methods.min.js"></script>

    <script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
    
    
    <script src="<?=base_url("/public/js/popper.min.js") ?>"></script>

    <script src="<?=base_url("/public/js/currency.min.js") ?>"></script>

    <script src="<?=base_url("/public/js/fileinput.js") ?>"></script>

    <script src="<?=base_url("/public/locales/th.js") ?>"></script>
    
    <script>
        $(document).ready(function(){
          $("li.active").closest( "ul" ).addClass(" show");
          
          if($('sidenav-second-level li').hasClass('active') || $('.sidenav-third-level li').hasClass('active')){
            $(".sidenav-second-level").addClass(" show")
          }
        });
    </script>

   