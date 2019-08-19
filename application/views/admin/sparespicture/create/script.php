<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        var spares_undercarriage = $("#spares_undercarriageId");
        var spares_brand = $("#spares_brandId");

        init();
        
        
        function init(){
            initpicture();
            getSparesUndercarriage();
            getSparesbrand();
            //getbrand();
        }

        function getSparesUndercarriage(){
            $.get(base_url+"api/Spareundercarriage/getAllSpareundercarriage",{},
                function(data){
                    var sparesUndercarriageData = data.data;
                    $.each(sparesUndercarriageData, function( key, value ) {
                        spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                    });
                }
            );
        }

        function getSparesbrand(){
            $.get(base_url+"api/Spareundercarriage/getAllSpareBrand",{},
                function(data){
                    var sparesBrandData = data.data;
                    $.each( sparesBrandData, function( key, value ) {
                        spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
                    });
                }
            );
        }

        function initpicture(){
            $('.image-editor').cropit({
                allowDragNDrop: false,
                width: 200,
                height: 200,
                type: 'image/jpeg'
            });
        }

        form.submit(function(){
            createBrand();
        });

        function createBrand(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                    url: base_url+"api/Sparespicture/create",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        if(data.message == 200){
                            showMessage(data.message,"admin/sparespicture");
                        }else{
                            showMessage(data.message);
                        }
                    }
                });
            }
        }
    });

    

</script>

</body>
</html>
