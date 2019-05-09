    <!-- All Jquery -->
    <script src="<?=base_url()?>public/themes/garage/js/lib/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/jquery.slimscroll.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/metisMenu.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/sidebarmenu.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/morris-chart/morris.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/calendar-2/prism.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/calendar-2/pignose.init.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/scripts.js"></script>
    <script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
    <script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
    <script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
    <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>public/js/additional-methods.min.js"></script>
    <script src="<?=base_url()?>public/themes/garage/js/setup.js"></script>
    <script src="<?=base_url("/public/js/currency.min.js") ?>"></script>
    <script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>

    <script src="<?=base_url("/public/js/fullcalendar.js") ?>"></script>
    <script src='<?=base_url("/public/js/locale-all.js") ?>'></script>

    <script src="<?=base_url("/public/js/jquery-dateformat.min.js") ?>"></script>
    

    <script>
        function substr(str) {
            // var str = null;
            var res = str.substring(0, 13);
            if(str.length >= 13){
                res += "...";
            }
            return res;
        }
    </script>

    <script>
        function unD(un) {;
            var newun = null;
            if(un == undefined){
                newun = "-";
            }else{
                return un; 
            }
            return newun;
        }
    </script>

    <script>
        function changeStringGS(str){
            var html = "";
            var job = ["บริการเปลี่ยนอะไหล่","บริการเปลี่ยนยางรถ","บริการเปลี่ยนน้ำมันเครื่อง"];

            for(var i=0;i<str.length;i++){   // 1111011
                if(str.charAt(i) == "1"){
                    html += job[i]+", ";
                }
            }
            return html.substring(0, html.length);
        }
    </script>