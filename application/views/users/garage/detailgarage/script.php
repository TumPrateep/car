<script>
$(document).ready(function() {
    var garageId = $('#garageId').val();
    var comment = $("#show-comment");
    var rating = $("#show-rating");

    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_modelId");
    var tire_rim = $("#rimId");
    var tire_size = $("#tire_sizeId");

    var table;

    init();

    function init() {
        getGarageData();
    }

    function getGarageData() {
        $.get(base_url + "service/garages/getGarageById", {
            'garageId': garageId
        }, function(res, textStatus, jqXHR) {
            let garage = res.garage;
            let owner = res.owner;
            if (garage) {
                let addressHtml =
                    'บ้านเลขที่ ' + garage.hno +
                    ' ตำบล' + garage.subdistrictName + ' อำเภอ' + garage.districtName +
                    ' จังหวัด' + garage.provinceName + ' ' + garage.postCode;
                $('#txt-address').html(addressHtml);

                if(garage.garageService){
                    let isTire = (garage.garageService).charAt(1);
                    if(isTire != '1'){
                        $('#search-box').hide();
                    }else{
                        $('#search-box').removeClass('hidden');
                        getTireBrand();
                        getRim();
                    }
                }
            }

            if (owner) {
                let ownerHtml =
                    '<span>' + owner.titleName + ' ' + owner.firstName +
                    ' ' + owner.lastName +
                    '</span><br><span><i class="fa fa-phone" aria-hidden="true"></i> ' + owner.phone +
                    '</span>'
                $('#txt-owner').html(ownerHtml);
                $('#owner-picture').attr('src', base_url+'public/image/mechanic/'+owner.picture);
            } else {
                $('#txt-owner').html(' - ');
                $('#box-owner').hide();
            }
        });
    }

    $.get(base_url + "service/Review/searchScoreRating", {'garageId': garageId},
        function(data, textStatus, jqXHR) {
            var score = '';
            var rat_star = '';
            scoreall = data;
            if (scoreall.all != 0) {
                averagescore = scoreall.sum / scoreall.all;
                averagescorerating = averagescore.toFixed(1);
                scorerating = Math.floor(averagescore);
            } else {
                // averagescore = 0;
                // averagescorerating = 0;
                scorerating = 0;
            }

            for (var i = 0; i < scorerating; i++) {
                rat_star += '<i class="fa fa-star Yellow-star size-star" ></i>';
            }
            for (var i = 5; scorerating < i; scorerating++) {
                rat_star += '<i class="fa fa-star gray-star size-star" ></i>';
            }

            score += '<div class="text-center pad-star">' + rat_star +'</div>';
            rating.html(score);
        }
    );

    $.post(base_url + "service/Review/getdatarating", {
        'garageId': garageId
    },function(data, textStatus, jqXHR) {
        var html = '';

        $.each(data.review, function(index, val) {
            var star = '';
            var score = val.scorerating;

            for (var i = 0; i < score; i++) {
                star += '<i class="fa fa-star Yellow-star" ></i>';
            }
            for (var i = 5; score < i; score++) {
                star += '<i class="fa fa-star gray-star" ></i>';
            }

            var botcomment = '';

            var replygarage = '';
            if (val.status == 1) {
                replygarage += '';
            } else if (val.status == 2) {
                replygarage += '<div class="col-md-12" ><label>ตอบกลับ : </label><label>' + val
                    .commentgarage + '</label></div>';
            }


            html += '<div class="card-comment">' +
                '<form id="update-comment-garage">' +
                '<input type="hidden" id="ratingId" name="ratingId" value="' + val.ratingId +
                '">' +
                '<label>หมายเลขการสั่งซื้อ #' + val.orderId + '</label>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<span class="score-center">' +
                '<div class="text-center"><h3><span class="txt-score">' + val.scorerating +
                '</span></h3></div>' +
                '<div class="text-center">' +
                star +
                '</div>' +
                '<div class="text-center"><span>' + getsetdatecomment(val.create_at) +
                '</span></div>' +
                '</span>' +
                '</div>' +
                '<div class="col-md-10">' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<label> ' + val.firstname + " " + val.lastname +
                '</label>' +
                '</div>' +
                '<div class="col-md-12">' +
                '<label>ความคิดเห็น : </label>' +
                '<label>' + val.commentuser + '</label>' +
                '</div>' +
                replygarage +
                '<div class="col-md-12" >' +
                '<div class="row">' +
                '<div class="col-md-2 offset-lg-10">' +
                botcomment +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</form>' +
                '</div><hr>';
        });
        comment.html(html);
    });

    function getsetdatecomment(createat) {

        var datecomment = new Date(createat);
        var day = datecomment.getUTCDate();
        var daytostring = day.toString();
        var d = daytostring.length;
        console.log(day);
        if (d == 1) {
            date = "0" + day;
        } else {
            date = day;
        }
        var month = datecomment.getUTCMonth() + 1;
        var monthtostring = month.toString();
        var m = monthtostring.length;
        if (m == 1) {
            datemonth = "0" + month;
        } else {
            datemonth = month;
        }
        var year = datecomment.getUTCFullYear();
        var daterating = date + "/" + datemonth + "/" + year;
        return daterating;
    }

    function clearCarData() {
        brand.val('');
        model.val('');
        year.val('');
        car_tire_size.val('');

        $('#t_brandId').val('');
        $('#t_model_name').val('');
        $('#t_year').val('');
        $('#t_car_tire_size_id').val('');

        clearTag();
    }

    function clearTireData() {
        tireBrand.val('');
        tireModel.val('');
        tire_rim.val('');
        tire_size.val('');

        $('#t_tire_brandId').val('');
        $('#t_tire_modelId').val('');
        $('#t_rimId').val('');
        $('#t_tire_sizeId').val('');

        clearTag();
    }

    function clearTag() {
        $("#tag-show").html('');
    }

    $("#btn-clear").click(function() {
        var target = $('.nav-link.active').attr("data-target");
        if (target == '#searchFromTire') {
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
            if (target == '#searchFromTire') {
                clearCarData();
                if (table) {
                    table.ajax.reload();
                } else {
                    loadDataTable();
                }
                $("#tag-show").html('');
            } else {
                clearTireData();
                if (table) {
                    table.ajax.reload();
                } else {
                    loadDataTable();
                }
                $("#tag-show").html('');
            }
        }
    });

    function loadDataTable() {
        var target = $('.nav-link.active').attr("data-target");
        if (target == '#searchFromTire') {
            showTag($("#tire-search"));
        } else {
            showTag($("#car-search"));
        }

        table = $('#tire-table').DataTable({
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
                "url": base_url + "service/Tire/search_tire_garage",
                "dataType": "json",
                "type": "POST",
                "data": function(data) {
                    let tire_sizeId = $("#tire_sizeId").val();
                    if (!tire_sizeId) {
                        tire_sizeId = $("#car_tire_sizeId").val();
                    }
                    data.tire_brandId = $("#tire_brandId").val();
                    data.tire_modelId = $("#tire_modelId").val();
                    data.rimId = $("#rimId").val();
                    data.tire_sizeId = tire_sizeId;
                    // data.price = $("#amount").val();
                    // data.can_change = $("#can_change").val();
                    // data.sort = $("#sort").val();
                    // data.warranty_distance = $("#warranty_distance").val();
                    // data.warranty_year = $("#warranty_year").val();
                    data.brandId = $("#brandId").val();
                    data.modelId = $("#modelId").val();
                    data.model_name = $("#model_name").val();
                    // data.modelofcarId = $("#modelofcarId").val();
                    data.year = $("#year").val();
                    data.garageId = garageId;
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
                        '<img src="' + base_url + 'public/image/tireproduct/' + data
                        .picture + '">' +
                        '</div>' +
                        '<div class="detail col-md-3">' +
                        '<div class="text"> ' + data.tire_brandName + ' </div>' +
                        '<div class="text"> ' + data.tire_modelName + ' </div>' +
                        '<div class="text"> <strong>' + data.tire_size +
                        '</strong> </div>' +
                        '</div>' +
                        '<div class="brand col-md-3 text-center brand-logo sort-first">' +
                        '<img src="' + base_url + 'public/image/tire_brand/' + data
                        .tire_brandPicture + '" width="100%">' +
                        '</div>' +
                        '<div class="detail col-md-3">' +
                        '<a href="' + base_url + 'checkout/' + data.tire_dataId + '/' + garageId + '/' + 1 +  
                        '">' +
                        '<div class="card pointer full-view">' +
                        '<div class="card-body order">' +
                        'ราคา' +
                        '<h5>' + currency(data.price, {
                            precision: 0
                        }).format() + ' บาท/เส้น</h5>' +
                        '</div>' +
                        '<div class="footer order">' +
                        'สั่งสินค้า' +
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

    $('#btn-car-search').click(function(e) {
        var isvalid = false;
        $("#tire-table").hide();
        $("#tire-table").show('slow');
        var target = $('.nav-link.active').attr("data-target");
        var form;
        if (target == '#searchFromTire') {
            isvalid = $('#tire-search').valid();
            form = $('#tire-search');
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



    // ------------- tiredata ---------------

    $("#tire-search").validate({
        rules: {
            // tire_brandId: {
            //     required: true
            // },
            // tire_modelId: {
            //     required: true
            // },
            rimId: {
                required: true
            },
            // tire_sizeId: {
            //     required: true
            // }
        },
        messages: {
            // tire_brandId: {
            //     required: "เลือกยี่ห้อยาง"
            // },
            // tire_modelId: {
            //     required: "เลือกรุ่นยาง"
            // },
            rimId: {
                required: "เลือกขอบยาง"
            },
            // tire_sizeId: {
            //     required: "เลือกขนาดยาง"
            // }
        },
    });

    function getTireBrand() {
        tireBrand.html('<option value="">ยี่ห้อยาง</option>');
        tireModel.html('<option value="">รุ่นยาง</option>');
        $.get(base_url + "service/Tire/getAllTireBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value
                        .tire_brandName + '</option>');
                });

                var t_tire_brandId = $("#t_tire_brandId").val();
                if (t_tire_brandId) {
                    tireBrand.val(t_tire_brandId);
                    getTireModel();
                }
            }
        );
    }

    tireBrand.change(function() {
        getTireModel();
    });

    function getTireModel() {
        var tireBrandId = tireBrand.val();
        tireModel.html('<option value="">รุ่นยาง</option>');
        $.get(base_url + "service/Tire/getAllTireModel", {
            tire_brandId: tireBrandId
        }, function(data) {
            var tireModelData = data.data;
            $.each(tireModelData, function(key, value) {
                tireModel.append('<option value="' + value.tire_modelId + '">' + value
                    .tire_modelName + '</option>');
            });

            var t_tire_modelId = $("#t_tire_modelId").val();
            if (t_tire_modelId) {
                tireModel.val(t_tire_modelId);
            }
        });
    }

    function getRim() {
        tire_rim.html('<option value="">ขอบยาง</option>');
        tire_size.html('<option value="">ขนาดยาง</option>');
        $.get(base_url + "service/Tire/getAllTireRims", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName +
                        ' นิ้ว</option>');
                });

                var t_rimId = $("#t_rimId").val();
                if (t_rimId) {
                    tire_rim.val(t_rimId);
                    loadDataTable()
                    getTireSize();
                }
            }
        );
    }

    tire_rim.change(function() {
        getTireSize();
    });

    function getTireSize() {
        var rimId = tire_rim.val();
        tire_size.html('<option value="">ขนาดยาง</option>');
        $.get(base_url + "service/Tire/getAllTireSize", {
            rimId: rimId
        }, function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                tire_size.append('<option value="' + value.tire_sizeId + '">' + value
                    .tire_size + '</option>');
            });

            var t_tire_sizeId = $("#t_tire_sizeId").val();
            if (t_tire_sizeId) {
                tire_size.val(t_tire_sizeId);
                if (table) {
                    table.ajax.reload();
                } else {
                    loadDataTable();
                }
            }
        });
    }

});
</script>