<script>

//  $("#update-lubricatordata").validate({
//         rules: {
//             lubricator_brandId: {
//                 required: true
//             },
//             lubricatorId: {
//                 required: true
//             },
//             price: {
//                 required: true
//             },
//             tempImage: {
//                 required: true
//             }
//         },
//         messages: {
//             lubricator_brandId: {
//                 required: "กรุณาเลือกยี่ห้อน้ำมันเครื่อง"
//             },
//             lubricatorId: {
//                 required: "กรุณาเลือกรุ่นน้ำมันเครื่อง"
//             },
//             price: {
//                 required: "กรุณากรอกราคา"
//             },
//             tempImage: {
//                 required: ""
//             }
//         },
//     });

    
//     var lubricator_dataId = $("#lubricator_dataId").val();
    
//     $.get(base_url+"apiCaraccessories/TireData/getTireData",{
//         "lubricator_dataId": lubricator_dataId
//     },function(data){
//         if(data.message != 200){
//             showMessage(data.message,"caraccessory/tiredata");
//         }else{
//             result = data.data;
//             console.log(result);
//             init(result.lubricator_brandId);
//             $("#price").val(result.price);
//             $("#warranty_year").val(result.warranty_year);
//             $("#warranty").val(result.warranty);
//             $("#warranty_distance").val(result.warranty_distance);
//             setTirePicture(result.tire_picture);
//         }
        
//     });

//      function init(lubricator_brandId){
//         getLubricatorBrand(lubricator_brandId);
//     }

//     function getLubricatorBrand(lubricator_brandId){
//         $.get(base_url+"apiCaraccessories/Tirebrand/getAllTireBrand",{},
//             function(data){
//                 var brandData = data.data;
//                 $.each( brandData, function( key, value ) {
//                     lubricatorBrand.append('<option value="' + value.lubricator_brandId + '">' + value.tire_brandName + '</option>');
//                 });
//                 lubricatorBrand.val(brandId);
//                 getTireModel(modelId);
//             }
//         );
//     }
        
//     $("#update-lubricatordata").submit(function(){
//         updateTireData();
//     })

//     function updateLubricatorData(){
//         event.preventDefault();
//         var isValid = $("#update-lubricatordata").valid();
        
//         if(isValid){
//             var imageData = $('.image-editor').cropit('export');
//             $('.hidden-image-data').val(imageData);
//             var myform = document.getElementById("update-lubricatordata");
//             var formData = new FormData(myform);
            
//             $.ajax({
//                 url: base_url+"apiCaraccessories/Lubricatordata/update",
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
function getSparesUndercarriageData(){
        $.get(base_url+"apiCaraccessories/LubricatorData/getlubricator_dataId",{
            "lubricator_dataId":lubricator_dataId.val()
        },function(data){
                var lubricator_data = data.data;
                $("#price").val(sparesUndercarriageData.price);
                $("#warranty_year").val(sparesUndercarriageData.warranty_year);
                $("#warranty").val(sparesUndercarriageData.warranty);
                $("#warranty_distance").val(sparesUndercarriageData.warranty_distance);

                $('.image-editor').cropit({
                    allowDragNDrop: false,
                    width: 200,
                    height: 200,
                    type: 'image',
                    imageBackground: true,
                    imageState: {
                        src: picturePath+"spareundercarriage/"+sparesUndercarriageData.spares_undercarriageDataPicture
                    }
                });

                getSparesUndercarriage(sparesUndercarriageData.spares_undercarriageId, sparesUndercarriageData.spares_brandId);
            }
        );
    }
var lubricator_brand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");

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

    lubricator_brand.change(function(){
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{
            lubricator_brandId: $(this).val()
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