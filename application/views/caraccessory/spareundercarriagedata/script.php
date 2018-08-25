<script>
    var table = $('#spareUndercarries-table').DataTable({
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
                "url": base_url+"apiCaraccessories/SpareundercarriageData/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_brandId = $("#spares_brandId").val();
                    data.spares_undercarriageId =$("#spares_undercarriageId").val();
                    // data.spares_undercarriageId= $("#spares_undercarriagedateId").val();
                    // data.tire_modelId = $("#tire_modelId").val();
                    // data.rimId = $("#rimId").val();
                    // data.tire_sizeId = $("#tire_sizeId").val();
                    data.price = $("#price").val();
                    // data.can_change = $("#can_change").val();
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
                                        + '<div class="icon-button mg-15">'
                                            // + '<img class="card-img-top" src="'+picturePath+"tire_brand/"+value.tire_brandPicture+'">'
                                            + '<img class="card-img-top" src="'+picturePath+"spareundercarriage/"+value.spares_undercarriageDataPicture+'">'
                                        + '</div>'
                                        // + '<div class="icon-right">'
                                            // + '<img class="card-img-top" src="http://localhost/car/public/image/icon/Wet-Grip-Tyre-Label.png">'
                                            // + '<img class="card-img-top" src="http://localhost/car/public/image/icon/External-noise-Tyre-Label.png">'
                                            // + '<img class="card-img-top" src="http://localhost/car/public/image/icon/Fuel-efficiency-Tyre-Label.png">'
                                        // + '</div>'
                                    + '</div>'
                                    + '<div class="card-body">'
                                        + '<div class="text-center text-ht-10">'
                                            + '<h4>'+value.spares_undercarriageName+'/'+value.spares_brandName+'</h4>'
                                            //  <br/>'+value.tire_size+' <small>'+mailOrFitted(value.can_change)+'</small></h4>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<span>'+warranty(value.warranty, value.warranty_year, value.warranty_distance)+'</span>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<h2>'+currency(value.price, { useVedic: true }).format()+' บาท/ชิ้น</h2>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<a href="'+base_url+"caraccessory/SpareundercarriesData/updateSpareundercarriesData/"+value.spares_undercarriageDataId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                            + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf" onclick="deletetiredata(\''+value.spares_undercarriageDataId+'\',\''+value.spares_brandName+'/'+value.spares_undercarriageName+'\')"><i class="ti-trash"></i> ลบ</button>'
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

    var spares_undercarriage = $("#spares_undercarriageId");
    var spares_brand = $("#spares_brandId");

    init();

    function init(){
        getSparesUndercarriage();
    }

    function getSparesUndercarriage(){
        $.get(base_url+"apiCaraccessories/CarSpareUndercarriage/getAllSpareundercarriage",{},
            function(data){
                var sparesUndercarriageData = data.data;
                $.each(sparesUndercarriageData, function( key, value ) {
                    spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                });
            }
        );
    }

    spares_undercarriage.change(function(){
        spares_brand.html('<option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>');
        $.get(base_url+"apiCaraccessories/SpareBrand/getAllSpareBrand",{
            spares_undercarriageId: $(this).val()
        },function(data){
                var sparesBrandData = data.data;
                $.each( sparesBrandData, function( key, value ) {
                    spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
                });
            }
        );
    });

    $("#show-search").click(function(){
        $(this).hide(100);
        $("#search-form").slideDown();
    });

    $("#search-hide").click(function(){
        $("#search-form").slideUp();
        $("#show-search").show(100);
    });

    function deletetiredata(spares_undercarriageDataId,data_name){
        var option = {
            url: "/SpareundercarriageData/delete?spares_undercarriageDataId="+spares_undercarriageDataId,
            label: "ลบข้อมอะไหล่",
            content: "คุณต้องการลบ"+data_name+"นี้ ใช่หรือไม่",
            gotoUrl: "/caraccessory/SpareundercarriesData"
        }
        fnDelete(option);
    }

</script>

</body>
</html>