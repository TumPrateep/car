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
        var data = $("#submit").serialize();
        var isValid = form.valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
            url: base_url+"service/Paymentss/createPaymentDetail",data,
            data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"shop/order");
                    }else{
                        showMessage(data.message);
                    }
                    console.log(data);
                }
          });
        }
    }

    
    $.get(base_url+"service/Paymentss/getCost", {orderId: $("#orderId").val()},
        function (data, textStatus, jqXHR) {
            console.log(data);
            var Checkdepositflag = data.depositflag;
            // $("#totallmoney").val(data.summary);
            // // $("#totallmoney").val(data.deposit);
            if(Checkdepositflag == '0'){
                $("#totallmoney").val(data.summary);
                $("#money").val(data.summary);
            }else{
                $("#totallmoney").val(data.deposit);
                $("#money").val(data.deposit);
            }
                      
        }
    );
     $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 200,
        type: 'image/jpeg'
    });

    var bank = $("#bankNameReceive");

    init();

    function init(){
        getBank();
    }

        function getBank(bankId = null){
        $.get(base_url+"service/Paymentss/getAllBank",{},
            function(data){
                var bankData = data.data;
                $.each( bankData, function( key, value ) {
                    bank.append('<option value="' + value.bankId + '">' + value.bankName + '</option>');
                });
            }
        );
    }

  });
</script>

</body>
</html>