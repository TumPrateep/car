<style>
    .sorting_asc{
        display:none;
    }
    .selected{
        background-color: #ffae75;
    }
</style>

<link rel="stylesheet" href="<?=base_url("/public/css/image-picker.css") ?>">

<script src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>public/js/php-date-formatter.min.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script>
<script src="<?php echo base_url() ?>public/js/image-picker.js"></script>

<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>

<script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script>

<script src="<?=base_url("public/themes/shop-cart/");?>vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="<?=base_url("public/themes/shop-cart/");?>vendor/minimalist-picker/dobpicker.js"></script>
<script src="<?=base_url("public/themes/shop-cart/");?>js/main.js"></script>
<script>

var money = 0;
var fullMoney = 0;
var deliveryCost = 0;
var table;
var garagetable;

var latitude = null;
var longitude = null;

var orderData = [];
var carProfileData = [];
var garageData = [];

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            getAllGarage();
        }, function(error) {
            latitude = null;
            longitude = null;
            getAllGarage();
            // alert('ไม่สามารถดึงตำแหน่งปัจจุบันได้');         
        },{timeout:5000});
    } else {
        // alert("ไม่สามารถดึงตำแหน่งปัจจุบันได้");
        getAllGarage();
    }
}

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
    getshopCartforDataTable();
    setNumberOfCart();
    
    cartList.html(html);
    setTotalAmount();
    // $("#order_total_amount").html(currency(totalCost, {  precision: 0 }).format() + " บาท");
}

function getshopCartforDataTable(){
    // $('#cart-table').DataTable({
    //         "responsive": true
    // });
    
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
    $("#o_total_amount").html(currency(fullMoney, {  precision: 0 }).format()+" บาท");
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
                    synchroData();
                    // getImagePicker();
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
                +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'" style="width: 1rem !important;"></div></td>'
                +'<td>'
                    +'<div class="row">'
                        +'<div class="col-12 col-sm-12 col-md-2 text-center">'
                            +'<img class="cart_item_image" src="'+base_url+'public/image/lubricatorproduct/'+product.picture+'" alt="prewiew" width="120" height="80">'
                        +'</div>'
                        +'<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-4">'
                            +'<h4 class="product-name"><strong>'+product.brandName+' '+product.name+' '+product.lubricatorNumber+'</strong></h4>'
                            +'<h4>'
                                +'ขนาด '+product.capacity
                            +'</h4>'
                        +'</div>'
                        +'<div class="col-12 col-sm-12 text-sm-center col-md-6 text-md-right row">'
                            +'<div class="col-6 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">'
                                +'<h6><strong>'+currency((product.price),{  precision: 0 }).format()+' บาท</strong></h6>'
                            +'</div>'
                            +'<div class="col-6 col-sm-4 col-md-2">'
                                +'<div class="quantity">'
                                    +'<input type="button" value="+" class="plus btn-warning" id="plus-btn" onclick="plus(\'lubricator\','+index+')">'
                                    +'<input type="number" step="1" max="99" min="1" class="qty" size="4" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                                    +'<input type="button" value="-" class="minus btn-danger" id="minus-btn" onclick="minus(\'lubricator\','+index+')">'
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

function getTire(value, index){
    var product = cartDataDetail["tire"][value.productId];
    var totalCost = (product.price*value.number);

    var html = '<tr>'
                +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'" style="width: 1rem !important;"></div></td>'
                +'<td>'
                    +'<div class="row">'
                        +'<div class="col-12 col-sm-12 col-md-2 text-center">'
                            +'<img class="cart_item_image" src="'+base_url+'public/image/tireproduct/'+product.picture+'" alt="prewiew" width="120" height="80">'
                        +'</div>'
                        +'<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-4">'
                            +'<h4 class="product-name"><strong>'+product.brandName+' '+product.name+'</strong></h4>'
                            +'<h4>'
                                +''+product.number
                            +'</h4>'
                        +'</div>'
                        +'<div class="col-12 col-sm-12 text-sm-center col-md-6 text-md-right row">'
                            +'<div class="col-6 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">'
                                +'<h6><strong>'+currency((product.price),{  precision: 0 }).format()+' บาท</strong></h6>'
                            +'</div>'
                            +'<div class="col-6 col-sm-4 col-md-2">'
                                +'<div class="quantity">'
                                    +'<input type="button" value="+" class="plus btn-warning" id="plus-btn" onclick="plus(\'tire\','+index+')">'
                                    +'<input type="number" step="1" max="99" min="1" class="qty" size="4" value="'+value.number+'" onblur="setNumber('+index+', this)">'
                                    +'<input type="button" value="-" class="minus btn-danger" id="minus-btn" onclick="minus(\'tire\','+index+')">'
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

function getspare(value, index){
    var product = cartDataDetail["spare"][value.productId];
    var totalCost = (product.price*value.number);
    var html = '<tr>'
                +'<td><div class="form-check top"><input class="form-check-input size-check" type="checkbox" value="" checked onchange="setTotalAmount()" data-amount="'+totalCost+'" data-productId="'+value.productId+'" data-group="'+value.group+'" data-number="'+value.number+'" style="width: 1rem !important;"></div></td>'
                +'<td>'
                    +'<div class="row">'
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

function getCarProfile(){
    carProfileData = [];
    table = $('#order-table').DataTable({
        "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบข้อมูล",
                "infoFiltered": "(กรอง 1 จากทั้งหมด _MAX_ รายการ)",
                "lengthMenu": "_MENU_ รายการ",
                "zeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก", // This is the link to the first page
                    "sPrevious": "ก่อนหน้า", // This is the link to the previous page
                    "sNext": "ถัดไป", // This is the link to the next page
                    "sLast": "หน้าสุดท้าย" // This is the link to the last page
                }
            },
            "responsive": true,
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"service/Cart/searchCarProfile",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.search = $("#searchCar").val()
                    // data.skill = $("#skillmechanic").val()
                    //data.status = $("#status").val()
                }
            },
            "order": [[ 0, "asc" ]],
            "columns": [
                null
            ],
            "columnDefs": [
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '<div class="row">';
                        var picturePath = base_url+"/public/image/";
                        $.each(data, function( index, value ) {
                            carProfileData[value.car_profileId] = value;
                            html+= '<div class="col-lg-3" onclick="selectCarProfile('+value.car_profileId+', this)">'
                                         + '<div class="card">'
                                            + '<div class="card-body">'
                                                + '<div class="card-two">'
                                                    + '<header>'
                                                        + '<div class="avatar img-pandding ">'
                                                            + '<img  src="'+picturePath+'carprofile/'+value.picture+'" width="100%" />'
                                                        + '</div>'
                                                    + '</header>'
                                                    + '<div class="from-padding">'
                                                        + '<div class="desc card border-black ">'
                                                            +'<span class="text-center txt-S-m">'+value.character_plate+'  '+value.number_plate+'</span>'                                                        
                                                            +'<span class="text-center txt-S-s">'+value.provinceforcarName+'</span>'
                                                        + '</div>'
                                                    + '</div>'

                                                + '</div>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>';
                        })

                        html += '</div>';
                        return html;

                    }

                },
             
            ]	 
    });
    
}

function selectCarProfile(carProfileId, select){
    var hasClass = $(select).children().hasClass("selected");
    var profileId = $("#image-picker-car").val();
    var hasSame = (profileId == carProfileId) || (profileId == "");
    if(hasSame){
        if(hasClass){
            $(select).children().removeClass("selected");
            $("#image-picker-car").val("");
            orderData["carProfileId"] = null;
        }else{
            $(select).children().addClass("selected");
            $("#image-picker-car").val(carProfileId);
            orderData["carProfileId"] = carProfileId;
        }
    }
    // console.log(select);
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

function getAllGarage(){
    garageData = [];
    garagetable = $('#search-table').DataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "sProcessing":   "กำลังดำเนินการ...",
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดงสินค้า _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบข้อมูล",
                "infoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "lengthMenu": "_MENU_ รายการ",
                "zeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก", // This is the link to the first page
                    "sPrevious": "ก่อนหน้า", // This is the link to the previous page
                    "sNext": "ถัดไป", // This is the link to the next page
                    "sLast": "หน้าสุดท้าย" // This is the link to the last page
                }
            },
            "responsive": true,
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "orderable": false,
            "pageLength": 8,
            "ajax":{
                "url": base_url+"service/garages/searchgarage",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.garagename = $("#garagename").val();
                    data.dataType = getTypeOfProduct();
                    // data.provinceIdSearch =$("#provinceIdSearch").val();
                    // data.districtIdSearch= $("#districtIdSearch").val();
                    // data.subdistrictIdSearch = $("#subdistrictIdSearch").val();
                    // data.brandId = $("#brandId").val();
                    // data.service = $("#Service").val();
                    // data.latitude = latitude;
                    // data.longitude = longitude;
                    // data.sort = $("#sort").val();
                }
            },
            "columns": [
                null
            ],
            "columnDefs": [
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '<div class="row">';
                        var imagePath = base_url+"/public/image/garage/";

                        $.each(data, function( index, value ) {
                            garageData[value.garageId] = value;
                            var rating_star = '';
                            if(value.scoreall != 0){
                                averagescore = (value.scoresummury/value.scoreall);
                                averagescorerating = averagescore.toFixed( 1 );
                                scorerating = Math.floor(averagescore);
                            }else{
                                averagescore = 0;
                                averagescorerating = 0;
                                scorerating = 0;
                            }
                                for(var i=0;i<scorerating;i++){
                                   rating_star += '<i class="fa fa-star Yellow-star size-star" ></i>';
                                }
                                for(var i=5;scorerating<i;scorerating++){
                                   rating_star += '<i class="fa fa-star gray-star size-star" ></i>';
                                }
                            
                            var serviceall = '';
                            var servicetype = ['<span class="text-service">•</span> ซ่อมช่วงล่าง',
                            					'<span class="text-service">•</span> เปลี่ยนยางรถ',
                            					'<span class="text-service">•</span> เปลี่ยนถ่ายน้ำมันเครื่อง'];
                            var servicegarage = value.garageService ;

                            for(var i=0;i<servicegarage.length;i++){
                                if(servicegarage.charAt(i) == "1"){
                                    serviceall += servicetype[i] ;
                                }
                            }

                            var option = '';
                        
                                if(value.option1 ==1){
                                    option +='<span class="border-option btn-sm " data-toggle="tooltip" data-placement="top" title="มี Wifi"><i class="fas fa-wifi"></i></span>';
                                }else if(value.option == null){option +='';}
                                if(value.option2 ==2){
                                    option +='<span class="border-option btn-sm" data-toggle="tooltip" data-placement="top" title="มีห้องพักพัดม"><i class="fab fa-yelp"></i></span>';
                                }else if(value.option2 == null){option +='';}
                                if(value.option3 ==3){
                                    option +='<span class="border-option btn-sm" data-toggle="tooltip" data-placement="top" title="มีห้องพักเเอร์"><i class="far fa-snowflake"></i></span>';
                                }else if(value.option3 == null){option +='';}
                                if(value.option4 ==4){
                                    option +='<span class="border-option btn-sm"      data-toggle="tooltip" data-placement="top" title="มีห้องน้ำ"><i class="fas fa-bath"></i></span><div></div>';
                                }else if(value.option4 == null){option +='';}

                            html += '<div class="col-lg-4" onclick="selectGarage('+value.garageId+','+value.dayopenhour+', this, \''+value.openingtime+'\',\''+value.closingtime+'\')">'
                                + '<div class="card">'
                                    + '<div class="card-body">'
                                        + '<div class="" style="width: 100%; display: inline-block;">'
                                            + '<div class="border_active"></div>'
                                            + '<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">'
                                            + '<div class="product_image d-flex flex-column align-items-center justify-content-center" onclick=""><img src="'+imagePath+value.picture+'"></div>'
                                            + '<div class="product_content">'
                                                + '<div onclick="">'
                                                    + '<div class="garage-distance distance">'+distance(value.latitude, value.longitude, latitude, longitude, "K")+'</div>'
                                                    + '<div class="garage-name-txt">'+value.garageName+'</div>'
                                                    + '<div><span title="'+changeStringGS(value.garageService)+'">'+substr(changeStringGS(value.garageService))+'</span></div>'
                                                    // + '<div>'+serviceall+'</div>'
                                                    // + '<div><span class="error">เปิด</span> '+changeStringToDay(value.dayopenhour)+'<br>'+value.opentime+'</div>'
                                                    + '<div><span class="error">เปิด</span> '+changeStringToDay(value.dayopenhour)+'<br>'+settimegarage(value.openingtime)+" - "+settimegarage(value.closingtime)+" น."+'</div>'
                                                    + '<div class="text-center">'
                                                        + rating_star
                                                    + '</div>'
                                                    + '<div class="option-garage">'+option+'</div>'
                                                    + '<div class="form-div">'
                                                        + '<a href="'+base_url+"comment/"+value.garageId+'" target="_blank"><button class="btn btn-info btn-sm rat-garage">คะเเนนเเละรีวิว</button></a>'
                                                        + '<a href="https://www.google.com/maps/?q='+value.latitude+','+value.longitude+'" target="_blank"><button class="btn btn-danger btn-sm"><i class="fas fa-location-arrow"></i>...Maps</button></a>'
                                                    + '</div>'
                                            	+ '</div>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                            + '</div>'
                        });

                        html += '</div>';
                        return html;
                    }
                }
            ]
        });
    }

    function settimegarage(timegarage){
        var time = "2001-01-01 "+timegarage;
        var datetime = new Date(time);
        var htime = datetime.getHours();
        var htostring = htime.toString();
        var h = htostring.length;
        if(h == 1){
            hours = "0"+htime;
        }else{
            hours = htime;
        }
        var mtime = datetime.getMinutes();
        var mtostring = mtime.toString();
        var m = mtostring.length;
        if(m == 1){
            minutes = "0"+mtime;
        }else{
            minutes = mtime;
        }
        var settime = hours+":"+minutes;
        return settime;   
    }

function selectGarage(selectGarageId, dayopen, select, open, close){
    var hasClass = $(select).find(".card").hasClass("selected");
    var garageId = $("#image-picker").val();
    var hasSame = (garageId == selectGarageId) || (garageId == "");
    if(hasSame){
        if(hasClass){
            $(select).find(".card").removeClass("selected");
            $("#image-picker").val("");
            $("#reserve_day, #reserve_time").val("");
            $("#showReserve").slideUp("slow",function(){
                $(this).hide();
            });
            orderData["garageId"] = null;
        }else{
            $(select).find(".card").addClass("selected");
            $("#image-picker").val(selectGarageId);
            disableDay(dayopen.toString(), open, close);
            $("#reserve_day, #reserve_time").val("");
            orderData["garageId"] = selectGarageId;
        }
    }

    // $("#image-picker").imagepicker({
    //     hide_select : true,
    //     show_label  : true,
    //     selected: function(select, picker, option, event){
    //         var picker = $("#image-picker option:selected");
    //         var dayopen = picker.data("openday");
    //         var open = picker.data("open");
    //         var close = picker.data("close");
    //         disableDay(dayopen.toString(), open, close);
    //         $("#reserve_day, #reserve_time").val("");
    //     },
    //     clicked:function(select, picker, option, event){
    //         var picker = $("#image-picker option:selected");
    //         if(picker.val() == ""){
    //             $("#showReserve").slideUp("slow",function(){
    //                 $(this).hide();
    //             });
    //         }
    //     },
    // });
}

function disableDay(openday, open, close){
    console.log(openday);
    $("#showReserve").slideDown("slow");
    $.datetimepicker.setLocale('th');
    var nowDate = new Date();
    $("#reserve").datetimepicker({
        beforeShowDay: function(date) {
            var day = date.getDay();
            if(openday.charAt(day) == 0){
                return [false, ''];
            } else {
                return [true, ''];
            }
        },
        inline:true,
        formatDate:'Y-m-d',
        formatTime:'H:i',
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
        scrollInput: false,
        minTime: open,
        maxTime: close
    });
}

function setCartShowDetail(){
    // carprofile
    var picturePath = base_url+"/public/image/";
    var carprofile = carProfileData[orderData["carProfileId"]];
    $("#plate").html(carprofile.character_plate+" "+carprofile.number_plate);
    $("#provinceplate").html(carprofile.provinceforcarName);
    $("#brand_car").html();
    $("#carpicture").attr("src",picturePath+'carprofile/'+carprofile.picture);

    // garages
    var garage = garageData[orderData["garageId"]];
    var reserve = $("#reserve").val();
    console.log(reserve);
    var subReserve = reserve.split(' ')
    var subDate = subReserve[0].split('/')
    reserve = subDate[2]+"/"+subDate[1]+"/"+subDate[0];
    $("#o-garageName").html(garage.garageName);
    $("#o-reserveday").html("วันที่ "+reserve+" เวลา "+subReserve[1]+":00");

}

// function getDeposit(){
//     $.post(base_url+"service/Order/calAllDeposit", {"productData":getCartList(),"garageId": $("#image-picker").val()},
//         function (data, textStatus, jqXHR) {
//             $("#halfMoney").html(currency(data.sum, {  precision: 0 }).format() + " บาท");
//         }
//     );
// }

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
    
    // form.steps({
    //     headerTag: "h3",
    //     bodyTag: "fieldset",
    //     transitionEffect: "fade",
    //     labels: {
    //         previous : 'ก่อนหน้า',
    //         next : 'ถัดไป',
    //         finish : 'บันทึก',
    //         current : ''
    //     },
    //     titleTemplate : '<span class="title">#title#</span>',
    //     onStepChanging: function (event, currentIndex, newIndex)
    //     {
    //         var isvalid = true;
    //         // form.validate().settings.ignore = ":disabled,:hidden";
    //         if(currentIndex == 1){
    //             if(fullMoney <= 0){
    //                 isvalid = false;
    //                 $(".alert").show();
    //                 $.wait( function(){ $(".alert").fadeOut( "slow") }, 5);
    //             }
    //             getCartList();
    //         }
    //         if(currentIndex == 0){
    //             isvalid = $("#image-picker-car").val() != "";
    //             if(!isvalid){
    //                 $(".alert").show();
    //                 $.wait( function(){ $(".alert").fadeOut( "slow") }, 5);
    //             }
    //         }
    //         if(currentIndex == 2){
    //             var reserve = $("#reserve").val();
    //             isvalid = ($("#image-picker").val() != "" && form.valid() && reserve != "");
    //             if(!isvalid){
    //                 $(".alert").show();
    //                 $.wait( function(){ $(".alert").fadeOut( "slow") }, 5);
    //             }
    //             else{
    //                 setCartShowDetail();
    //             }
    //         }
    //         return isvalid;
    //     },
    //     onFinishing: function (event, currentIndex)
    //     {
    //         // form.validate().settings.ignore = ":disabled";
    //         return form.valid();
    //     },
    //     onFinished: function (event, currentIndex)
    //     {
    //           var isValid = form.valid();
    //           if(isValid){
    //             var reserve = $("#reserve").val();
    //             var reserveArr = reserve.split(' ');
    //             console.log(reserve);
    //             var data = form.serializeArray();
    //             data[data.length] = { name: "productData", value: getCartList() };
    //             data[data.length] = { name: "isDeposit", value: false };
    //             data[data.length] = { name: "reserve_day", value: reserveArr[0] };
    //             data[data.length] = { name: "reserve_time", value: reserveArr[1] };
    //             $.post(base_url+"service/Order/createOrderDetail", data,
    //                 function (data, textStatus, jqXHR) {
    //                     if(data.message == 200){
    //                         localStorage.setItem("data",JSON.stringify([]));
    //                         cartData = [];
    //                         synCartData();
    //                         // synchroData();
    //                         showMessage(data.message,"shop/order");
    //                     }else{
    //                         showMessage(data.message);
    //                     }
    //                 }
    //             );
    //           }

    //         // window.location = base_url+"shop/payment/10011";
    //     },
    //     // onInit : function (event, currentIndex) {
    //     //     event.append('demo');
    //     // }
    // });

    // var form = $("#submit");
    // var confirmForm = $("#confirm");
    $.post(base_url+"service/Cart/cartDetail", {"cartData": cartData},
        function (data, textStatus, jqXHR) {
            cartDataDetail = data.cartData;
            hasCaraccessory = data.caraccessoryId;
            showCart();
        }
    );

    getCarProfile();
    getLocation();

    $("#search-car").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    $("#btn-search-garage").click(function(){
        event.preventDefault();
        garagetable.ajax.reload();
    })


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

    

    function getbrand(brandId = null ){
        $.get(base_url+"service/Carselect/getCarBrand",{},
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
        $.get(base_url+"service/Carselect/getCarModel",{
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
        $.get(base_url+"service/Carselect/getCarYear",{
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
        $.get(base_url+"service/Carselect/getCarDetail",{
            modelId : detail.val()
        },function(data){
            var carModelData = data.data;
            console.log(carModelData);
            $.each( carModelData, function( key, value ) {
                modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
            });
        });
    });
    
    var createcar = $("#submit-create-car-profile");
    createcar.validate({
        rules:{
            character_plate: {
                required: true
            },
            number_plate: {
                required: true,
                maxlength: 6
            },
            province_plate: {
                required: true
            },
            brandId: {
                required: true
            },
            modelId: {
                required: true
            },
            detail: {
                required: true
            },
            modelofcarId: {
                required: true
            },
            color: {
                required: true
            }  
        },messages:{
            character_plate: {
                required: "กรุณากรอกอัษร"
            },
            number_plate:{
                required: "กรุณากรอกหมายเลข",
                maxlength: "กรุณากรอกหมายเลขให้ถูกต้อง"
            },
            province_plate: {
                required: "กรุณาเลือกจังหวัด"
            },
            brandId:{
                required: "กรุณาเลือกยี่ห้อรถ"
            },
            modelId: {
                required: "กรุณาเลือกรุ่นรถ"
            },
            detail:{
                required: "กรุณาเลือกรายละเอียดรถ"
            },
            modelofcarId: {
                required: "กรุณาเลือกโฉมรถ"
            },
            color: {
                required: "กรุณากรอกสีรถ"
            } 
        }
    });
    var datacar = createcar.serialize();
    createcar.submit(function (e) { 
      e.preventDefault();
      var isValid = createcar.valid();
      if(isValid){
        var imageData = $('.image-editor').cropit('export');
        $('.hidden-image-data').val(imageData);
        var myform = document.getElementById("submit-create-car-profile");
        var formData = new FormData(myform);
        
        $.ajax({
          url: base_url+"service/Carprofile/createCarProfile",datacar,
          data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
            success:function (data, textStatus, jqXHR) {
            console.log(data);
            if(data.message == 200){
                showMessage(data.message,"shop/cart");
              // window.location = base_url+"shop/cart";
              // $("#selectcar").modal("hide");
            }else if(data.message == 3001){
             showMessage(data.message);
            }
          }
        });
      }      
    });

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 200,
        type: 'image/jpeg'
    });
    
    $(function(){
            $("#character_plate").keyup(function(event){
                var input_data=$("#character_plate").val();
            $("#characterofcar").html(input_data);      
        });

        $("#number_plate").keyup(function(event){
                var input_data=$("#number_plate").val();
            $("#numberofcar").html(input_data);      
        });

        $("#province_plate").change(function(event){
                var input_data=$("#province_plate :selected").text();
            $("#provincecar").html(input_data);      
        });
    });
   

        
</script>
</body>
</html>