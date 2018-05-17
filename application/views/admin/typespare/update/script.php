<script>

    // var spares_undercarriageId = $("#spares_undercarriageId").val();

    // $.post(base_url+"api/spareUndercarriage/getspareUndercarriage",{
    //     "spares_undercarriageId" : spares_undercarriageId
    // },function(data){
    //     if(data.message!=200){
    //         showMessage(data.message,"SparePartCar/sparepart/");
    //     }

    //     if(data.message == 200){
    //         result = data.data;
    //         $("#spares_undercarriageName").val(result.spares_undercarriageName);
    //     }
        
    // });



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


   
</script>

</body>
</html>