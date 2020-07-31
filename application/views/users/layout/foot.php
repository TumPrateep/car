  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="<?=base_url('public/plugins/jquery/jquery.js')?>"></script>
  <script src="<?=base_url("/public/js/jquery.cropit.js")?>"></script>
  <!-- Popper js -->
  <script src="<?=base_url('public/plugins/popper/popper.min.js')?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url('public/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
  <!-- Smooth Scroll -->
  <script src="<?=base_url('public/plugins/smoothscroll/SmoothScroll.min.js')?>"></script>

  <script src="<?=base_url('public/js/jquery.validate.min.js')?>"></script>
  <script src="<?=base_url('public/js/additional-methods.min.js')?>"></script>

  <script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js")?>"></script>
  <script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js")?>"></script>
  <script src="<?=base_url("/public/js/currency.min.js")?>"></script>
  <script src="<?=base_url("/public/js/jquery.cookie.js")?>"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162027611-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162027611-1');
</script>


  <script type="module">
    localStorage.token = $.cookie('token');
    localStorage.userId = $.cookie('userId');
  </script>
  <script>var base_url = '<?=base_url()?>';</script>
  <script src="<?=base_url("/public/themes/user/js/setup.js")?>?<?php echo time(); ?>"></script>
  <script>
    function distance(lat1, lon1, lat2, lon2, unit) {
        if (lat1 > 0 && lat2 > 0 && lon1 > 0 && lon2 > 0) {
            if ((lat1 == lat2) && (lon1 == lon2)) {
                return "ประมาณ " + '<span class="distance-txt">' + 0 + '</span>' + " กม.";
            } else {
                var radlat1 = Math.PI * lat1 / 180;
                var radlat2 = Math.PI * lat2 / 180;
                var theta = lon1 - lon2;
                var radtheta = Math.PI * theta / 180;
                var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(
                    radtheta);
                if (dist > 1) {
                    dist = 1;
                }
                dist = Math.acos(dist);
                dist = dist * 180 / Math.PI;
                dist = dist * 60 * 1.1515;
                if (unit == "K") {
                    dist = dist * 1.609344
                }
                if (unit == "N") {
                    dist = dist * 0.8684
                }
                return '<span class="distance-txt">' + dist.toFixed(2) + '</span>' + " กม.";
            }
        } else {
            return "";
        }
    }

    function logout() {
        localStorage.clear();
        window.location = base_url + "auth/logout";
    }

    function changeStringToDay(str) {
        var html = "";
        var day = ["จ", "อ", "พ", "พฤ", "ศ", "ส", "อา"];

        for (var i = 0; i < str.length; i++) {
            if (str.charAt(i) == "1") {
                html += day[i] + ", ";
            }
        }
        return html.substring(0, html.length - 2);
    }
    loadBanner();

    function loadBanner() {
        $.get(base_url + "service/banner/getAllBanner", {},
            function(data, textStatus, jqXHR) {
                $.each(data.data, function(i, v) {
                    let active = '';
                    if (i == 0) {
                        active = "active";
                    }
                    let html = '<div class="carousel-item ' + active + '">' +
                        '<img src="' + base_url + 'public/image/promote/' + v.image_url +
                        '" class="d-block w-100">' +
                        '</div>';
                    $(".carousel-inner").append(html);
                });
            }
        );
    }

    loadNews();

    function loadNews(){
        $.get(base_url + "service/banner/getAllNews", {limit:3},
            function(data, textStatus, jqXHR) {
                $.each(data.data, function(i, v) {
                    let html = '<div class="col-lg-4 col-md-6">'
                        + '<div class="card">'
                            + '<a href="'+base_url+'user/news/detail/'+v.news_id+'">'
                                + '<img src="'+base_url+'public/image/news/'+v.news_picture+'" class="card-img-top">'
                                + '<div class="card-body">'
                                    + '<strong class="card-title text-orange">'+v.news_title+'</strong>'
                                + '</div>'
                            + '</a>'
                        + '</div>'
                    + '</div>';
                    $("#news-item").append(html);
                });
            }
        );
    }

    // $('.banner-bottom').hide();
    getPublish();

    function getPublish(){
        $.post(base_url+"service/publish/getadvertisement_picture",function(data){
            if(data.message == 200){
                result = data.data;
                $("#advertisement_picture_show").css('background-image', 'url(' + base_url + 'public/image/publish/'+result.advertisement_picture+')');  
                // $('.banner-bottom').show();
            }else{
                $('.banner-bottom').hide();
            }
        });
    }

    $('.banner-bottom').hide();

    $(window).resize(function() {
        var width = $(window).width(); // New width
        if(width < 960){
            $('.banner-bottom').hide();
        }else{
            // $('.banner-bottom').show();
        }
    });
    // $('.banner-bottom').show();
    
    $('.banner-bottom').click(function(){
        $('.banner-bottom').hide();
    });

  </script>