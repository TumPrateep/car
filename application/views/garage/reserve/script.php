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
                "url": base_url+"apigarage/Reserve/searchReserve",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.date = $("#date").val(),
                    data.reservename = $("#reservename").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                // { "data": "orderId" },
                null,
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
                        html+='<a href="'+base_url+'garage/reservedetail/reservedetail/'+data.orderId+'">#'+data.orderId+'</a><br>';
                     
                        return html;
                    }
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return $.format.date(new Date(data.reserveDate), "dd/MM/yyyy"); // code ในการแปลงเวลา
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return data+" น."; // code ในการแปลงเวลา
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.status+'">#'+data.status+'</a><br>';
                        if(data.status==1){
                            html+='<span class="badge badge-warning">รอนัดซ่อม</span>';
                        }else if(data.status==2){
                            html+='<span class="badge badge-success">รับนัดซ่อมเเล้ว</span>';
                        }else if(data.status==9){
                            html+='<span class="badge badge-info">ยกเลิกนัดซ่อม</span>';
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
                        var disable = "";
                        if(data.status == 9 || data.status == 2 ){
                            disable = "disabled";
                        }
                        return '<button type="button" class="btn btn-success"  title="รับนัด" '+disable+' onclick="confirmStatus('+data.reserveId+','+data.orderId+')">รับนัดซ่อม</button>'
                            +" "+'<button type="button" class="delete btn btn-danger" '+disable+' onclick="cancelStatus('+data.reserveId+','+data.orderId+')">ยกเลิกนัด</button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]}
            ]	 
    });

    function confirmStatus(reserveId, orderId){
        var option = {
            url: "/Reserve/changeStatus?reserveId="+reserveId+"&orderId="+orderId,
            label: "ยืนยันการทำรายการการจอง",
            status: 2,
            content: "คุณต้องการยืนยันการทำรายการการจองนี้ ใช่หรือไม่",
            gotoUrl: "garage/reserve"
        }
        fnConfirm(option);
    }   

    function cancelStatus(reserveId, orderId){
        var option = {
            url: "/Reserve/changeStatus?reserveId="+reserveId+"&orderId="+orderId,
            label: "ยกเลิกการทำรายการการจอง",
            status: 9,
            content: "คุณต้องการยกเลิกการทำรายการการจองนี้ ใช่หรือไม่",
            gotoUrl: "garage/reserve"
        }
        fnConfirm(option);
    }

    $("#search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>