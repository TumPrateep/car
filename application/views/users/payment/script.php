<script>
$(document).ready(function() {

    var form = $("#submit");

    form.validate({
        rules: {
            transfer: {
                required: true
            },
            tempImage: {
                required: true
            }
        },
        messages: {
            transfer: {
                required: "กรุณาระบุชื่อบัญชีผู้โอน"
            },
            tempImage: {
                required: "กรุณาเลือกแนบไฟล์หลักฐาน"
            }
        }
    });

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 300,
        height: 533,
        type: 'image/jpeg'
    });

    form.submit(function() {
        createPayment();
    });

    function createPayment() {
        event.preventDefault();
        var data = $("#submit").serialize();
        var isValid = form.valid();

        if (isValid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "service/Checkout/createPaymentDetail",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "user/order");
                    } else {
                        showMessage(data.message);
                    }
                }
            });
        }
    }

});
</script>