<script>

    var modelId = $("#modelId").val();
    var brandId = $("#brandId").val();

    $.post(base_url+"api/car/getModel",{
        "modelId": $("#modelId").val()
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/car/model/"+brandId);
        }

        if(data.message == 200){
            result = data.data;
            $("#modelName").val(result.modelName);
            // $("#yearStart").val(result.yearStart);
            // $("#yearEnd").val(result.yearEnd);
            init(result.yearStart, result.yearEnd);
        }
        
    });
    
    $("#submit").validate({
        rules: {
            modelName: {
            required: true
            },
            yearStart: {
            required: true
            } 
        },
        messages: {
            modelName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
            },
            yearStart: {
            required: "กรุณากรอกปีที่เริ่ม"
            }
        },
    });


    $("#submit").submit(function(){
        updateModel();
    })

    var dropdownStart = $("#yearStart");
    var dropdownStop = $("#yearEnd");
    var nowYear = (new Date).getFullYear();
    var startYear = 1990;
    
    function init(selectStartDate, selectEndDate){
        dropdownStart.append('<option value="">เลือกปี</option>');
        dropdownStop.append('<option value="">เลือกปี</option>');
        for(var i=nowYear;i>=startYear;i--){
            if(selectStartDate == i){
                dropdownStart.append('<option value="'+i+'" selected>'+i+'</option>');
            }else{
                dropdownStart.append('<option value="'+i+'" >'+i+'</option>');
            }
        }
        initDropdownEnd(selectStartDate, selectEndDate);
    }

    function initDropdownEnd(selectStartDate, selectEndDate){
        dropdownStop.html('');
        dropdownStop.append('<option value="">เลือกปี</option>');
        dropdownStop.append('<option value="'+nowYear+'">'+nowYear+' (ปัจจุบัน)</option>');
        for(var i=nowYear-1;i>selectStartDate;i--){
            if(selectEndDate == i){
                dropdownStop.append('<option value="'+i+'" selected>'+i+'</option>');
            }else{
                dropdownStop.append('<option value="'+i+'" >'+i+'</option>');
            }
        }
    }

    dropdownStart.change(function(){
        var endStartYear = dropdownStart.val();
        dropdownStop.html('');
        dropdownStop.append('<option value="">เลือกปี</option>');
        if(dropdownStart.val() != ""){
            // dropdownStop.append('<option value="'+nowYear+'">'+nowYear+' (ปัจจุบัน)</option>');
            for(var i=nowYear;i>endStartYear;i--){
                dropdownStop.append('<option value="'+i+'">'+i+'</option>');
            }
        }
    });

    function updateModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/car/updateModel",data,
                function(data){
                    var brandId = $("#brandId").val();
                    if(data.message == 200){
                        showMessage(data.message,"admin/car/model/"+brandId);
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }

</script>

</body>
</html>