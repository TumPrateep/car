<script>
    $(document).ready(function () {
        
        var form = $("#update-member-form"); 
    });

        var garageId = $("#garageId").val();

        $.post(base_url+"apiGarage/Managegarage/getmanagegarage",{
            "garageId" : garageId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"garage/managegarage");
            }
            if(data.message == 200){
                result = data.data;
                $("#garageName").val(result.garageName);
                $("#phone").val(result.phone);
                $("#businessRegistration").val(result.businessRegistration);
                $("#personalid").val(result.personalid);
                $("#hno").val(result.hno);
                $("#alley").val(result.alley);
                $("#road").val(result.road);
                $("#village").val(result.village);
                $("#provinceId").val(result.provinceId);
                $("#districtId").val(result.districtId);
                $("#postCode").val(result.postCode);
                $("#subdistrictId").val(result.subdistrictId);
                $("#latitude").val(result.latitude);
                $("#longtitude").val(result.longtitude);
                setBrandPicture(result.picture);
            }

            loadProvinceGarage(result.provinceId,result.districtId,result.subdistrictId);
            
        });

        $("#submit").validate({
                rules: {
                    firstName: {
                        required: true
                    }
                },
                messages: {
                    firstName: {
                        required: "กรุณากรอกชื่อ"
                    }
                }
        });


        $("#submit").submit(function(){
            updategarage();
        })


        function updategarage(){
            event.preventDefault();
            var isValid = $("#submit").valid();
           
            
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);

                $.ajax({
                url: base_url+"apiGarage/Managegarage/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"garage/Managegarage/");
                    }else{
                        showMessage(data.message);
                    }
                }
              });
            }
        };

</script>

</body>
</html>