<script>
    $(document).ready(function () {

        var letters = /^[ก-๙a-zA-Z]+$/;  
        console.log(letters.test('จาวาสคริปต์'));         //True
        console.log(letters.test('จาวาสคริปต์1'));        //false
        console.log(letters.test('จาวาสคริปต์ Thai'));    //false
        console.log(letters.test('จาวาสคริปต์ ไทย'));     //false

        var form = $("#submit");

        jQuery.validator.addMethod("THEN", function(value, element) {
            return this.optional(element) || /^[ก-๙a-zA-Z]+$/.test(value);
        }, 'asasas');

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
                    required: true
                },
                money: {
                    required: true
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
                },
                money: {
                    required: "กรุณาระบุจำนวนเงิน"
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
                        showMessage(data.message,"car/");
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