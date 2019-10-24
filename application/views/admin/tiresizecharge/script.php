<script>
    // var tire_changeId = $("#tire_changeId").val();
    // var tire_size_chargeId = $("#tire_size_chargeId").val();
    // $.post(base_url+"api/Tirechangessize/getTireCh",{
    //     "tire_changeId" : tire_changeId
    // },function(data){
    //     if(data.message!=200){
    //         showMessage(data.message,"admin/charge/tirescharge");
    //     }
    // });

    var rimId = $("#rimId").val();
    // var rimId = $("#rimId").val();
    $.post(base_url+"api/Tirechangessize/getTireCh",{
        "rimId" : rimId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/charge/tirescharge");
        }
    });

    var table = $('#tiresize-table').DataTable({
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
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/Tirechangessize/searchTriesize",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_size = $("#table-search").val(),
                    data.rimId = $("#rimId").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                { "data": "tire_size_price" },
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,3]
                },
                {
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = data.tire_size;
                        if(data.tire_series){
                            html += "/"+data.tire_series;
                        }
                        return html+"R"+data.rim;
                    }
                },
                {
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/Charge/updatetiresizecharge/"+data.rimId+"/"+data.tire_sizeId+"/"+data.tire_size_chargeId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletetrie_size('+data.tire_size_chargeId+',\''+data.tire_size+'\',\''+data.rimId+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var switchVal = "true";
                        var active = " active";
                        if(data.status == null){
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }else if(data.status != "1"){
                            switchVal = "false";
                            active = "";
                        }
                        return '<div>'
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.tire_size_chargeId+','+data.status+','+data.rimId+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-center", "targets": [0,1,2]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "25%", "targets": 2 },
                { "width": "25%", "targets": 3 }
            ]	 
    });
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    function deletetrie_size(tire_size_chargeId,tire_size,rimId){
        var option = {
            url: "/Tirechangessize/deletetirechange?tire_size_chargeId="+tire_size_chargeId,
            label: "ลบขอบยาง",
            content: "คุณต้องการลบขอบยาง "+tire_size+" ใช่หรือไม่",
            gotoUrl: "admin/charge/tiresizecharge/"+rimId
        }
        fnDelete(option);
    }

    function updateStatus(tire_size_chargeId,status,rimId){
        $.post(base_url+"api/Tirechangessize/changeStatus",{
            "tire_size_chargeId": tire_size_chargeId,
            "status": status,
            "rimId": rimId
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/charge/tiresizecharge/"+rimId);
            }else{
                showMessage(data.message);
            }
        });
    }
</script>

</body>
</html>