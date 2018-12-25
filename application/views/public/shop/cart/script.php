<link rel="stylesheet" href="<?=base_url("/public/css/jquery.datetimepicker.css") ?>">
<script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>public/js/php-date-formatter.min.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.js"></script>
<script>

function plus(role, index){
    cartData[index].number++;
    localStorage.setItem("data", JSON.stringify(cartData));
    showCart();
}

function continueShop(){
    window.location = base_url;
}

function orderConfirm(){
    var userId = localStorage.getItem("userId");
    if(userId != null){
        var size = cartData.length;
        if(size > 0){
            $.confirm({
                title: 'ยืนยันการสั่งซื้อสินค้า',
                content: 'กดตกลงเพื่อยืนยัน',
                buttons: {
                    ok: {
                        text: 'ตกลง',
                        keys: ['enter'],
                        action: function(){
                            $.post(base_url+"service/Order/createOrderDetail", {},
                                function (data, textStatus, jqXHR) {
                                    localStorage.setItem("data",JSON.stringify([]));
                                    cartData = [];
                                    synCartData();
                                }
                            );

                            // $("#selectgarage").modal("show");
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
    }else{
        alert("login!!!");
    }
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
var totalCost = 0;

function showCart(){
    var html = "";
    var cartList = $("#cart_list");
    cartData = JSON.parse(localStorage.getItem("data"));
    totalCost = 0;
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
    $("#order_total_amount").html(currency(totalCost, {  precision: 0 }).format() + " บาท");
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

function getspare(value, index){
    var product = cartDataDetail["spare"][value.productId];
    totalCost += (product.price*value.number);
    var html = '<li class="cart_item clearfix">'
        +'<div class="cart_item_image"><a href="'+base_url+'shop/detail/spare/'+value.productId+'"><img src="'+base_url+'public/image/spareundercarriage/'+product.picture+'" alt=""></a></div>'
        +'<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">'
            +'<div class="cart_item_name cart_info_col">'
                +'<div class="cart_item_title">ชื่อสินค้า</div>'
                +'<div class="cart_item_text"><a href="'+base_url+'shop/detail/spare/'+value.productId+'">'+product.spares_brandName+' '+product.spares_undercarriageName+' '+product.brandName+' '+product.modelName+' '+product.year+'</a></div>'
            +'</div>'
    
            +'<div class="cart_item_quantity cart_info_col">'
                +'<div class="cart_item_title">จำนวน</div>'
                +'<div class="cart_item_text">'
                    +'<div class="input-group mb-3 col-lg-6">'
                        +'<div class="input-group-prepend">'
                            +'<button class="btn btn-danger btn-sm" id="minus-btn" onclick="minus(\'spare\','+index+')"><i class="fa fa-minus"></i></button>'
                        +'</div>'
                        +'<input type="number" class="form-control form-control-sm qty_input" value="'+value.number+'" min="1" onblur="setNumber('+index+', this)">'
                        +'<div class="input-group-prepend">'
                            +'<button class="btn btn-orange btn-sm" id="plus-btn" onclick="plus(\'spare\','+index+')"><i class="fa fa-plus"></i></button>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="cart_item_price cart_info_col">'
                +'<div class="cart_item_title">ราคา</div>'
                +'<div class="cart_item_text">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</div>'
            +'</div>'
            +'<div class="cart_item_total cart_info_col">'
                +'<div class="cart_item_title">ลบ</div>'
                +'<div class="cart_item_text ">'
                    +'<button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button>'
                +'</div>'
            +'</div>'
            
        +'</div>'
    +'</li>';
    
    return html;
}

function getLubricator(value, index){
    var product = cartDataDetail["lubricator"][value.productId];
    totalCost += (product.price*value.number);
    var html = '<li class="cart_item clearfix">'
        +'<div class="cart_item_image"><a href="'+base_url+'shop/detail/lubricator/'+value.productId+'"><img src="'+base_url+'public/image/lubricatordata/'+product.picture+'" alt=""></a></div>'
        +'<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">'
            +'<div class="cart_item_name cart_info_col">'
                +'<div class="cart_item_title">ชื่อสินค้า</div>'
                +'<div class="cart_item_text"><a href="'+base_url+'shop/detail/lubricator/'+value.productId+'">'+product.brandName+' '+product.name+' '+product.lubricatorNumber+' ขนาด '+product.capacity+' ลิตร</a></div>'
            +'</div>'
    
            +'<div class="cart_item_quantity cart_info_col">'
                +'<div class="cart_item_title">จำนวน</div>'
                +'<div class="cart_item_text">'
                    +'<div class="input-group mb-3 col-lg-6">'
                        +'<div class="input-group-prepend">'
                            +'<button class="btn btn-danger btn-sm" id="minus-btn" onclick="minus(\'lubricator\','+index+')"><i class="fa fa-minus"></i></button>'
                        +'</div>'
                        +'<input type="number" class="form-control form-control-sm qty_input" value="'+value.number+'" min="1" onblur="setNumber('+index+', this)">'
                        +'<div class="input-group-prepend">'
                            +'<button class="btn btn-orange btn-sm" id="plus-btn" onclick="plus(\'lubricator\','+index+')"><i class="fa fa-plus"></i></button>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="cart_item_price cart_info_col">'
                +'<div class="cart_item_title">ราคา</div>'
                +'<div class="cart_item_text">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</div>'
            +'</div>'
            +'<div class="cart_item_total cart_info_col">'
                +'<div class="cart_item_title">ลบ</div>'
                +'<div class="cart_item_text ">'
                    +'<button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button>'
                +'</div>'
            +'</div>'
            
        +'</div>'
    +'</li>';
    
    return html;
}

function getTire(value, index){
    var product = cartDataDetail["tire"][value.productId];
    totalCost += (product.price*value.number);
    var html = '<li class="cart_item clearfix">'
        +'<div class="cart_item_image"><a href="'+base_url+'shop/detail/tire/'+value.productId+'"><img src="'+base_url+'public/image/tirebranddata/'+product.picture+'" alt=""></a></div>'
        +'<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">'
            +'<div class="cart_item_name cart_info_col">'
                +'<div class="cart_item_title">ชื่อสินค้า</div>'
                +'<div class="cart_item_text"><a href="'+base_url+'shop/detail/tire/'+value.productId+'">'+product.brandName+' '+product.name+' '+product.number+'</a></div>'
            +'</div>'
    
            +'<div class="cart_item_quantity cart_info_col">'
                +'<div class="cart_item_title">จำนวน</div>'
                +'<div class="cart_item_text">'
                    +'<div class="input-group mb-3 col-lg-6">'
                        +'<div class="input-group-prepend">'
                            +'<button class="btn btn-danger btn-sm" id="minus-btn" onclick="minus(\'tire\','+index+')"><i class="fa fa-minus"></i></button>'
                        +'</div>'
                        +'<input type="number" class="form-control form-control-sm qty_input" value="'+value.number+'" min="1" onblur="setNumber('+index+', this)">'
                        +'<div class="input-group-prepend">'
                            +'<button class="btn btn-orange btn-sm" id="plus-btn" onclick="plus(\'tire\','+index+')"><i class="fa fa-plus"></i></button>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="cart_item_price cart_info_col">'
                +'<div class="cart_item_title">ราคา</div>'
                +'<div class="cart_item_text">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</div>'
            +'</div>'
            +'<div class="cart_item_total cart_info_col">'
                +'<div class="cart_item_title">ลบ</div>'
                +'<div class="cart_item_text ">'
                    +'<button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button>'
                +'</div>'
            +'</div>'
            
        +'</div>'
    +'</li>';
    
    return html;
}

$(document).ready(function () {

    $.post(base_url+"service/Cart/cartDetail", {"cartData": cartData},
        function (data, textStatus, jqXHR) {
            cartDataDetail = data;
            showCart();
        }
    );

    $.get(base_url+"service/Garages/getAllGarage", {},
        function (data, textStatus, jqXHR) {
            var html = '<option val="">เลือกอู่ซ่อมรถ</option>';
            $.each(data, function (index, val) { 
                 html += '<option val="'+val.garageId+'">'+val.garageName+'</option>';
            });
            $("#garage").html(html);
        }
    );

    $.get(base_url+"service/Carprofile/getCarProfile", {},
        function (data, textStatus, jqXHR) {
            var html = '<option val="">เลือกทะเบียนรถ</option>';
            $.each(data, function (index, val) { 
                 html += '<option value="'+val.car_profileId+'">'+val.plate+'</option>';
            });
            $("#plate").html(html);
        }
    );

    $("#reserve_day").datetimepicker({
        timepicker:false,
        formatDate:'d/m/Y',
        format:'d/m/Y'
    });

    $("#reserve_time").datetimepicker({
        datepicker:false,
        formatTime:'H:i',
        format:'H:i'
    });

});

        
</script>
</body>
</html>