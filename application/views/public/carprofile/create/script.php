<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>
<script>

        //  function checkID(id) {
        //     if(id.length != 13) return false;
        //     for(i=0, sum=0; i < 12; i++)
        //         sum += parseFloat(id.charAt(i))*(13-i);
        //     if((11-sum%11)%10!=parseFloat(id.charAt(12)))
        //         return false;
        //     return true;
        // }

        // jQuery.validator.addMethod("pid", function(value, element) {
        //   return checkID(value);
        // }, 'กรุณากรอกเลขที่บัตรประชาชนให้ถูกต้อง');


    $(document).ready(function () {

        var form = $("#submit");

        // form.validate({
        //     rules:{
        //         firstName: {
        //             required: true
        //         },
        //         lastName: {
        //             required: true
        //         },
        //         exp: {
        //             required: true
        //         },
        //         phone: {
        //             required: true,
        //             minlength: 10,
        //             maxlength: 10
        //         },
        //         skill: {
        //             required: true
                
        //         },
        //         personalid: {
        //             required: true,
        //             pid: true
                   
                
        //         }
        //     },messages:{
        //         firstName: {
        //             required: "กรุณากรอกชื่อ"
        //         },
        //         lastName: {
        //             required: "กรุณากรอกนามสกุล"
        //         },
        //         exp: {
        //             required: "กรุณากรอกประสบการณ์(ปี)"
        //         },
        //         phone: {
        //             required: "กรุณากรอกเบอร์โทรศัพท์",
        //             minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
        //             maxlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ"
        //         },
        //         skill: {
        //             required: "กรุณาเลือกความชำนาญ"
                
        //         },
        //         personalid: {
        //             required: "กรุณาใส่บัตรประชาชน",
        //             pid: "กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง"
        //         }
        //     }
        // });

        // form.submit(function (e) { 
        //     e.preventDefault();
        //     var isValid = form.valid();
        //     if(isValid){
        //         alert("pass");
        //     }else{
        //         alert("unpass");
        //     }
        // });

    // form.submit(function(){
    //     createcarprofile();
    // })


    // function createcarprofile(){
    //     event.preventDefault();

    //     var isValid = form.valid();
        
    //     if(isValid){
            
    //         var data = $("#submit").serialize();
    //         $.post(base_url+"service/Carprofile/createCarProfile",data,
    //         function(data){
    //             if(data.message == 200){
    //                 showMessage(data.message,"public/carprofilepublic");
    //             }else{
    //                 showMessage(data.message);
    //             }
    //             console.log(data);
    //         });
    //     }
    // }
    
    form.submit(function(){
        createcarprofile();
    })
    function createcarprofile(){
        event.preventDefault();
        var data = $("#submit").serialize();
        var isValid = form.valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
            url: base_url+"service/Carprofile/createCarProfile",data,
            data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"public/carprofile");
                    }else{
                        showMessage(data.message);
                    }
                    console.log(data);
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

    var brand =$("#brandId");
    var model = $("#modelId");
    var modelofcar = $("#modelofcarId");
    var year = $("#yearStart");
    var YearEnd = $("#YearEnd");
    var detail = $("#detail");
    var modelName = $("modelName");
    var modelId = $("modelId");

    function onLoad(){
      setProvincePlate();
      getbrand();
    }
    onLoad();

    function getbrand(brandId = null ){
        $.get(base_url+"service/CarSelect/getCarBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                });
            }
        );
    }

    brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        // year.html('<option value="">เลือกปีผลิต</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url+"service/CarSelect/getCarModel",{
            brandId : brandId
        },function(data){
            var modelData = data.data;
                $.each( modelData, function( key, value ) {
                    model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                });
            }
        );
    });

    model.change(function(){
        var modelName = $("#modelId option:selected").text();
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        // year.html('<option value="">เลือกปีผลิต</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');            
        $.get(base_url+"service/CarSelect/getCarYear",{
            modelName : modelName
        },function(data){
            var detailData = data.data;
            $.each( detailData, function( key, value ) {
                detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
            });
        });
    });
    
    detail.change(function(){
        // var modelId = model.val();
        // var detail = $("#detail").val();
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url+"service/CarSelect/getCarDetail",{
            modelId : detail.val()
        },function(data){
            var carModelData = data.data;
            console.log(carModelData);
            $.each( carModelData, function( key, value ) {
                modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
            });
        });
    });

    function setProvincePlate(province=null){
        var provincePlateDropdown = $("#province_plate");
            provincePlateDropdown.append('<option value="">เลือกจังหวัด</option>');
            
            $.post(base_url + "service/Location/getProvinceforcar", {},
                function(data) {
                    var provinceforcar = data.data;
                    $.each(provinceforcar, function(index, value) {
                        if(province == value.provinceforcarId){
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '" selected>' + value.provinceforcarName + '</option>');   
                        }else{
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '">' + value.provinceforcarName + '</option>');                               
                        }
                    });
                }
            );
        }

    });

    

</script>

</body>
</html>