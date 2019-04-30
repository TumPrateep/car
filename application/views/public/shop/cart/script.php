<link rel="stylesheet" href="<?=base_url("/public/css/image-picker.css") ?>">

<script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>public/js/php-date-formatter.min.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script>
<script src="<?php echo base_url() ?>public/js/image-picker.js"></script>

<script src="<?=base_url("public/themes/shop-cart/");?>vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="<?=base_url("public/themes/shop-cart/");?>vendor/minimalist-picker/dobpicker.js"></script>
<script src="<?=base_url("public/themes/shop-cart/");?>js/main.js"></script>
<script>

var money = 0;
var fullMoney = 0;
var deliveryCost = 0;
function createCarConfirm(){
    var userId = localStorage.getItem("userId");
    var hasCaraccessory = null;
    if(userId != null){
        $("#selectcar").modal("show");
    }else{
        alert("login!!!");
    }
}

function plus(role, index){
    cartData[index].number++;
    localStorage.setItem("data", JSON.stringify(cartData));
    showCart();
}

function minus(role, index){
    cartData[index].number--;
    if(cartData[index].number <= 0){
        $.confirm({
            title: 'ลบรายการสินค้า',
            content: 'กดตกลงเพื่อยืนยันการลบ',
            buttons: {
                ok: {
                    text: 'ตกลง',
                    keys: ['enter'],
                    action: function(){
                        cartData.splice(index, 1);
                        localStorage.setItem("data", JSON.stringify(cartData));
                        showCart();
                    }
                },
                cancle: {
                    text: 'ยกเลิก',
                    action: function(){
                        
                    }
                }
            }
        });
    }else{
        localStorage.setItem("data", JSON.stringify(cartData));
        showCart();
    }
}

function getCartList(){
    var productData = [];
    $('#cart-table td:first-child').each(function() {
        var product = $(this).find("input");
        var isCheck = product.is(':checked');
        if(isCheck){
            productData.push(product.attr("data-productId"));
        }
    });
    return JSON.stringify(productData);
}

function setNumber(index, number){
    if(parseInt(number.value) <= 0){
        $.confirm({
            title: 'ลบรายการสินค้า',
            content: 'กดตกลงเพื่อยืนยันการลบ',
            buttons: {
                ok: {
                    text: 'ตกลง',
                    keys: ['enter'],
                    action: function(){
                        cartData.splice(index, 1);
                        localStorage.setItem("data", JSON.stringify(cartData));
                        showCart();
                    }
                },
                cancle: {
                    text: 'ยกเลิก',
                    action: function(){
                        showCart();
                    }
                }
            }
        });
    }else{
        cartData[index].number = parseInt(number.value);
        localStorage.setItem("data", JSON.stringify(cartData));
        showCart();
    }
}

var cartDataDetail = [];
// var totalCost = 0;

function showCart(){
    var html = "";
    var cartList = $("#cart_list");
    cartData = JSON.parse(localStorage.getItem("data"));
    // totalCost = 0;
    $.each(cartData, function( index, value ) {
        if(value.group == "lubricator"){
            html += getLubricator(value, index);
        }else if(value.group == "tire"){
            html += getTire(value, index);
        }else{
            html += getspare(value, index);
        }
    });

    setNumberOfCart();
    
    cartList.html(html);
    setTotalAmount();
    // $("#order_total_amount").html(currency(totalCost, {  precision: 0 }).format() + " บาท");
}

function setTotalAmount(){
    
    var total = 0;
    deliveryCost = 0;
    var deliveryData = [];
    var table = $("#cart-table > tbody");
    $("#cart-table > tbody  > tr").each(function(index, val) {
        var trTable = table.find('tr:eq('+index+')').find('input');
        var isCheck = trTable.is(':checked');
        if(isCheck){
            total += trTable.data('amount');
            deliveryData[index] = {
                group: trTable.data('group'),
                number: trTable.data('number')
            }
        }
    });

   
    money = total;
   
    deliveryCost = calculateDeliveryCost(deliveryData);
    fullMoney = money+deliveryCost;
    $("#order_total_cost").html(currency(total, {  precision: 0 }).format() + " บาท");
    $("#order_total_delivery").html(currency(deliveryCost, {  precision: 0 }).format() + " บาท");
    $("#order_total_amount").html(currency(total+deliveryCost, {  precision: 0 }).format() + " บาท");
    $("#money").html("ราคารวม "+currency(fullMoney, {  precision: 0 }).format() + " บาท");
    $("#fullMoney").html(currency(fullMoney, {  precision: 0 }).format()+" บาท");
}

function calculateDeliveryCost(deliveryData){
    var total = 0;
    var number = 0;
    deliveryData.forEach(function(val, index) {
        console.log(val);
        if(val.group == "spare"){
            if(hasCaraccessory == null){
                total += (Math.ceil(val.number/3.0) * 50);
            }
            number += val.number;
        }else if(val.group == "tire"){
            total += (100*val.number);
        }else{
            total += 0
        }
    });
    if(hasCaraccessory != null){
        total += (Math.ceil(number/3.0) * 50);
    }
    return total;
}

function deleteCart(index){
    $.confirm({
        title: 'ลบรายการสินค้า',
        content: 'กดตกลงเพื่อยืนยันการลบ',
        buttons: {
            ok: {
                text: 'ตกลง',
                keys: ['enter'],
                action: function(){
                    cartData.splice(index, 1);
                    localStorage.setItem("data", JSON.stringify(cartData));
                    showCart();
                    getImagePicker();
                }
            },
            cancle: {
                text: 'ยกเลิก',
                action: function(){
                    
                }
            }
        }
    });
}

function getLubricator(value, index){
    var product = cartDataDetail["lubricator"][value.productId];
    var totalCost = (product.price*value.number);
    var html = '<tr>'
        +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'"></div></td>'
        +'<td><a href="'+base_url+'shop/detail/lubricator/'+value.productId+'"><img class="cart_item_image" src="'+base_url+'public/image/lubricatordata/'+product.picture+'" alt=""></a></td>'
        +'<td><a class="produst-name" href="'+base_url+'shop/detail/lubricator/'+value.productId+'">'+product.brandName+' '+product.name+' '+product.lubricatorNumber+' ขนาด '+product.capacity+' ลิตร</a></td>'
        +'<td><div class="col-md-12">'
            +'<div class="input-group form-group-width ">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-danger" id="minus-btn" onclick="minus(\'lubricator\','+index+')"><i class="fa fa-minus"></i></button>'
                +'</div>'
                +'<input type="number" class="form-control" min="1" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-warning" id="plus-btn" onclick="plus(\'lubricator\','+index+')"><i class="fa fa-plus"></i></button>'
                +'</div>'
            +'</div>'
        +'</div></td>'
        +'<td><span class="buy-price">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</span></td>'
        +'<td><button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button></td>'
    +'</tr>';
    
    return html;
}

function getTire(value, index){
    var product = cartDataDetail["tire"][value.productId];
    var totalCost = (product.price*value.number);
    var html = '<tr>'
        +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()"  data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'"></div></td>'
        +'<td><a href="'+base_url+'shop/detail/tire/'+value.productId+'"><img class="cart_item_image" src="'+base_url+'public/image/tirebranddata/'+product.picture+'" alt=""></a></td>'
        +'<td><a class="produst-name" href="'+base_url+'shop/detail/tire/'+value.productId+'">'+product.brandName+' '+product.name+' '+product.number+'</a></td>'
        +'<td><div class="col-md-12">'
            +'<div class="input-group form-group-width ">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-danger" id="minus-btn" onclick="minus(\'tire\','+index+')"><i class="fa fa-minus"></i></button>'
                +'</div>'
                +'<input type="number" class="form-control" min="1" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-warning" id="plus-btn" onclick="plus(\'tire\','+index+')"><i class="fa fa-plus"></i></button>'
                +'</div>'
            +'</div>'
        +'</div></td>'
        +'<td><span class="buy-price">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</span></td>'
        +'<td><button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button></td>'
    +'</tr>';
    
    return html;
}

function getspare(value, index){
    var product = cartDataDetail["spare"][value.productId];
    var totalCost = (product.price*value.number);
    var html = '<tr>'
        +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()"  data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'"></div></td>'
        +'<td><a href="'+base_url+'shop/detail/spare/'+value.productId+'"><img class="cart_item_image" src="'+base_url+'public/image/spareundercarriage/'+product.picture+'" alt=""></a></td>'
        +'<td><a class="produst-name" href="'+base_url+'shop/detail/spare/'+value.productId+'">'+product.spares_brandName+' '+product.spares_undercarriageName+' '+product.brandName+' '+product.modelName+' '+product.year+'</a></td>'
        +'<td><div class="col-md-12">'
            +'<div class="input-group form-group-width ">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-danger" id="minus-btn" onclick="minus(\'spare\','+index+')"><i class="fa fa-minus"></i></button>'
                +'</div>'
                +'<input type="number" class="form-control" min="1" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-warning" id="plus-btn" onclick="plus(\'spare\','+index+')"><i class="fa fa-plus"></i></button>'
                +'</div>'
            +'</div>'
        +'</div></td>'
        +'<td><span class="buy-price">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</span></td>'
        +'<td><button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button></td>'
    +'</tr>';
    
    return html;
}

function getImagePicker(){
    var pickerData = null;
    $.post(base_url+"service/Garages/getAllGarage", {"dataType": getTypeOfProduct()},
        function (data, textStatus, jqXHR) {
            pickerData = data;
            var imagePickerHtml = '<option value=""></option>';
            // var html = '<option value="">เลือกอู่ซ่อมรถ</option>';
            $.each(data, function (index, val) { 
                // html += '<option value="'+val.garageId+'">'+val.garageName+'</option>';
                imagePickerHtml += '<option data-img-src="'+base_url+'public/image/garage/'+val.picture+'" data-img-class="garage-width" data-img-label="<div class=\'text-center\'><strong>'+val.garageName+'</strong><br><span>ความชำนาญ</span></div>" value="'+val.garageId+'" data-openday="'+val.dayopenhour+'" data-open="'+val.openingtime+'" data-close="'+val.closingtime+'">'+val.garageName+'</option>';                
            });
            // $("#garage").html(html);
            $("#image-picker").html(imagePickerHtml);
            showImagePicker();
        }
    );
}

function getTypeOfProduct(){
    var data = {
        "tire": 0,
        "spare": 0,
        "lubricator": 0
    };
    $.each(cartData, function (index, val) { 
        data[val.group] = 1;                
    });
    return data;
}

function showImagePicker(){
    $("#image-picker").imagepicker({
        hide_select : true,
        show_label  : true,
        selected: function(select, picker, option, event){
            var picker = $("#image-picker option:selected");
            var dayopen = picker.data("openday");
            var open = picker.data("open");
            var close = picker.data("close");
            disableDay(dayopen.toString(), open, close);
            $("#reserve_day, #reserve_time").val("");
        },
        clicked:function(select, picker, option, event){
            var picker = $("#image-picker option:selected");
            if(picker.val() == ""){
                $("#reserve_day, #reserve_time").datetimepicker("destroy");
                $("#reserve_day, #reserve_time").val("");
            }
        },
    });
}

function disableDay(openday, open, close){
    console.log(openday);
    $.datetimepicker.setLocale('th');
    var nowDate = new Date();
    $("#reserve_day").datetimepicker({
        timepicker:false,
        beforeShowDay: $.datepicker.noWeekends,
        formatDate:'d/m/Y',
        lang:'th',
        minDate: (function () {
            var today = new Date().getDay(), add = 2;
            switch (today) {
                case 4:
                    add = 5;
                    break;
                case 5:
                    add = 6;
                    break;
                case 3:
                case 6:
                    add = 4;
                    break;
                case 0:
                    add = 4;
                    break;
            }
            return nowDate.setDate( nowDate.getDate() + add );
        })(),
        mask:true,
        scrollInput: false,
        format:'d/m/Y'
    });
    $("#reserve_time").datetimepicker({
        datepicker:false,
        formatTime:'H:i',
        mask:true,
        scrollInput: false,
        format:'H:i',
        minTime: open,
        maxTime: close
    });
}

function getDeposit(){
    $.post(base_url+"service/Order/calAllDeposit", {"productData":getCartList(),"garageId": $("#image-picker").val()},
        function (data, textStatus, jqXHR) {
            $("#halfMoney").html(currency(data.sum, {  precision: 0 }).format() + " บาท");
        }
    );
}

$(document).ready(function () {

    var form = $("#rigister");
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');

    form.validate({
        rules:{
            carProfileId: {
                required: true
            },
            garageId: {
                required: true
            },
            reserve_day: {
                required: true
            },
            reserve_time: {
                required: true
            }  
        },messages:{
            carProfileId: {
                required: ""
            },
            garageId:{
                required: ""
            },
            reserve_day: {
                required: "เลือกวันที่ทำการ"
            },
            reserve_time: {
                required: "เลือกเวลาทำการ"
            } 
        }
    });

    $("#paymentForm").validate({
        rules:{
            options: {
                required: true
            }
        },messages:{
            options: {
                required: ""
            } 
        }
    });
    
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'ก่อนหน้า',
            next : 'ถัดไป',
            finish : 'บันทึก',
            current : ''
        },
        titleTemplate : '<span class="title">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            var isvalid = true;
            // form.validate().settings.ignore = ":disabled,:hidden";
            if(currentIndex == 0){
                if(fullMoney <= 0){
                    isvalid = false;
                    $(".alert").show();
                    $.wait( function(){ $(".alert").fadeOut( "slow") }, 5);
                }
                getCartList();
            }
            if(currentIndex == 1){
                isvalid = $("#image-picker-car").val() != "";
                if(!isvalid){
                    $(".alert").show();
                    $.wait( function(){ $(".alert").fadeOut( "slow") }, 5);
                }
            }
            if(currentIndex == 2){
                isvalid = ($("#image-picker").val() != "" && form.valid());
                if(!isvalid){
                    $(".alert").show();
                    $.wait( function(){ $(".alert").fadeOut( "slow") }, 5);
                }else{
                    if(fullMoney < 2000){
                        $("#selectOption2").hide();
                    }else{
                        $("#selectOption2").show();
                        getDeposit();
                    }
                }
            }
            return isvalid;
        },
        onFinishing: function (event, currentIndex)
        {
            // form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
              var isValid = form.valid();
              if(isValid){
                var data = form.serializeArray();
                data[data.length] = { name: "productData", value: getCartList() };
                data[data.length] = { name: "isDeposit", value: $("#option2").is(":checked") };
                $.post(base_url+"service/Order/createOrderDetail", data,
                    function (data, textStatus, jqXHR) {
                        if(data.message == 200){
                            localStorage.setItem("data",JSON.stringify([]));
                            cartData = [];
                            synCartData();
                            showMessage(data.message,"shop/order");
                        }else{
                            showMessage(data.message);
                        }
                    }
                );
              }

            // window.location = base_url+"shop/payment/10011";
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    // var form = $("#submit");
    // var confirmForm = $("#confirm");
    $.post(base_url+"service/Cart/cartDetail", {"cartData": cartData},
        function (data, textStatus, jqXHR) {
            cartDataDetail = data.cartData;
            hasCaraccessory = data.caraccessoryId;
            showCart();
        }
    );

    var pickerCarData = null;
    $.get(base_url+"service/Carprofile/getAllProfile", {},
        function (data, textStatus, jqXHR) {
            pickerCarData = data;
            var imagePickerCarHtml = '<option value=""></option>';
            // var htmlCar = '<option value="">เลือกป้ายทะเบียนรถ</option>';
            $.each(data, function (index, val) { 
                // htmlCar += '<option value="'+val.car_profileId  +'">'+val.character_plate+' '+val.number_plate+'</option>';
                imagePickerCarHtml += '<option data-img-src="'+base_url+'public/image/carprofile/'+val.pictureFront+'" data-img-class="garage-width" data-img-label="<div class=\'card border-black mrt-4 mb-3\'><div class=\'text-center\'><h4>'+val.character_plate+' '+val.number_plate+'</h4></div><div class=\'text-center\'>'+val.provinceforcarName+'</div></div>" value="'+val.car_profileId   +'">'+val.character_plate+' '+val.number_plate+'</option>';                
            });
            // $("#garage").html(htmlCar);
            $("#image-picker-car").html(imagePickerCarHtml);
            showImagePickerCar();
        }
    );
    function showImagePickerCar(){
        $("#image-picker-car").imagepicker({
            hide_select : true,
            show_label  : true
        });
    }
    getImagePicker();

});

        
</script>
</body>
</html>