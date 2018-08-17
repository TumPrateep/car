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

  
    // var lubricator_dataId = $("#lubricator_dataId").val();
    
    // $.get(base_url+"apiCaraccessories/LubricatorData/getlubricatordata",{
    //     "lubricator_dataId": lubricator_dataId
    // },function(data){
    //     if(data.message != 200){
    //         showMessage(data.message,"caraccessory/lubricatordata");
    //     }else{
    //         result = data.data;
    //         console.log(result);
    //         init(result.lubricator_brandId, result.lubricatorId, result.lubricator_gear , result.lubricator_dataId);
    //         $("#price").val(result.price);
    //         $("#can_change").val(result.can_change);
    //         $("#warranty_year").val(result.warranty_year);
    //         $("#warranty").val(result.warranty);
    //         $("#warranty_distance").val(result.warranty_distance);
    //         setTirePicture(result.lubricator_dataPicture);
    //     }
        
    // });

    // var lubricatorBrand = $("#lubricator_brandId");
    // // var lubricatorNumber = $("#lubricator_numberId");
    // var lubricator = $("#lubricatorId");
    // var lubricatorGear = $("#lubricator_gear");

    // function init(lubricator_brandId,lubricatorId){
    //     // getlubricatorNumber(lubricatorNumber);
    //     getLubricatorBrand(lubricator_gear,lubricatorId);
    //     // getLubricator(lubricator,lubricatorNumber);
    // }

 

    // // function getlubricatorNumber(lubricatorNumber){
    // //     $.get(base_url+"apiCaraccessories/Lubricatornumber/getAllLubricatorNumber",{
    // //         lubricatorNumber: lubricatorNumber
    // //     },function(data){
    // //             var lubricatorData = data.data;
    // //             $.each( lubricatorData, function( key, value ) {
    // //                 lubricatorNumber.append('<option value="' + value.lubricatorNumber + '">' + value.lubricator_gear + '</option>');
    // //             });
    // //             lubricatorNumber.val(lubricator_gear);
    // //         }
    // //     );
    // // }
    // // function getLubricatorGear(lubricator=null){
    // //     var lubricator = lubricator.val();
    // //     $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{},
    // //         function(data){
    // //             var brandData = data.data;
    // //             $.each( brandData, function( key, value ) {
    // //                 lubricator.append('<option value="' + value.lubricator + '">' + value.lubricatorName + '</option>');
    // //             });
    // //             lubricator.val(lubricator);
    // //         }
    // //     );
    // // }

    // function getData(lubricator_dataId,lubricator_brandId,lubricatorId,lubricator_gear){
    //     $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{},
    //         function(data){
    //             var brandData = data.data;
    //             $.each( brandData, function( key, value ) {
    //                 lubricator_dataId.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + ' นิ้ว</option>');
    //             });
    //             lubricator_dataId.val(lubricator_dataId);
    //             getLubricator(lubricatorId,lubricator_gear);
    //         }
    //     );
    // }

    // function getLubricator(lubricatorId = null,lubricator_gear){
    //     var lubricatorBrand = lubricatorBrand.val();
    //     $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{
    //         lubricatorBrand: lubricatorBrand
    //     },function(data){
    //             var brandData = data.data;
    //             $.each( brandData, function( key, value ) {
    //                 lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + '</option>');
    //             });
    //             lubricator.val(lubricatorId);
    //         }
    //     );
    // }  


    //  lubricator_gear.change(function(){
    //     lubricator_brand.val(null);
    //     lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
    // });

    // lubricator_brand.change(function(){
    //     lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
    //     $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{
    //         lubricator_brandId: $(this).val(),
    //         lubricator_gear: lubricator_gear.val()
    //     },function(data){
    //             var lubricatorData = data.data;
    //             $.each( lubricatorData, function( key, value ) {
    //                 lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
    //             });
    //         }
    //     );
    // });

    // function setTirePicture(lubricator_dataPicture){
    //     $('.image-editor').cropit({
    //         allowDragNDrop: false,
    //         width: 200,
    //         height: 200,
    //         type: 'image/jpeg',
    //         imageState: {
    //             src: picturePath+"lubricatordata/"+lubricator_dataPicture
    //         }
    //     });
    // }


    // $("#update-tiredata").submit(function(){
    //     updateTireData();
    // })

    // function updateTireData(){
    //     event.preventDefault();
    //     var isValid = $("#update-tiredata").valid();
        
    //     if(isValid){
    //         var imageData = $('.image-editor').cropit('export');
    //         $('.hidden-image-data').val(imageData);
    //         var myform = document.getElementById("update-tiredata");
    //         var formData = new FormData(myform);
            
    //         $.ajax({
    //             url: base_url+"apiCaraccessories/TireData/update",
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             type: 'POST',
    //             success: function (data) {
    //                 if(data.message == 200){
    //                     showMessage(data.message,"caraccessory/tiredata");
    //                 }else{
    //                     showMessage(data.message);
    //                 }
    //             }
    //         });
    //     }
    // }

    // ของเบสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสส ************************
    //.
    //.
    //.
    //.
    
    
    // function getlubricator_dataId(lubricator_brandId, lubricatorNumber){
    //     $.get(base_url+"apiCaraccessories/LubricatorData/getlubricator_dataId",{
    //         function(data){
    //             var brandData = data.data;
    //             $.each( brandData, function( key, value ) {
    //                 tireBrand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
    //             });
    //             // lubricator_brand.val(lubricator_brandId);
    //             // getTireModel(modelId);
    //         }
    //     );
    // }
        
    // },function(data){
    //     var LubricatorData = data.data;
    //             $("#price").val(LubricatorData.price);
    //             $("#warranty_year").val(LubricatorData.warranty_year);
    //             $("#warranty").val(LubricatorData.warranty);
    //             $("#warranty_distance").val(LubricatorData.warranty_distance);

    //             $('.image-editor').cropit({
    //                 allowDragNDrop: false,
    //                 width: 200,
    //                 height: 200,
    //                 type: 'image',
    //                 imageBackground: true,
    //                 imageState: {
    //                     // src: picturePath+"spareundercarriage/"+sparesUndercarriageData.spares_undercarriageDataPicture
    //                 }
    //             });

    //             getLubricatorBrand(lubricator_number.lubricator_typeId, lubricator.lubricator_dataId, lubricator.lubricator_brandId, lubricator.lubricator_numberId );
    //         }
    //     );
    // }

    // function init(){
    //     getlubricator_dataId();
    // }

    // function getLubricatorBrand(lubricator_brandId){
    //     $.get(base_url+"apiCaraccessories/Lubricatorbrand/getAllLubricatorBrand",{},
    //         function(data){
    //             var brandData = data.data;
    //             $.each( brandData, function( key, value ) {
    //                 lubricatorBrand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
    //             });
    //             lubricatorBrand.val(brandId);
    //             // getTireModel(modelId);
    //         }
    //     );
    // }
        
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
// var lubricator_brand = $("#lubricator_brandId");
//     var lubricator = $("#lubricator");

//     init();

//     function init(){
//         getLubracatorBrand();
//     }

//     function getLubracatorBrand(){
//         $.get(base_url+"apiCaraccessories/Lubricatorbrand/getAllLubricatorBrand",{},
//             function(data){
//                 var brandData = data.data;
//                 $.each( brandData, function( key, value ) {
//                     lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
//                 });
//             }
//         );
//     }

//     lubricator_brand.change(function(){
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
</script>

</body>
</html>