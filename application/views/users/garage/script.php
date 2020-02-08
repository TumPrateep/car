<script>
$(document).ready(function() {
    var table;
    var brand = $("#brandId");
    var province = $("#provinceIdSearch");
    var district = $("#districtIdSearch");
    var latitude = null;
    var longitude = null;

    init();

    function init() {
        getLocation();
        getProvince();
        getAllBrand();
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
                $("#sort").append('<option value="3">ระยะทางน้อย-มาก</option>');
                console.log(latitude, longitude);
                lenderTable(latitude, longitude);
            }, function(error) {
                latitude = null;
                longitude = null;
                lenderTable();
                alert('ไม่สามารถดึงตำแหน่งปัจจุบันได้');
            }, {
                maximumAge: 60000,
                timeout: 5000,
                enableHighAccuracy: true
            });
        } else {
            alert("ไม่สามารถดึงตำแหน่งปัจจุบันได้");
            lenderTable();
        }
    }

    function getProvince() {
        $.post(base_url + "service/Location/getProvince", {},
            function(data) {
                var provinceData = data.data;
                $.each(provinceData, function(index, value) {
                    province.append('<option value="' + value.provinceId + '">' + value
                        .provinceName + '</option>');
                });
            }
        );
    }

    province.change(function() {
        var provinceId = $(this).val();
        getDistrict(provinceId);
    });

    function getDistrict(provinceId) {
        district.html('<option value="">อำเภอ</option>');
        $.post(base_url + "service/Location/getDistrict", {
            provinceId: provinceId
        }, function(data) {
            var districtData = data.data;
            $.each(districtData, function(index, value) {
                district.append('<option value="' + value.districtId + '">' + value
                    .districtName + '</option>');
            });
        });
    }

    function getAllBrand() {
        brand.html("<option value=''>เลือกยี่ห้อรถ</option>");
        $.get(base_url + "service/Brandcar/getAllBrand", {}, function(data) {
            var brandData = data.data;
            $.each(brandData, function(index, value) {
                brand.append('<option value="' + value.brandId + '">' + value.brandName +
                    '</option>');
            });
        });
    }

    $("#search-garage").validate({
        rules: {
            provinceIdSearch: {
                required: true
            },
            districtIdSearch: {
                required: true
            },
            brandId: {
                required: true
            },
            Service: {
                required: true
            }
        },
        messages: {
            provinceIdSearch: {
                required: "กรอกจังหวัด"
            },
            districtIdSearch: {
                required: "กรอกอำเภอ"
            },
            brandId: {
                required: "กรอกความชำนาญ"
            },
            Service: {
                required: "เลือกการบริการ"
            }
        },
    });

    function changeStringToDay(str) {
        var html = "";
        var day = ["จ", "อ", "พ", "พฤ", "ศ", "ส", "อา"];

        for (var i = 0; i < str.length; i++) { // 1111011
            if (str.charAt(i) == "1") {
                html += day[i] + ", ";
            }
        }
        return html.substring(0, html.length - 2);
    }

    function settimegarage(timegarage) {
        var time = "2001-01-01 " + timegarage;
        var datetime = new Date(time);
        var htime = datetime.getHours();
        var htostring = htime.toString();
        var h = htostring.length;
        if (h == 1) {
            hours = "0" + htime;
        } else {
            hours = htime;
        }
        var mtime = datetime.getMinutes();
        var mtostring = mtime.toString();
        var m = mtostring.length;
        if (m == 1) {
            minutes = "0" + mtime;
        } else {
            minutes = mtime;
        }
        var settime = hours + ":" + minutes;
        return settime;
    }

    function lenderTable(latitude = null, longitude = null) {
        table = $('#search-table').DataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "sProcessing": "กำลังดำเนินการ...",
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดง _TOTAL_ รายการ",
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
                "url": base_url + "service/garages/searchgarage",
                "dataType": "json",
                "type": "POST",
                "data": function(data) {
                    data.garagename = $("#garagename").val();
                    data.provinceIdSearch = $("#provinceIdSearch").val();
                    data.districtIdSearch = $("#districtIdSearch").val();
                    // data.subdistrictIdSearch = $("#subdistrictIdSearch").val();
                    data.brandId = $("#brandId").val();
                    data.service = $("#Service").val();
                    data.latitude = (latitude) ? latitude : 8.432982;
                    data.longitude = (longitude) ? longitude : 99.960704;

                    data.service = $("#Service").val();
                    // data.sort = $("#sort").val();
                }
            },
            "columns": [
                null
            ],
            "columnDefs": [{
                "targets": 0,
                "data": null,
                "render": function(data, type, full, meta) {
                    var imagePath = base_url + "/public/image/garage/";
                    var html = '<div class="row">';
                    $.each(data, function(index, value) {
                        var scorerating = 0;
                        if (value.scoreall != 0) {
                            averagescore = (value.scoresummury / value.scoreall);
                            averagescorerating = averagescore.toFixed(1);
                            scorerating = Math.floor(averagescore);
                        } else {
                            averagescore = 0;
                            averagescorerating = 0;
                            scorerating = 0;
                        }

                        html += '<div class="col-md-6">' +
                            '<div class="card flex-row flex-wrap">' +
                            '<div class="card-header col-md-5 text-center">' +
                            '<img src="' + imagePath + value.picture +
                            '"><br><br>' +
                            '<h5>ระยะทาง</h5>' +
                            '<h5>' + distance(value.latitude, value.longitude,
                                latitude, longitude, "กม.") + '</h5>' +
                            '<a class="btn btn-primary btn-sm" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' +
                            base_url +
                            'search/garage/detailgarage/' + value.garageId +
                            '&amp;src=sdkpreparse" ' +
                            'class="fb-xfbml-parse-ignore"><i class="fa fa-facebook-square" aria-hidden="true"></i> แชร์</a></div>' +
                            '<div class="card-block col-md-7">' +
                            '<br>' +
                            '<h5 class="card-title">' + value.garageName + '</h5>' +
                            '<p class="card-text">' +
                            '<b><i class="fa fa-calendar" aria-hidden="true"></i></b> ' +
                            changeStringToDay(value.dayopenhour) +
                            '<br>' +
                            '<b><i class="fa fa-clock-o" aria-hidden="true"></i></b> ' +
                            settimegarage(value.openingtime) + " - " +
                            settimegarage(value.closingtime) + " น." +
                            '<br>' +
                            '<b><i class="fa fa-phone" aria-hidden="true"></i></b> ' +
                            value.phone +
                            '<br>' +
                            '<img src="' + base_url +
                            'public/images/icon/wifi.png" title="ไวไฟฟรี"> ' +
                            '<img src="' + base_url +
                            'public/images/icon/airconditioner.png" title="มีเครื่องปรับอากาศ"> ' +
                            '<img src="' + base_url +
                            'public/images/icon/toilet.png" title="มีสุขา"> ' +
                            '<br><br>' +
                            '<p class="text-center" style="font-size:27px;">' +
                            '<span>';
                        for (var i = 0; i < scorerating; i++) {
                            html += '<i class="fa fa-star star"></i>';
                        }
                        for (var i = 5; scorerating < i; scorerating++) {
                            html += '<i class="fa fa-star"></i>';
                        }
                        html += '</span>' +
                            '</p>' +
                            '</p>' +
                            '<br><br>' +
                            '<a href="' + base_url + 'search/garage/detailgarage/' +
                            value.garageId +
                            '" class="btn btn-transparent-md btn-detail"><i class="fa fa-search"></i> รายละเอียด</a>' +
                            '<a href="https://www.google.com/maps/?q=' + value
                            .latitude + ',' + value.longitude +
                            '"  target="_blank" class="btn btn-transparent-md btn-detail"><i class="fa fa-road"></i> แสดงเส้นทาง</a><br>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });
                    html += '</div>';
                    return html;
                }
            }]
        });
    }

    $("#btn-search").click(function(e) {
        e.preventDefault();
        table.destroy();
        getLocation();
    });
});
</script>