<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script> -->
<script>
    var brand =$("#brandId");
    var model = $("#modelId");
    var modelofcar = $("#modelofcarId");
    var detail = $("#detail");
    var cardataform = $("#cardata");

    function selectCarProfile(car_profileId){
        window.location.href = base_url+"shop/sparepart?carProfileId="+car_profileId;
    }

    cardataform.submit(function (e) { 
        e.preventDefault();
        var isValid = cardataform.valid();
        if(isValid){
            window.location.href = base_url+"shop/sparepart/"+brand.val()+"/"+model.val()+"/"+modelofcar.val()+"/"+detail.val();
        }
    });

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

    function getbrand(carprofile = null){
            brand.html('<option value="">เลือกยี่ห้อรถ</option>');
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });

                    if(carprofile != null){
                        brand.val(carprofile.brandId);
                        getModel(carprofile);
                    }
                }
            );
        }

        brand.change(function(){
            getModel();
        });

        function getModel(carprofile = null){
            var brandId = brand.val();
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelName + '">' + value.modelName + '</option>');
                    });

                    if(carprofile != null){
                        model.val(carprofile.modelId);
                        getDetail(carprofile);
                    }
                }
            );
        }

        model.change(function(){
            getDetail();
        });

        function getDetail(carprofile = null){
            var modelName = $("#modelId option:selected").text();
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            // year.html('<option value="">เลือกปีผลิต</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');            
            $.get(base_url+"service/Carselect/getCarYear",{
                modelName : modelName
            },function(data){
                var detailData = data.data;
                $.each( detailData, function( key, value ) {
                    detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
                });
                if(carprofile != null){
                    detail.val(carprofile.modelId);
                    getModelOfCar(carprofile);
                }
            });
        }
        
        detail.change(function(){
            getModelOfCar();
        });

        function getModelOfCar(carprofile = null){
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarDetail",{
                modelId : detail.val()
            },function(data){
                var carModelData = data.data;
                console.log(carModelData);
                $.each( carModelData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
                });
                if(carprofile != null){
                    modelofcar.val(carprofile.modelofcarId);
                    // table.ajax.reload();
                }
            });
        }

    $(document).ready(function () {
        getbrand();
        
        if(localStorage.userId){
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
        }

        cardataform.validate({
            rules:{
                brandId: {
                    required: true
                },
                modelId: {
                    required: true
                },
                detail: {
                    required: true
                },
                modelofcarId: {
                    required: true
                } 
            },messages:{
                brandId:{
                    required: "กรุณาเลือกยี่ห้อรถ"
                },
                modelId: {
                    required: "กรุณาเลือกรุ่นรถ"
                },
                detail:{
                    required: "กรุณาเลือกรายละเอียดรถ"
                },
                modelofcarId: {
                    required: "กรุณาเลือกโฉมรถ"
                } 
            }
        });
    });


</script>

</body>

</html>