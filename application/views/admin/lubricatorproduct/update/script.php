<script>

$(document).ready(function () {
    var lubricator_brand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var lubricatortypeFormachine = $("#lubricatortypeFormachineId");
    var lubricator_gear = $("#lubricator_gear");
    var productId = $("#productId").val();

    var form = $("#submit");

    init();
    
    function init(){
        $.post(base_url+"api/Lubricatorproduct/getUpdate",{
            "productId" : productId
        },function(data){
            // data = data.data;
            if(data.message!=200){
                showMessage(data.message,"admin/lubricatorproduct");
            }
            if(data.message == 200){
                result = data.data;
                lubricator_gear.val(result.lubricator_gear);
                setBrandPicture(result.picture);
                getLubracatorBrand(result.lubricator_brandId, result.lubricatorId);
            }
            
        });
    }

    function getLubracatorBrand(lubricator_brandId = null, lubricatorId = null){
        $.get(base_url+"api/Lubricatorproduct/getAllLubricatorBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                });
                lubricator_brand.val(lubricator_brandId);
                getLubricator(lubricatorId);
            }
        );
    }

    function getLubricator(lubricatorId = null){
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        $.get(base_url+"api/Lubricatorproduct/getAllLubricator",{
            lubricator_brandId: lubricator_brand.val(),
            lubricator_gear: lubricator_gear.val()
        },function(data){
                var lubricatorData = data.data;
                $.each( lubricatorData, function( key, value ) {
                    lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number +" "+value.lubricatortypeFormachine+ '</option>');
                });
                lubricator.val(lubricatorId);
            }
        );
    }

    lubricator_brand.change(function(){
        getLubricator();
    });

    lubricator_gear.change(function(){
        lubricator_brand.val(null);
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
    });

    function setBrandPicture(picture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image',
            imageState: {
                src: picturePath+"lubricatorproduct/"+picture
            }
        });
    }

    form.submit(function(){
        updateLubricator();
    });

    function updateLubricator(){
        event.preventDefault();
        var isValid = form.valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Lubricatorproduct/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/lubricatorproduct");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
});

</script>