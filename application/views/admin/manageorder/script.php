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
        "url": base_url + "api/Manageorder/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.brandName = $("#table-search").val()
            // data.status = $("#status").val()
        }
    },
    "order": [
        [2, "asc"]
    ],
    "columns": [
        null,
        null,
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
                    '<tr class="group"><td colspan="5"><a href="' + base_url +
                    'admin/orderdetail/show/' + data
                    .orderId +
                    '">หมายเลขสั่งซื้อ ' + data
                    .orderId + '</a> <strong> ศูนย์บริการ ' + data
                    .garageName +
                    '</strong> <span class="badge badge-info">วันที่สั่ง ' + data
                    .create_at + '</span></td></tr>'
                );

                last = data.orderId;
            }
        });
    },
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
        }, {
            "targets": 1,
            "data": null,
            "render": function(data, type, full, meta) {
                var imgPath = picturePath;
                var group = data.group;
                if (group == "tire") {
                    imgPath += "tireproduct/";
                } else if (group == "lubricator") {
                    imgPath += "lubricatorproduct/";
                } else {
                    imgPath += "spareproduct/";
                }
                return '<img src="' + imgPath + data.data.picture + '" width="100" />';
            }
        }, {
            "targets": 2,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = "";
                var productData = data.data;
                var group = data.group;
                if (group == "tire") {
                    html += "ยี่ห้อ " + productData.tire_brandName + " " + "ขนาด " + productData
                        .tire_size + " " + "รุ่น " + productData.tire_modelName;
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
            "targets": 4,
            "data": null,
            "render": function(data, type, full, meta) {
                return '<button type="button" class="btn btn-warning" ' + '  onClick="updateStatus(' +
                    data.orderId + ')">สั่งซื้อสินค้า</button> ';
            }
        },
        {
            "className": "dt-center",
            "targets": [0, 1, 2, 3, 4]
        }
    ]

});

function updateStatus(orderId) {
    var option = {
        url: "/Order/changeStatus?orderId=" + orderId,
        label: "ยืนยันสั่งซื้อสินค้า",
        content: "คุณต้องยืนยันสั่งซื้อสินค้าหมายเลข " + orderId + " ใช่หรือไม่",
        status: 4,
        gotoUrl: "admin/manageorder"
    }
    fnConfirm(option);
}
</script>

</body>

</html>