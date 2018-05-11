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
    .ui.form {
      padding: 1em;
    }
    .ui.stacked.segment{
      width: 800px;
    }

  </style>

  <script src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>public/js/semantic.js"></script>

  <script>
  $(document).ready(function() {
    $('.ui.form').form({
      fields: {
        username: {
          identifier  : 'username',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please input your username'
            }
          ]
        },
        email: {
          identifier  : 'email',
          rules: [
            {
               type   : 'empty',
              prompt : 'Please input your email'
            }
          ]
        },
        phone: {
          identifier  : 'phone',
          rules: [
            {
               type   : 'empty',
              prompt : 'Please input your phone'
            }
          ]
        },
        password: {
          identifier  : 'password',
          rules: [
            {
               type   : 'empty',
              prompt : 'Please input your password'
            }
          ]
        },
        confirmpassword: {
          identifier  : 'confirmpassword',
          rules: [
            {
               type   : 'empty',
              prompt : 'Please input your confirmpassword'
            }
          ]
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
            <a class="blue ui head-logo"><i class="black car icon"></i>CarJaidee.com</a>
            <a class="ui red button head-button">สมัครใช้งาน</a>
            <a class="ui primary button head-button">ลงชื่อเข้าใช้</a>
          </div>
        </div>
      </div>

    </div>
      
      <h2 class="ui container green center header">Register</h2>

      <form class="ui form">
        <div class="ui stacked segment container" >
          <div class="field"><label>User Name</label>
              <input class="ui input" type="text" name="username" placeholder="User Name">
          </div>
          <div class="field"><label>E-mail</label>
              <input type="text" name="email" placeholder="E-mail">
          </div>
          <div class="field"><label>Phone</label>
              <input type="text" name="phone" placeholder="Phone">
          </div>
          <div class="field"><label>Password</label>
              <input type="password" name="password" placeholder="Password">
          </div>
          <div class="field">
              <input type="password" name="confirmpassword" placeholder="Confirm Password">
          </div>
          <div class="field">
              <div class="ui checkbox">
                  <input type="checkbox" tabindex="0" class="hidden">
                  <label>I agree to the Terms and Conditions</label>
              </div>
          </div>
              <button class="ui green button" type="submit">Submit</button>
          <div class="ui error message"></div>
        </div>
        
      </form>
    </div>

  

  

</body>
</html>