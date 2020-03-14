var pathImage = base_url + "public/image/";

// $.ajaxSetup({
//     beforeSend: function(xhrObj){
//         xhrObj.setRequestHeader("Authorization", "Bearer "+localStorage.token)
//     }
// });

$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading-modal"); },
    ajaxStop: function() { $body.removeClass("loading-modal"); }
});

var deleteUrl = null;
var confirmUrl = null;
var modalUrl = null;

function fnDelete(option) {
    $("#lebel-delete").html(option.label);
    $("#content-delete").html(option.content);
    $("#delete-modal").modal("show");
    deleteUrl = base_url + "service" + option.url;
    modalUrl = option.gotoUrl;
}

function fnConfirm(option) {
    $("#btn-confirm-modal").attr('data-status', option.status);
    $("#lebel-confirm").html(option.label);
    $("#content-confirm").html(option.content);
    $("#confirm-modal").modal("show");
    confirmUrl = base_url + "service" + option.url;
    modalUrl = option.gotoUrl;
}

function showMessage(message, url = null) {
    if (message == 200) {
        $("#success-modal").modal("show");
        $("#content-success").html("บันทึกสำเร็จ");
    } else if (message == 404 || message == 1005 || message == 1004 || message == 1003) {
        $("#lebel-warning").html("คำเตือน");
        var dangerContent = $("#content-danger");
        if (message == 1004) {
            dangerContent.html("ข้อมูลนี้ถูกใช้งาน");
        } else if (message == 1005) {
            dangerContent.html("ข้อมูลนี้ถูกลบแล้ว");
        } else if (message == 1003) {
            dangerContent.html("ลบไม่สำเร็จ");
        } else if (message == 404) {
            dangerContent.html("เกิดข้อผิดพลาด");
        } else {
            dangerContent.html("เกิดข้อผิดพลาด");
        }

        $("#danger-modal").modal("show");
    } else {
        // 1001 1002 3001 3002 2001
        $("#lebel-warning").html("ผิดพลาด");
        var warningContent = $("#content-warning");
        if (message == 1001) {
            warningContent.html("สร้างไม่สำเร็จ");
        } else if (message == 1002) {
            warningContent.html("แก้ไขไม่สำเร็จ");
        } else if (message == 3001 || message == 3002) {
            warningContent.html("ชื่อหรือถูกใช้งานแล้ว");
        } else {
            warningContent.html("เกิดข้อผิดพลาด");
        }

        $("#warning-modal").modal("show");
    }

    modalUrl = url;
}

$("#success-modal, #warning-modal, #danger-modal").on('hidden.bs.modal', function() {
    if (modalUrl != null) {
        window.location = base_url + modalUrl;
    }
});

$("#btn-delete-modal").click(function() {
    $.get(deleteUrl, {}, function(data) {
        $("#delete-modal").modal("hide");
        showMessage(data.message, modalUrl);
    });
})

$("#btn-confirm-modal").click(function() {
    var status = $(this).data('status');
    $.get(confirmUrl + "&status=" + status,
        function(data, textStatus, jqXHR) {
            $("#confirm-modal").modal("hide");
            showMessage(data.message, modalUrl);
        }
    );
});

$.wait = function(callback, seconds) {
    return window.setTimeout(callback, seconds * 1000);
}

function distance(lat1, lon1, lat2, lon2, unit) {
    if (lat1 > 0 && lat2 > 0 && lon1 > 0 && lon2 > 0) {
        if ((lat1 == lat2) && (lon1 == lon2)) {
            return "ประมาณ " + '<span class="distance-txt">' + 0 + '</span>' + " กม.";
        } else {
            var radlat1 = Math.PI * lat1 / 180;
            var radlat2 = Math.PI * lat2 / 180;
            var theta = lon1 - lon2;
            var radtheta = Math.PI * theta / 180;
            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
            if (dist > 1) {
                dist = 1;
            }
            dist = Math.acos(dist);
            dist = dist * 180 / Math.PI;
            dist = dist * 60 * 1.1515;
            if (unit == "K") { dist = dist * 1.609344 }
            if (unit == "N") { dist = dist * 0.8684 }
            return "ประมาณ " + '<span class="distance-txt">' + dist.toFixed(2) + '</span>' + " กม.";
        }
    } else {
        return "";
    }
}

function focus(id) {
    var screensize = document.documentElement.clientWidth;
    if (screensize < 1000) {
        document.getElementById(id).scrollIntoView({
            behavior: 'smooth'
        });
    }
}

function render_service_option(data) {
    let html = '';
    if (data.service_option1) {
        html += '- ตั้งค่าศูนย์ล้อฟรี';
        if (data.service_option1_price) {
            html += 'มูลค่า ' + data.service_option1_price + ' บาท';
        }
        html += '<br/>';
    }

    if (data.service_option2) {
        html += '- เติมลมไนโตรเจนฟรี<br/>';
    }

    if (data.service_option3) {
        html += '- ' + data.service_option3;
    }

    return html;
}