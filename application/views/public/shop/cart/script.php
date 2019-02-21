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

function createCarConfirm(){
    var userId = localStorage.getItem("userId");
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

function getLubricator(value, index){
    var product = cartDataDetail["lubricator"][value.productId];
    totalCost += (product.price*value.number);
    var html = '<tr>'
        +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" id="blankCheckbox" value="option1" ></div></td>'
        +'<td><a href="'+base_url+'shop/detail/lubricator/'+value.productId+'"><img class="cart_item_image" src="'+base_url+'public/image/lubricatordata/'+product.picture+'" alt=""></a></td>'
        +'<td><a class="produst-name" href="'+base_url+'shop/detail/lubricator/'+value.productId+'">'+product.brandName+' '+product.name+' '+product.lubricatorNumber+' ขนาด '+product.capacity+' ลิตร</a></td>'
        +'<td><div class="col-md-12">'
            +'<div class="input-group form-group-width ">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-danger" id="minus-btn" onclick="minus(\'lubricator\','+index+')"><i class="fa fa-minus"></i></button>'
                +'</div'
                +'<input type="number" class="form-control" min="1" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-warning" id="plus-btn" onclick="plus(\'lubricator\','+index+')"><i class="fa fa-plus"></i></button>'
                +'</div'
            +'</div>'
        +'</div></td>'
        +'<td><span class="buy-price">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</span></td>'
        +'<td><button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button></td>'
    +'</tr>';
    
    return html;
}

function getTire(value, index){
    var product = cartDataDetail["tire"][value.productId];
    totalCost += (product.price*value.number);
    var html = '<tr>'
        +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" id="blankCheckbox" value="option1" ></div></td>'
        +'<td><a href="'+base_url+'shop/detail/tire/'+value.productId+'"><img class="cart_item_image" src="'+base_url+'public/image/tirebranddata/'+product.picture+'" alt=""></a></td>'
        +'<td><a class="produst-name" href="'+base_url+'shop/detail/tire/'+value.productId+'">'+product.brandName+' '+product.name+' '+product.number+'</a></td>'
        +'<td><div class="col-md-12">'
            +'<div class="input-group form-group-width ">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-danger" id="minus-btn" onclick="minus(\'tire\','+index+')"><i class="fa fa-minus"></i></button>'
                +'</div'
                +'<input type="number" class="form-control" min="1" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                +'<div class="input-group-prepend">'
                    +'<button type="button" class="btn btn-warning" id="plus-btn" onclick="plus(\'tire\','+index+')"><i class="fa fa-plus"></i></button>'
                +'</div'
            +'</div>'
        +'</div></td>'
        +'<td><span class="buy-price">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</span></td>'
        +'<td><button type="button" class="btn btn-orange" onclick="deleteCart('+index+')"><i class="fa fa-trash"></i></button></td>'
    +'</tr>';
    
    return html;
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


$(document).ready(function () {

    var form = $("#rigister");
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
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
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert('Sumited');
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });


});

        
</script>
</body>
</html>