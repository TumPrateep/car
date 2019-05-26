<script>

    function checkID(id) {
            if(id.length != 13) return false;
            for(i=0, sum=0; i < 12; i++)
                sum += parseFloat(id.charAt(i))*(13-i);
            if((11-sum%11)%10!=parseFloat(id.charAt(12)))
                return false;
            return true;
        }

        jQuery.validator.addMethod("pid", function(value, element) {
          return checkID(value);
        }, 'กรุณากรอกเลขที่บัตรประชาชนให้ถูกต้อง');


    $(document).ready(function () {

        var letters = /^[ก-๙a-zA-Z]+$/;  
        var form = $("#submit");
        
        jQuery.validator.addMethod("THEN", function(value, element) {
            return this.optional(element) || /^[ก-๙a-zA-Z]+$/.test(value);
        }, 'asasas');

        // form.validate({
        //     rules:{
        //         firstName: {
        //             required: true,
        //             THEN: true
        //         },
        //         lastName: {
        //             required: true,
        //             THEN: true
        //         },
        //         exp: {
        //             required: true
        //         },
        //         phone: {
        //             required: true,
        //             minlength: 9,
        //             maxlength: 10
        //         },
        //         skill: {
        //             required: true
        //         },
        //         personalid: {
        //             required: true,
        //             pid: true
        //         }
        //     },messages:{
        //         firstName: {
        //             required: "กรุณากรอกชื่อ",
        //             THEN: "กรอกข้อมูลไม่ถูกต้อง"
        //         },
        //         lastName: {
        //             required: "กรุณากรอกนามสกุล",
        //             THEN: "กรอกข้อมูลไม่ถูกต้อง"
        //         },
        //         exp: {
        //             required: "กรุณากรอกประสบการณ์(ปี)"
        //         },
        //         phone: {
        //             required: "กรุณากรอกเบอร์โทรศัพท์",
        //             minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
        //             maxlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ"
        //         },
        //         skill: {
        //             required: "กรุณาเลือกความชำนาญ"
        //         },
        //         personalid: {
        //             required: "กรุณาใส่บัตรประชาชน",
        //             pid: "กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง"
        //         }
        //     }
        // });
    });

 


        var orderId = $("#orderId").val();

        $.post(base_url+"apicaraccessories/deliverorder/getexport",{
            "orderId" : orderId
        },function(data){
            // console.log(data.data);
            if(data.message!=200){
                // showMessage(data.message,"car/caraccessory"); phonegarage
            }
            if(data.message == 200){
                result = data.data;
                $("#car_accessoriesName").val(result.car_accessoriesName);
                $("#phonecar").val(result.phonecar);
                $("#addresscar").val(result.address);
                $("#garageName").val(result.garageName);
                $("#phonegarage").val(result.phonegarage);
                $("#addressgarage").val(result.hno+"  หมู่ที่"+result.village+"  ถนน"+result.road+"  ซอย"+result.alley+"  ตำบล"+result.subdistrictName+"  อำเภอ"+result.districtName+"  จังหวัด"+result.provinceName+"  รหัสไปรษณีย์"+result.postCode);
                $("#addresscar").val(result.hno+"  หมู่ที่"+result.village+"  ถนน"+result.road+"  ซอย"+result.alley+"  ตำบล"+result.carsubdistrictName+"  อำเภอ"+result.cardistrictName+"  จังหวัด"+result.carprovinceName+"  รหัสไปรษณีย์"+result.postCode);
                // $("#addresscar").val(result.addresscar);
            }
            
        });


        var provinceDropdownGarage = $("#provinceId");
        provinceDropdownGarage.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdownGarage = $('#districtId');
        districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdownGarage = $('#subdistrictId');
        subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');


        function loadProvinceGarage(provinceId, districtId,subdistrictId){
            $.post(base_url+"apiuser/locationforregister/getProvince",{},
                function(data){
                var province = data.data;
                $.each(province, function( index, value ) {
                    provinceDropdownGarage.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
                });

                provinceDropdownGarage.val(provinceId);
                loadDistrictGarage(provinceId, districtId,subdistrictId);
                }
            );
            }

            provinceDropdownGarage.change(function(){
            var provinceId = $(this).val();
            loadDistrictGarage(provinceId);
            });

            function loadDistrictGarage(provinceId, districtId,subdistrictId){
            districtDropdownGarage.html("");
            districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdownGarage.html("");
            subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');

            $.post(base_url+"apiuser/locationforregister/getDistrict",{
                provinceId: provinceId
            },
                function(data){
                var district = data.data;
                $.each(district, function( index, value ) {
                    districtDropdownGarage.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
                });
                districtDropdownGarage.val(districtId);
                loadSubdistrictGarage(districtId,subdistrictId);
                }
            );

            }

            districtDropdownGarage.change(function(){
            var districtId = $(this).val();
            loadSubdistrictGarage(districtId);
            });

            function loadSubdistrictGarage(districtId,subdistrictId){
            subdistrictDropdownGarage.html("");
            subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');
                
            $.post(base_url+"apiuser/locationforregister/getSubdistrict",{
                districtId: districtId
            },
                function(data){
                var subDistrict = data.data;
                $.each(subDistrict, function( index, value ) {
                    subdistrictDropdownGarage.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
                });
                subdistrictDropdownGarage.val(subdistrictId);
                }
            );
            }

    
        $("#submit").submit(function(){
            updatemechanic();
        })


        // function updatemechanic(){
        //     event.preventDefault();
        //     var isValid = $("#submit").valid();
           
            
        //     if(isValid){
        //         var imageData = $('.image-editor').cropit('export');
        //         $('.hidden-image-data').val(imageData);
        //         var myform = document.getElementById("submit");
        //         var formData = new FormData(myform);

        //         $.ajax({
        //         url: base_url+"apiGarage/Mechanic/updateOwner",
        //         data: formData,
        //         processData: false,
        //         contentType: false,
        //         type: 'POST',
        //         success: function(data){
        //             if(data.message == 200){
        //                 showMessage(data.message,"garage/managegarage/");
        //             }else{
        //                 showMessage(data.message);
        //             }
        //         }
        //       });
        //     }
        // };
        
</script>

</body>
</html>