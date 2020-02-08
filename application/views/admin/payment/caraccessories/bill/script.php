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
    "ajax": {
        "url": base_url + "api/bill/search_caraccessories",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            data.caraccessoriesId = $("#userId").val()
        }
    },
    "order": [
        [1, "desc"]
    ],
    "columns": [
        null,
        {
            "data": "transfer_time"
        },
        {
            "data": "transfer_name"
        },
        {
            "data": "amount"
        },
        null
    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0]
        },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                return meta.row + 1;
            }
        },
        {
            "targets": 1,
            "data": null,
            "render": function(data, type, full, meta) {
                return $.format.date(new Date(data), "dd/MM/yyyy H:mm") + " น."; // code ในการแปลงเวลา
            }
        },
        {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                return currency(data, {
                    precision: 0
                }).format()
            }
        },
        {
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '<i>ได้รับเงินแล้ว</i>';
                if (data.status == 1) {
                    html = '<i>จ่ายเงินแล้ว</i>';
                }
                return html;
            }
        },
        {
            "targets": 5,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                html += '<a href="' + base_url + 'admin/payment/caraccessories_bill_detail/' + $(
                        '#userId').val() + '/' + data
                    .billId +
                    '"><button class="btn btn-info">รายละเอียด</button></a>';
                return html;
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3, 4]
        }
    ]
});
</script>

</body>

</html>