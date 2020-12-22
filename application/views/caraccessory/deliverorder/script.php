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
        "url": base_url + "apicaraccessories/deliverorder/searchorder",
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
                    '<tr class="group"><td colspan="6"> หมายเลขสั่งซื้อ ' + data.orderId +
                    ' ชื่อร้านอู่ ' + data.garageName +'</td></tr>'
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
        },
        {
            "targets": 3,
            "data": null,
            "render": function(data, type, full, meta) {
                return ' <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" onclick="tracking_order(' +
                    data.orderId + ','+ data.orderDetailId +',' + data.quantity +
                    ')"><span>จัดส่งสินค้า</span></button>';
            }
        },
        {
            "className": "dt-center",
            "targets": [1, 2]
        }

    ]
});

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

$("#price").slider({
    range: true,
    min: 0,
    max: 10000,
    value: [1000, 7000],
    formatter: function formatter(val) {
        // console.log(val);
        if (Array.isArray(val)) {
            var start = currency(val[0], {
                useVedic: true
            }).format();
            var end = currency(val[1], {
                useVedic: true
            }).format();
            $("#start").text(start);
            $("#end").text(end);
        }
    },
});

function tracking_order(orderId, orderDetailId,quantity) {
    $.get(base_url + "apicaraccessories/garages/getGarageData", {
            orderId: orderId
        },
        function(data, textStatus, jqXHR) {
            let html = 'ศูนย์บริการ ' + data.garageName + ' ' + data.hno + ' ตำบล' + data.subdistrictName +
                ' อำเภอ' + data
                .districtName +
                ' จังหวัด' + data.provinceName + ' ' + data.postCode;
            $("#garage-data").html(html);
        }
    );
    renderDOT(quantity);
    $("#orderId").val(orderId);
    $("#orderDetailId").val(orderDetailId);
    $("#tracking-order").modal("show");
}

function renderDOT(quantity) {
    var html = '';
    for (let i = 1; i <= quantity; i++) {
        html += '<div class="form-group row">' +
            '<label class="col-sm-4 col-form-label">ยางเส้นที่ ' + i + '</label>' +
            '<div class="col-sm-2">' +
            '<input type="number" name="dot[]" class="form-control" min="0" max="9" required>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '<input type="number" name="dot[]" class="form-control" min="0" max="9" required>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '<input type="number" name="dot[]" class="form-control" min="0" max="9" required>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '<input type="number" name="dot[]" class="form-control" min="0" max="9" required>' +
            '</div>' +
            '</div>';
    }

    $('#dot').html(html);
}

$("#submit").submit(function() {
    createteimg();
})

$.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'ไฟล์ขนาดใหญ่กว่า {0}');

$("#submit").validate({
    rules: {
        time: {
            required: true
        },
        tracking: {
            required: true,
            extension: "jpg|jpeg|png",
            filesize: 2000000
        },
        'dot[]': {
            required: true,
            min: 0,
            max: 9
        }
    },
    messages: {
        time: {
            required: "กรอกวันที่-เวลาส่ง"
        },
        tracking: {
            required: "เลือกไฟล์",
            extension: "ประเภทไฟล์ไม่ถูกต้อง",
            filesize: "ไฟล์ขนาดใหญ่เกินไป"
        },
        'dot[]': {
            required: 'กรอกหมายเลข 0-9',
            min: 'หมายเลขไม่น้อยกว่า 0',
            max: 'หมายเลขไม่เกิน 9'
        }
    },
});

function createteimg() {
    event.preventDefault();
    var isValid = $("#submit").valid();

    if (isValid) {
        // var imageData = $('.image-editor').cropit('export');
        // $('.hidden-image-data').val(imageData);
        var myform = document.getElementById("submit");
        var formData = new FormData(myform);
        $.ajax({
            url: base_url + "apicaraccessories/deliverorder/createtracking",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                if (data.message == 200) {
                    showMessage(data.message, "caraccessory/deliverorder");
                } else {
                    showMessage(data.message);
                }
                console.log(data);
            }
        });

    }

}

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

$(document).ready(function() {
    $("#time").datetimepicker({
        maxDate: new Date(),
        maxTime: new Date(),
        scrollInput: false
    });
});
</script>

</body>

</html>