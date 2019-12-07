<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};HandleGoogleApiLibrary()"
    onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
<script>
$(document).ready(function() {
    var errorMessage = $("#error-message");
    var login = $("#login");
    var register = $("#register");

    login.validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์"
            },
            password: {
                required: "กรอกรหัสผ่าน"
            }
        }
    });

    register.validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            username: {
                required: true,
                minlength: 5
            },
            phone: {
                required: true,
                minlength: 9
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_again: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            firstname: {
                required: "กรอกชื่อ"
            },
            lastname: {
                required: "กรอกนามสกุล"
            },
            username: {
                required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์",
                minlength: "กรอกชื่อผู้ใช้งานมากกว่า 5 ตัว"
            },
            phone: {
                required: "กรอกเบอร์โทรศัพท์",
                minlength: "กรอกเบอร์โทรให้ครบถ้วน"
            },
            email: {
                required: "กรอกอีเมล์",
                email: "รูปแบบอีเมล์ไม่ถูกต้อง"
            },
            password: {
                required: "กรอกรหัสผ่าน",
                minlength: "กรอกรหัสผ่านมากกว่า 6 ตัว"
            },
            password_again: {
                required: "กรอกยืนยันรหัสผ่าน",
                equalTo: "รหัสผ่านไม่ตรงกัน"
            }
        }
    });

    login.submit(function(event) {
        event.preventDefault();
        var isValid = login.valid();
        if (isValid) {
            var data = login.serialize();
            errorMessage.hide();
            $.post(base_url + "api/Auth/login", data,
                function(data, textStatus, jqXHR) {
                    var message = data.message;
                    if (message == "2001") {
                        localStorage.token = data.token;
                        localStorage.userId = data.userId;
                        // synCartData();
                        window.location = base_url + "role";
                    } else if (message == "2002") {
                        errorMessage.html("ไม่พบชื่อผู้ใช้งาน <a href='" + base_url + "register" +
                            "'>ลงทะเบียน</a>");
                        errorMessage.show();
                    } else if (message == "2003") {
                        errorMessage.html("ชื่อผู้ใช้งานถูกปิดใช้งาน");
                        errorMessage.show();
                    } else {
                        errorMessage.html("ชื่อหรือรหัสผ่านไม่ถูกต้อง");
                        errorMessage.show();
                    }
                }
            );
        }
    });

    register.submit(function(e) {
        e.preventDefault();
        var isValid = register.valid();
        if (isValid) {
            var data = register.serialize();
            errorMessage.hide();
            $.post(base_url + "service/register/users", data,
                function(data, textStatus, jqXHR) {
                    showMessage(data.message, "login");
                }
            ).fail(function(data) {
                if (data.responseJSON.message == 3001) {
                    errorMessage.html("ชื่อผู้ใช้งานหรือเบอร์โทรนี้ถูกใช้งานแล้ว");
                    errorMessage.show();
                }
            })
        }
    });
});

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
                    $("#login-button").hide();
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
            gapi.client.request({
                path: 'https://www.googleapis.com/plus/v1/people/me'
            }).then(
                // On success
                function(success) {
                    var user_info = JSON.parse(success.body);
                    var data = {
                        "name": user_info.displayName,
                        "lastname": user_info.name.familyName,
                        "firstname": user_info.name.givenName,
                        "email": user_info.emails[0].value
                    };

                    $.post(base_url + "service/Auth/googleAuth/", data,
                        function(data, textStatus, jqXHR) {
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

function successLogin(data) {
    var message = data.message;
    if (message == "2001") {
        localStorage.userId = data.userId;
        localStorage.token = data.token;
        window.location = base_url + "role";
    } else if (message == "2002") {
        errorMessage.html("เกิดข้อผิดพลาด <a href='" + base_url + "register" + "'>ลงทะเบียน</a>");
        errorMessage.show();
    }
}

function register() {
    $('.form-login').hide();
    $('.form-register').show("slow");
}

function login() {
    $('.form-register').hide();
    $('.form-login').show("slow");
}
</script>