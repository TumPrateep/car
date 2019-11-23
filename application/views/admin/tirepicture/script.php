<script>
var table = $('#dt-table').DataTable({
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
        "url": base_url + "api/Tirepicture/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.brandName = $("#table-search").val()
            data.status = $("#status").val()
        }
    },
    "order": [
        [2, "asc"]
    ],
    "columns": [

        null,
        null,
        {
            "data": "tire_brandName"
        },
        {
            "data": "tire_modelName"
        },
        null,
        null
    ],
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 5]
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
                return '<img src="' + picturePath + 'tireproduct/' + data.picture + '" width="100" />';
            }
        }, {
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                var switchVal = "true";
                var active = " active";
                if (data.status == null) {
                    return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                } else if (data.status != "1") {
                    switchVal = "false";
                    active = "";
                }
                return '<div>' +
                    '<button type="button" class="btn btn-sm btn-toggle ' + active +
                    '" data-toggle="button" aria-pressed="' + switchVal +
                    '" autocomplete="Off" onclick="updateStatus(' + data.productId + ',' + data.status +
                    ')">' +
                    '<div class="handle"></div>' +
                    '</button>' +
                    '</div>';
            }
        }, {
            "targets": 5,
            "data": null,
            "render": function(data, type, full, meta) {
                var disable = "";
                if (data.status == null) {
                    disable = "disabled";
                }
                return '<a href="' + base_url + "admin/tirepicture/update/" + data.productId +
                    '"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> ' +
                    '<button type="button" class="delete btn btn-danger" onclick="deleteTire(' + data
                    .productId + ')"><i class="fa fa-trash"></i></button>';
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3, 4, 5]
        }
    ]

});

function updateStatus(productId, status) {
    $.post(base_url + "api/Tirepicture/changeStatus", {
        "productId": productId,
        "status": status
    }, function(data) {
        if (data.message == 200) {
            showMessage(data.message, "admin/tirepicture");
        } else {
            showMessage(data.message);
        }
    });
}

function deleteTire(id) {
    var option = {
        url: "/Tirepicture/delete?productId=" + id,
        label: "ลบราคาเปลี่ยนอะไหล่ช่วงล่าง",
        content: "คุณต้องการลบข้อมูลใช่หรือไม่",
        gotoUrl: "admin/tirepicture"
    }
    fnDelete(option);
}
</script>

</body>

</html>