<script>
var lastOrder = null;
var lastCounter = 0;
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
    "bLengthChange": false,
    "searching": false,
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": base_url + "apicaraccessories/Deliverorder/searchshoworder",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.lubricator_typeName = $("#table-search").val(),
            // data.status = $("#status").val()
        }
    },
    "order": [
        [2, "dsc"]
    ],
    "columns": [
        null,
        {
            "data": "quantity"
        },
        null,
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
                    '<tr class="group"><td colspan="3"> หมายเลขสั่งซื้อ ' + data.orderId +
                    ' ชื่อร้านอู่ ' + data.garageName + ' ' +
                    '</td><td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" onclick="tracking_order(' +
                    data.orderId + ')"><span>หลักฐานการส่ง</span></button></td></tr>'
                );

                last = data.orderId;
            }
        });
    },
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 1, 2]
        },
        // {
        //     "targets": 0,
        //     "data": null,
        //     "render": function(data, type, full, meta) {
        //         if (data.orderId == lastOrder) {
        //             lastCounter++;
        //         } else {
        //             lastOrder = data.orderId;
        //             lastCounter = 1;
        //         }
        //         return lastCounter;
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
                return currency((data.product_price * data.quantity), {
                    precision: 0
                }).format();
            }
        }, {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                let htmlStatus = '';
                if (data.status == '2') {
                    htmlStatus = '<span class="badge badge-info">จัดส่งสินค้าแล้ว</span>';
                } else if (data.status == '3') {
                    htmlStatus = '<span class="badge badge-info">ได้รับสินค้าแล้ว</span>';
                }
                return htmlStatus;
            }
        },
        {
            "className": "dt-center",
            "targets": [1, 2]
        },
        {
            "className": "dt-head-center",
            "targets": [3]
        }

    ]
});

// $("#btn-search").click(function() {
//     event.preventDefault();
//     table.ajax.reload();
// })
// $("#show-search").click(function() {
//     $(this).hide(100);
//     $("#search-form").slideDown();
// });

// $("#search-hide").click(function() {
//     $("#search-form").slideUp();
//     $("#show-search").show(100);
// });


function tracking_order(orderId) {
    $("#orderId").val(orderId);
    getNumberTrackingData(orderId);
}

function getNumberTrackingData(orderId) {
    $.get(base_url + "apicaraccessories/numbertracking/getNumbertracking", {
            orderId: orderId
        },
        function(data, textStatus, jqXHR) {
            console.log(data);
            let tracking = data.data;
            $("#time").val(tracking.time);
            $('#file_url').attr('src', base_url + 'public/image/deliverorder/' + tracking.file_url);
            $("#tracking-order").modal("show");
        }
    );
}

// $("#submit").submit(function() {
//     createteimg();
// })

// function createteimg() {
//     event.preventDefault();
//     var isValid = $("#submit").valid();

//     if (isValid) {
//         // var imageData = $('.image-editor').cropit('export');
//         // $('.hidden-image-data').val(imageData);
//         var myform = document.getElementById("submit");
//         var formData = new FormData(myform);
//         $.ajax({
//             url: base_url + "apicaraccessories/deliverorder/createtracking",
//             data: formData,
//             processData: false,
//             contentType: false,
//             type: 'POST',
//             success: function(data) {
//                 if (data.message == 200) {
//                     showMessage(data.message, "caraccessory/deliverorder");
//                 } else {
//                     showMessage(data.message);
//                 }
//                 console.log(data);
//             }
//         });

//     }

// }

// $('.image-editor').cropit({
//     allowDragNDrop: false,
//     width: 200,
//     height: 200,
//     type: 'image/jpeg'
// });

// table.on('order.dt search.dt', function() {
//     lastOrder = null;
//     lastCounter = 0;
// });

// $(document).ready(function() {
//     $("#time").datetimepicker({
//         maxDate: new Date(),
//         maxTime: new Date(),
//         scrollInput: false
//     });
// });
</script>

</body>

</html>