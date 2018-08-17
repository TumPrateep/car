<script>
   $("#create-lubricatordata").validate({
        rules: {
            lubricator_brandId: {
                required: true
            },
            lubricatorId: {
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
            lubricator_brandId: {
                required: "กรุณาเลือกยี่ห้อน้ำมันเครื่อง"
            },
            lubricatorId: {
                required: "กรุณาเลือกรุ่นน้ำมันเครื่อง"
            },
            price: {
                required: "กรุณากรอกราคา"
            },
            tempImage: {
                required: ""
            }
        },
    });

    $("#create-lubricatordata").submit(function(){
        tiredata();
    })

    function tiredata(){
        event.preventDefault();
        var isValid = $("#create-lubricatordata").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-lubricatordata");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/LubricatorData/create",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/lubricatordata");
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
    });

    var lubricator_brand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var lubricator_gear = $("#lubricator_gear");

    init();

    function init(){
        getLubracatorBrand();
    }

    function getLubracatorBrand(){
        $.get(base_url+"apiCaraccessories/Lubricatorbrand/getAllLubricatorBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                });
            }
        );
    }

    lubricator_gear.change(function(){
        lubricator_brand.val(null);
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
    });

    lubricator_brand.change(function(){
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{
            lubricator_brandId: $(this).val(),
            lubricator_gear: lubricator_gear.val()
        },function(data){
                var lubricatorData = data.data;
                $.each( lubricatorData, function( key, value ) {
                    lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
                });
            }
        );
    });

</script>



</body>
</html>