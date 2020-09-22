<script> 
    $(document).ready(function () {
        var brand = $("#brandId");
        var model = $("#model_name");
        var detail = $("#detail");
        var gear = $("#lubricator_gear");
        var lubricator_number = $("#lubricator_numberId");
        var mileage = $("#mileage");
        // // call data 
        
        init();

        function init(){
            getฺBrand();
            getLubricatorGear();
        }

        function getฺBrand(){
            brand.html('<option></option>');
            model.html('<option></option>');
            detail.html('<option></option>');
            
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
            detail.html('<option></option>');
            $.get(base_url+"service/Carselect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>').trigger("chosen:updated");
                    });
                }
            );
        }

        model.change(function(){
            getDetail();
        });

        function getDetail(){
            var modelName = $("#model_name option:selected").text();
            detail.html('<option></option>');
            $.get(base_url+"service/Carselect/getCarYear",{
                modelName : modelName
            },function(data){
                var detailData = data.data;
                $.each( detailData, function( key, value ) {
                    detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>').trigger("chosen:updated");
                });
    
            });
        }

        // function getMatchine(){
        //     machine.html('<option></option>');
        //     $.post(base_url+"api/machine/getAllmachine", {},
        //         function (data, textStatus, jqXHR) {
        //             var machineData = data.data;
        //             $.each( machineData, function( key, value ) {
        //                 machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>').trigger("chosen:updated");
        //             });
        //         }
        //     );
        // }

        // machine.change(function(){
        //     getLubricatorGear();
        // })

        function getLubricatorGear(){
            gear.html('<option></option>');
            gear.append('<option value="1">น้ำมันเครื่อง</option>').trigger("chosen:updated");
            gear.append('<option value="2">น้ำมันเกียร์ธรรมดา</option>').trigger("chosen:updated");
            gear.append('<option value="3">น้ำมันเกียร์ออโต</option>').trigger("chosen:updated");
        }
        
        gear.change(function(){
            getAllLubricatorNumber();
        });

        function getAllLubricatorNumber(){
            lubricator_number.html('<option></option>');
            $.post(base_url+"api/Lubricatornumber/getAllLubricatorNumber",{
                lubricator_gear: gear.val()
            },function(result){
                    var data = result.data;
                    if(data != null){
                        $.each( data, function( key, value ) {
                            lubricator_number.append('<option value="' + value.lubricator_numberId + '">' + value.lubricator_number + '</option>').trigger("chosen:updated");
                        });
                    }
                }
            );
        }

        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
        $("#create-lubricatormatching").validate({
            rules: {
                brandId: {
                    required: true
                },
                model_name: {
                    required: true   
                },
                detail: {
                    required: true   
                },
                lubricator_numberId: {
                    required: true 
                },
                lubricator_gear: {
                    required: true   
                },
                mileage: {
                    required: true   
                } 
            },
            messages: {
                brandId: {
                    required: "เลือกยี่ห้อรถ"
                },
                model_name: {
                    required: "เลือกรุ่นรถ"
                },
                detail: {
                    required: "เลือกโฉมรถยนต์"   
                },
                lubricator_numberId: {
                    required: 'เลือกเบอร์น้ำมันเครื่อง' 
                },
                lubricator_gear: {
                    required: "เลือกชนิดน้ำมันเครื่อง"
                },
                mileage: {
                    required: "ระบุเลขไมล์"
                }
            },
        });

        $("#create-lubricatormatching").submit(function (e) { 
            e.preventDefault();
            var isValid = $(this).valid();
            if(isValid){
                $.post(base_url+"api/Lubricatormatching/create", {
                    "brand_id" : brand.val(),
                    "model_id" : model.val(),
                    "detail": detail.val(),
                    "lubricator_gear" : gear.val(),
                    "lubricator_number" : lubricator_number.val(),
                    "mileage": mileage.val()
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