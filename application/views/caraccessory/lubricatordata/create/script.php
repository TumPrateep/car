<script>
    $.validator.setDefaults({ ignore: ":hidden:not(select)" });
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

//     $("#create-lubricatordata").submit(function(){
//         tiredata();
//     })

//     function tiredata(){
//         event.preventDefault();
//         var isValid = $("#create-lubricatordata").valid();
        
//         if(isValid){
//             var imageData = $('.image-editor').cropit('export');
//             $('.hidden-image-data').val(imageData);
//             var myform = document.getElementById("create-lubricatordata");
//             var formData = new FormData(myform);
//             $.ajax({
//                 url: base_url+"apicaraccessories/lubricatordata/create",
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 type: 'POST',
//                 success: function (data) {
//                     if(data.message == 200){
//                         showMessage(data.message,"caraccessory/lubricatordata");
//                     }else{
//                         showMessage(data.message);
//                     }
//                 }
//             });
//         }
//     }
    
//     $('.image-editor').cropit({
//         allowDragNDrop: false,
//         width: 200,
//         height: 200,
//         type: 'image/jpeg'
//     });

    var lubricator_brand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var lubricator_gear = $("#lubricator_gear");
    var lubricator_typeId = $('#lubricator_typeId');

    init();

    function init(){
        getLubracatorBrand();
        getLubracatorType();
        // initpicture();
    }

    function getLubracatorType(){
        lubricator_typeId.html('<option></option>')
        $.get(base_url+"apicaraccessories/lubricatorbrand/getAllLubricatorType",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricator_typeId.append('<option value="' + value.lubricator_typeId + '">' + value.lubricator_typeName + ' ('+value.lubricator_typeSize+' กม.)</option>');
                });
                lubricator_typeId.trigger("chosen:updated");
            }
        );
    }

    lubricator_typeId.change(function(){
        lubricator_brand.val(null);
        lubricator_brand.trigger('chosen:updated');
        lubricator.val(null);
        lubricator.trigger('chosen:updated');
        // lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
    });

    function getLubracatorBrand(){
        lubricator_brand.html('<option></option>')
        $.get(base_url+"apicaraccessories/lubricatorbrand/getAllLubricatorBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                });
                lubricator_brand.trigger("chosen:updated");
            }
        );
    }

    lubricator_gear.change(function(){
        var isGear = lubricator_gear.val() > 1;
        if(isGear){
            $('#box-lubricator_typeId').hide();
            lubricator_typeId.val(null);
            lubricator_typeId.trigger('chosen:updated');
        }else{
            $('#box-lubricator_typeId').show();
        }
        lubricator_brand.val(null);
        lubricator_brand.trigger('chosen:updated');
        lubricator.val(null);
        lubricator.trigger('chosen:updated');
        // lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
    });

    lubricator_brand.change(function(){
        lubricator.html('<option></option>');
        $.get(base_url+"apicaraccessories/lubricator/getAllLubricator",{
            lubricator_brandId: $(this).val(),
            lubricator_gear: lubricator_gear.val(),
            lubricator_type: lubricator_typeId.val()
        },function(data){
                var lubricatorData = data.data;
                $.each( lubricatorData, function( key, value ) {
                    lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + ((value.capacity)?' | '+value.capacity+' ลิตร': '') + ((value.lubricator_number)?' | '+value.lubricator_number:'') + ((value.lubricator_typeName)?' | '+value.lubricator_typeName:'') + ' </option>').trigger("chosen:updated");
                });
                lubricator.trigger('chosen:updated');
            }
        );
    });
    // function initpicture(){
    //     $('.image-editor').cropit({
    //         allowDragNDrop: false,
    //         width: 200,
    //         height: 200,
    //         type: 'image/jpeg'
    //     });
    // }

    $("#create-lubricatordata").submit(function(){
        tiredata();
    });

    function tiredata(){
        event.preventDefault();
        var isValid =  $("#create-lubricatordata").valid();
        if(isValid){
            $.post(base_url+"apicaraccessories/lubricatordata/create", {
                "lubricator_gear" : $("#lubricator_gear option:selected").val(),
                "lubricator_brandId" : $("#lubricator_brandId option:selected").val(),
                "lubricatorId" : $("#lubricatorId option:selected").val(),
                "price": $("#price").val(),
                "warranty_year": $("#warranty_year").val(),
                "warranty": $("#warranty").val(),
                "warranty_distance": $("#warranty_distance").val()
            },function (data, textStatus, jqXHR) {
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/lubricatordata");
                }else{
                    showMessage(data.message);
                } 
            });
        }
    }

    $('.form-control-chosen-required').chosen({
        allow_single_deselect: false,
        width: '100%'
    });

</script>



</body>
</html>