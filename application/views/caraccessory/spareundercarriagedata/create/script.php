<script>
   $("#create-sparesUndercarriageData").validate({
        rules: {
            spares_undercarriageId: {
                required: true
            },
            spares_brandId: {
                required: true
            },
            price: {
                required: true
            },
            tempImage: {
                required: true
            }
        },
        messages: {
            spares_undercarriageId: {
                required: "กรุณาเลือกอะไหล่ช่วงล่าง"
            },
            spares_brandId: {
                required: "กรุณาเลือกยี่ห้ออะไหล่"
            },
            price: {
                required: "กรุณากรอกราคา"
            },
            tempImage: {
                required: ""
            }
        },
    });

    $("#create-sparesUndercarriageData").submit(function(){
        tiredata();
    })

    function tiredata(){
        event.preventDefault();
        var isValid = $("#create-sparesUndercarriageData").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-sparesUndercarriageData");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/SpareundercarriageData/create",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/SpareundercarriesData");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
    
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 200,
        type: 'image/jpeg'
        // imageBackground: true,
        // imageState: {
        //     src: 'http://lorempixel.com/500/400/' // renders an image by default
        // }
    });

    var spares_undercarriage = $("#spares_undercarriageId");
    var spares_brand = $("#spares_brandId");

    init();

    function init(){
        getSparesUndercarriage();
    }

    function getSparesUndercarriage(){
        $.get(base_url+"apiCaraccessories/CarSpareUndercarriage/getAllSpareundercarriage",{},
            function(data){
                var sparesUndercarriageData = data.data;
                $.each(sparesUndercarriageData, function( key, value ) {
                    spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                });
            }
        );
    }

    spares_undercarriage.change(function(){
        spares_brand.html('<option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>');
        $.get(base_url+"apiCaraccessories/SpareBrand/getAllSpareBrand",{
            spares_undercarriageId: $(this).val()
        },function(data){
                var sparesBrandData = data.data;
                $.each( sparesBrandData, function( key, value ) {
                    spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
                });
            }
        );
    });

    

</script>



</body>
</html>