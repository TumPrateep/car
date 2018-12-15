<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="<?=base_url("public/themes/user/");?>js/sdk.js"></script>
<script>
    var errorMessage = $("#error-message");
    $(document).ready(function () {
        var login = $("#login");
        login.validate({
            rules:{
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },messages:{
                username: {
                    required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์"
                },
                password: {
                    required: "กรอกรหัสผ่าน"
                }
            }
        });

        login.submit(function(event){
            event.preventDefault();
            var isValid = login.valid();
            if(isValid){
                var data = login.serialize();
                errorMessage.hide();
                $.post(base_url+"api/Auth/login", data,
                    function (data, textStatus, jqXHR) {
                        var message = data.message;
                        if(message == "2001"){
                            localStorage.token = data.token;
                            localStorage.userId = data.userId;
                            window.location = base_url+"role";
                            localStorage.data = [];
                        }else if(message == "2002"){
                            errorMessage.html("ไม่พบชื่อผู้ใช้งาน <a href='"+base_url+"register"+"'>ลงทะเบียน</a>");
                            errorMessage.show();
                        }else if(message == "2003"){
                            errorMessage.html("ชื่อผู้ใช้งานถูกปิดใช้งาน");
                            errorMessage.show();
                        }else{
                            errorMessage.html("ชื่อหรือรหัสผ่านไม่ถูกต้อง");
                            errorMessage.show();
                        }
                    }
                );
            }
        });
    });

    function onSignin(googleUser){
        var profile = googleUser.getBasicProfile();
        var data = {
            "name": profile.ig,
            "firstname": profile.ofa,
            "lastname": profile.wea,
            "email": profile.U3
        };
        $.post(base_url+"service/Auth/googleAuth/", data,
            function (data, textStatus, jqXHR) {
                signOutGoogle();
                successLogin(data);
            }
        );
    }

    function onSigninFacebook(facebookUser){
        var data = {
            "name": facebookUser.name,
            "firstname": facebookUser.first_name,
            "lastname": facebookUser.last_name,
            "email": facebookUser.email
        };
        $.post(base_url+"service/Auth/facebookAuth/", data,
            function (data, textStatus, jqXHR) {
                logout();
                successLogin(data);
            }
        );
    }

    function successLogin(data){
        var message = data.message;
        if(message == "2001"){
            localStorage.userId = data.userId;
            localStorage.token = data.token;
            window.location = base_url+"role";
        }else if(message == "2002"){
            errorMessage.html("เกิดข้อผิดพลาด <a href='"+base_url+"register"+"'>ลงทะเบียน</a>");
            errorMessage.show();
        }
    }

    function statusChangeCallback(response){
        if(response.authResponse != null){
            if(bFbStatus == false){
                fbID = response.authResponse.userID;

                if (response.status == 'connected') {
                    getCurrentUserInfo(response)
                } else {
                    FB.login(function(response) {
                        if (response.authResponse){
                            getCurrentUserInfo(response)
                        } else {
                            console.log('Auth cancelled.')
                        }
                    }, { scope: 'email' });
                }
            }

            bFbStatus = true;
        }
    }

    function getCurrentUserInfo() {
        FB.api('/me?fields=name,email,first_name,last_name', function(userInfo) {
            onSigninFacebook(userInfo);
        });
    }

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    $("#faceebook-login").click(function (e) { 
        e.preventDefault();
        FB.login(function(response) {
            if (response.authResponse) {
                checkLoginState();
            }
        }, {scope: 'email,public_profile', return_scopes: true});
    });

    function logout(){
        FB.logout(function(response){
            FB.Auth.setAuthResponse(null,'unknown');
        });
    }

    function signOutGoogle() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
        console.log('User signed out.');
        });
    }

</script>

</body>

</html>