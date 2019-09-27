<script>
    $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    $("#create-tiresmatching").validate({
        rules: {
            brandId: {
                required: true
            },
            modelId: {
                required: true
            },
            tire_rimId: {
                required: true
            },
            tire_sizeId: {
                required: true
            }
        },
        messages: {
            brandId: {
                required: "กรุณาเลือกยี่ห้อรถ"
            },
            modelId: {
                required: "กรุณาเลือกรุ่นรถ"
            },
            tire_rimId: {
                required: "กรุณาเลือกขอบยาง"
            },
            tire_sizeId: {
                required: "กรุณาเลือกขนาดยาง"
            }
        },
    });

    $("#create-tiresmatching").submit(function(){
        createTireMatching();
    })

    // var brand = $("#brandId");
    var model = $("#modelId");
    var tire_rim = $("#tire_rimId");
    var tire_size = $("#tire_sizeId");
    // var modelofcar = $("#modelofcarId");
    
    var spares_undercarriage = $("#spares_undercarriageId");
    var spares_brand = $("#spares_brandId");
    var brand =$("#brandId");
    // var model = $("#modelId");
    var modelofcar = $("#modelofcarId");
    var year = $("#yearStart");
    var YearEnd = $("#YearEnd");
    var detail = $("#detail");
    var modelName = $("modelName");
    var modelId = $("modelId");

    init();

    function init(){
        getbrand();
        getRim();
    }

    function getbrand(){
        brand.html('<option></option>');
        model.html('<option></option>');
        detail.html('<option></option>');
        modelofcar.html('<option></option>');
        $.get(base_url+"service/Carselect/getCarBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>').trigger("chosen:updated");
                });

            }
        );
    }

    brand.change(function(){
        getModel();
    });

    function getModel(){
        var brandId = brand.val();
        model.html('<option></option>');
        detail.html('<option></option>');
        modelofcar.html('<option></option>');
        $.get(base_url+"service/Carselect/getCarModel",{
            brandId : brandId
        },function(data){
            var modelData = data.data;
                $.each( modelData, function( key, value ) {
                    model.append('<option value="' + value.modelName + '">' + value.modelName + '</option>').trigger("chosen:updated");
                });

   
            }
        );
    }

    model.change(function(){
        getDetail();
    });

    function getDetail(){
        var modelName = $("#modelId option:selected").text();
        detail.html('<option></option>');
        modelofcar.html('<option></option>');            
        $.get(base_url+"service/Carselect/getCarYear",{
            modelName : modelName
        },function(data){
            var detailData = data.data;
            $.each( detailData, function( key, value ) {
                detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>').trigger("chosen:updated");
            });
   
        });
    }

    detail.change(function(){
        getModelOfCar();
    });

    function getModelOfCar(){
        modelofcar.html('<option></option>');
        $.get(base_url+"service/Carselect/getCarDetail",{
            modelId : detail.val()
        },function(data){
            var carModelData = data.data;
            console.log(carModelData);
            $.each( carModelData, function( key, value ) {
                modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>').trigger("chosen:updated");
            });

        });
    }

    function getRim(rimId = null){
        tire_rim.html('<option></option>');
        $.get(base_url+"service/Tire/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>').trigger("chosen:updated");
                });
            } 
        );
    }

    tire_rim.change(function(){
        var rimId = tire_rim.val();
        tire_size.html('<option></option>');
        $.get(base_url+"service/Tire/getAllTireSize",{
            rimId: rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>').trigger("chosen:updated");
                });
            }
        );
    });

    function createTireMatching(){
        event.preventDefault();
        var isValid = $("#create-tiresmatching").valid();
        if(isValid){
            var data = $("#create-tiresmatching").serialize();
            $.post(base_url+"api/Tirematching/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/tires/tiresmatching");
                }else{
                    showMessage(data.message,);
                }
            });        
        }
    }

    $('.form-control-chosen-required').chosen({
        allow_single_deselect: false,
        width: '100%'
    });

    $('.form-control-chosen').chosen({
        allow_single_deselect: true,
        width: '100%'
    });

    $('.form-control-chosen-optgroup').chosen({
        allow_single_deselect: true,
        include_group_label_in_selected:true,
        width: '100%'
    });
</script>

</body>
</html>