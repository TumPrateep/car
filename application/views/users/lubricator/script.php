<script>
$(document).ready(function() {

    var lubricator_gear = $("#lubricator_gear");
    var lubricator_number = $("#lubricator_number");
    var lubricator_brand = $("#lubricator_brand");

    var table;
    focus('tire-search');

    function clearLubricatorData() {
        lubricator_gear.val('');
        lubricator_number.val('');
        lubricator_brand.val('');

        $('#t_lubricator_gear').val('');
        $('#t_lubricator_number').val('');
        $('#t_lubricator_brand').val('');

        clearTag();
    }

    function clearTag() {
        $("#tag-show").html('');
    }

    $("#btn-clear").click(function() {
        var target = $('.nav-link.active').attr("data-target");
        if (target == '#searchFromLubricator') {
            clearTireData();
            if (table) {
                table.ajax.reload();
            } else {
                loadDataTable();
            }
        } else {
            clearCarData();
            if (table) {
                table.ajax.reload();
            } else {
                loadDataTable();
            }
        }
    });

    $(".nav-link").click(function() {
        var target = $(this).attr("data-target");
        if (!$(this).hasClass("active")) {
            if (target == '#searchFromLubricator') {
                clearLubricatorData();
                if (table) {
                    table.ajax.reload();
                } else {
                    loadDataTable();
                }
                $("#tag-show").html('');
            } else {
                // clearTireData();
                // if (table) {
                //     table.ajax.reload();
                // } else {
                //     loadDataTable();
                // }
                // $("#tag-show").html('');
            }
        }
    });

    init();

    function init() {
        var t_lubricator_gear = $("#t_lubricator_gear").val();
        lubricator_gear.val(t_lubricator_gear);
        getLubricatorNumber();
    }

    lubricator_gear.change(function (e) { 
        getLubricatorNumber();
    });

    function getLubricatorNumber(){
        lubricator_number.html('<option>เบอร์น้ำมันเครื่อง</option>');
        lubricator_brand.html('<option>ยี่ห้อน้ำมันเครื่อง</option>');
        $.get(base_url + "service/lubricator/getLubricatorNumber", {
            lubricator_gear: lubricator_gear.val()
        },function(data) {
            var lubricatorNumberData = data.data;
            $.each(lubricatorNumberData, function(key, value) {
                lubricator_number.append('<option value="' + value.lubricator_numberId + '">' + value.lubricator_number + '</option>');
            });

            var t_lubricator_number = $("#t_lubricator_number").val();
            if (t_lubricator_number) {
                lubricator_number.val(t_lubricator_number);
                getLubricatorBrand();
            }
        });
    }

    lubricator_number.change(function (e) { 
        getLubricatorBrand();
    });

    function getLubricatorBrand(){
        lubricator_brand.html('<option>ยี่ห้อน้ำมันเครื่อง</option>');
        $.get(base_url + "service/lubricator/getLubricatorBrand", {
            lubricator_number: lubricator_number.val()
        },function(data) {
            var lubricatorBrandData = data.data;
            $.each(lubricatorBrandData, function(key, value) {
                lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
            });
            var t_lubricator_brand = $("#t_lubricator_brand").val();
            if (t_lubricator_brand) {
                lubricator_brand.val(t_lubricator_brand);
                loadDataTable();
            }
        });
    }

    function loadDataTable() {
        var target = $('.nav-link.active').attr("data-target");
        if (target == '#searchFromLubricator') {
            showTag($("#tire-search"));
        } else {
            showTag($("#car-search"));
        }

        table = $('#lubricator-table').DataTable({
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
                "url": base_url + "service/lubricator/search",
                "dataType": "json",
                "type": "POST",
                "data": function(data) {
                    // let tire_sizeId = $("#tire_sizeId").val();
                    // if (!tire_sizeId) {
                    //     tire_sizeId = $("#car_tire_sizeId").val();
                    // }
                    // data.tire_brandId = $("#tire_brandId").val();
                    // data.tire_modelId = $("#tire_modelId").val();
                    // data.rimId = $("#rimId").val();
                    // data.tire_sizeId = tire_sizeId;
                    // data.price = $("#amount").val();
                    // data.can_change = $("#can_change").val();
                    // data.sort = $("#sort").val();
                    // data.warranty_distance = $("#warranty_distance").val();
                    // data.warranty_year = $("#warranty_year").val();
                    data.lubricator_brand = lubricator_brand.val();
                    data.lubricator_number = lubricator_number.val();
                    // data.model_name = $("#model_name").val();
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

                    var html = '<div class="row row-border">' +
                        '<div class="pic col-md-3 text-center">' +
                        '<img src="' + base_url + 'public/image/lubricatorproduct/' + data
                        .picture + '">' +
                        '</div>' +
                        '<div class="detail col-md-3">' +
                        '<div class="text"> ' + data.lubricator + ' </div>' +
                        '<div class="text"> ' + data.lubricator_number+ ' '+ data.capacity +' ลิตร' + ' </div>' +
                        '<div class="text"> <strong>'+ data.machine_type +' ' + data.lubricator_typeName +
                        '</strong> </div>' +
                        '</div>' +
                        '<div class="brand col-md-3 text-center brand-logo sort-first">' +
                        '<img src="' + base_url + 'public/image/lubricator_brand/' + data
                        .lubricator_brandPicture + '" width="100%">' +
                        '</div>' +
                        '<div class="detail col-md-3">' +
                        '<a href="' + base_url + 'search/lubricator/resultgarage/' + data
                        .machine_id + '/' + data.lubricator_numberId + '/' + data.lubricator_dataId +
                        '">' +
                        // '<a href="#" class="product_cart_button" onclick="setCart(\'lubricator\',' + data.lubricator_dataId +',this)">'+
                        '<div class="card pointer full-view">' +
                        '<div class="card-body order">' +
                        'ราคาต่ำสุด' +
                        '<h5>' + currency(data.price, {
                            precision: 0
                        }).format() + ' บาท</h5>' +
                        '</div>' +
                        '<div class="footer order">' +
                        'ค้นหาศูนย์บริการ / สั่งสินค้า' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</div>' +
                        '</div>';
                    return html;
                }
            }]
        });
    }

    $('#btn-lubricator-search').click(function(e) {
        var isvalid = false;
        $("#lubricator-table").hide();
        $("#lubricator-table").show('slow');
        var target = $('.nav-link.active').attr("data-target");
        var form;
        if (target == '#searchFromLubricator') {
            isvalid = $('#lubricator-search').valid();
            form = $('#lubricator-search');
        } else {
            isvalid = $('#car-search').valid();
            form = $('#car-search');
        }

        if (isvalid) {
            if (table) {
                table.ajax.reload();
            } else {
                loadDataTable();
            }
            showTag(form);
        }
    });

    function showTag(form) {
        var arrForm = form.serializeArray();
        var html = '';
        $("#tag-show").html('');
        $.each(arrForm, function(i, v) {
            console.log(v.name);
            html = '<div class="searchTag">' +
                '<div class="desc"> ' +
                $('#' + v.name + ' :selected').text()
                // + '<i class="fa fa-times-circle close"></i>'
                +
                ' </div>' +
                '</div>';
            $("#tag-show").append(html);
        });
    }

    $("#lubricator-search").validate({
        rules: {
            lubricator_gear: {
                required: true
            },
            lubricator_number: {
                required: true
            },
            lubricator_brand: {
                required: true
            },
        },
        messages: {
            lubricator_gear: {
                required: "เลือกประเภทของเหลว"
            },
            lubricator_number: {
                required: "เลือกเบอร์น้ำมันเครื่อง"
            },
            lubricator_brand: {
                required: "เลือกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });

})

</script>