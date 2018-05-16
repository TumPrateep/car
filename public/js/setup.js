$.ajaxSetup({
    beforeSend: function(xhrObj){
        xhrObj.setRequestHeader("Authorization", "Bearer "+localStorage.token)
    }
});

$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading-modal"); },
    ajaxStop: function() { $body.removeClass("loading-modal"); }    
});

var deleteUrl = null;
var modalUrl = null;
function fnDelete(option) {
   $("#lebel-delete").html(option.label);
   $("#content-delete").html(option.content);
   $("#delete-modal").modal("show");
   deleteUrl = base_url+"api"+option.url;
   modalUrl = option.gotoUrl;
}

function showMessage(message, url=null){
    if(message == 200){
        $("#success-modal").modal("show");
    }else if(message == 404 || message == 1005 || message == 1004 || message == 1003){
        $("#lebel-warning").html("คำเตือน");
        var dangerContent = $("#content-danger");
        if(message == 1004){
            dangerContent.html(message);
        }else if(message == 1005){
            dangerContent.html(message);
        }else if(message == 1003){
            dangerContent.html(message);
        }else if(message == 404){
            dangerContent.html(message);
        }else{
            dangerContent.html(message);
        }

        $("#danger-modal").modal("show");
    }else{
        // 1001 1002 3001 3002 2001
        $("#lebel-warning").html("ผิดพลาด");
        var warningContent = $("#content-warning");
        if(message == 1001){
            warningContent.html(message);
        }else if(message == 1002){
            warningContent.html(message);
        }else if(message == 3001){
            warningContent.html(message);
        }else{
            warningContent.html(message);
        }

        $("#warning-modal").modal("show");
    }

    modalUrl = url;
}

$("#success-modal").on('hidden.bs.modal', function () {
    if(modalUrl != null){
        window.location.assign(base_url+modalUrl);
    }
});

$("#btn-delete-modal").click(function(){
    $.get(deleteUrl,{},function(data){
        $("#delete-modal").modal("hide");
        showMessage(data.message, modalUrl);
    });
})