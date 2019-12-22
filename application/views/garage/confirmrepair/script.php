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
        "url": base_url + "apigarage/confirmrepair/searchAccessstatus",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            data.date = $("#date").val(),
                data.reservename = $("#reservename").val(),
                data.status = $("#status").val(),
                data.statusSuccess = $("#statusSuccess").val()
        }
    },
    "order": [
        [0, "desc"]
    ],
    "columns": [
        null,
        // { "data": "orderId" },
        null,
        {
            "data": "name"
        },
        null

    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [3]
        },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                html += '<strong><a href="' + base_url + 'garage/reservedetail/reservedetail/' + data
                    .orderId +
                    '" class="text-orange">#' + data.orderId + '</a></strong><br>';

                return html;
            }
        }, {
            "targets": 1,
            "data": null,
            "render": function(data, type, full, meta) {
                return $.format.date(new Date(data.reserveDate), "dd/MM/yyyy") + ' ' + data
                    .reservetime +
                    " น."; // code ในการแปลงเวลา
            }
        }, {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.status+'">#'+data.status+'</a><br>';
                if (data.status == 5 && data.statusSuccess == 1) {
                    html += '<button type="button" class="btn btn-info"  title="" ' +
                        ' onclick="update_mileage(' + data.orderId + ')">ซ่อมเสร็จสิ้น</button>';
                } else if (data.status == 6 && (data.statusSuccess == 2 || data.statusSuccess == 3)) {
                    html += '<span class="badge badge-success">ซ่อมเสร็จสิ้น</span>';
                }
                return html;
                // return data.status;
            }
        },
        // {
        //     "targets": 3,
        //     "data": null,
        //     "render": function(data, type, full, meta) {
        //         var html = "";
        //         if (data.statusSuccess == 1) {
        //             html = '<button type="button" class="btn btn-success"  title="" ' +
        //                 ' onclick="update_mileage(' + data.orderId + ')">ซ่อมเสร็จสิ้น</button>';
        //         }
        //         return html;
        //         // return '<button type="button" class="btn btn-success"  title="ซ่อมเสร็จสิ้น" '+disable+' onclick="confirmStatus('+data.orderId+')">ซ่อมเสร็จสิ้น</button>';
        //     }
        // },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3]
        }
    ]
});

// function confirmStatus(orderId){
//     var option = {
//         url: "/Accessstatus/changeStatus?orderId="+orderId,
//         label: "ยืนยันการทำรายการการจอง",
//         status: 2,
//         content: "คุณต้องการยืนยันการทำรายการการจองนี้ ใช่หรือไม่",
//         gotoUrl: "garage/acessstatus"
//     }
//     fnConfirm(option);
// }



$("#search").click(function() {
    event.preventDefault();
    table.ajax.reload();
})

function update_mileage(orderId) {

    $("#orderId").val(orderId);
    $("#update-mileage").modal("show");
}

$("#submit").submit(function() {
    updatemileage();
})

function updatemileage() {
    event.preventDefault();
    var isValid = $("#submit").valid();

    if (isValid) {
        var data = $("#submit").serialize();

        $.post(base_url + "apigarage/confirmrepair/update", data,
            function(data) {
                if (data.message == 200) {
                    showMessage(data.message, "garage/confirmrepair");
                } else {
                    showMessage(data.message);
                }
            }
        );
    }
}
</script>