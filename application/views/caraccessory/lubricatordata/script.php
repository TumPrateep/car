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
            "pageLength": 10,
            "ajax":{
                "url": base_url+"apicaraccessories/Lubricatordata/searchLubricatordata",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                
                }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                {'data': 'lubricator_brandName'},
                null,
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,6]
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return lubricatorLib[data.lubricator_gear];
                    }
                },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return  data.lubricatorName + ((data.capacity)?' <i class="fa fa-circle-o" aria-hidden="true"></i> '+data.capacity+' ลิตร': '') + ((data.lubricator_number)?' <i class="fa fa-circle-o" aria-hidden="true"></i> '+data.lubricator_number:'');
                    }
                },
                {
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var txt = '-';
                        if(data.machine_id < 3){
                            txt = data.machine_type;
                        }
                        return  txt;
                    }
                },
                {
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return currency(data.price, { precision: 0 }).format();
                    }
                },
                {
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button class="btn btn-danger" onclick="deleteLubricatorData('+data.lubricator_dataId+', \''+data.lubricator_brandName+' '+data.lubricatorName + ((data.capacity)?' '+data.capacity+' ลิตร': '') + ((data.lubricator_number)?' '+data.lubricator_number:'')+'\')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    }
                },
                {"className": "dt-head-center", "targets": [2,3]},
                {"className": "dt-center", "targets": [0,4,5]}
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

    function deleteLubricatorData(lubricator_dataId,data_name){
        var option = {
            url: "/lubricatordata/delete?lubricator_dataId="+lubricator_dataId,
            label: "ลบข้อมูลน้ำมันเครื่อง",
            content: "คุณต้องการลบ"+data_name+" นี้ ใช่หรือไม่",
            gotoUrl: "/caraccessory/lubricatordata"
        }
        fnDelete(option);
    }

    var lubricator_brand = $("#lubricator_brandId");
    var lubricator = $("#lubricatorId");
    var lubricator_gear = $("#lubricator_gear");

    function getLubracatorBrand(){
        $.get(base_url+"apicaraccessories/lubricatorbrand/getAllLubricatorBrand",{},
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
        $.get(base_url+"apicaraccessories/Lubricator/getAllLubricator",{
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
        $.post(base_url+"apicaraccessories/lubricatorData/changeStatus",{
            "lubricator_dataId": lubricator_dataId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"/caraccessory/lubricatordata/");
            }else{
                showMessage(data.message);
            }
        });
    }

</script>

</body>
</html>