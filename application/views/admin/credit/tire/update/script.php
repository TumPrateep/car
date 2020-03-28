<script>

    $(document).ready(function () {
        
        $("#submit").validate({
            rules: {
                credit_price: {
                    required: true
                },
                unit_id: {
                    required: true
                }
            },
            messages: {
                credit_price: {
                    required: "จำนวนเงิน"
                },
                unit_id: {
                    required: "เลือกหน่วย"
                }
            },
        });

        var tire_creditId = $("#tire_creditId").val();

        $("#submit").submit(function(){
            updatetireChang();
        })


        function updatetireChang(){
            event.preventDefault();
            var isValid = $("#submit").valid();

            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/Tirecredit/update",data,
                function(data){
                    if(data.message == 200){
                        showMessage(data.message,"admin/credit/tirescharge");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }

        $.get(base_url+"api/Tirecredit/getTireChange",{
            "tire_creditId": tire_creditId
        },function(data){
            var tireChange = data.data;
            getunit(tireChange.unit_id);
            $("#credit_price").val(tireChange.credit_price);
        });

        var unitN = $("#unit_id");

        function getunit(unit_id = null){
            unitN.html('<option value="">เลือกหน่วย</option>');
            $.get(base_url+"api/tirechangessize/getAllunit",{},
                function(data){
                    var unitData = data.data;
                    $.each( unitData, function( key, value ) {
                        unitN.append('<option value="' + value.unit_id + '">' + value.unit + ' </option>');
                    });
                    unitN.val(unit_id);
                } 
            );
        }

    });

</script>