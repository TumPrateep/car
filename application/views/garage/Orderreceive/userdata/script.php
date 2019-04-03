<script>
    $(document).ready(function () {
        
        var form = $("#update-member-form"); 

       
    });
        var orderId = $("#orderId").val();

        $.post(base_url+"apiGarage/Orderdetail/getuserdata",{
            "orderId" : orderId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"garage/orderreceive/userdata");
            }
            if(data.message == 200){
                result = data.data;
                $("#name").val(result.titleName+" "+result.firstname+" "+result.lastname);
                $("#car_plate").val(result.character_plate+" "+result.number_plate+" "+result.provinceforcarName);
                $("#brandName").val(result.brandName);
                $("#modelName").val(result.modelName);
                $("#yearCar").val("ปี "+result.yearStart+"-"+result.yearEnd);
                $("#modelofcarName").val(result.modelofcarName);
              
            }
     
        });

</script>

</body>
</html>