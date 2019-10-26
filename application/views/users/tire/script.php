<script>
    $(document).ready(function () {
        var brand = $("#brandId");
        var model = $("#model_name");
        var year = $("#year");
        var modelofcar = $("#modelofcarId");

        var tireBrand = $("#tire_brandId");
        var tireModel = $("#tire_modelId");
        var tire_rim = $("#rimId");
        var tire_size = $("#tire_sizeId");

        var table;

        function clearCarData(){
            brand.val('');
            model.val('');
            year.val('');
            modelofcar.val('');

            $('#t_brandId').val('');
            $('#t_model_name').val('');
            $('#t_year').val('');
            $('#t_modelofcarId').val('');

            clearTag();
        }

        function clearTireData(){
            tireBrand.val('');
            tireModel.val('');
            tire_rim.val('');
            tire_size.val('');

            $('#t_tire_brandId').val('');
            $('#t_tire_modelId').val('');
            $('#t_rimId').val('');
            $('#t_tire_sizeId').val('');

            clearTag();
        }

        function clearTag(){
            $("#tag-show").html('');
        }

        $("#btn-clear").click(function(){
            var target = $('.nav-link.active').attr("data-target");
            if(target == '#searchFromTire'){
                clearTireData();
                if(table){
                    table.ajax.reload();
                }else{
                    loadDataTable();
                }
            }else{
                clearCarData();
                if(table){
                    table.ajax.reload();
                }else{
                    loadDataTable();
                }
            }
        });

        $(".nav-link").click(function(){
            var target = $(this).attr("data-target");
            if(!$(this).hasClass("active")){
                if(target == '#searchFromTire'){
                    clearCarData();
                    if(table){
                        table.ajax.reload();
                    }else{
                        loadDataTable();
                    }
                    $("#tag-show").html('');
                }else{
                    clearTireData();
                    if(table){
                        table.ajax.reload();
                    }else{
                        loadDataTable();
                    }
                    $("#tag-show").html('');
                }
            }
        });

        $("#car-search").validate({
            rules: {
                brandId: {
                    required: true
                },
                model_name: {
                    required: true
                },
                year: {
                    required: true
                },
                modelofcarId: {
                    required: true
                }
            },
            messages: {
                brandId: {
                    required: "กรอกยี่ห้อรถ"
                },
                model_name: {
                    required: "กรอกรุ่นรถ"
                },
                year: {
                    required: "กรอกปีที่ผลิต"
                },
                modelofcarId: {
                    required: "กรอกรายละเอียดรุ่น"
                }
            },
        });
        
        init();

        function init(){
            getbrand();
            getTireBrand();
            getRim();
        }

        function getbrand(){
            brand.html('<option value="">ยี่ห้อรถ</option>');
            model.html('<option value="">รุ่นรถ</option>');
            year.html('<option value="">ปีที่ผลิต</option>');
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getActiveCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });

                    var brand_id = $('#t_brandId').val();
                    if(brand_id){
                        brand.val(brand_id);
                        getModel();
                    }
                }
            );
        }

        brand.change(function(){
            $('#t_brandId').val('');
            getModel();
        });

        function getModel(){
            var brandId = brand.val();
            model.html('<option value="">รุ่นรถ</option>');
            year.html('<option value="">ปีที่ผลิต</option>');
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getActiveCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelName + '">' + value.modelName + '</option>');
                    });

                    var modelName = $("#t_model_name").val();
                    if(modelName){
                        model.val(modelName);
                        getYear();
                    }
                }
            );
        }

        model.change(function(){
            $("#t_model_name").val('');
            getYear();
        });

        function getYear(){
            var brandId = brand.val();
            var modelName = $("#model_name option:selected").text();
            year.html('<option value="">ปีที่ผลิต</option>');
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');          
            $.get(base_url+"service/Carselect/getMaxMinYear",{
                modelName : modelName
            },function(data){
                if(!data.max){
                    data.max = data.min;
                }
                for (let i = data.min; i <= data.max; i++) {
                    year.append('<option value="' + i+'">'+i+'</option>');
                }

                var t_year = $("#t_year").val();
                if(t_year){
                    year.val(t_year);
                    getModelOfCar();
                }
                
            });
        }

        year.change(function(){
            $("#t_year").val('');
            $("#t_modelofcarId").val('');
            getModelOfCar();
        });

        function getModelOfCar(){
            modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getModelOfCarByYear",{
                brandId: brand.val(),
                modelName: $("#model_name option:selected").text(),
                year : year.val()
            },function(data){
                var carModelData = data.data;
                // console.log(carModelData);
                var html  = '';
                $.each( carModelData, function( key, value ) {
                    let modelofcarName = (value.modelofcarName)?value.modelofcarName:'';
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ modelofcarName +'</option>');
                });
                
                var modelofcarId = $("#t_modelofcarId").val();
                if(modelofcarId){
                    modelofcar.val(modelofcarId);
                    loadDataTable();
                }
            });
        }
        
        function loadDataTable(){
            var target = $('.nav-link.active').attr("data-target");
            if(target == '#searchFromTire'){
                showTag($("#tire-search"));
            }else{
                showTag($("#car-search"));
            }
            
            table = $('#tire-table').DataTable({
                "language": {
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "sProcessing":   "กำลังดำเนินการ...",
                        "emptyTable": "ไม่พบข้อมูล",
                        "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                        "infoEmpty": "ไม่พบข้อมูล",
                        "infoFiltered": "",
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
                        "url": base_url+"service/Tire/search",
                        "dataType": "json",
                        "type": "POST",
                        "data": function ( data ) {
                            data.tire_brandId = $("#tire_brandId").val();
                            data.tire_modelId = $("#tire_modelId").val();
                            data.rimId = $("#rimId").val();
                            data.tire_sizeId = $("#tire_sizeId").val();
                            // data.price = $("#amount").val();
                            // data.can_change = $("#can_change").val();
                            // data.sort = $("#sort").val();
                            // data.warranty_distance = $("#warranty_distance").val();
                            // data.warranty_year = $("#warranty_year").val();
                            data.brandId = $("#brandId").val();
                            data.modelId = $("#modelId").val();
                            data.modelofcarId = $("#modelofcarId").val();
                            data.year = $("#year").val();
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

                                var html = '<div class="row row-border">'
                                    + '<div class="pic col-md-3 text-center">'
                                        + '<img src="https://www.tyremarket.com/images/products/EP150.jpg">'
                                    + '</div>'
                                    + '<div class="detail col-md-3">'
                                        + '<div class="text"> '+data.tire_brandName+' </div>'
                                        + '<div class="text"> '+data.tire_modelName+' </div>'
                                        + '<div class="text"> <strong>'+data.tire_size+'</strong> </div>' 
                                    + '</div>'
                                    + '<div class="brand col-md-3 text-center">'
                                        + '<img src="'+base_url+'public/image/tire_brand/'+data.tire_brandPicture+'" width="100%">'
                                    + '</div>'
                                    + '<div class="detail col-md-3">'
                                        + '<div class="card pointer">'
                                        + '<div class="card-body order">'
                                        + 'ราคาต่ำสุด'
                                        + '<h5>'+data.price+' บาท/เส้น</h5>'
                                        + '</div>'
                                        + '<div class="footer order">'
                                        + 'ค้นหาศูนย์บริการ / สั่งสินค้า'
                                        + '</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>';
                                return html;
                            }
                        }
                    ]
            });
        }

        $('#btn-car-search').click(function (e) {
            var isvalid = false; 
            var target = $('.nav-link.active').attr("data-target");
            var form;
            if(target == '#searchFromTire'){
                isvalid = $('#tire-search').valid();
                form = $('#tire-search');
            }else{
                isvalid = $('#car-search').valid();
                form = $('#car-search');
            }
           
            if(isvalid){
                if(table){
                    table.ajax.reload();
                }else{
                    loadDataTable();
                }
                showTag(form);
            }
        });

        function showTag(form){
            var arrForm = form.serializeArray();
            var html = '';
            $("#tag-show").html('');
            $.each(arrForm, function (i, v) { 
                console.log(v.name);
                html = '<div class="searchTag">'
                        + '<div class="desc"> ' 
                            + $('#'+v.name+' :selected').text()
                            // + '<i class="fa fa-times-circle close"></i>'
                        + ' </div>'
                    + '</div>';
                $("#tag-show").append(html);
            });
        }

        // ------------- tiredata ---------------

        $("#tire-search").validate({
            rules: {
                tire_brandId: {
                    required: true
                },
                tire_modelId: {
                    required: true
                },
                rimId: {
                    required: true
                },
                tire_sizeId: {
                    required: true
                }
            },
            messages: {
                tire_brandId: {
                    required: "เลือกยี่ห้อยาง"
                },
                tire_modelId: {
                    required: "เลือกรุ่นยาง"
                },
                rimId: {
                    required: "เลือกขอบยาง"
                },
                tire_sizeId: {
                    required: "เลือกขนาดยาง"
                }
            },
        });

        function getTireBrand(){
            tireBrand.html('<option value="">ยี่ห้อยาง</option>');
            tireModel.html('<option value="">รุ่นยาง</option>');
            $.get(base_url+"service/Tire/getAllTireBrand",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        tireBrand.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName + '</option>');
                    });

                    var t_tire_brandId = $("#t_tire_brandId").val();
                    if(t_tire_brandId){
                        tireBrand.val(t_tire_brandId);
                        getTireModel();
                    }
                }
            );
        }

        tireBrand.change(function(){
            getTireModel();
        });

        function getTireModel(){
            var tireBrandId = tireBrand.val();
            tireModel.html('<option value="">รุ่นยาง</option>');
            $.get(base_url+"service/Tire/getAllTireModel",{
                tire_brandId: tireBrandId
            },function(data){
                    var tireModelData = data.data;
                    $.each( tireModelData, function( key, value ) {
                        tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>');
                    });

                    var t_tire_modelId = $("#t_tire_modelId").val();
                    if(t_tire_modelId){
                        tireModel.val(t_tire_modelId);
                    }
                }
            );
        }

        function getRim(){
            tire_rim.html('<option value="">ขอบยาง</option>');
            tire_size.html('<option value="">ขนาดยาง</option>');
            $.get(base_url+"service/Tire/getAllTireRims",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                    });

                    var t_rimId = $("#t_rimId").val();
                    if(t_rimId){
                        tire_rim.val(t_rimId);
                        getTireSize();
                    }
                }
            );
        }

        tire_rim.change(function(){
            getTireSize();
        });

        function getTireSize(){
            var rimId = tire_rim.val();
            tire_size.html('<option value="">ขนาดยาง</option>');
            $.get(base_url+"service/Tire/getAllTireSize",{
                rimId: rimId
            },function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                    });

                    var t_tire_sizeId = $("#t_tire_sizeId").val();
                    if(t_tire_sizeId){
                        tire_size.val(t_tire_sizeId);
                        if(table){
                            table.ajax.reload();
                        }else{
                            loadDataTable();
                        }
                    }
                }
            );
        }



    });
</script>