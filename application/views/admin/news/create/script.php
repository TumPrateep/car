<script> 
      $("#create-news").validate({
        rules: {
            news_title: {
                required: true
            },
            news_content: {
                required: true
            },
            end_date: {
                required: true
            }
        },
        messages: {
            news_title: {
                required: "กรุณากรอกหัวข้อเรื่อง"
            },
            news_content: {
                required: "กรุณากรอกเนื้อหา"
            },
            end_date: {
                required: "กรุณาเลือกวันที่สิ้นสุด"
            }
        },
    });

    $("#create-news").submit(function(){
        createnews();
    });

    function createnews(){
        event.preventDefault();
        var isValid = $("#create-news").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-news");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/News/createnews",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/News");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 400,
        height: 400,
        type: 'image/jpeg'
    });
</script>

</body>
</html>