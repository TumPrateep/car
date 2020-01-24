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
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                html += '<a href="#"><button class="btn btn-info">รายละเอียด</button></a>';
                return html;
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3, 4]
        }
    ]
});

function confirmStatus(reserveId, orderId) {
    var option = {
        url: "/Reserve/changeStatus?reserveId=" + reserveId + "&orderId=" + orderId,
        label: "ยืนยันการทำรายการการจอง",
        status: 2,
        content: "คุณต้องการยืนยันการทำรายการการจองนี้ ใช่หรือไม่",
        gotoUrl: "garage/reserve"
    }
    fnConfirm(option);
}

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
</script>