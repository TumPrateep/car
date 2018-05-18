<script>

    var spares_undercarriageId = $("#spares_undercarriageId").val();

    $.post(base_url+"api/SpareUndercarriage/getsparesUndercarriage",{
        "spares_undercarriageId" : spares_undercarriageId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"SparePartCar/sparepart");
        }

        if(data.message == 200){
            result = data.data;
            $("#spares_undercarriageName").val(result.spares_undercarriageName);
        }
        
    });



    $("#submit").validate({
            rules: {
                spares_undercarriageName: {
                    required: true
                }
            },
            messages: {
                spares_undercarriageName: {
                    required: "กรุณากรอกชื่อรายการอะไหล่"
                }
            }
    });

    $("#submit").submit(function(){
        updatesparesundercarriage();
    })


    function updatesparesundercarriage(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/spareUndercarriage/updatesparesUndercarriage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"SparePartCar/sparepart/"+spares_undercarriageId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
   
</script>

</body>
</html>