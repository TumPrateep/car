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
        "url": base_url + "apigarage/bill/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.date = $("#date").val(),
            //     data.reservename = $("#reservename").val(),
            //     data.status = $("#status").val()
        }
    },
    "order": [
        [1, "desc"]
    ],
    "columns": [{
            "data": "amount"
        },
        {
            "data": "transfer_time"
        },
        {
            "data": "transfer_name"
        },
        null
    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [4]
        },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                return currency(data, {
                    precision: 0
                }).format(); // code ในการแปลงเวลา
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
                var html = '';
                if (data.status == 2) {
                    html += 'รับเงินแล้ว';
                } else {
                    html += '<button class="btn btn-warning" onclick="confirmPayment(' + data.billId +
                        ')">ยืนยันรับเงิน</button>';
                }
                return html;
            }
        },
        {
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                html += '<a href="' + base_url + 'garage/bill/detail/' + data.billId +
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

// function confirmStatus(reserveId, orderId) {
//     var option = {
//         url: "/Reserve/changeStatus?reserveId=" + reserveId + "&orderId=" + orderId,
//         label: "ยืนยันการทำรายการการจอง",
//         status: 2,
//         content: "คุณต้องการยืนยันการทำรายการการจองนี้ ใช่หรือไม่",
//         gotoUrl: "garage/reserve"
//     }
//     fnConfirm(option);
// }

// function cancelStatus(reserveId, orderId) {
//     var option = {
//         url: "/Reserve/changeStatus?reserveId=" + reserveId + "&orderId=" + orderId,
//         label: "ยกเลิกการทำรายการการจอง",
//         status: 8,
//         content: "คุณต้องการยกเลิกการทำรายการการจองนี้ ใช่หรือไม่",
//         gotoUrl: "garage/reserve"
//     }
//     fnConfirm(option);
// }

$("#search").click(function() {
    event.preventDefault();
    table.ajax.reload();
})

function confirmPayment(billId) {
    var option = {
        url: "/bill/changeStatus?billId=" + billId,
        label: "ยันยันรับเงินใช่หรือไม่",
        status: 2,
        content: "คุณต้องการยืนยันรับเงิน ใช่หรือไม่",
        gotoUrl: "caraccessory/garage"
    }
    fnConfirm(option);
}
</script>