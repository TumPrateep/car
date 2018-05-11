<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/semantic.css">

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
              prompt : 'Please enter your username'
            },
            {
              type   : 'length[6]',
              prompt : 'Your username must be at least 6 characters'
            }
          ]
        },
        password: {
          identifier  : 'password',
          rules: [
            {
               type   : 'empty',
              prompt : 'Please enter your password'
            },
            {
              type   : 'length[6]',
              prompt : 'Your password must be at least 6 characters'
            }
          ]
        }
      }
    });
  });
  </script>
</head>

<body>
  <div class="ui middle aligned center aligned grid">
      <div class="column">
          <h2 class="ui teal image header">
              <div class="content">
                  <i class="car big icon"></i>
              </div>
          </h2>
          <form class="ui large form">
              <div class="ui stacked segment">
                  <div class="field">
                      <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="username" name="username" placeholder="Username">
                      </div>
                  </div>
                  <div class="field">
                      <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                      </div>
                  </div>
                  <div class="ui fluid large teal submit button">Login</div>
                  <div class="ui horizontal divider">
                    Or
                  </div>
                  <div class="field">
                      <button class="ui facebook button">
                        <i class="facebook icon"></i>
                        Facebook
                      </button>
                      <button class="ui youtube button">
                        <i class="google plus icon"></i>
                        G-mail
                      </button>
                  </div>
              </div>

              <div class="ui error message"></div>
          </form>
          <div class="ui message">
              New to us? <a href="">Sign Up</a>
          </div>
      </div>
  </div>

</body>
</html>