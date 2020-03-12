<script>
      $("#update-news").validate({
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

    var news_id = $("#news_id").val();

    $.post(base_url+"api/News/getNewsById",{
        "news_id": news_id
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"news_id");
        }else{
            result = data.data;
            $("#news_title").val(result.news_title);
            $("#news_category").val(result.news_category);
            $("#news_content").val(result.news_content);
            $("#end_date").val(result.end_date);
            setlubricatorbrand(result.news_picture);

        }
        
    });
    function setlubricatorbrand(news_picture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 400,
            height: 400,
            type: 'image',
            imageState: {
                src: picturePath+"news/"+news_picture
            }
        });
    }

    $("#update-news").submit(function(){
        updatenews();
    });

    function updatenews(){
        event.preventDefault();
        var isValid = $("#update-news").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-news");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/News/updateNews",
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
    
</script>

</body>
</html>