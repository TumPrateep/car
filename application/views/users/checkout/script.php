<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.date.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.time.css')?>">

<script src="<?=base_url('public/js/datepicker/picker.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.date.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.time.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/translations/th_TH.js')?>"></script>
<script>
$(document).ready(function() {
    var total = 0;
    // var service_data = [];

    $('#slipdate').pickadate({
        max: true,
        formatSubmit: 'yyyy-mm-dd',
        close: 'ปิด',
        // max: true
    });

    $('#sliptime').pickatime({
        format: 'HH:i',
        formatSubmit: 'HH:i:A',
        max: true,
        interval: 10,
        editable: true
    });

    $(".next").click(function() {
        if ($(this).val() != 3) {
            $("#payment, #bank").fadeOut("slow");
        } else {
            $("#payment, #bank").fadeIn("slow");
        }
    });

    init();

    function init() {
        var product_data = JSON.parse(localStorage.getItem("sendData"));
        var garageId = localStorage.getItem("garageId");
        $.post(base_url + "service/Checkout/getData", {
            product_data: product_data,
            garageId: garageId,
            // number: $('#number').val()
        }, function(data, textStatus, jqXHR) {
            var garage_data = data.garage_data;
            showGarageData(data.garage_data);
            // disableDay(data.garage_data);
            // showProduct(data.products);
            getCarProfile();

            var html = '';
            $.each(data.products, function( index, value ) {
                if(index == "lubricator"){
                    html += getLubricator(value);
                }else if(index == "tire"){
                    html += getTire(value);
                }else{
                    // alert('test');
                    // html += getspare(value, index);
                }
            });

            $('#product-data').html(html);
            $('.amount').html(currency(total, {precision: 0}).format() + ' บาท');

        });
    }

    function getTire(data) {

        var html = '';
        $.each(data, function (i, tireData) { 
            total += tireData.number_product*tireData.price;
            html += '<div class="row">'
                +'<div class="col-4">'
                    +'<img src="https://www.tyremarket.com/images/products/EP150.jpg"'
                        +'class="extire" alt="">'
                +'</div>'
                +'<div class="col-8 text-right">'
                    + '<img src="' + base_url + 'public/image/tire_brand/' + tireData.brandPicture
                    + '" width="180px" alt=""><br>'
                    + '<span><strong>' + tireData.brandName + '</strong></span><br>'
                    + '<span>' + tireData.name + '</span><br>'
                    + '<span>' + tireData.number + '</span><br>'
                    + '<h6>' + tireData.number_product + ' x '+currency(tireData.price, {  precision: 0 }).format()+' = '+currency((tireData.number_product*tireData.price), {  precision: 0 }).format()+' </h6><br>'
                +'</div>'
            +'</div>'
        });        
       
        // $('#product-data').html(html);

        // $('.v-number').val(tireData.number);
        // $('.number').html(tireData.number);

        // price_per_unit = tireData.price_per_unit;
        return html;
    }

    function getTire(data) {

        var html = '';
        $.each(data, function (i, v) { 
            total += v.number_product*v.price;
            html += '<div class="row">'
                +'<div class="col-4">'
                    +'<img src="'+base_url+'/public/image/tireproduct/'+((v.picture)?v.picture:'example.png')+'"'
                        +'class="extire" alt="">'
                +'</div>'
                +'<div class="col-8 text-right">'
                    + '<img src="' + base_url + 'public/image/tire_brand/' + v.brandPicture
                    + '" width="180px" alt=""><br>'
                    + '<span><strong>' + v.brandName + '</strong></span><br>'
                    + '<span>' + v.name + '</span><br>'
                    + '<span>' + v.number + '</span><br>'
                    + '<h6>' + v.number_product + ' x '+currency(v.price, {  precision: 0 }).format()+' = '+currency((v.number_product*v.price), {  precision: 0 }).format()+' </h6><br>'
                +'</div>'
            +'</div>'
        });        
       
        return html;
    }

    function getLubricator(data) {

        var html = '';
        $.each(data, function (i, v) { 
            total += v.number_product*v.price;
            html += '<div class="row">'
                +'<div class="col-4">'
                    +'<img src="'+base_url+'public/image/lubricatorproduct/'+((v.picture)?v.picture:'example.png')+'"'
                        +'class="extire" alt="">'
                +'</div>'
                +'<div class="col-8 text-right">'
                    + '<img src="' +base_url+'public/image/lubricator_brand/'+v.brandPicture+'" width="180px" alt=""><br>'
                    + '<span><strong>' +v.brandName+' '+v.name+ '</strong></span><br>'
                    + '<span>' +v.lubricatorNumber+' '+v.capacity+' ลิตร </span><br>'
                    + '<span>' +v.machine_type+' '+v.lubricator_type_name+ '</span><br>'
                    + '<h6>' + v.number_product + ' x '+currency(v.price, {  precision: 0 }).format()+' = '+currency((v.number_product*v.price), {  precision: 0 }).format()+' </h6><br>'
                +'</div>'
            +'</div>'
        });        
        return html;
    }

    function showGarageData(garageData) {
        var html = '<span>' + garageData.garageName + '</span><br>' +
            '<span>ต.' + garageData.subdistrictName + ' อ.' + garageData.districtName +
            '</span> ' +
            '<span>จ.' + garageData.provinceName + '</span>';
        $('#garage').html(html);

        setDatepicker(garageData);
    }

    function setDatepicker(garageData) {
        var d = new Date();
        var n = d.getDay()
        var min = 4;
        if (n == 6) {
            min = 6;
        } else if (n == 7) {
            min = 5
        }
        console.log(openday);
        var openday = garageData.dayopenhour;
        var opendata = [];
        var index = 0;
        for (let i = 0; i < openday.length; i++) {
            if (openday.charAt(i) == 0) {
                opendata[index] = i + 1;
                index++;
            }
        }

        $('#hire_date').pickadate({
            min: +min,
            formatSubmit: 'yyyy-mm-dd',
            close: 'ปิด',
            disable: opendata
        });
        $('#hire_time').pickatime({
            format: 'HH:i',
            formatSubmit: 'HH:i',
            min: garageData.openingtime,
            max: garageData.closingtime
        });
    }

    // $(".v-number").change(function(e) {
    //     var number = $(this).val();
    //     $('.number').html(number);
    //     $('.amount').html(currency(number * price_per_unit, {
    //         precision: 0
    //     }).format() + ' บาท');
    // });

    function getCarProfile() {
        var car_profile = $("#car_profile");
        if (car_profile.length) {
            getProfile();
        }
    }

    function getProfile() {
        var carprofile = $("#car_profile");

        var html = '<option value="">เลือกรถเข้าใช้บริการ</option>';
        // carprofileData = [];
        $.get(base_url + "service/Carprofile/getAllCarProfileByUserId", {},
            function(data, textStatus, jqXHR) {
                $.each(data, function(i, v) {
                    html += '<option value="' + v.car_profileId + '">' + v.character_plate + ' ' + v
                        .number_plate + ' ' + v.provinceforcarName + '</option>';
                });

                carprofile.html(html);

                var carId = $("#carId").val();
                if (carId != null) {
                    carprofile.val(carId);
                }
            }
        );
    }

    $("#car_profile").change(function() {
        var car_id = $(this).val();

        if (car_id) {
            $.post(base_url + "service/carprofile/getCarProfile", {
                'car_profileId': car_id
            }, function(data, textStatus, jqXHR) {
                var carprofile = data.data;
                $('#img-carprofile').html('<img src="' + base_url + 'public/image/carprofile/' +
                    carprofile.pictureFront + '" width="100%">');
                // $('#img-carbrand').html('<img src="'+base_url+'public/image/brand/'+carprofile.brandPicture+'" width="100%" alt="">');
                $('#carprofile-data').html('<br><strong>' + (carprofile.brandName)?carprofile.brandName:'-' +
                    '</strong><br>' +
                    '<span>' + (carprofile.modelName)?carprofile.modelName:'-' + '</span><br>' +
                    '<span>' + (carprofile.year)?'ปี '+carprofile.year:'-' +
                    '</span><br>');
            });
        } else {
            $('#img-carprofile').html('');
            $('#img-carbrand').html('');
            $('#carprofile-data').html('');
        }
    });

    // function changeStringToYear(start_year, end_year) {
    //     let html = '';
    //     html += start_year;
    //     if (end_year) {
    //         html = '( ' + html + ' - ' + end_year + ' )';
    //     }
    //     return html;
    // }

    // $.validator.addMethod('filesize', function(value, element, param) {
    //     return this.optional(element) || (element.files[0].size <= param)
    // }, 'ไฟล์ขนาดใหญ่กว่า {0}');

    $("#form-rent").validate({
        rules: {
            hire_date: {
                required: true
            },
            hire_time: {
                required: true
            },
            name: {
                required: true
            },
            slipdate: {
                required: true
            },
            sliptime: {
                required: true
            },
            slipfile: {
                required: true,
                extension: "jpg,jpeg,png",
                filesize: 1000000
            },
            car_profile: {
                required: true
            },
            next: {
                required: true
            }
        },
        messages: {
            hire_date: {
                required: "เลือกวันที่เข้ารับบริการ"
            },
            hire_time: {
                required: "เลือกเวลาที่เข้ารับริการ"
            },
            name: {
                required: "กรอกชื่อผู้โอน"
            },
            slipdate: {
                required: "กรอกวันที่โอน"
            },
            sliptime: {
                required: "กรอกเวลาที่โอน"
            },
            slipfile: {
                required: "แนบไฟล์หลักฐานการจ่ายเงิน",
                extension: "ประเภทไฟล์ไม่ถูกต้อง",
                filesize: "ไฟล์ขนาดใหญ่เกินไป"
            },
            car_profile: {
                required: "เลือกรถเข้าใช้บริการ"
            },
            next: {
                required: "เลือกรูปแบบการชำระเงิน"
            }
        }
    });

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 300,
        height: 300,
        type: 'image/jpeg'
    });

    // $("#form-rent").submit(function(e) {
    //     e.preventDefault();
    //     var isvalid = $(this).valid();
    //     if (isvalid) {
    //         var imageData = $('.image-editor').cropit('export');
    //         $('.hidden-image-data').val(imageData);
    //         var myform = document.getElementById("form-rent");
    //         var formData = new FormData(myform);
    //         $.each(service_data, function(i, v) {
    //             formData.append(i, v);
    //             console.log(i, v);
    //         });
    //         let payment = $('.next:checked').val();
    //         if(payment == 2){
    //             $.ajax({
    //                 url: base_url + "service/checkout/order_credit",
    //                 data: formData,
    //                 processData: false,
    //                 contentType: false,
    //                 type: 'POST',
    //                 success: function(data) {
    //                     if (data.message == 200) {
    //                         window.location = data.url;
    //                     } else {
    //                         showMessage(data.message);
    //                     }                        
    //                 }
    //             });
    //         }else{
    //             $.ajax({
    //                 url: base_url + "service/checkout/order",
    //                 data: formData,
    //                 processData: false,
    //                 contentType: false,
    //                 type: 'POST',
    //                 success: function(data) {
    //                     if (data.message == 200) {
    //                         showMessage(data.message, "user/order");
    //                     } else {
    //                         showMessage(data.message);
    //                     }
    //                     // console.log(data);
    //                 }
    //             });
    //         }
    //     }
    // });

});
</script>