<link rel="stylesheet" href="<?=base_url("/public/css/image-picker.css") ?>">

<!-- <script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>public/js/php-date-formatter.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>public/js/jquery.mousewheel.js"></script> -->
<!-- <script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script> -->
<script src="<?php echo base_url() ?>public/js/image-picker.js"></script>

<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>

<!-- <script src="<?=base_url("public/themes/shop-cart/");?>vendor/jquery-steps/jquery.steps.min.js"></script> -->
<!-- <script src="<?=base_url("public/themes/shop-cart/");?>vendor/minimalist-picker/dobpicker.js"></script> -->
<!-- <script src="<?=base_url("public/themes/shop-cart/");?>js/main.js"></script> -->
<script>

var money = 0;
var fullMoney = 0;
var deliveryCost = 0;


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
        +'<td><span class="buy-price">'+currency((product.price),{  precision: 0 }).format()+' บาท</span></td>'
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
        +'<td><span class="buy-price">'+currency((product.price),{  precision: 0 }).format()+' บาท</span></td>'
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
        +'<td><span class="buy-price">'+currency((product.price),{  precision: 0 }).format()+' บาท</span></td>'
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

function getDeposit(){
    $.post(base_url+"service/Order/calAllDeposit", {"productData":getCartList(),"garageId": $("#image-picker").val()},
        function (data, textStatus, jqXHR) {
            $("#halfMoney").html(currency(data.sum, {  precision: 0 }).format() + " บาท");
        }
    );
}

    function confirm_order(orderId){  
        $("#confirm-order").modal("show");
    }

$(document).ready(function () {

    $.post(base_url+"service/Cart/cartDetail", {"cartData": cartData},
        function (data, textStatus, jqXHR) {
            cartDataDetail = data.cartData;
            hasCaraccessory = data.caraccessoryId;
            showCart();
        }
    );

    

});

        
</script>
</body>
</html>