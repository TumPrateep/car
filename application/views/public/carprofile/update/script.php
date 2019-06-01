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
                    maxlength: true
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
                    required: "กรุณากรอกอัษร"
                },
                number_plate:{
                    required: "กรุณากรอกหมายเลข",
                    maxlength: "กรุณากรอกหมายเลขให้ถูกต้อง"
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
                modelofcarId: {
                    required: "กรุณาเลือกโฉมรถ"
                },
                color: {
                    required: "กรุณากรอกสีรถ"
                },
                mileage: {
                    required: "กรุณากรอกเลขไมล์"
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
                // $("#modelId").val(result.modelId);
                // $("#detail").val(result.detail);
                // $("#modelofcarId").val(result.modelofcarId);
                // getbrand(result.brandId);  province_plate
                getbrand(result.brandId, result.modelId, result.modelofcarId);
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

        function getbrand(brandId,modelId,modelofcarId){
            brand.append('<option value="">เลือกยี่ห้อรถ</option>');
            $.post(base_url+"service/Carselect/getCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });
                    brand.val(brandId);
                    getmodel(brandId, modelId, modelofcarId);
                }
            );
        }
        brand.change(function() {
            var brandId = $(this).val();
            getmodel(brandId);
        });

        function getmodel(brandId,modelId,modelofcarId){
            model.html("");
            model.append('<option value="">เลือกรุ่นรถ</option>');
            detail.html("");
            detail.append('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html("");
            modelofcar.append('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                    });
                    model.val(modelId);
                    getdetailcar(brandId, modelId, modelofcarId);
                }
            );
        }
        model.change(function() {
            var modelId = $(this).val();
            getdetailcar(modelId);
        });

        function getdetailcar(brandId,modelId,modelofcarId){
            detail.html("");
            detail.append('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html("");
            modelofcar.append('<option value="">เลือกรายละเอียดรุ่น</option>');            
            $.get(base_url+"service/Carselect/getCarYear",{
                modelId : modelId,
                brandId : brandId
            },function(data){
                var detailData = data.data;
                    $.each( detailData, function( key, value ) {
                        detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
                        // detail.append('<option value="' + value.modelId+'">' + value.yearStart + '</option>');
                    });
                    detail.val(modelId);
                    // getmodelofcar(modelId, modelofcarId);
            });
        }
        // model.change(function() {
        //     var modelofcarId = $(this).val();
        //     getmodelofcar(modelofcarId);
        // });

        // function getmodelofcar(modelId,modelofcarId){
        //     modelofcar.html("");
        //     modelofcar.append('<option value="">เลือกรายละเอียดรุ่น</option>');
        //     $.get(base_url+"service/Carselect/getCarDetail",{
        //         modelofcarId : modelofcarId.val()
        //     },function(data){
        //         var carModelData = data.data;
        //         console.log(carModelData);
        //         $.each( carModelData, function( key, value ) {
        //             modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
        //         });
        //         modelofcar.val(modelofcarId);
        //     });
        // }

    }); 
        
</script>

</body>
</html>