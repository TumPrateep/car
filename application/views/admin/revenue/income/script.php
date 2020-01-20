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
    "ajax": {
        "url": base_url + "api/revenue/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.brandName = $("#table-search").val()
            // data.status = $("#status").val()
        }
    },
    "order": [
        [0, "desc"]
    ],
    "columns": [{
        "data": "orderId"
    }, {
        "data": "price"
    }, {
        "data": "real_product_price"
    }, {
        "data": "charge_price"
    }, {
        "data": "garage_service_price"
    }, {
        "data": "delivery_price"
    }, {
        "data": "profit"
    }],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0]
        },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                return '#' + data;
            }
        },
        {
            "targets": 1,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<div class="badge badge-info">' + currency(data, {
                    precision: 0
                }).format() + '</div>';
            }
        },
        {
            "targets": 2,
            "data": null,
            "render": function(data, type, full, meta) {
                return currency(data, {
                        precision: 0
                    }).format() + '<br><small class="badge badge-warning">+' + currency(full
                        .profit_product_price, {
                            precision: 0
                        }).format() +
                    '</small>';
            }
        },
        {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<br><div class="badge badge-warning">+' + currency(data, {
                    precision: 0
                }).format() + '</div>';
            }
        },
        {
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<div>' + currency(data, {
                        precision: 0
                    }).format() + '</div><small class="badge badge-warning">+' + full
                    .profit_service_price + '</small>';
            }
        },
        {
            "targets": 6,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<strong><div class="badge badge-warning">' + currency(data, {
                    precision: 0
                }).format() + '</div></strong>';
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3, 4, 5, 6]
        }, {
            "className": "dt-head-center",
            "targets": []
        }
    ]

});
</script>

</body>

</html>