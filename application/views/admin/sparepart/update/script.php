<script>

        
    $("#spares").validate({
            rules: {
                spares_brandName: {
                    required: true
                },
            },
            messages: {
                spares_brandName: {
                    required: "กรุณากรอกยี่ห้ออะไหล่"
                }
            },
        });
  


    var spares_brandId = $("#spares_brandId").val();
    var spares_undercarriageId = $("#spares_undercarriageId").val();

    $.post(base_url+"api/SparePartCar/getBrand",{
        "spares_brandId": spares_brandId,
        "spares_undercarriageId" : spares_undercarriageId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/SparePartCar/sparepart/"+spares_undercarriageId);
        }

        if(data.message == 200){
            result = data.data;
            $("#spares_brandName").val(result.spares_brandName);
        }
        
    });

    
    $("#spares").submit(function(){
        updateBrand();
    })


    function updateBrand(){
        event.preventDefault();
        var isValid = $("#spares").valid();
        
        if(isValid){
            var data = $("#spares").serialize();
            $.post(base_url+"api/SparePartCar/updateSpareBrand",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/SparePartCar/sparepart/"+spares_undercarriageId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }



    

</script>

</body>
</html>
