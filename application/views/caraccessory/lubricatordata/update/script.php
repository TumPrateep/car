<script>
    $("#update-lubricatordata").validate({
        rules: {
            lubricator_brandId: {
                required: true
            },
            lubricatorId: {
                required: true
            },
            price: {
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
                required: "กรุณากรอกราคา",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            },
            warranty_distance: {
                min: "กรอกข้อมูลไม่ถูกต้อง"
            }
        },
    });

  
    var lubricator_dataId = $("#lubricator_dataId").val();
    var lubricatorBrand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var lubricatorGear = $("#lubricator_gear");

    $.get(base_url+"apicaraccessories/lubricatordata/getlubricatordata",{
        "lubricator_dataId": lubricator_dataId
    },function(data){
        if(data.message != 200){
            showMessage(data.message,"caraccessory/lubricatordata");
        }else{
            result = data.data;
            // console.log(result);
            $("#price").val(result.price);
            $("#warranty_year").val(result.warranty_year);
            $("#warranty").val(result.warranty);
            $("#warranty_distance").val(result.warranty_distance);
            lubricatorGear.val(result.lubricator_gear);
            getLubracatorBrand(result.lubricator_brandId, result.lubricatorId);
            setLubricatorPicture(result.lubricator_dataPicture);
        }
        
    });


    function getLubracatorBrand(lubricator_brandId=null, lubricatorId=null){
        $.get(base_url+"apicaraccessories/lubricatorbrand/getAllLubricatorBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricatorBrand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                });
                lubricatorBrand.val(lubricator_brandId);
                if(lubricatorId != null){
                    getLubricator(lubricatorId);
                }
            }
        );
    }

    function getLubricator(lubricatorId){
        $.get(base_url+"apicaraccessories/lubricator/getAllLubricator",{
            lubricator_brandId: lubricatorBrand.val(),
            lubricator_gear: lubricatorGear.val()
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
                });
                lubricator.val(lubricatorId);
            }
        );
    }

    lubricatorGear.change(function(){
        lubricatorBrand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        getLubracatorBrand()
    });

    lubricatorBrand.change(function(){
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        getLubricator();
    });


    function setLubricatorPicture(lubricator_dataPicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image/jpeg',
            imageState: {
                src: picturePath+"lubricatordata/"+lubricator_dataPicture
            }
        });
    }

   

        
    $("#update-lubricatordata").submit(function(){
        updateLubricatorData();
    })

    function updateLubricatorData(){
        event.preventDefault();
        var isValid = $("#update-lubricatordata").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-lubricatordata");
            var formData = new FormData(myform);
            
            $.ajax({
                url: base_url+"apicaraccessories/lubricatordata/update",
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

</script>

</body>
</html>