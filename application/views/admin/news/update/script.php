<script src="<?=base_url("/public/js/ckeditor.js")?>"></script>
<script src="<?=base_url("/public/js/bootstrap3-wysihtml5.all.min.js")?>"></script>
<link href="<?=base_url("/public/css/bootstrap3-wysihtml5.min.css")?>" rel="stylesheet" type="text/css" />
<script>
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>
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

    $.post(base_url+"api/news/getNewsById",{
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
                url: base_url+"api/news/updateNews",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/news");
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