<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/custom.css">

  <script src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/js/semantic.js"></script>
  <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>
  <script src="<?=base_url("public/js/visibility.js"); ?>"></script>
  <script src="<?=base_url("public/js/sidebar.js"); ?>"></script>
  <script src="<?=base_url("public/js/custom.js"); ?>"></script>
  <style type="text/css">
    .ui.middle.aligned.center.aligned.grid{
      max-width: 480px !important;
      padding-top: 4em !important;
    }
  </style>

  <script>
  $(document).ready(function() {

    $('#form-login').validate({
      errorPlacement: function (error, element) {
          switch (element.attr("name")) {
              case "username":
                  $("#username-error").html(error[0].innerHTML);
                  break;
              case "password":
                  $("#password-error").html(error[0].innerHTML);
                  break;
              default:
                  //nothing
          }
      },
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
          required: "กรุณากรอกชื่อผู้ใช้งาน"
        },
        password: {
          required: "กรุณากรอกรหัสผ่าน"
        }
      }
    });
    
  });
  </script>
</head>

<body class="pushable">

  <!-- Sidebar Menu -->
  <div class="ui vertical inverted sidebar menu left">
    <a class="active item">Home</a>
    <a class="item">อู่รถยนต์</a>
    <a class="item">ช่างซ่อม</a>
    <a class="item">นัดหมาย</a>
    <a class="item">คลังอะไหล่</a>
    <a class="item">ข้อมูลส่วนตัว</a>
    <a class="item" href="<?=base_url("/auth/register") ?>">สมัครใช้งาน</a>
    <a class="item" href="<?=base_url("/auth/login") ?>">ลงชื่อเข้าใช้</a>
  </div>

  <div id="top-menu" class="pusher">

    <div class="ui inverted vertical masthead center aligned segment">

      <div class="ui container">
        <div class="ui large secondary inverted pointing menu">
          <a class="toc item">
            <i class="sidebar icon"></i>
          </a>
          <a class="active item">Home</a>
          <a class="item">อู่รถยนต์</a>
          <a class="item">ช่างซ่อม</a>
          <a class="item">นัดหมาย</a>
          <a class="item">คลังอะไหล่</a>
          <a class="item">ข้อมูลส่วนตัว</a>
          <div class="right item">
            <!-- <img class="ui avatar image" src="assert/images/square-image.png"> -->
            <!-- <span>Username</span> -->
            <a class="blue ui head-logo"><i class="black car icon"></i>CarJaidee.com</a>
            <a class="ui red button head-button " href="<?=base_url("/auth/register") ?>">สมัครใช้งาน</a>
            <a class="ui primary button head-button" href="<?=base_url("/auth/login") ?>">ลงชื่อเข้าใช้</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  
  <div class="pusher">
    <div class="ui middle aligned center aligned grid container">
        
            <h2 class="ui teal image header">
                <div class="content"><i class="car big icon"></i></div>
            </h2>
            
          <form class="ui large form" id="form-login">
            <div class="ui error message"></div>
              <div class="ui stacked segment">
                <div class="ui red message text-left hide" id="error-message"><span id="message"></span></div>
                  <div class="field">
                        <div class="ui left icon input"><i class="user icon"></i>
                            <input type="username" name="username" id="username" placeholder="ชื่อผู้ใช้งาน">
                        </div>
                        <div class="text-left error" id="username-error"></div>
                  </div>
                  <div class="field">
                        <div class="ui left icon input"><i class="lock icon"></i>
                          <input type="password" name="password" id="password" placeholder="รหัสผ่าน">
                        </div>
                        <div class="text-left error" id="password-error"></div>
                  </div>
                    
                  <button type="submit" class="ui fluid large teal submit button" id="login">เข้าสู่ระบบ</button>
                  <div class="ui horizontal divider">หรือ</div>
          </form>

                    <div class="field">
                        <button class="ui large facebook button">
                          <i class="facebook icon"></i>Facebook
                        </button>
                        <button class="ui large youtube button">
                          <i class="google plus icon"></i>G-mail
                        </button>
                    </div>
                    <div class="ui divider"></div>
              </div>
        
    </div>
  </div>

  <script>
    $(document).ready(function(){

      $("#form-login").submit(function(){
        login();
      })

      $("#login").click(function(){
        login();
      })
      
      $("#username").keyup(function(){
        var username = $(this).val();
        if(username.length > 0){
          $("#username-error").html("");
          $(this).removeClass("error");
        }
      });

      $("#password").keyup(function(){
        var password = $(this).val();
        if(password.length > 0){
          $("#password-error").html("");
          $(this).removeClass("error");
        }
      });

      function login(){
        event.preventDefault();
        $("#username-error").html("");
        $("#password-error").html("");
        $("#error-message").hide();
        var isValid = $("#form-login").valid();
        if(isValid){
          $("#error-message").hide();
          var data = $("#form-login").serialize();
          $.post(base_url+"api/auth/login",data,
            function(data){
              var message = data.message;
              if(message == "2001"){
                localStorage.token = data.token;
                localStorage.userId = data.userId;
                window.location = base_url+"role";
              }else if(message == "2002"){
                $("#message").html("ไม่พบชื่อผู้ใช้งาน <a href='"+base_url+"/auth/register"+"'>ลงทะเบียน</a>");
                $("#error-message").show();
              }else if(message == "2003"){
                $("#message").html("ชื่อผู้ใช้งานถูกปิดใช้งาน");
                $("#error-message").show();
              }else{
                $("#message").html("ชื่อหรือรหัสผ่านไม่ถูกต้อง");
                $("#error-message").show();
              }
            }
          )
          // .fail(function() {
          //   $("#error-message").show();
          // })
        }
      
      }

    });
  </script>

</body>
</html>