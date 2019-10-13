<script>
    $(document).ready(function () {
        var brand = $("#brandId");
        var model = $("#model_name");
        var year = $("#year");
        var modelofcar = $("#modelofcarId");
        var table;

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
                        "url": base_url+"service/Tire/search",
                        "dataType": "json",
                        "type": "POST",
                        "data": function ( data ) {
                            // data.tire_brandId = $("#tire_brandId").val();
                            // data.tire_modelId = $("#tire_modelId").val();
                            // data.rimId = $("#rimId").val();
                            // data.tire_sizeId = $("#tire_sizeId").val();
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
                                        + '<img src="'+base_url+'public/image/tire_brand/'+data.tire_brandPicture+'">'
                                    + '</div>'
                                    + '<div class="detail col-md-3">'
                                        + '<div class="price"> ราคา '+data.price+' ฿ </div>'
                                        + '<br>'
                                        + '<button class="btn btn-transparent-md"><i class="fa fa-shopping-cart"></i>สั่งซื้อ</button>'
                                    + '</div>'
                                + '</div><br>';
                                return html;
                            }
                        }
                    ]
            });
        }

        $('#btn-car-search').click(function (e) { 
            
            var isvalid = $("#car-search").valid();
            // alert(isvalid);
            if(isvalid){
                table.ajax.reload();
            }
        });

    });
</script>