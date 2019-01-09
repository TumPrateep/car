<script>
    var table = $('#brand-table').DataTable({
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
                "url": base_url+"api/PaymentApprove/searchPaymentApprove",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandName = $("#table-search").val()
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                { "data": "name" },
                null,
                { "data": "money" },
                { "data": "slip" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5,6]
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
                        html+='#'+data.orderId+'<br>';
                        if(data.status==1){
                            html+='<span class="badge badge-warning">รออนุมัติ</span>';
                        }else if(data.status==2){
                            html+='<span class="badge badge-success">อนุมัติ</span>';
                        }else{
                            html+='<span class="badge badge-danger">ผิดพลาด</span>';
                        }
                        return html;
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        
                        return data.orderId;
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-info"><i class="fa fa-file-image-o" aria-hidden="true"></i></button>';
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-success">ยืนยัน</button> '
                            +'<button type="button" class="delete btn btn-danger">ยกเลิก</button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]}
            ]	 

    });


</script>

</body>
</html>
