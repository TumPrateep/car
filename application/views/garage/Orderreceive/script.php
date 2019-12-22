<script>
var lastOrder = 0;
var lastCounter = 0;
var table = $('#do-table').DataTable({
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
        // "url": base_url+"apiCaraccessories/Deliverorder/searchorder",
        "url": base_url + "apigarage/Orderdetail/searchorder",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            // data.lubricator_typeName = $("#table-search").val(),
            // data.status = $("#status").val()
        }
    },
    // "order": [],
    "columns": [
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
                    '<tr class="group"><td colspan="6"><span class="order-left"><strong><a href="' +
                    base_url + 'garage/reservedetail/reservedetail/' + data
                    .orderId +
                    '" class="text-orange">หมายเลขสั่งซื้อ #' + data.orderId +
                    '</a></strong> ' +
                    '</span> <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" onclick="tracking_order(' +
                    data.orderId + ')"><span>หลักฐานการส่ง</span></button></td></tr>'
                );

                last = data.orderId;
            }
        });
    },
    "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": [0, 1, 2, 3]
        },
        //  {
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
            "targets": 0,
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
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                var html = '';
                // html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.status+'">#'+data.status+'</a><br>';
                if (data.status == 2) {
                    html += '<button type="button" class="btn btn-info"  onclick="confirmStatus(' +
                        data.orderDetailId + ')">รับสินค้า</button>';
                } else if (data.status == 3) {
                    html += '<span class="badge badge-success">รับสินค้าแล้ว</span>';
                } else if (data.status == 9) {
                    html += '<span class="badge badge-danger">คืนสินค้า</span>';
                } else {
                    html += '<span class="badge badge-danger">ผิดพลาด</span>';
                }
                return html;

            }
        },
        {
            "className": "dt-head-center",
            "targets": [0]
        },
        {
            "className": "dt-center",
            "targets": [1, 2, 3]
        },
        {
            "width": "10%",
            "targets": 0
        },
        {
            "width": "10%",
            "targets": 1
        },
        {
            "width": "10%",
            "targets": 2
        },
        {
            "width": "10%",
            "targets": 3
        }

    ]
});

// $("#form-search").submit(function(){
//     event.preventDefault();
//     table.ajax.reload();
// })

//  function updateStatus(lubricator_typeId,status){
//     $.post(base_url+"api/LubricatorType/changeStatus",{
//         "lubricator_typeId": lubricator_typeId,
//         "status": status
//     },function(data){
//         if(data.message == 200){
//             showMessage(data.message,"admin/LubricatorType");
//         }else{
//             showMessage(data.message);
//         }
//     });
// }

function confirmStatus(orderDetailId) {
    var option = {
        url: "/Orderdetail/changeStatus?orderDetailId=" + orderDetailId,
        label: "ยืนยันการรับสินค้า",
        status: 3,
        content: "คุณต้องการยืนยันการรับสินค้า ใช่หรือไม่",
        gotoUrl: "garage/orderreceive/show"
    }
    fnConfirm(option);
}

function returnStatus(orderDetailId) {
    var option = {
        url: "/Orderdetail/changeStatus?orderDetailId=" + orderDetailId,
        label: "ยืนยันการคืนสินค้า",
        status: 9,
        content: "คุณต้องการยืนยันการคืนสินค้า ใช่หรือไม่",
        gotoUrl: "garage/orderreceive/show"
    }
    fnConfirm(option);
}

$("#btn-search").click(function() {
    event.preventDefault();
    table.ajax.reload();
})
$("#show-search").click(function() {
    $(this).hide(100);
    $("#search-form").slideDown();
});

$("#search-hide").click(function() {
    $("#search-form").slideUp();
    $("#show-search").show(100);
});

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

//     $("#price").slider({
//     range: true,
//     min: 0,
//     max: 10000,
//     value: [1000, 7000],
//     formatter: function formatter(val) {
//         // console.log(val);
//         if (Array.isArray(val)) {
//             var start = currency(val[0], { useVedic: true }).format();
//             var end = currency(val[1], { useVedic: true }).format();
//             $("#start").text(start);
//             $("#end").text(end);
//         }
//     },
// });


// function tracking_order(orderId) {

//     $("#orderId").val(orderId);
//     $("#tracking-order").modal("show");

//     var orderId = $("#orderId").val();

//     $.post(base_url + "apigarage/Orderdetail/getuserdata", {
//         "orderId": orderId
//     }, function(data) {
//         if (data.message != 200) {
//             showMessage(data.message, "garage/orderreceive");
//         }
//         if (data.message == 200) {
//             result = data.data;
//             // $("#name").val(result.titleName+" "+result.firstname+" "+result.lastname);
//             $("#name").html(": " + result.titleName + " " + result.firstname + " " + result.lastname);
//             $("#car_plate").html(": " + result.character_plate + " " + result.number_plate + " " + result
//                 .provinceforcarName);
//             $("#brandName").html(": " + result.brandName);
//             $("#modelName").html(": " + result.modelName);
//             $("#yearCar").html(": ปี " + result.yearStart + " - " + result.yearEnd);
//             $("#modelofcarName").html(": " + result.modelofcarName);

//         }

//     });
// }
</script>

</body>

</html>