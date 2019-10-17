  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="<?=base_url('public/')?>plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="<?=base_url('public/')?>plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url('public/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="<?=base_url('public/')?>plugins/smoothscroll/SmoothScroll.min.js"></script>  
  
  <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>

  <script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
  <script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
  
  <script>var base_url = '<?=base_url()?>';</script>

  <script>
    function distance(lat1, lon1, lat2, lon2, unit) {
      if(lat1>0 && lat2>0 && lon1>0 && lon2>0){
            if ((lat1 == lat2) && (lon1 == lon2)) {
                return "ประมาณ "+'<span class="distance-txt">'+0+'</span>'+" กม.";
            }
            else {
                var radlat1 = Math.PI * lat1/180;
                var radlat2 = Math.PI * lat2/180;
                var theta = lon1-lon2;
                var radtheta = Math.PI * theta/180;
                var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                if (dist > 1) {
                    dist = 1;
                }
                dist = Math.acos(dist);
                dist = dist * 180/Math.PI;
                dist = dist * 60 * 1.1515;
                if (unit=="K") { dist = dist * 1.609344 }
                if (unit=="N") { dist = dist * 0.8684 }
                return '<span class="distance-txt">'+dist.toFixed(2)+'</span>'+" กม.";
            }
        }else{
            return "";
        }
    }
  </script>