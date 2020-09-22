<script>
$(document).ready(function() {
    var tire_modelId = $('#tire_modelId');
    var tire_sizeId = $('#tire_sizeId');
    var latitude = null;
    var longitude = null;
    var table;
    var width = screen.width;

    init();

    function init() {
        getLocation();
        // loadDataTable();
    }

    function loadDataTable(latitude, longitude) {

        table = $('#garage-table').DataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "sProcessing": "กำลังดำเนินการ...",
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบข้อมูล",
                "infoFiltered": "",
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
            "orderable": false,
            "pageLength": 8,
            "ajax": {
                "url": base_url + "service/Selectgarage/search",
                "dataType": "json",
                "type": "POST",
                "data": function(data) {
                    data.tire_dataId = $("#tire_dataId").val();
                    data.tire_modelId = $("#tire_modelId").val();
                    // data.rimId = $("#rimId").val();
                    data.tire_sizeId = $("#tire_sizeId").val();
                    data.latitude = latitude;
                    data.longitude = longitude;
                    // data.sort = $("#sort").val();
                    // data.warranty_distance = $("#warranty_distance").val();
                    // data.warranty_year = $("#warranty_year").val();
                    // data.brandId = $("#brandId").val();
                    // data.modelId = $("#modelId").val();
                    // data.modelofcarId = $("#modelofcarId").val();
                    // data.year = $("#year").val();
                }
            },
            "columns": [
                null
            ],
            "columnDefs": [{
                "targets": 0,
                "data": null,
                "render": function(data, type, full, meta) {

                    var html = '';
                    // $.each(data, function (i, v) {
                    var tire_dataId = $("#tire_dataId").val();
                    html += '<div class="row row-border">' +
                        '<div class="pic col-md-2 text-center">' +
                        '<img src="' + base_url + 'public/image/garage/' + data.picture +
                        '">' +
                        '</div>' +
                        '<div class="col-md-3 address">';

                    if (width >= 768) {
                        html += '<p><strong>' + data.garageName + '</strong></p>';
                    } else {
                        html += '<br><h5 class="text-center">' + data.garageName + '</h5>';
                    }

                    html += '<p>ต.' + data.subdistrictName + ' ' +
                        'อ.' + data.districtName + ' ' +
                        'จ.' + data.provinceName + '</p>' +
                        '<p class="option"><small class="text-orange">'+
                            render_service_option(data) +
                            '</small></p>'+
                        '</div>';

                    if (width >= 768) {
                        html += '<div class="detail col-md-2">' +
                            '<p class="text-center">' + distance(data.latitude, data
                                .longitude,
                                latitude, longitude, "กม.") + '</p>' +
                            '</div>';
                    } else {
                        html += '<div class="detail col-md-2 pt-10">' +
                            '<h5 class="text-center">' + distance(data.latitude, data
                                .longitude,
                                latitude, longitude, "กม.") + '</p>' +
                            '</h5>';
                    }

                    if (width >= 768) {
                        html += '<div class="col-md-2 address">' +
                            '<p><strong>' + data.tireData.tire_brandName + '</strong></p>' +
                            '<p>' + data.tireData.tire_modelName + '</p>' +
                            '<p>' + data.tireData.tire_size + '</p>' +
                            '</div>';
                    } else {
                        $('#txt-mobile-display').html(
                            '<strong>' + data.tireData.tire_brandName + '</strong> ' +
                            data.tireData.tire_modelName + ' ' + data.tireData.tire_size
                            );
                    }

                    html += '<div class="detail col-md-3">' +
                        '<div class="row">' +
                        '<div class="col-5 mbt-5">' +
                        '<small>จำนวน</small> <input type="number" class="form-control number-' +
                        data.garageId + '" value="4" onchange="changeNumber(' + data
                        .garageId + ',' + (Number(data.tire_price) + Number(data.tireData
                            .price)) + ')" min="1">' +
                        '</div>' +
                        '<div class="col-7">' +
                        '<small>ราคา</small><h5><span class="alternate amount-' + data
                        .garageId + '">' + currency((Number(data.tire_price) + Number(data
                            .tireData.price)) * 4, {
                            precision: 0
                        }).format() + ' บาท</span></h5>' +
                        '</div>' +
                        '</div>' +
                        '<span class="mb-10"></span>' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        '<button onclick="setCart(\'tire\',' + tire_dataId +',\'.number-'+ data
                        .garageId +'\',' + data.garageId +')" '+
                        'class="btn btn-main-md width-100p bg-orange btn-lg"><i class="fa fa-shopping-bag" aria-hidden="true"></i> สั่งซื้อสินค้า </button>' +
                        // '<button onclick="gotolink(' + tire_dataId + ',' + data.garageId +
                        // ')" class="btn btn-main-md width-100p bg-orange btn-lg"><i class="fa fa-shopping-bag" aria-hidden="true"></i> สั่งซื้อสินค้า </button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<br>' +
                        '</div>';
                    // });
                    return html;
                }
            }]
        });
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
                $("#sort").append('<option value="3">ระยะทางน้อย-มาก</option>');
                loadDataTable(latitude, longitude);
            }, function(error) {
                latitude = null;
                longitude = null;
                loadDataTable();
                alert('ไม่สามารถดึงตำแหน่งปัจจุบันได้');
            }, {
                timeout: 5000
            });
        } else {
            alert("ไม่สามารถดึงตำแหน่งปัจจุบันได้");
            loadDataTable();
        }
    }

});

function changeNumber(garageId, price) {
    var numberId = $('.number-' + garageId);
    var amountId = $('.amount-' + garageId);

    var number = numberId.val();
    amountId.html(currency(number * price, {
        precision: 0
    }).format() + ' บาท')
}

function gotolink(tire_dataId, garageId) {
    var number = $('.number-' + garageId).val();
    window.location.href = base_url + 'checkout/' + tire_dataId + '/' + garageId + '/' + number;
}
</script>