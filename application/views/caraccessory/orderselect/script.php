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
        "url": base_url + "apicaraccessories/orderselect/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.brandName = $("#table-search").val()
            // data.status = $("#status").val()
        }
    },
    "order": [
        [0, "asc"]
    ],
    "columns": [
        null,
        {
            "data": "quantity"
        },
        null
    ],
    "drawCallback": function(settings) {
        var api = this.api();
        var rows = api.rows({
            page: 'current'
        }).nodes();
        var last = null;

        api.rows({
            page: 'current'
        }).data().each(function(data, i) {
            if (last !== data.orderId) {
                $(rows).eq(i).before(
                    '<tr class="group"><td colspan="5"> หมายเลขสั่งซื้อ ' + data.orderId +
                    ' ศูนย์บริการ ' + data.garageName + '</td></tr>'
                );

                last = data.orderId;
            }
        });
    },
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [1, 2]
        },
        // {
        //     "targets": 0,
        //     "data": null,
        //     "render": function(data, type, full, meta) {
        //         return meta.row + 1;
        //     }
        // }, {
        //     "targets": 1,
        //     "data": null,
        //     "render": function(data, type, full, meta) {
        //         var imgPath = picturePath;
        //         var group = data.group;
        //         if (group == "tire") {
        //             imgPath += "tireproduct/";
        //         } else if (group == "lubricator") {
        //             imgPath += "lubricatorproduct/";
        //         } else {
        //             imgPath += "spareproduct/";
        //         }
        //         return '<img src="' + imgPath + data.data.picture + '" width="100" />';
        //     }
        // },
        {
            "targets": 0,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = "";
                var productData = data.data;
                var group = data.group;
                if (group == "tire") {
                    html += productData.tire_brandName + " " + productData.tire_modelName +
                        " <strong>" +
                        productData
                        .tire_size + "</strong>";
                } else if (group == "lubricator") {
                    html += productData.lubricator_brandName + " " + productData.lubricatorName + " " +
                        productData.capacity + " ลิตร" + " " + productData.lubricator_number;
                } else {
                    html += productData.spares_undercarriageName + " " + productData.spares_brandName +
                        " " + productData.brandName + " " + productData.modelName + " " + productData
                        .year;
                }
                return html;
            }
        }, {
            "targets": 2,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<button type="button" class="btn btn-success" ' + '  onclick="updateStatus(' +
                    data.orderId + ',' + data.status + ')">ยืนยันการสั่งซื้อ</button> ';
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2]
        }
    ]

});

function updateStatus(orderId, status) {
    $.post(base_url + "apicaraccessories/orderselect/changeStatus", {
        "orderId": orderId,
        "status": status
    }, function(data) {
        if (data.message == 200) {
            showMessage(data.message, "caraccessory/orderselect");
        } else {
            showMessage(data.message);
        }
    });
}
</script>

</body>

</html>