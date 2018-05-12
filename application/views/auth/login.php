<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/custom.css">

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
    .ui.middle.aligned.center.aligned.grid {
      padding: 5em;
    }

  </style>

  <script src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/js/semantic.js"></script>
  <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>

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

<body>
  <div class="ui large top fixed hidden menu">
    <div class="ui container">
      <a class="active item">Home</a>
      <a class="item">อู่รถยนต์</a>
      <a class="item">ช่างซ่อม</a>
      <a class="item">นัดหมาย</a>
      <a class="item">คลังอะไหล่</a>
      <a class="item">ข้อมูลส่วนตัว</a>
      <div class="right menu">
        <div class="item">
          <a class="ui button">สมัครใช้งาน</a>
        </div>
        <div class="item">
          <a class="ui primary button">ลงชื่อเข้าใช้</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <div class="ui vertical inverted sidebar menu left">
    <a class="active item">Home</a>
    <a class="item">อู่รถยนต์</a>
    <a class="item">ช่างซ่อม</a>
    <a class="item">นัดหมาย</a>
    <a class="item">คลังอะไหล่</a>
    <a class="item">ข้อมูลส่วนตัว</a>
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
            <a class="ui red button head-button">สมัครใช้งาน</a>
            <a class="ui primary button head-button">ลงชื่อเข้าใช้</a>
          </div>
        </div>
      </div>

    </div>
  
  
  <div class="ui middle aligned center aligned grid">
      <div class="column">
          <h2 class="ui teal image header">
              <div class="content">
                  <i class="car big icon"></i>
              </div>
          </h2>
          <form class="ui large form" id="form-login">
          <div class="ui error message"></div>
              <div class="ui stacked segment">
              <div class="ui red message text-left hide" id="error-message">ชื่อหรือรหัสผ่านไม่ถูกต้อง</div>
                  <div class="field">
                      <div class="ui left icon input"><i class="user icon"></i>
                        <input type="username" name="username" placeholder="Username">
                      </div>
                      <div class="text-left error" id="username-error"></div>
                  </div>
                  <div class="field">
                      <div class="ui left icon input"><i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                      </div>
                      <div class="text-left error" id="password-error"></div>
                  </div>
                  
                  <button type="submit" class="ui fluid large teal submit button" id="login">Login</button>
                  <div class="ui horizontal divider">
                    Or
                  </div>
                  </form>
                  <div class="field">
                      <button class="ui large facebook button">
                        <i class="facebook icon"></i>
                        Facebook
                      </button>
                      <button class="ui large youtube button">
                        <i class="google plus icon"></i>
                        G-mail
                      </button>
                  </div>
              </div>
          <div class="ui message">
              New to us? <a href="">Sign Up</a>
          </div>
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

      function login(){s
        event.preventDefault();
        var isValid = $("#form-login").valid();
        if(isValid){
          $("#error-message").hide();
          $("#username-error").html("");
          $("#password-error").html("");
          var data = $("#form-login").serialize();
          $.post(base_url+"api/auth/login",data,
            function(data){
              localStorage.token = data.token;
              localStorage.id = data.id;
              window.location.assign(base_url+"welcome");
            }
          )
          .fail(function() {
            $("#error-message").show();
          })
        }
      
      }

    });
  </script>

</body>
</html>