<!-- <link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css")?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css")?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js")?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js")?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script> -->
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script>
$(document).ready(function() {
    $('.icon').click(function() {
        let path = base_url + 'public/image/icon/';
        $('.icon').removeClass('icon-active');
        $(this).addClass('icon-active');
        let selected = $(this).data('icon');
        let arrIconPath = [
            // '',
            (path + ((selected == 1) ? 'wallet_active.png' : 'wallet.png')),
            (path + ((selected == 2) ? 'deliver_active.png' : 'deliver.png')),
            (path + ((selected == 3) ? 'service_active.png' : 'service.png')),
            (path + ((selected == 4) ? 'rating_active.png' : 'rating.png'))
        ];

        $(".icon").each(function(index) {
            $(this).find("img").attr('src', arrIconPath[index]);
        });

        selectStatus(selected);
    })
});
var table = $('#order-table').DataTable({
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
        "url": base_url + "service/order/search",
        "dataType": "json",
        "type": "POST",
        "data": function(data) {
            data.selected = $("#selected").val()
            // data.statusSuccess = $("#statusSuccess").val()
        }
    },
    // "order": [[ 1, "desc" ]],
    "columns": [
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

                var html = '<div class="row">';
                $.each(data, function(i, v) {
                    // order status
                    var orderstatus = "<span>";
                    if (v.status == "1") {
                        orderstatus += 'รอชำระเงิน';
                    } else if (v.status == "2") {
                        orderstatus += 'กำลังตรวจสอบการชำระเงิน';
                    } else if (v.status == "3") {
                        orderstatus += 'ชำระเงินเเล้ว';
                    } else if (v.status == "4") {
                        orderstatus += 'อะไหล่กำลังถูกจัดส่ง';
                    } else if (v.status == "5" && v.deliver == 1) {
                        orderstatus += 'อะไหล่กำลังถูกจัดส่ง';
                    } else if (v.status == "5" && v.deliver == 2) {
                        orderstatus += 'อะไหล่ถูกจัดส่งแล้ว';
                    } else if (v.status == "9") {
                        orderstatus += 'ยกเลิกการจอง';
                    } else if (v.status == "8") {
                        orderstatus += 'การชำระเงินไม่ถูกต้อง';
                    } else {
                        orderstatus += 'เสร็จสิ้น';
                    }
                    if (v.statusActive == "2") {
                        orderstatus = "<span>";
                        // orderstatus += 'เข้าใช้บริการ';
                        orderstatus += 'ให้คะเเนนและรีวิว';
                    } else if (v.statusActive == "3") {
                        orderstatus = "<span>";
                        orderstatus += 'การดำเนินการเสร็จสิ้น';
                    }
                    orderstatus += "</span>";

                    var success_status = "";
                    if (v.status == "1") {
                        success_status += '<a href="' + base_url + "user/order/payment/" + v
                            .orderId +
                            '"><button type="button" class="btn bg-orange">ชำระเงิน</button>'
                    } else if (v.status == "3" || v.status == "4" || v.status == "5") {
                        success_status += ''
                    } else if (v.status == "8") {
                        success_status += '<a href="' + base_url + "user/order/payment/" + v
                            .orderId +
                            '"><button type="button" class="btn bg-orange">ชำระเงิน</button>'
                    }
                    if (v.statusActive == "2") {
                        success_status =
                            '<button type="button" title="กดเพื่อให้คะเเนนการให้บริการ" onclick="commetrating(' +
                            v.orderId +
                            ')" class="btn bg-orange">ให้คะแนน</button> '
                    }

                    let orderDetail = v.orderDetail[0];
                    let reserve = v.reserve;

                    html += '<div class="col-lg-6 p-lt-0">' +
                        '<div class="order-card">' +
                        '<div class="row">' +
                        '<div class="col-6">' +
                        '<small>หมายเลขการสั่งซื้อ #' + v.orderId + '</small>' +
                        '</div>' +
                        '<div class="col-6 text-right">' +
                        ' <small class="text-orange">' + orderstatus + '</small>' +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<div class="row">';
                    if(orderDetail.group == 'tire'){
                        html += '<div class="col-3">' +
                        '<img src="' + base_url + 'public/image/tireproduct/' + orderDetail
                        .picture + '" width="100%">' +
                        '</div>' +
                        '<div class="col-9 text-right">'+
                        '<p><strong>' + orderDetail.tire_brandName + ' ' + orderDetail
                        .tire_modelName + ' ' + orderDetail.tire_size + '</strong></p>';
                    }else if(orderDetail.group == 'lubricator'){
                        html += '<div class="col-3">' +
                        '<img src="' + base_url + 'public/image/lubricatorproduct/' + orderDetail
                        .picture + '" width="100%">' +
                        '</div>' +
                        '<div class="col-9 text-right">'+
                        '<p><strong>' + orderDetail.lubricator + ' ' + orderDetail
                        .lubricator_number + ' ' + orderDetail.lubricator_typeName + '</strong></p>';
                    }
                        
                    html +='<p><small>1 ชิ้น ' + currency(orderDetail.price_per_unit, {
                            precision: 0
                        }).format() + ' บาท</small></p>' +
                        '<p>นัดหมายวันที่ <strong>' + $.format.date(reserve.reserveDate + ' ' +
                            reserve.reservetime, "dd/MM/yyyy HH:mm น.") + '</strong></p>' +
                        '<p><a href="' + base_url + "user/order/orderdetails/" + v
                        .orderId + '" class="text-orange">';
                        if(v.orderDetail.length > 1){
                            html += '<span class="badge badge-danger bg-orange">มีสินค้า +'+(v.orderDetail.length-1)+' รายการ</span> ';
                        }
                    html += 'รายละเอียด</a></p>' +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<div class="row">' +
                        '<div class="col-4">' + success_status + '</div>' +
                        '<div class="col-8 text-right">' +
                        'รวมการสั่งซื้อ: ' + orderDetail.quantity +
                        ' ชิ้น <strong class="h5 text-orange">' + currency(v
                            .cost, {
                                precision: 0
                            }).format() + " บาท" + '</strong>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                });
                html += '</div>';
                return html;

                // // process
                // var success_status = "";
                // if (data.status == "1") {
                //     success_status += '<a href="' + base_url + "user/order/payment/" + data.orderId +
                //         '"><button type="button" class="btn btn-main-md bg-orange">ชำระเงิน</button>'
                // } else if (data.status == "3" || data.status == "4" || data.status == "5") {
                //     success_status +=
                //         'รอเข้ารับบริการ'
                // } else if (data.status == "8") {
                //     success_status += '<a href="' + base_url + "user/order/payment/" + data
                //         .orderId +
                //         '"><button type="button" class="btn btn-main-md bg-orange">ชำระเงิน</button>'
                //     //  else if (data.statusActive == 3) {
                //     //     success_status +=
                //     //         '<a href="' + base_url + "user/garageagain/" +
                //     //         '"><button type="button" class="btn btn-main-md bg-orange">ศูนย์บริการ</button> '
                //     // }
                // }
                // if (data.statusActive == "2") {
                //     success_status =
                //         '<button type="button" title="กดเพื่อให้คะเเนนการให้บริการ" onclick="commetrating(' +
                //         data.orderId +
                //         ')" class="btn btn-main-md bg-orange">ให้คะแนน</button> '
                // }

                // ////
                // html = '<div class="row border-bottom  pb-2 pt-2">' +
                //     '<div class="col-md-2 text-center detail">' +
                //     '#' + data.orderId +
                //     '</div>' +
                //     '<div class="col-md-2 text-center detail">' +
                //     jQuery.format.date(data.create_at, "dd/MM/yyyy <br> HH:mm:ss") +
                //     '</div>' +
                //     '<div class="col-md-2 text-center detail">' +
                //     currency(data.cost, {
                //         precision: 0
                //     }).format() + " บาท" +
                //     '</div>' +
                //     '<div class="col-md-2 text-center detail">' +
                //     orderstatus +
                //     '</div>' +
                //     '<div class="col-md-2 text-center detail">' +
                //     '<a href="' + base_url + "user/order/orderdetails/" + data.orderId +
                //     '" class="btn btn-transparent-md"><i class="fa fa-search"></i></a>' +
                //     '</div>' +
                //     '<div class="col-md-2 text-center detail">' +
                //     success_status
                //     // + '<a href="#" class="btn btn-main-sm bg-orange btn-block">ชำระเงิน</a>'
                //     +
                //     '</div>' +
                //     '</div>';
                // return html;
            }
        },
        // {
        //     "targets": 3,
        //     "data": null,
        //     "render": function ( data, type, full, meta ) {
        //         if(data.depositflag == "1"){
        //             var costDelivery = parseInt(data.costDelivery);
        //             var summaryandcost = data.summary+costDelivery;
        //             return currency(summaryandcost-data.deposit, {  precision: 0 }).format() + " บาท";
        //         }else{
        //             return "-";
        //         }
        //     }
        // },
        // {
        //     "targets": 4,
        //     "data": null,
        //     "render": function ( data, type, full, meta ) {
        //         html = "";
        //         return html += '<a href="'+base_url+"public/Orderdetail/Orderdetails/"+data.orderId+'"><button type="button" class="btn btn-warning" title="ดูรายละเอียดเพิ่มเติม"><i class="fa fa-search" "></i></button> '
        //     }
        // },

        // { "orderable": false, "targets": 0 },
        // {"className": "dt-head-center", "targets": []},
        // {"className": "dt-center", "targets": [0,1,2,3,4,5]},
        // { "width": "12%", "targets": 0 },
        // { "width": "20%", "targets": 1 },
        // { "width": "20%", "targets": 2 },
        // { "width": "20%", "targets": 3 }
    ]

});

function selectStatus(select) {
    $('#selected').val(select);
    table.ajax.reload();
}

function commetrating(orderId) {
    var userId = localStorage.getItem("userId");
    var hasCaraccessory = null;
    if (userId != null) {
        $("#orderId").val(orderId);
        $("#comment-rating").modal("show");
    } else {
        alert("login!!!");
    }
}

// jQuery for rating
jQuery(document).ready(function($) {

    $(".btnrating").on('click', (function(e) {

        var previous_value = $("#selected_rating").val();

        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);

        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);
        $(".btnrating i").removeClass("text-orange");
        $(".btnrating i").removeClass("text-default");
        for (i = 1; i <= selected_value; ++i) {
            $("#rating-star-" + i + ' i').addClass('text-orange');
            // $("#rating-star-" + i + ' i').toggleClass('btn-default');
        }

        // for (ix = selected_value; ix <= 5; ++ix) {
        //     // $("#rating-star-" + ix + ' i').toggleClass('btn-warning');
        //     $("#rating-star-" + ix + ' i').addClass('text-default');
        // }

    }));

});

$("#form-search").submit(function() {
    event.preventDefault();
    table.ajax.reload();
})

$("#submit").submit(function() {
    createcomment();
})

function createcomment() {
    event.preventDefault();
    var isValid = $("#submit").valid();
    if (isValid) {
        var data = $("#submit").serialize();
        $.post(base_url + "service/commentuser/createCommentuser", data,
            function(data) {
                if (data.message == 200) {
                    showMessage(data.message, "user/order");
                } else {
                    showMessage(data.message, );
                }
            });
    }
}
</script>