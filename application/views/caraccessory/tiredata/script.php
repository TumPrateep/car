<script>
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
                "url": base_url+"apiCaraccessories/TireData/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_brandId = $("#tire_brandId").val();
                    data.tire_modelId = $("#tire_modelId").val();
                    data.rimId = $("#rimId").val();
                    data.tire_sizeId = $("#tire_sizeId").val();
                    data.price = $("#price").val();
                    data.can_change = $("#can_change").val();
                    data.sort = $("#sort").val();
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

                        $.each(data, function( index, value ) {

                            html += '<div class="col-lg-4" col-md-8>'
                                 + '<div class="card card-header-height">'
                                    + '<div class="card-body">'
                                        + '<div class="icon-left">'
                                            + '<img class="card-img-top" src="'+picturePath+"tire_brand/"+value.tire_brandPicture+'">'
                                            + '<img class="card-img-top" src="'+picturePath+"tirebranddata/"+value.tire_picture+'">'
                                        + '</div>'
                                        + '<div class="icon-right">'
                                            + '<img class="card-img-top" src="http://localhost/car/public/image/icon/Wet-Grip-Tyre-Label.png">'
                                            + '<img class="card-img-top" src="http://localhost/car/public/image/icon/External-noise-Tyre-Label.png">'
                                            + '<img class="card-img-top" src="http://localhost/car/public/image/icon/Fuel-efficiency-Tyre-Label.png">'
                                        + '</div>'
                                    + '</div>'
                                    + '<div class="card-body">'
                                        + '<div class="text-center">'
                                            + '<h4>'+value.tire_brandName+'/'+value.tire_modelName+' <br/>'+value.tire_size+' <small>'+mailOrFitted(value.can_change)+'</small></h4>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<span>รับประกัน '+warranty(value.warranty, value.warranty_year, value.warranty_distance)+'</span>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<h2>'+currency(value.price, { useVedic: true }).format()+' บาท/เส้น</h2>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<a href="'+base_url+"caraccessory/TireData/updatetiredata/"+value.tire_dataId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                            + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf" onclick="deletetiredata(\''+value.tire_dataId+'\', \''+value.tire_modelName+'/'+value.tire_brandName+' '+value.tire_size+'\')"><i class="ti-trash"></i> ลบ</button>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>';
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

    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_modelId");
    var tire_rim = $("#rimId");
    var tire_size = $("#tire_sizeId");

    function init(){
        getTireBrand();
        getRim();
    }
    
    init();

    function getTireBrand(brandId = null){
        $.get(base_url+"apiCaraccessories/Tirebrand/getAllTireBrand",{},
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
        $.get(base_url+"apiCaraccessories/Tiremodel/getAllTireModel",{
            tire_brandId: tireBrandId
        },function(data){
                var tireModelData = data.data;
                $.each( tireModelData, function( key, value ) {
                    tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>');
                });
            }
        );
    });

    tire_rim.change(function(){
        var tire_rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"apiCaraccessories/Tiresize/getAllTireSize",{
            tire_rimId: tire_rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tiresize + '</option>');
                });
            }
        );
    });

    function getRim(rimId = null){
        $.get(base_url+"apiCaraccessories/TireRim/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            }
        );
    }

    $("#show-search").click(function(){
        $(this).hide(100);
        $("#search-form").slideDown();
    });

    $("#search-hide").click(function(){
        $("#search-form").slideUp();
        $("#show-search").show(100);
    });

    function deletetiredata(tire_dataId,data_name){
        var option = {
            url: "/tiredata/delete?tire_dataId="+tire_dataId,
            label: "ลบข้อมูลยาง",
            content: "คุณต้องการลบ"+data_name+"นี้ ใช่หรือไม่",
            gotoUrl: "caraccessory/tiredata"
        }
        fnDelete(option);
    }

</script>

</body>
</html>