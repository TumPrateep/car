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
    
</script>

</body>
</html>