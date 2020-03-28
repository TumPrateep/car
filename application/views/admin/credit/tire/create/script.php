<script>
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

    $("#submit").submit(function(){
        createtirechange();
    })

    var unit_id = $("#unit_id");
    init();

    function init(){
        getunit();
    }

    function getunit(){
        unit_id.html('<option value="">เลือกหน่วย</option>');
        $.get(base_url+"api/tirechangessize/getAllunit",{},
            function(data){
                var unitData = data.data;
                $.each( unitData, function( key, value ) {
                    unit_id.append('<option value="' + value.unit_id + '">' + value.unit + ' </option>');
                });
            } 
        );
    }

    function createtirechange(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Tirecredit/createtirechange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/credit/tirescharge");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>