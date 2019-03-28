<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script>

<script>
    $("#time").datetimepicker({
        datepicker:false,
        formatTime:'H:i',
        // mask:true,
        // scrollInput: false,
        format:'H:i'
    });

    $(document).ready(function () {

        var form = $("#submit");

        form.validate({
            rules:{
                date: {
                    required: true
                },
                time: {
                    required: true
                },
                bank: {
                    required: true
                },
                transfer: {
                    required: true,
                }
            },messages:{
                date: {
                    required: "กรุณาระบุวันที่"
                },
                time: {
                    required: "กรุณาระบุเวลาดำเนินการ"
                },
                bank: {
                    required: "กรุณาระบุชื่อธนาคารที่โอน"
                },
                transfer: {
                    required: "กรุณาระบุผู้โอน"
                }
              
            }
        });

    form.submit(function(){
        createPayment();
    })


    function createPayment(){
        event.preventDefault();

        var isValid = form.valid();
        
        if(isValid){
            
            var data = $("#submit").serialize();
            $.post(base_url+"service/Paymentss/createPaymentDetail",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"shop/order");
                }else{
                    showMessage(data.message);
                }
                console.log(data);
            });
        }
    }

    $.get(base_url+"service/Paymentss/getCost", {orderId: $("#orderId").val()},
        function (data, textStatus, jqXHR) {
            console.log(data);
            $("#summoney").val(data.summary);
            $("#depositmoney").val(data.deposit);
        }
    );
     $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 200,
        type: 'image/jpeg'
    });

  });
</script>

</body>
</html>