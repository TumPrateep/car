<script>
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

        form.submit(function (e) { 
            e.preventDefault();
            var isValid = form.valid();
            if(isValid){
                alert("pass");
            }else{
                alert("unpass");
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
                    showMessage(data.message,"car/shop/order");
                }else{
                    showMessage(data.message);
                }
                console.log(data);
            });
        }
    }

  });
</script>

</body>
</html>