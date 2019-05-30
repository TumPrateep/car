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
                "url": base_url+"apigarage/Accessstatus/searchAccessstatus",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.date = $("#date").val(),
                    data.reservename = $("#reservename").val(),
                    data.status = $("#status").val(),
                    data.statusSuccess = $("#statusSuccess").val()
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
                        if(data.status==4 && data.statusSuccess==1){
                            html+='<span class="badge badge-warning">รอดำเนินกาซ่อม</span>';
                        }else if(data.status==4 && data.statusSuccess==2){
                            html+='<span class="badge badge-success">ซ่อมเสร็จสิ้น</span>';
                        }
                        return html;
                        // return data.status;
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var disable = "";
                        if(data.statusSuccess == 2 ){
                            disable = "disabled";
                        }
                        return '<button type="button" class="btn btn-success"  title="" '+disable+' onclick="update_mileage('+data.orderId+')">ซ่อมเสร็จสิ้น</button>';
                        // return '<button type="button" class="btn btn-success"  title="ซ่อมเสร็จสิ้น" '+disable+' onclick="confirmStatus('+data.orderId+')">ซ่อมเสร็จสิ้น</button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]}
            ]	 
    });

    function confirmStatus(orderId){
        var option = {
            url: "/Accessstatus/changeStatus?orderId="+orderId,
            label: "ยืนยันการทำรายการการจอง",
            status: 2,
            content: "คุณต้องการยืนยันการทำรายการการจองนี้ ใช่หรือไม่",
            gotoUrl: "garage/acessstatus"
        }
        fnConfirm(option);
    }   

    

    $("#search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    function update_mileage(orderId){
        
        $("#orderId").val(orderId);
        $("#update-mileage").modal("show");
    }

</script>