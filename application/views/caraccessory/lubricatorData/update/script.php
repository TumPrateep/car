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
    
//     $.get(base_url+"apiCaraccessories/LubricatorData/getlubricatordata",{
//         "lubricator_dataId": lubricator_dataId
//     },function(data){
//         if(data.message != 200){
//             showMessage(data.message,"caraccessory/lubricatordata");
//         }else{
//             result = data.data;
//             console.log(result);
//             $("#price").val(result.price);
//             $("#warranty_year").val(result.warranty_year);
//             $("#warranty").val(result.warranty);
//             $("#warranty_distance").val(result.warranty_distance);
//             getLubracatorBrand(result.lubricator_brandId);
//             getLubricator(result.lubricatorId)
//             setLubricatorPicture(result.lubricator_dataPicture);
//         }
        
//     });


//     var lubricatorBrand = $("#lubricator_brandId");
//     var lubricator = $("#lubricatorId");
//     var lubricatorGear = $("#lubricator_gear");


//     function getLubracatorBrand(lubricator_brandId){
//         $.get(base_url+"apiCaraccessories/Lubricatorbrand/getAllLubricatorBrand",{},
//             function(data){
//                 var brandData = data.data;
//                 $.each( brandData, function( key, value ) {
//                     lubricatorBrand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
//                 });
//                 lubricatorBrand.val(lubricator_brandId);
//             }
//         );
//     }

//     function getLubricator(lubricatorId){
//         var lubricatorBrand = lubricatorBrand.val();
//         var lubricatorGear = lubricatorGear.val();
//         $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{},
//             function(data){
//                 var brandData = data.data;
//                 $.each( brandData, function( key, value ) {
//                     lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + '</option>');
//                 });
//                 lubricator.val(lubricatorId);
//             }
//         );
//     }


//     function setLubricatorPicture(lubricator_dataPicture){
//         $('.image-editor').cropit({
//             allowDragNDrop: false,
//             width: 200,
//             height: 200,
//             type: 'image/jpeg',
//             imageState: {
//                 src: picturePath+"lubricatordata/"+lubricator_dataPicture
//             }
//         });
//     }


//     lubricatorBrand.change(function(){
//         lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
//         $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{
//             lubricator_brandId: $(this).val()
//         },function(data){
//                 var lubricatorData = data.data;
//                 $.each( lubricatorData, function( key, value ) {
//                     lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
//                 });
//             }
//         );
//     });
   

        
//     $("#update-lubricatordata").submit(function(){
//         updateTireData();
//     })

// //     function updateLubricatorData(){
// //         event.preventDefault();
// //         var isValid = $("#update-lubricatordata").valid();
        
// //         if(isValid){
// //             var imageData = $('.image-editor').cropit('export');
// //             $('.hidden-image-data').val(imageData);
// //             var myform = document.getElementById("update-lubricatordata");
// //             var formData = new FormData(myform);
            
// //             $.ajax({
// //                 url: base_url+"apiCaraccessories/Lubricatordata/update",
// //                 data: formData,
// //                 processData: false,
// //                 contentType: false,
// //                 type: 'POST',
// //                 success: function (data) {
// //                     if(data.message == 200){
// //                         showMessage(data.message,"caraccessory/lubricatordata");
// //                     }else{
// //                         showMessage(data.message);
// //                     }
// //                 }
// //             });
// //         }
// //     }

</script>

</body>
</html>