<script> 
    $(document).ready(function () {
        var brand = $("#brandId");
        var model = $("#model_name");
        var machine = $("#machine_id");
        var gear = $("#lubricator_gear");
        var lubricator_brand = $("#lubricator_brandId");
        var lubricator = $("#lubricatorId");
        // call data 
        
        init();

        function init(){
            getbrand();
            getMatchine();
        }

        function getbrand(){
            brand.html('<option></option>');
            model.html('<option></option>');
            
            $.get(base_url+"service/Carselect/getCarBrand",
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

        function getMatchine(){
            machine.html('<option></option>');
            $.post(base_url+"api/machine/getAllmachine", {},
                function (data, textStatus, jqXHR) {
                    var machineData = data.data;
                    $.each( machineData, function( key, value ) {
                        machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>').trigger("chosen:updated");
                    });
                }
            );
        }

        machine.change(function(){
            getLubricatorGear();
        })

        function getLubricatorGear(){
            gear.html('<option></option>');
            gear.append('<option value="1">น้ำมันเครื่อง</option>').trigger("chosen:updated");
            gear.append('<option value="2">น้ำมันเกียร์ธรรมดา</option>').trigger("chosen:updated");
            gear.append('<option value="3">น้ำมันเกียร์ออโต</option>').trigger("chosen:updated");
        }
        
        gear.change(function(){
            getLubricatorBrand();
        });

        function getLubricatorBrand(){
            lubricator_brand.html("<option></option>").trigger("chosen:updated");
            lubricator.html("<option></option>").trigger("chosen:updated");

            $.get(base_url+"api/lubricatorbrand/getAllLubricatorbrand",
                function (data, textStatus, jqXHR) {
                    var lubricatorBrandData = data.data;
                    $.each(lubricatorBrandData, function (key, value) { 
                        lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>').trigger("chosen:updated");
                    }); 
                }
            );
        }

        lubricator_brand.change(function(){
            getLubricator();
        });

        function getLubricator(){
            var lubricator_gear = gear.val();
            var lubricator_brand_id = lubricator_brand.val();
            var machine_id = machine.val();
            lubricator.html('<option></option>')
            $.post(base_url+"api/lubricator/getAlllubricator", {
                "lubricator_gear": lubricator_gear,
                "lubricator_brandId": lubricator_brand_id,
                "machine_id": machine_id
            },function (data, textStatus, jqXHR) {
                var lubricatorData = data.data;
                $.each(lubricatorData, function (key, value) { 
                    var capacity = (value.capacity)?' '+value.capacity+' ลิตร':''; 
                    lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName +' '+value.lubricator_number+capacity+'</option>').trigger("chosen:updated");                     
                });
            });
        }

        // end call data

        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
        $("#create-lubricatormatching").validate({
            rules: {
                brandId: {
                    required: true
                },
                model_name: {
                    required: true   
                } ,
                machine_id: {
                    required: true   
                } ,
                lubricator_brandId: {
                    required: true 
                },
                lubricator_gear: {
                    required: true   
                } ,
                lubricatorId: {
                    required: true   
                } 
            },
            messages: {
                brandId: {
                    required: "กรุณาเลือกยี่ห้อรถ"
                },
                model_name: {
                    required: "กรุณาเลือกรุ่นรถ"
                },
                machine_id: {
                    required: "กรุณาเลือกประเภทเครื่องยนต์"
                },
                lubricator_brandId: {
                    required: "กรุณาเลือกยี่ห้อน้ำมันเครื่อง" 
                },
                lubricator_gear: {
                    required: "กรุณาเลือกชนิดน้ำมันเครื่อง"
                },
                lubricatorId: {
                    required: "กรุณาเลือกน้ำมันเครื่อง"
                }
            },
        });

        $("#create-lubricatormatching").submit(function (e) { 
            e.preventDefault();
            var isValid = $(this).valid();
            if(isValid){
                $.post(base_url+"api/Lubricatormatching/create", {
                    "brand_id" : brand.val(),
                    "model_name" : model.val(),
                    "lubricator_gear" : gear.val(),
                    "machine_id" : machine.val(),
                    "lubricator" : lubricator.val()
                },function (data, textStatus, jqXHR) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/lubricatormatching");
                    }else{
                        showMessage(data.message);
                    }
                });
            }
        });

        $('.form-control-chosen-required').chosen({
            allow_single_deselect: false,
            width: '100%'
        }); 

        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
    });

</script>

</body>
</html>