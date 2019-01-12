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
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"apiGarage/Reserve/searchReserve",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.reserveId = $("#table-search").val(),
                    // data.lubricator_changeId = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                // { "data": "orderId" },
                { "data": "reserveDate" },
                { "data": "reservetime" },
                { "data": "name" },
                null,
                null
                
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,6]
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
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.status+'">#'+data.status+'</a><br>';
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
                        // return data.status;
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-success"  onclick="confirmStatus('+data.reserveId+')">ยืนยัน</button>'
                            +'<button type="button" class="delete btn btn-danger" onclick="cancelStatus('+data.reserveId+')">ยกเลิก</button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]}
            ]	 
    });

    function confirmStatus(reserveId){
        var option = {
            url: "/Reserve/changeStatus?reserveId="+reserveId,
            label: "ยืนยันการทำรายการการจอง",
            status: 2,
            content: "คุณต้องการยืนยันการทำรายการการจองนี้ ใช่หรือไม่",
            gotoUrl: "garage/Reserve"
        }
        fnConfirm(option);
    }   

    function cancelStatus(reserveId){
        var option = {
            url: "/Reserve/changeStatus?reserveId="+reserveId,
            label: "ยกเลิกการทำรายการการจอง",
            status: 3,
            content: "คุณต้องการยกเลิกการทำรายการการจองนี้ ใช่หรือไม่",
            gotoUrl: "garage/Reserve"
        }
        fnConfirm(option);
    }

</script>