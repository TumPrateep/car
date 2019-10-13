<script>
    $(document).ready(function () {
        var brand = $("#brandId");
        var modelOfCar = $('#modelId');
        var model = $("#model_name");
        var year = $("#year");
        var modelofcar = $("#modelofcarId");

        $("#car-search").validate({
            rules: {
                brandId: {
                    required: true
                },
                model_name: {
                    required: true
                },
                year: {
                    required: true
                },
                modelofcarId: {
                    required: true
                }
            },
            messages: {
                brandId: {
                    required: "กรอกยี่ห้อรถ"
                },
                model_name: {
                    required: "กรอกรุ่นรถ"
                },
                year: {
                    required: "กรอกปีที่ผลิต"
                },
                modelofcarId: {
                    required: "กรอกรายละเอียดรุ่น"
                }
            },
        });
        
        init();

        function init(){
            getbrand();
        }

        function getbrand(){
            brand.html('<option value="">ยี่ห้อรถ</option>');
            model.html('<option value="">รุ่นรถ</option>');
            year.html('<option value="">ปีที่ผลิต</option>');
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getActiveCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });
                }
            );
        }

        brand.change(function(){
            getModel();
        });

        function getModel(carprofile = null){
            var brandId = brand.val();
            model.html('<option value="">รุ่นรถ</option>');
            year.html('<option value="">ปีที่ผลิต</option>');
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getActiveCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelName + '">' + value.modelName + '</option>');
                    });
                }
            );
        }

        model.change(function(){
            getYear();
        });

        function getYear(){
            var brandId = brand.val();
            var modelName = $("#model_name option:selected").text();
            year.html('<option value="">ปีที่ผลิต</option>');
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');          
            $.get(base_url+"service/Carselect/getMaxMinYear",{
                modelName : modelName
            },function(data){
                $("#car_type").val(data.car_type);
                if(!data.max){
                    data.max = data.min;
                }
                for (let i = data.max; i >= data.min; i--) {
                    year.append('<option value="' + i+'">'+i+'</option>');
                }
                showDetail();
                
            });
        }

        function showDetail(){
            var car_type = $('#car_type').val();
            console.log(car_type);
            if(car_type == '1'){
                $("#show-detail").hide();
            }else{
                $("#show-detail").show();
                modelOfCar.html('<option value="">ข้อมูลเพิ่มเติม</option>');
            }
        }

        year.change(function(){
            var car_type = $('#car_type').val();
            if(car_type == '1'){
                getModelOfCar();
            }else{
                getDetailOfCar();
            }
        });

        function getDetailOfCar(){
            modelOfCar.html('<option value="">ข้อมูลเพิ่มเติม</option>');
            $.get(base_url+"service/Carselect/getModelByYear",{
                brandId: brand.val(),
                modelName: $("#model_name option:selected").text(),
                year : year.val()
            },function(data){
                var carModelData = data.data;
                $.each( carModelData, function( key, value ) {
                    modelOfCar.append('<option value="' + value.modelId+'">' + value.detail+'</option>');
                });
            })
        }

        modelOfCar.change(function(){
            getModelOfCarByModelId();
        });

        function getModelOfCarByModelId(){
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getModelOfCarByModelId",{
                modelId: modelOfCar.val()
            },function(data){
                var carModelData = data.data;
                // console.log(carModelData);
                var html  = '';
                $.each( carModelData, function( key, value ) {
                    let modelofcarName = (value.modelofcarName)?value.modelofcarName:'';
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ modelofcarName +'</option>');
                });
            });
        }

        function getModelOfCar(){
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getModelOfCarByYear",{
                brandId: brand.val(),
                modelName: $("#model_name option:selected").text(),
                year : year.val()
            },function(data){
                var carModelData = data.data;
                // console.log(carModelData);
                var html  = '';
                $.each( carModelData, function( key, value ) {
                    let modelofcarName = (value.modelofcarName)?value.modelofcarName:'';
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ modelofcarName +'</option>');
                });
            });
        }

        $('#car-search').submit(function (e) { 
            e.preventDefault();
            var isvalid = $(this).valid();
            if(isvalid){
                window.location.href = base_url+'products/tire?'+$(this).serialize();
            }
        });

    });
</script>