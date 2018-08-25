<script>
    $(document).ready(function(){

        var dropdownStart = $("#yearStart");
        var dropdownStop = $("#yearEnd");
        var nowYear = (new Date).getFullYear();
        var startYear = 1990;
        
        init();
        function init(){
            dropdownStart.append('<option value="">เลือกปี</option>');
            dropdownStop.append('<option value="">เลือกปี</option>');
            for(var i=nowYear;i>=startYear;i--){
                dropdownStart.append('<option value="'+i+'">'+i+'</option>');
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

        $("#submit").submit(function(){
            createModel();
        })

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
                required: "กรุณากรอกปีที่ผลิต"
                }
            },
        });


        function createModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/car/createModel",data,
                function(data){
                    if(data.message == 200){
                        var brandId = $("#brandId").val();
                        showMessage(data.message,"admin/car/model/"+brandId);
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
    });
</script>

</body>
</html>