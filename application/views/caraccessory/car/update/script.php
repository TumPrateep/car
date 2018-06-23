<script>
        var brandId = $("#brandId").val();
        
        $.post(base_url+"api/car/getBrand",{
            "brandId": $("#brandId").val()
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"caraccessory/car/"+brandId);
            }
    
            if(data.message == 200){
                result = data.data;
                $("#brandName").val(result.brandName); 
            }
            
        });

        
        $("#submit").validate({
            rules: {
                brandName: {
                    required: true
                },
                brandPicture :{
                    required: true   
            },
            },
            messages: {
                brandName: {
                    required: "กรุณากรอกชื่อยี่ห้อรถ"
                },
                brandPicture :{
                    required: ""   
            },
            }
        });
    
    
        $("#submit").submit(function(){
            updateBrand();
        })

        function updateBrand(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/car/updateBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/car");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
        }
    
</script>

</body>
</html>