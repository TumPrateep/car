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
var cart_selected = [];
var errorMessage = $("#error-message");

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
    console.log(html);
    cartList.html(html);
    setTotalAmount();
    // $("#order_total_amount").html(currency(totalCost, {  precision: 0 }).format() + " บาท");
}

function setTotalAmount(){
    
    var total = 0;
    var total_amount = 0;
    deliveryCost = 0;
    // var deliveryData = [];
    var table = $("#cart-table > tbody");
    $("#cart-table > tbody  > tr").each(function(index, val) {
        var trTable = table.find('tr:eq('+index+')').find('input');
        var isCheck = trTable.is(':checked');
        var data_amount = trTable.data('amount');
        total_amount += data_amount;
        if(isCheck){
            total += data_amount;
        }
    });

    $("#total-amount").html(currency(total_amount, {  precision: 0 }).format() + " บาท");
    $("#order_total_amount").html(currency(total, {  precision: 0 }).format() + " บาท");
}

function checkData(){
    var sendData = [];
    var garageId = [];
    var i_index = 0;
    var table = $("#cart-table > tbody");
    $("#cart-table > tbody  > tr").each(function(index, val) {
        var trTable = table.find('tr:eq('+index+')').find('input');
        var isCheck = trTable.is(':checked');
        if(isCheck){
            sendData[i_index++] = {
                group: trTable.data('group'),
                number: trTable.data('number'),
                amount:  trTable.data('amount'),
                garageId:  trTable.data('garage'),
                productId:  trTable.data('productId'),
            }

            garageId.findIndex(x => x == trTable.data('garage')) == -1 ? garageId.push(trTable.data('garage')) : console.log("object already exists")
        }
    });

    $("#register").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            username: {
                required: true,
                minlength: 5
            },
            phone: {
                required: true,
                minlength: 9
            },
            password: {
                required: true,
                minlength: 6
            },
            password_again: {
                required: true,
                equalTo: "#t_password"
            },
            character_plate:{
                required: true,
            },
            number_plate:{
                required: true,
            },
            province_plate:{
                required: true,
            }
        },
        messages: {
            firstname: {
                required: "กรอกชื่อ"
            },
            lastname: {
                required: "กรอกนามสกุล"
            },
            username: {
                required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์",
                minlength: "กรอกชื่อผู้ใช้งานมากกว่า 5 ตัว"
            },
            phone: {
                required: "กรอกเบอร์โทรศัพท์",
                minlength: "กรอกเบอร์โทรให้ครบถ้วน"
            },
            password: {
                required: "กรอกรหัสผ่าน",
                minlength: "กรอกรหัสผ่านมากกว่า 6 ตัว"
            },
            password_again: {
                required: "กรอกยืนยันรหัสผ่าน",
                equalTo: "รหัสผ่านไม่ตรงกัน"
            },
            character_plate:{
                required: "กรอกหมวดอักษร",
            },
            number_plate:{
                required: "กรอกหมายเลขทะเบียน",
            },
            province_plate:{
                required: "เลือกจังหวัด",
            }
        }
    });

    if(garageId.length == 0){
        alert("เลือกสินค้าอย่างน้อย 1 รายการ");
    }else if(garageId.length == 1){
        var isvalid = $("#register").valid();
        if(isvalid){
            var data = $("#register").serialize();
            $.post(base_url + "service/register/users_car", data,
                function(data, textStatus, jqXHR) {
                    // showMessage(data.message);
                    if(data.result){
                        var data_login = {
                            "username": $("#t_username").val(),
                            "password": $("#t_password").val()
                        };
                        login_user(data_login);
                    }
                }
            ).fail(function(data) {
                if (data.responseJSON.message == 3001) {
                    errorMessage.html("ชื่อผู้ใช้งานหรือเบอร์โทรนี้ถูกใช้งานแล้ว");
                    errorMessage.show();
                }
            })
        }
    }else{
        alert("เลือกศูนย์บริการคาร์ใจดีได้เพียง 1 ศุนย์บริการต่อการสั่งซื้อ");
    }
}

function deleteCart(index, role, productId){
    $.confirm({
        title: 'ลบรายการสินค้า',
        content: 'กดตกลงเพื่อยืนยันการลบ',
        buttons: {
            ok: {
                text: 'ตกลง',
                keys: ['enter'],
                btnClass: 'btn-warning',
                action: function(){
                    cartData.splice(index, 1);
                    localStorage.setItem("data", JSON.stringify(cartData));
                    window.location.reload();
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
    var html = '<tr role="row">'
            +'<td><div class="form-check top selected-cart"><input class="form-check-input size-check" type="checkbox" checked value="" onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'" data-garage="'+product.garage.garageId+'" style="width: 1rem !important;"></div></td>'
            +'<td>'
                +'<div class="row">'
                    +'<div class="pic col-md-3 text-center">'
                        +'<img src="'+base_url+'public/image/lubricatorproduct/'+((product.picture)?product.picture:'example.png')+'" width="100px">'
                    +'</div>'
                    +'<div class="col-md-9">'
                        +'<div class="row">'
                            +'<div class="col-md-12">'
                            + '<img src="'+base_url+'public/image/garage/'+product.garage.picture+'" style="width: 40px;border-radius: 50px;"> '
                            + product.garage.garageName
                            +'</div>'
                            +'<div class="detail col-md-3">'
                                +'<div class="text"> '+product.brandName+' '+product.name+' </div>'
                                +'<div class="text"> '+product.lubricatorNumber+' '+product.capacity+' ลิตร </div>'
                                +'<div class="text"> <strong>'+product.machine_type+' '+product.lubricator_type_name+'</strong> </div>'
                            +'</div>'
                            +'<div class="brand col-md-3 text-center brand-logo sort-first">'
                                +'<img src="'+base_url+'public/image/lubricator_brand/'+product.brandPicture+'" width="100%">'
                            +'</div>'
                            +'<div class="detail col-md-3">'
                                + '<div class="row">'
                                    + '<div class="col-5 mbt-5">'
                                        + '<small>จำนวน</small> <input type="number" class="form-control qty" value="'+value.number+'" min="1" onchange="setNumber('+index+', this)">'
                                    + '</div>'
                                    + '<div class="col-7">'
                                        + '<small>ราคา</small><h5><span class="alternate">'+currency((product.price*value.number),{  precision: 0 }).format()+' บาท</span></h5>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</td>'
            +'<td>'
                +'<div class="selected-cart">'
                    +'<button type="button" class="btn btn-outline-danger btn-xs" onclick="deleteCart('+index+',\'lubricator\','+product.productId+')">'
                        +'<i class="fa fa-trash" aria-hidden="true"></i>'
                    +'</button>'
                +'</div>'
            +'</td>'
        +'</tr>';
    return html;
}

function gotoLogin(){
    localStorage.setItem('checkout', true);
    window.location.href = base_url+"login";
}

function getTire(value, index){
    var product = cartDataDetail["tire"][value.productId];
    var totalCost = (product.price*value.number);
    var html = '<tr role="row">'
        +'<td><div class="form-check top selected-cart"><input class="form-check-input size-check" type="checkbox" checked value="" onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'" data-garage="'+product.garage.garageId+'" style="width: 1rem !important;"></div></td>'
        +'<td>'
            +'<div class="row">'
                +'<div class="pic col-md-3 text-center">'
                    +'<img src="'+base_url+'/public/image/tireproduct/'+((product.picture)?product.picture:'example.png')+'" width="100px">'
                +'</div>'
                +'<div class="col-md-9">'
                    +'<div class="row">'
                        +'<div class="col-md-12">'
                        + '<img src="'+base_url+'public/image/garage/'+product.garage.picture+'" style="width: 40px;border-radius: 50px;"> '
                        + product.garage.garageName
                        +'</div>'
                        +'<div class="detail col-md-4">'
                            +'<div class="text"> '+product.brandName+' </div>'
                            +'<div class="text"> '+product.name+' </div>'
                            +'<div class="text"> <strong>'+product.number+'</strong> </div>'
                        +'</div>'
                        +'<div class="brand col-md-4 text-center brand-logo sort-first">'
                            +'<img src="'+base_url+'public/image/tire_brand/'+product.brandPicture+'" width="100%">'
                        +'</div>'
                        +'<div class="detail col-md-4">'
                            + '<div class="row">'
                                + '<div class="col-5 mbt-5">'
                                    + '<small>จำนวน</small> <input type="number" class="form-control qty" value="'+value.number+'" min="1" onchange="setNumber('+index+', this)">'
                                + '</div>'
                                + '<div class="col-7">'
                                    + '<small>ราคา</small><h5><span class="alternate">'+currency((product.price*value.number),{  precision: 0 }).format()+' บาท</span></h5>'
                                + '</div>'
                            + '</div>'
                        + '</div>'
                    +'</div>'
                +'</div>'
            +'</div>'
        +'</td>'
        +'<td>'
            +'<div class="selected-cart">'
                +'<button type="button" class="btn btn-outline-danger btn-xs" onclick="deleteCart('+index+',\'tire\','+product.productId+')">'
                    +'<i class="fa fa-trash" aria-hidden="true"></i>'
                +'</button>'
            +'</div>'
        +'</td>'
    +'</tr>';
   
    return html;
}

function getspare(value, index){
    var product = cartDataDetail["spare"][value.productId];
    var totalCost = (product.price*value.number);
    var html = '<tr>'
                +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'" style="width: 1rem !important;"></div></td>'
                +'<td>'
                    +'<div class="row">'
                        +'<div class="col-md-12">'
                            + '<img src="'+base_url+'public/image/garage/'+product.garage.picture+'">'
                            + product.garage.garageName
                        +'</div>'
                        +'<div class="col-12 col-sm-12 col-md-2 text-center">'
                            +'<img class="cart_item_image" src="'+base_url+'public/image/spareproduct/'+product.picture+'" alt="prewiew" width="120" height="80">'
                        +'</div>'
                        +'<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-4">'
                            +'<h4 class="product-name"><strong>'+product.spares_brandName+' '+product.spares_undercarriageName+'</strong></h4>'
                            +'<h4>'
                                +''+product.brandName+' '+product.modelName+' '+product.year
                            +'</h4>'
                        +'</div>'
                        +'<div class="col-12 col-sm-12 text-sm-center col-md-6 text-md-right row">'
                            +'<div class="col-6 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">'
                                +'<h6><strong>'+currency((product.price),{  precision: 0 }).format()+' บาท</strong></h6>'
                            +'</div>'
                            +'<div class="col-6 col-sm-4 col-md-2">'
                                +'<div class="quantity">'
                                    +'<input type="button" value="+" class="plus btn-warning" id="plus-btn" onclick="plus(\'spare\','+index+')">'
                                    +'<input type="number" step="1" max="99" min="1" class="qty" size="4" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                                    +'<input type="button" value="-" class="minus btn-danger" id="minus-btn" onclick="minus(\'spare\','+index+')">'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-6 col-sm-3 col-md-4" style="padding-top: 5px">'
                                +'<h6><strong>'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</strong></h6>'
                            +'</div>'
                            +'<div class="col-6 col-sm-2 col-md-2 text-right">'
                                +'<button type="button" class="btn btn-outline-danger btn-xs" onclick="deleteCart('+index+')">'
                                    +'<i class="fa fa-trash" aria-hidden="true"></i>'
                                +'</button>'
                            +'</div>'
                        +'</div>'
                    +'</div>';
                +'</td>'
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

function login_user(data){
    $.post(base_url + "api/Auth/login", data,
        function(data, textStatus, jqXHR) {
            var message = data.message;
            if (message == "2001") {
                localStorage.token = data.token;
                localStorage.userId = data.userId;
                $.cookie('token', data.token, { expires: 365 })
                $.cookie('userId', data.userId, { expires: 365 })
                synLogin(base_url + "cart");
            } else if (message == "2002") {
                errorMessage.html("ไม่พบชื่อผู้ใช้งาน <a href='" + base_url + "register" +
                    "'>ลงทะเบียน</a>");
                errorMessage.show();
            } else if (message == "2003") {
                errorMessage.html("ชื่อผู้ใช้งานถูกปิดใช้งาน");
                errorMessage.show();
            } else {
                errorMessage.html("ชื่อหรือรหัสผ่านไม่ถูกต้อง");
                errorMessage.show();
            }
        }
    );
}

$(document).ready(function () {

    var login = $("#login");
    var register = $("#register");

    login.validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์"
            },
            password: {
                required: "กรอกรหัสผ่าน"
            }
        }
    });

    login.submit(function(event) {
        event.preventDefault();
        var isValid = login.valid();
        if (isValid) {
            var data = login.serialize();
            errorMessage.hide();
            login_user(data);
        }
    });
    
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