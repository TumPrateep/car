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
                    required: true
                },
                province_plate: {
                    required: true
                },
                brandId: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                modelId: {
                    required: true
                
                },
                detail: {
                    required: true,
                    pid: true
                },
                modelofcarId: {
                    required: true
                },
                color: {
                    required: true 
                },
                mileage: {
                    required: true 
                }
            },messages:{
                character_plate: {
                    required: "กรุณากรอกอักษรนำหน้า"
                },
                number_plate: {
                    required: "กรุณากรอกหมายเลข",
                    min: "กรอกข้อมูลไม่ถูกต้อง"
                },
                province_plate: {
                    required: "กรุณากรอกจังหวัด"
                },
                brandId: {
                    required: "กรุณากรอกยี่ห้อ"
                },
                modelId: {
                    required: "กรุณาเลือกรุ่นรถ"
                
                },
                detail: {
                    required: "กรุณาเลือกโฉมรถยนต์"
                },
                modelofcarId: {
                    required: "กรุณาเลือกรายละเอียดรุ่น"
                },
                color: {
                    required: "กรุณากรอกสี" 
                },
                mileage: {
                    min: "กรอกข้อมูลไม่ถูกต้อง"
                }
            }
        });
        var car_profileId = $("#car_profileId").val();
        
        $.post(base_url+"service/Carprofile/getCarProfile",{
            "car_profileId" : car_profileId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"public/carprofile");
            }

            if(data.message == 200){
                result = data.data;
                $("#character_plate").val(result.character_plate);
                $("#number_plate").val(result.number_plate);
                // $("#province_plate").val(result.province_plate);
                $("#personalid").val(result.personalid);
                $("#mileage").val(result.mileage);
                $("#color").val(result.color);
                setBrandPicture(result.pictureFront);
                setProvincePlate(result.province_plate);
                // $("#brandId").val(result.brandId);
                $("#brandId").val(result.brandName);
                // getbrand(result.brandId);  province_plate
            }
            
        });

        function setBrandPicture(picture){
                    $('.image-editor').cropit({
                        allowDragNDrop: false,
                        width: 200,
                        height: 200,
                        type: 'image',
                        imageState: {
                            src: picturePath+"carprofile/"+picture
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
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
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
                        if(province == value.provinceforcarId){
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '" selected>' + value.provinceforcarName + '</option>');   
                        }else{
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '">' + value.provinceforcarName + '</option>');                               
                        }
                    });
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

        function getbrand(brandId = null ){
            
            brand.append('<option value="">เลือกยี่ห้อรถ</option>');
            $.post(base_url+"service/Carselect/getCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });
                }
            );
        }

        brand.change(function(){
            var brandId = brand.val();
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            // year.html('<option value="">เลือกปีผลิต</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                    });
                }
            );
        });

        model.change(function(){
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
            });
        });

        detail.change(function(){
            // var modelId = model.val();
            // var detail = $("#detail").val();
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarDetail",{
                modelId : detail.val()
            },function(data){
                var carModelData = data.data;
                console.log(carModelData);
                $.each( carModelData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
                });
            });
        });

    }); 
        
</script>

</body>
</html>