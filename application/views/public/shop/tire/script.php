<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>

<script>
$(document).ready(function () {
    var table = $('#brand-table').DataTable({
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
            "pageLength": 12,
            "ajax":{
                "url": base_url+"service/Tire/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_brandId = $("#tire_brandId").val();
                    data.tire_modelId = $("#tire_modelId").val();
                    data.rimId = $("#rimId").val();
                    data.tire_sizeId = $("#tire_sizeId").val();
                    data.price = $("#amount").val();
                    data.can_change = $("#can_change").val();
                    data.sort = $("#sort").val();
                    data.warranty_distance = $("#warranty_distance").val();
                    data.warranty_year = $("#warranty_year").val();
                    data.brandId = $("#brandId").val();
                    data.modelId = $("#modelId").val();
                    data.modelofcarId = $("#modelofcarId").val();
                    data.yearStart = $("#yearStart").val();
                    data.YearEnd = $("#YearEnd").val();
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
                        var imagePath = base_url+"/public/image/tirebranddata/";
                        $.each(data, function( index, value ) {
                            var switchVal = "true";
                            var active = " active";
                            if(value.status == null){
                                return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                            }else if(value.status != "1"){
                                switchVal = "false";
                                active = "";
                            }

                            html += '<div class="col-md-3">'
                                    +'<div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">'
                                        +'<div>'
                                            +'<div class="" style="width: 100%; display: inline-block;">'
                                                +'<div class="border_active active"></div>'
                                                +'<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">'
                                                    +'<div class="d-flex flex-column align-items-center logo-product">'
                                                        +'<img src="'+base_url+'public/image/tire_brand/'+value.tire_brandPicture+'">'
                                                    +'</div>'
                                                    +'<div class="product_image d-flex flex-column align-items-center justify-content-center"onclick="gotoDetail(\'tire\',\''+value.tire_dataId+'\')"><img src="'+imagePath+value.tire_picture+'"/></div>'
                                                    +'<div class="product_content">'
                                                        +'<div onclick="gotoDetail(\'tire\',\''+value.tire_dataId+'\')">'
                                                        +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                        +'<div class="product_name">'
                                                        +'ยี่ห้อ <span class="text-lebel">'+value.tire_brandName+'</span> <br>'
                                                        +'ขนาด <span class="text-lebel">'+value.tire_size+'</span><br>'
                                                        +'รุ่น <span class="text-lebel">'+value.tire_modelName+'</span><br>'
                                                        +'</div>'
                                                    +'</div>'
                                                        +'<div class="product_extras">'
                                                            +'<button class="product_cart_button" tabindex="0" onclick="setCart(\'tire\',\''+value.tire_dataId+'\',this)"><i class="fas fa-shopping-bag"></i> หยิบใส่ตะกร้า</button>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>';
                        });

                        html += '</div>';
                        return html;
                    }
                }
            ]
    });


     $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    $("#price").slider({
        range: true,
        min: 0,
        max: 10000,
        value: [1000, 7000],
        formatter: function formatter(val) {
            // console.log(val);
            if (Array.isArray(val)) {
                var start = currency(val[0], { useVedic: true }).format();
                var end = currency(val[1], { useVedic: true }).format();
                $("#start").text(start);
                $("#end").text(end);
            }
        },
    });

     $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    // $("#amount").slider({
    //     range: true,
    //     min: 0,
    //     max: 10000,
    //     value: [1000, 7000],
    //     formatter: function formatter(val) {
    //         // console.log(val);
    //         if (Array.isArray(val)) {
    //             var start = currency(val[0], { useVedic: true }).format();
    //             var end = currency(val[1], { useVedic: true }).format();
    //             $("#start").text(start);
    //             $("#end").text(end);
    //         }
    //     },
    // });

    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_modelId");
    var tire_rim = $("#rimId");
    var tire_size = $("#tire_sizeId");
    var brand =$("#brandId");
    var model = $("#modelId");
    var modelofcar =$("#modelofcarId");
    var year = $("#yearStart");
    var YearEnd = $("#YearEnd");

    function init(){
        getTireBrand();
        getRim();
        getbrand();
    }
    
    init();

    function getTireBrand(brandId = null){
        $.get(base_url+"service/Tire/getAllTireBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName + '</option>');
                });
            }
        );
    }

    tireBrand.change(function(){
        var tireBrandId = tireBrand.val();
        tireModel.html('<option value="">เลือกรุ่นยาง</option>');
        $.get(base_url+"service/Tire/getAllTireModel",{
            tire_brandId: tireBrandId
        },function(data){
                var tireModelData = data.data;
                $.each( tireModelData, function( key, value ) {
                    tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>');
                });
            }
        );
    });

    function getRim(rimId = null){
        $.get(base_url+"service/Tire/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            }
        );
    }

    tire_rim.change(function(){
        var rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"service/Tire/getAllTireSize",{
            rimId: rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });
            }
        );
    });

    function getbrand(brandId = null ){
        $.get(base_url+"service/Tire/getAllBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
            }
        );
    }

    brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        $.get(base_url+"service/Tire/getAllModel",{
            brandId : brandId
        },function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                });
            }
        );
    });
    model.change(function(){
        var modelId = model.val();
        year.html('<option value="">เลือกปีผลิต</option>');
        $.get(base_url+"service/Tire/getAllYear",{
            modelId : modelId
        },function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    year.append('<option value="' + value.yearStart +' "/" ' +value.YearEnd +'">'+' ปี ' + value.yearStart + '  -  '+value.YearEnd    +'</option>');
                });
            }
        );
    });
    
    model.change(function(){
        var modelId = model.val();
        modelofcar.html('<option value="">เลือกโฉมรถ</option>');
        $.get(base_url+"service/Tire/getAllModelofCar",{
            modelId : modelId
        },function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId + '">' + value.machineSize + '  '+value.modelofcarName+'</option>');
                });
            }
        );
    }); 
});


    

</script>

</body>
</html>