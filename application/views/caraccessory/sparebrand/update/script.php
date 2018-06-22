<script>
    $("#submit").validate({
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

    
    $("#submit").submit(function(){
        updateBrand();
    })


    function updateBrand(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/SpareBrand/updateSpareBrand",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/SpareBrand/index/"+spares_undercarriageId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
    

</script>

</body>
</html>
