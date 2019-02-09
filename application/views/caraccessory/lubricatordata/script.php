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
                            var switchVal = "true";
                            var active = " active";
                            if(value.status == null){
                                return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                            }else if(value.status != "1"){
                                switchVal = "false";
                                active = "";
                            }

                            html += '<div class="col-lg-3" col-md-8>'
                                 + '<div class="card card-header-height">'
                                 + '<div class="text-right mg-15">'
                                 	+ '<span class="badge badge-pill badge-'+lubricatorClass[value.lubricator_gear]+'">'+lubricatorLib[value.lubricator_gear];
                                    if(value.lubricator_typeName != null){
                                        html += value.lubricator_typeName;
                                    }
                                    html += '</span>'
                                 + '</div>'
                                    + '<div class="card-body text-center">'
                                        +'<img class="card-img-top-50" src="'+picturePath+'lubricator_brand/'+value.lubricator_brandPicture+'">'
                                        + '<img class="card-img-top img-80-p" src="'+picturePath+'lubricatorproduct/'+value.picture+'">'
                                    + '</div>'
                                    + '<div class="card-body">'
                                        +'<div class="row pt-10">'
                                            +'<div class="col-md-12 font-black"><small>'
                                            +'<center><span class="top-margin">'+currency(value.price, {  precision: 0 }).format()+' บาท</span><br></center>'
                                                +'ยี่ห้อ <span class="text-lebel">'+value.lubricator_brandName+'</span> <br>'
                                                +'รุ่น <span class="text-lebel">'+value.lubricatorName+'</span><br>'
                                                +'ความจุ <span class="text-lebel">'+value.capacity+' ลิตร</span><br>'
                                                +'ระยะทาง <span class="text-lebel">'+currency(value.lubricator_typeSize, { precision: 0 }).format()+' กม.</span><br>'
                                                +'รับประกัน <span class="text-lebel">'+warranty(value.warranty, value.warranty_year, value.warranty_distance)+'</span><br></small>'
                                            +'</div>'
                                        +'</div>'
                                        + '<div class="text-center">'
                                            + '<a href="'+base_url+"caraccessory/Lubricatordata/update/"+value.lubricator_dataId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>'
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
            gotoUrl: "/caraccessory/Lubricatordata"
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
    function updateStatus(lubricator_dataId,status){
        $.post(base_url+"apiCaraccessories/LubricatorData/changeStatus",{
            "lubricator_dataId": lubricator_dataId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"/caraccessory/Lubricatordata/");
            }else{
                showMessage(data.message);
            }
        });
    }

</script>

</body>
</html>