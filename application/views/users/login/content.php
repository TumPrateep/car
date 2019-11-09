<style>
    .leftline{
        border-left: 1px solid #ced4da;
    }
    .btn-fb{
        padding: 15px 20px;
        background: #ffffff;
        outline: none;
        font-size: 0.9375rem;
        color: #222222;
        border: 2px solid #e5e5e5;
        border-radius: 6;
    }
    .btn-fb:hover{
        background-color: #3b5998;
    }
    .btn-google{
        padding: 15px 40px;
        background: #ffffff;
        outline: none;
        font-size: 0.9375rem;
        color: #222222;
        border: 2px solid #e5e5e5;
        border-radius: 6;
    }
    .btn-google:hover{
        background-color: #dd4b39;
    }
    .hide{
        display: none;
    }
</style>

<div class="container">
    <br>
    <div class="row card flex-row flex-wrap">
        <div class="col-md-4 card-header border-0 bg-white">
            <h4 class="text-center">เข้าสู่ระบบ</h4>
            <div id="error-message" class="alert alert-warning hide" role="alert"></div>
            <form id="login">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <p class="text-left">ชื่อผู้ใช้งาน</p>
                        <input type="text" name="username" class="form-control main" placeholder="ชื่อผู้ใช้งาน">
                        <p class="text-left">รหัสผ่าน</p>
                        <input type="password" name="password" class="form-control main" placeholder="รหัสผ่าน">
                    </div>    
                </div>      
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-main-md width-100p bg-orange" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ
                    </button>
                </div>
            </div>
            </form>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <button class="btn btn-google btn-block" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-google fa-lg" aria-hidden="true"></i> Google
                    </button>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-fb btn-block" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i> Facebook
                    </button>
                </div>
            </div>            
  
        </div>
        <div class="col-md-8 card-body leftline">
            <div class="row">
                <div class="col-12">
                    <h6>ลงทะเบียน</h6>
                </div>
                
            </div>
            
        </div>
    </div>
    <br>
    
</div>    