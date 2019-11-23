<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>

<script>
    $(document).ready(function () {

        var form = $("#submit");

        form.validate({
            rules:{
                character_plate: {
                    required: true
                },
                number_plate: {
                    required: true,
                    min: true
                },
                province_plate: {
                    required: true
                },
                brandId: {
                    required: true
                },
                modelId: {
                    required: true
                },
                detail: {
                    required: true
                },
                // modelofcarId: {
                //     required: true
                // },
                color: {
                    required: true
                } 
            },messages:{
                character_plate: {
                    required: "กรุณากรอกอัษร"
                },
                number_plate:{
                    required: "กรุณากรอกหมายเลข",
                    min: "กรุณากรอกหมายเลขให้ถูกต้อง",
                    number: "กรุณากรอกหมายเลขให้ถูกต้อง"
                },
                province_plate: {
                    required: "กรุณาเลือกจังหวัด"
                },
                brandId:{
                    required: "กรุณาเลือกยี่ห้อรถ"
                },
                modelId: {
                    required: "กรุณาเลือกรุ่นรถ"
                },
                detail:{
                    required: "กรุณาเลือกรายละเอียดรถ"
                },
                // modelofcarId: {
                //     required: "กรุณาเลือกโฉมรถ"
                // },
                color: {
                    required: "กรุณากรอกสีรถ"
                } 
            }
        });
        
        var car_profileId = $("#car_profileId").val();
        
        $.post(base_url+"service/Carprofile/getCarProfile",{
            "car_profileId" : car_profileId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"user/carprofile");
            }

            if(data.message == 200){
                result = data.data;
                $("#character_plate").val(result.character_plate);
                $("#number_plate").val(result.number_plate);
                //  $("#province_plate").val(result.province_plate);
                $("#personalid").val(result.personalid);
                $("#mileage").val(result.mileage);
                $("#color").val(result.color);
                setPictureFront(result.pictureFront);
                setPictureBack(result.pictureBack);
                setPictureCircle(result.circlePlate);
                setProvincePlate(result.province_plate);
                 $("#brandId").val(result.brandId);
                 $("#modelId").val(result.modelId);
                 $("#detail").val(result.detail);
                 $("#modelofcarId").val(result.modelofcarId);
                 getbrand(result.brandId);  province_plate
                getbrand(result);
            }
            
        });

        function setPictureFront(picture){
            $('.image-editor-front').cropit({
                allowDragNDrop: false,
                width: 350,
                height: 350,
                type: 'image/jpeg',
                imageState: {
                    src: base_url+"public/image/carprofile/"+picture
                }
            });
        }

        function setPictureBack(picture){
            $('.image-editor-back').cropit({
                allowDragNDrop: false,
                width: 350,
                height: 350,
                type: 'image/jpeg',
                imageState: {
                    // src: picturePath+"carprofile/"+picture
                }
            });
        }
        
        function setPictureCircle(picture){
            $('.image-editor-form').cropit({
                allowDragNDrop: false,
                width: 600,
                height: 300,
                type: 'image/jpeg',
                imageState: {
                    // src: base_url+"public/image/carprofile/"+picture
                }
            });
        }

        $("#submit").submit(function(){
            updatecarprofile();
        })

        function updatecarprofile(){
            event.preventDefault();
            var isValid = $("#submit").valid();
           
            if(isValid){
                var imageData = $('.image-editor-front').cropit('export');
                $('.hidden-image-front').val(imageData);
                var imageData = $('.image-editor-back').cropit('export');
                $('.hidden-image-back').val(imageData);
                var imageData = $('.image-editor-form').cropit('export');
                $('.hidden-image-form').val(imageData);
                var myform = document.getElementById("submit");
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                url: base_url+"service/Carprofile/updateCarProfile",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"public/carprofile/");
                    }else{
                        showMessage(data.message);
                    }
                }
              });
            }
        };

    
        function setProvincePlate(province=null){
        var provincePlateDropdown = $("#province_plate");
            provincePlateDropdown.append('<option value="">เลือกจังหวัด</option>');
            
            $.post(base_url + "service/Location/getProvinceforcar", {},
                function(data) {
                    var provinceforcar = data.data;
                    $.each(provinceforcar, function(index, value) {
                        // if(province == value.provinceforcarId){
                        //     provincePlateDropdown.append('<option value="' + value.provinceforcarId + '" selected>' + value.provinceforcarName + '</option>');   
                        // }else{
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '">' + value.provinceforcarName + '</option>');                               
                        // }
                    });

                    if(province != null){
                        provincePlateDropdown.val(province);
                    }

                }
            );
        }
        var brand =$("#brandId");
        var model = $("#modelId");
        var modelofcar = $("#modelofcarId");
        var year = $("#yearStart");
        var YearEnd = $("#YearEnd");
        var detail = $("#detail");
        var modelName = $("modelName");
        var modelId = $("modelId");

        function onLoad(){
          setProvincePlate();
          getbrand();
        }
        onLoad();

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
                        model.val(carprofile.detail);
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
                    // getModelOfCar(carprofile);
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
                }
            });
        }

    }); 
        
</script>

</body>
</html>