<script>
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
                "url": base_url+"api/OrderApprove/searchOrderApprove",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.orderId = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                // { "data": "orderId" },
                { "data": "name" },
                null,
                null,
                // { "data": "reserveStatus" },
                // { "data": "paymentStatus" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.orderId+'">#'+data.orderId+'</a><br>';
                     
                        return html;
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.reserveStatus+'">#'+data.reserveStatus+'</a><br>';
                        if(data.status==1){
                            html+='<span class="badge badge-warning">รออนุมัติ</span>';
                        }else if(data.status==2){
                            html+='<span class="badge badge-success">อนุมัติ</span>';
                        }else if(data.status==3){
                            html+='<span class="badge badge-danger">ยกเลิกการจอง</span>';
                        }else{
                            html+='<span class="badge badge-danger">ผิดพลาด</span>';
                        }
                        return html;
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.paymentStatus+'">#'+data.paymentStatus+'</a><br>';
                        if(data.status==1){
                            html+='<span class="badge badge-warning">รออนุมัติ</span>';
                        }else if(data.status==2){
                            html+='<span class="badge badge-success">อนุมัติ</span>';
                        }else if(data.status==3){
                            html+='<span class="badge badge-danger">ยกเลิกการจอง</span>';
                        }else{
                            html+='<span class="badge badge-danger">ผิดพลาด</span>';
                        }
                        return html;
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-warning">ยืนยัน</button> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deletetirechange('+data.tire_changeId+',\''+data.tire_front+'\',\''+data.tire_back+'\')">ยกเลิก</button>';
                    }
                },
                
                { "orderable": false, "targets": 0 },
                // {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,1,2,3,4,5]},
                { "width": "8%", "targets": 0 },
                { "width": "18%", "targets": 1 },
                { "width": "20%", "targets": 2 },
                { "width": "15%", "targets": 3 },
                { "width": "20%", "targets": 4 }
            ]	 
    });

    function deletetirechange(tire_changeId){
        var option = {
            url: "/TireChange/deletetirechange?tire_changeId="+tire_changeId,
            label: "ลบราคาเปลี่ยนยางนอก",
            content: "คุณต้องการลบข้อมูลนี้ ใช่หรือไม่",
            gotoUrl: "admin/Tires/tirechange/"
        }
        fnDelete(option);
    }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function updateStatus(tire_changeId,status){
        $.post(base_url+"api/TireChange/changeStatus",{
            "tire_changeId": tire_changeId,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/Tires/tirechange/");
            }else{
                showMessage(data.message);
            }
        });
    }
</script>

</body>
</html>