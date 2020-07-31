<script>
    var groupId = $("#groupId");
    var table = $('#changes-table').DataTable({
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
                "url": base_url+"api/lubricatorlimit/searchLubricatorLimit",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.lubricator_changeId = $("#table-search").val(),
                    // data.status = $("#status").val()
                    data.groupId = $("#groupId").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                { "data" : "machine_type"},
                { "data": "price" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{ "targets": 2,
                    "data": "price",
                    "render": function ( data, type, full, meta ) {
                        return currency(data, { useVedic: true }).format();
                    }             
                },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        data.groupId = $("#groupId").val()
                        return '<a href="'+base_url+'admin/lubricatorlimit/updateLubricatorCharge/'+data.limitId+'/'+data.groupId+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletelubricatorchange('+data.groupId+',\''+data.price+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                { "orderable": false, "targets": [0,1,3] },
                // {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,1,2]},
                { "width": "10%", "targets": 0 },
                { "width": "30%", "targets": 1 },
                { "width": "30%", "targets": 2 },
                { "width": "20%", "targets": 3 },
            ]	 
    });

    function deletelubricatorchange(groupId){
        var option = {
            url: "/Lubricatorlimit/deleteLubricatorChange?groupId="+groupId,
            label: "ลบราคาเปลี่ยนยางนอก",
            content: "คุณต้องการลบข้อมูลนี้ ใช่หรือไม่",
            gotoUrl: "admin/lubricatorlimit/lubricatorcharge/"+groupId ,
        }
        fnDelete(option);
    }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    // function updateStatus(lubricator_changeId,status){
    //     $.post(base_url+"api/Lubricatorchange/changeStatus",{
    //         "lubricator_changeId": lubricator_changeId,
    //         "status": status
    //     },function(data){
    //         if(data.message == 200){
    //             showMessage(data.message,"admin/charge/lubricatorcharge");
    //         }else{
    //             showMessage(data.message);
    //         }
    //     });
    // }
</script>

</body>
</html>