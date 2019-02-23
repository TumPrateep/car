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

    setProvincePlate();

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