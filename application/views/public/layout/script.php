<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<script>

    function selectCarProfile(car_profileId){
        alert(car_profileId);
    }
    function getAllCarProfile(){
        $.get(base_url+"service/Carprofile/getAllCarProfileByUserId", {},
            function (data, textStatus, jqXHR) {
                var html = "";
                $.each(data, function (i, v) { 
                    var active = (i==0)?" active":"";
                    html += '<div class="main-item carousel-item item-'+i+' col-md-3 cursor-hand '+active+'" onclick="selectCarProfile('+v.car_profileId+')"><div class="card"><div class="card-body"><div class="card-two"><header><div class="avatar img-pandding "><img src="'+base_url+'/public/image/carprofile/'+v.pictureFront+'" width="100%"></div></header><div class="from-padding"><div class="desc card border-black "><span class="text-center txt-S-m">'+v.character_plate+'  '+v.number_plate+'</span><span class="text-center txt-S-s">'+v.provinceforcarName+'</span></div></div></div></div></div></div>';
                });
                $("#carprofile").html(html);
            }
        );
    }

    $(document).ready(function () {
        getAllCarProfile();

        $("#myCarousel").on("slide.bs.carousel", function(e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 4;
            var totalItems = $(".main-item").length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    
                    // append slides to end
                    if (e.direction == "left") {
                        $(".main-item").eq(i)
                            .appendTo(".main-carousel");
                    } 
                    else {
                        $(".main-item")
                            .eq(0)
                            .appendTo($(this).find(".main-carousel"));
                    }
                }
            }
        });
    });


</script>

</body>

</html>