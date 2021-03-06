<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>
<script>
    var table = $('#service-table').DataTable({
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
        "ajax": {
            "url": base_url + "apiUser/Servicehistory/servicehistory",
            "dataType": "json",
            "type": "POST",
            "data": function(data) {
                // data.date = $("#date").val(),
                // data.reservename = $("#reservename").val(),
                // data.status = $("#status").val()
            }
        },
        "order": [
            [1, "desc"]
        ],
        "columns": [
            null,
            null,
            null,
            null

        ],
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0,3]
            },{
                "targets": 0,
                "data": null,
                "render": function(data, type, full, meta) {
                    return meta.row + 1;
                }
            },{
                "targets": 1,
                "data": null,
                "render": function(data, type, full, meta) {
                    return '#'+data.orderId; 
                }
            },{
                "targets": 2,
                "data": null,
                "render": function(data, type, full, meta) {
                    return $.format.date(new Date(data.reserveDate), "dd/MM/yyyy") + ' ' + data.reservetime + " น."; // code ในการแปลงเวลา
                }
            },{
                "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="order/orderdetails/' +data.orderId+'"><button type="button" class="btn bg-orange"><i class="fa fa-plus-square-o" aria-hidden="true"></i> รายละเอียด</button></a> ';
                    }
            },
            {"className": "dt-head-center", "targets": [0, 1, 2, 3]}
            // {"className": "dt-center", "targets": [0, 1, 2, 3]}
        ]
    });

    $("#search").click(function() {
        event.preventDefault();
        table.ajax.reload();
    })
    
</script>