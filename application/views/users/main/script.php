
<script>
    $(document).ready(function () {
        var brand = $("#brandId");
        var model = $("#model_name");
        var year = $("#year");
        var modelofcar = $("#modelofcarId");
        
        init();

        function init(){
            getbrand();
        }

        function getbrand(){
            brand.html('<option>ยี่ห้อรถ</option>');
            model.html('<option>รุ่นรถ</option>');
            year.html('<option>ปีที่ผลิต</option>');
            modelofcar.html('<option>รายละเอียดรุ่น</option>');
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
            model.html('<option>รุ่นรถ</option>');
            year.html('<option>ปีที่ผลิต</option>');
            modelofcar.html('<option>รายละเอียดรุ่น</option>');
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
            year.html('<option>ปีที่ผลิต</option>');
            modelofcar.html('<option>รายละเอียดรุ่น</option>');          
            $.get(base_url+"service/Carselect/getMaxMinYear",{
                modelName : modelName
            },function(data){
                for (let i = data.min; i <= data.max; i++) {
                    year.append('<option value="' + i+'">'+i+'</option>');
                }
                
            });
        }

        year.change(function(){
            getModelOfCar();
        });

        function getModelOfCar(){
            modelofcar.html('<option>รายละเอียดรุ่น</option>');
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

    });
</script>