<script>
function showSlip(image) {
    image = base_url + "public/image/payment/" + image;
    $("#slipImage").attr("src", image);
    $("#slipModal").modal('show');
}
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
    "ajax": {
        "url": base_url + "api/Payment/searchManagepartsshopPaymentApprove",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            data.orderId = $("#orderId").val()
            data.userId = $("#userId").val()
        }
    },
    "order": [
        [1, "desc"]
    ],
    "columns": [
        null,
        null,
        {
            "data": "summary"
        },
        null
    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 2]
        }, {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                return meta.row + 1;
            }
        }, {
            "targets": 1,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                html += '<a href="' + base_url + 'admin/orderdetail/show/' + data.orderId + '">#' + data
                    .orderId + '</a><br>';
                return html;
            }
        },
        // {
        //     "targets": 2,
        //     "data": null,
        //     "render": function(data, type, full, meta) {
        //         var costDelivery = parseInt(data.costDelivery);
        //         if (data.summary != null) {
        //             return currency(data.summary + costDelivery, {
        //                 precision: 0
        //             }).format() + ' บาท';
        //         } else {
        //             return '<small><i class="gray">รอจ่ายเงิน</i></small>';
        //         }

        //     }
        // },
        {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                if (data.payment_status == 2) {
                    html += '<span class="badge badge-warning">จ่ายแล้ว</span>';
                } else if (data.payment_status == 1) {
                    html += '<span class="badge badge-success">ยังไมจ่าย</span>';
                }
                return html;
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3]
        }
    ]

});

$("#OK").click(function() {
    event.preventDefault();
    table.ajax.reload();
})

function confirmStatus(paymentId, orderId) {
    var option = {
        url: "/Paymentapprove/changeStatus?paymentId=" + paymentId + "&orderId=" + orderId,
        label: "ยืนยันรายการชำระเงิน",
        status: 2,
        content: "คุณต้องการยืนยันรายการชำระเงินนี้ ใช่หรือไม่",
        gotoUrl: "admin/paymentapprove"
    }
    fnConfirm(option);
}

function cancelStatus(paymentId, orderId) {
    var option = {
        url: "/Paymentapprove/changeStatus?paymentId=" + paymentId + "&orderId=" + orderId,
        label: "ยกเลิกรายการชำระเงิน",
        status: 8,
        content: "คุณต้องการยกเลิกรายการชำระเงินนี้ ใช่หรือไม่",
        gotoUrl: "admin/paymentapprove"
    }
    fnConfirm(option);
}
</script>

</body>

</html>