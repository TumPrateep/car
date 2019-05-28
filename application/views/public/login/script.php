<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};HandleGoogleApiLibrary()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
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
                            synCartData();
                            window.location = base_url+"role";
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

    // Called when Google Javascript API Javascript is loaded
    function HandleGoogleApiLibrary() {
        // Load "client" & "auth2" libraries
        gapi.load('client:auth2', {
            callback: function() {
                // Initialize client library
                // clientId & scope is provided => automatically initializes auth2 library
                gapi.client.init({
                    apiKey: 'AIzaSyB35TEuf1rNhUFy17glysZ5AVOCknVX8-o',
                    clientId: '26870870058-s1cptuqcdgpei6dp38g246006k3kd2kd.apps.googleusercontent.com',
                    scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'
                }).then(
                    // On success
                    function(success) {
                        // After library is successfully loaded then enable the login button
                        $("#login-button").removeAttr('disabled');
                    }, 
                    // On error
                    function(error) {
                        alert('Error : Failed to Load Library');
                    }
                );
            },
            onerror: function() {
                // Failed to load libraries
            }
        });
    }

    // Click on login button
    $("#login-button").on('click', function() {
        $("#login-button").attr('disabled', 'disabled');
                
        // API call for Google login
        gapi.auth2.getAuthInstance().signIn().then(
            // On success
            function(success) {
                // API call to get user information
                gapi.client.request({ path: 'https://www.googleapis.com/plus/v1/people/me' }).then(
                    // On success
                    function(success) {
                        var user_info = JSON.parse(success.body);
                        var data = {
                            "name": user_info.displayName,
                            "firstname": user_info.name.familyName,
                            "lastname": user_info.name.givenName,
                            "email": user_info.emails[0].value
                        };

                        $.post(base_url+"service/Auth/googleAuth/", data,
                            function (data, textStatus, jqXHR) {
                                successLogin(data);
                            }
                        );
                        
                        $("#login-button").hide();
                    },
                    // On error
                    function(error) {
                        $("#login-button").removeAttr('disabled');
                        alert('Error : Failed to get user user information');
                    }
                );
            },
            // On error
            function(error) {
                $("#login-button").removeAttr('disabled');
                alert('Error : Login Failed');
            }
        );
    });

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

</script>

</body>

</html>