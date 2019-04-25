<link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css") ?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script>
    var table = $('#order-table').DataTable({
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
                "url": base_url+"service/Order/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.status = $("#status").val()
                }
            },
            "order": [[ 1, "desc" ]],
            "columns": [
                null,
                null,
                null,
                null,
                // null,
                // null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,2,3,4]
                },{
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return currency(data.summary, {  precision: 0 }).format() + " บาท";
                    }
                }
                // ,{
                //     "targets": 3,
                //     "data": null,
                //     "render": function ( data, type, full, meta ) {
                //         return currency(data.deposit, {  precision: 0 }).format() + " บาท";
                //     }

                // }
                // ,{
                //     "targets": 4,
                //     "data": null,
                //     "render": function ( data, type, full, meta ) {
                //         return currency(data.summary - data.deposit, {  precision: 0 }).format() + " บาท";
                //     }

                // }
                ,{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return jQuery.format.date(data.create_at, "dd/MM/yyyy HH:mm:ss");
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        html = "";
                        if(data.status == "1"){
                            html += '<a href="'+base_url+"shop/payment/"+data.orderId+'"><button type="button" class="btn btn-primary">จ่ายเงิน</button>'
                        }
                        else if(data.status == "3"){
                            html +='<a href="#"><button type="button" class="btn btn-warning">รับบริการ</button> '
                        }
                        return html 
                        
                    }
                },
                {
                    "targets":3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var  orderstatus = "<span>";
                        
                            if(data.status == "1"){
                                orderstatus +="รอชำระเงิน";
                            }
                            else if(data.status == "2"){
                                orderstatus +="รออนุมัติ";
                            }else if(data.status == "3"){
                                orderstatus +="เข้าใช้บริการ";
                            }

                            orderstatus += "</span>";
                           
                        return  orderstatus;
                    
                         
                    }
                        

                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        html = "";
                        return html += '<a href="'+base_url+"public/Orderdetail/Orderdetails/"+data.orderId+'">'+"#"+ data.orderId
                    }
                },
                
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2,3,4]},
                // { "width": "12%", "targets": 0 },
                // { "width": "20%", "targets": 1 },
                // { "width": "20%", "targets": 2 },
                // { "width": "20%", "targets": 3 }
            ]	 

    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>

</body>
</html>
