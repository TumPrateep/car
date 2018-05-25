<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/custom.css">

  <script src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/js/semantic.js"></script>
  <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>

  <script>
  $(document).ready(function() {
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element ) || /^[A-Za-z][A-Za-z0-9]*$/.test( value );
  }, 'กรุณากรอกภาษาอังกฤษหรือตัวเลขเท่านั้น');

    $('#form-register').validate({
      rules: {
        username: {
          required: true,
          username:true,
          minlength:4
        },
          email: {
            email: true
        },  
          phone: {
            required: true
        },    
        password: {
          required: true,
          minlength:6
        },
        confirmpassword: { 
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        username: {
          required: "กรุณากรอกชื่อผู้ใช้งาน",
          minlength:"กรุณากรอกชื่อผู้ใช้อย่างน้อย 4 ตัวอักษร"
        },
        email: {
          email: "กรุณากรอกอีเมลให้ถูกต้อง"
        },
        phone: {
          required: "กรุณากรอกเบอร์โทร"
        },
        password: {
          required: "กรุณากรอกรหัสผ่าน",
          minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร"
        },
        confirmpassword: {
          required: "กรุณากรอกรหัสผ่านอีกครั้ง",
          equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
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
          <a class="ui button" href="<?=base_url("/auth/register") ?>">สมัครใช้งาน</a>
        </div>
        <div class="item">
          <a class="ui primary button" href="<?=base_url("/auth/register") ?>">ลงชื่อเข้าใช้</a>
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
            <a class="blue ui head-logo"><i class="black car icon"></i>CarJaidee.com</a>
            <a class="ui red button head-button " href="<?=base_url("/auth/register") ?>">สมัครใช้งาน</a>
            <a class="ui primary button head-button" href="<?=base_url("/auth/login") ?>">ลงชื่อเข้าใช้</a>
          </div>
        </div>
      </div>

    </div>
      <form class="ui form register" id="form-register">
        <div class="ui stacked segment container register">
          <div class="field">
              <h2 class="ui container center header">สมัครเข้าใช้งาน</h2>
          </div>
          <div class="ui red message text-left hide" id="error-message">ชื่อผู้ใช้ซ้ำ</div>
          <div class="field"><label>ชื่อผู้ใช้งาน<span class="error">*</span></label>
              <input class="ui input" type="text" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
          </div>
          <div class="field"><label>เบอร์โทรศัพท์<span class="error">*</span></label>
              <input type="text" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
          </div>
          <div class="field"><label>อีเมล์</label>
              <input type="text" id="email" name="email" placeholder="อีเมล์">
          </div>
          <div class="field"><label>รหัสผ่าน<span class="error">*</span></label>
              <input type="password" id="password" name="password" placeholder="รหัสผ่าน">
          </div>
          <div class="field"><label>ยืนยันรหัสผ่าน<span class="error">*</span></label>
              <input type="password" id="confirmpassword" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน">
          </div>
          <div class="field">
              <button class="ui green button" type="submit" id="register">สมัคร</button>
          </div>
          <div class="ui error message"></div>
        </div>
        
      </form>
    </div>


    <script>
    $(document).ready(function(){

      $("#form-register").submit(function(){
        register();
            
      })

      $("#register").click(function(){
        register();
      })

      function register(){
        event.preventDefault();
        var isValid = $("#form-register").valid();
        $("#error-message").hide();
        if(isValid){
          var data = $("#form-register").serialize();
          $.post(base_url+"api/register/register",data,
            function(data){
              if(data.message == 200){
                window.location.assign(base_url);
              }
            }
          )
          .fail(function(data) {
            if(data.responseJSON.message == 3001){
              $("#error-message").show();
            }
          })
        }
      
      }

    });
    
  </script>

</body>
</html>