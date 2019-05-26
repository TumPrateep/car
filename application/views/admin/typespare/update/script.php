<script>

    var spares_undercarriageId = $("#spares_undercarriageId").val();

    $.post(base_url+"api/Spareundercarriage/getsparesUndercarriage",{
        "spares_undercarriageId" : spares_undercarriageId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/sparepartcar/sparepart");
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
            $.post(base_url+"api/Spareundercarriage/updatesparesUndercarriage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/sparepartcar");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
   
</script>

</body>
</html>