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
function fnDelete(option) {
   $("#lebel-delete").html(option.label);
   $("#content-delete").html(option.content);
   $("#delete-modal").modal("show");
   deleteUrl = base_url+"api"+option.url;
}

function showMessage(message, url=null){
    if(message == 200){
        $("#success-modal").modal("show");
    }else{
        alert(message);
    }

    if(url != null){
        window.location.assign(url);
    }
}

$("#btn-delete-modal").click(function(){
    $.get(deleteUrl,{},function(data){
        $("#delete-modal").modal("hide");
        showMessage(data.message);
    });
})