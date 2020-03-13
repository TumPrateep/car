
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
                url: base_url+"api/news/createnews",
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
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 400,
        height: 400,
        type: 'image/jpeg'
    });
</script>

</body>
</html>