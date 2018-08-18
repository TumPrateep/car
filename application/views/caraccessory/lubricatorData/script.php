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
                "url": base_url+"apiCaraccessories/LubricatorData/searchLubricatordata",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.lubricatorId = $("#lubricatorId").val();
                    data.lubricator_brandId = $("#lubricator_brandId").val();
                    data.lubricator_gear = $("#lubricator_gear").val();
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
                                 + '<div class="text-right mg-15">'
                                 	+ '<h3><span class="badge badge-pill badge-'+lubricatorClass[value.lubricator_gear]+'">'+lubricatorLib[value.lubricator_gear];
                                    if(value.lubricator_typeName != null){
                                        html += value.lubricator_typeName;
                                    }
                                    html += '</span></h3>'
                                 + '</div>'
                                    + '<div class="card-body text-center">'
                                        + '<img class="card-img-top img-80-p" src="'+picturePath+'lubricatordata/'+value.lubricator_dataPicture+'">'
                                    + '</div>'
                                    + '<div class="card-body">'
                                        + '<div class="text-center">'
                                            + '<h3>'+value.lubricator_brandName+'/'+value.lubricatorName+'<br> '+value.capacity+' ลิตร</h3>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<span>ระยะทาง '+currency(value.lubricator_typeSize, { useVedic: true }).format()+' กม.</span>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<span>'+warranty(value.warranty, value.warranty_year, value.warranty_distance)+'</span>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<h2>'+currency(value.price, { useVedic: true }).format()+' บาท/เส้น</h2>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<a href="'+base_url+"caraccessory/lubricatordata/update/"+value.lubricator_dataId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                            + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf" onclick="deletetiredata(\''+value.lubricator_dataId+'\', \''+value.lubricator_brandName+'/'+value.lubricatorName+'\')"><i class="ti-trash"></i> ลบ</button>'
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

    $("#show-search").click(function(){
        $(this).hide(100);
        $("#search-form").slideDown();
    });

    $("#search-hide").click(function(){
        $("#search-form").slideUp();
        $("#show-search").show(100);
    });

    function deletetiredata(lubricator_dataId,data_name){
        var option = {
            url: "/LubricatorData/delete?lubricator_dataId="+lubricator_dataId,
            label: "ลบข้อมูลน้ำมันเครื่อง",
            content: "คุณต้องการลบ"+data_name+"นี้ ใช่หรือไม่",
            gotoUrl: "/caraccessory/lubricatordata"
        }
        fnDelete(option);
    }

    var lubricator_brand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var lubricator_gear = $("#lubricator_gear");

    function getLubracatorBrand(){
        $.get(base_url+"apiCaraccessories/Lubricatorbrand/getAllLubricatorBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                });
            }
        );
    }

    lubricator_gear.change(function(){
        lubricator_brand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        if(lubricator_gear.val() != ""){
            getLubracatorBrand(); 
        }
    });

    lubricator_brand.change(function(){
        lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
        $.get(base_url+"apiCaraccessories/Lubricator/getAllLubricator",{
            lubricator_brandId: $(this).val(),
            lubricator_gear: lubricator_gear.val()
        },function(data){
                var lubricatorData = data.data;
                $.each( lubricatorData, function( key, value ) {
                    lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
                });
            }
        );
    });

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

</script>

</body>
</html>