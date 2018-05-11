$.ajaxSetup({
    beforeSend: function(xhrObj){
        xhrObj.setRequestHeader("Authorization", "Bearer "+localStorage.token)
    }
});