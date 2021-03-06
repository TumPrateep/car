<!-- Delete Modal-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-delete"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="content-delete"><i class="fa fa-trash-o"></i>Delete</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <button class="btn btn-primary" id="btn-delete-modal">ลบ</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-confirm"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="content-confirm"><i class="fa fa-trash-o"></i></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            <button class="btn btn-primary" id="btn-confirm-modal">ยืนยัน</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Success Modal-->
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-success">บันทึกสำเร็จ</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-check text-success "></i></h1>
            <h6 class="text-center" id="content-success">Success</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Warning Modal-->
    <div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-warning">Warning</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-exclamation text-warning "></i></h1>
            <h6 class="text-center" id="content-warning">Warning</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Danger Modal-->
    <div class="modal fade" id="danger-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-danger">แจ้งเตือน</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-times text-danger "></i></h1>
            <h6 class="text-center" id="content-danger">Danger</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-loading" id="loading">
      <div class="modal-loading-content">
        <div class="cssload-bell">
            <div class="cssload-circle">
              <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
              <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
              <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
              <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
              <div class="cssload-inner"></div>
            </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-cart">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<!-- <h5 class="modal-title">Modal title</h5> -->
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="text-center"><i class="far fa-check-circle correct-logo"></i> <br>สินค้าถูกหยิบใส่ตะกร้าแล้ว</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">เลือกสินค้าต่อ</button>
          <a  href="<?=base_url("shop/cart") ?>"><button type="button" class="btn btn-orange btn-block" > ยืนยันการสั่งสินค้า</button></a> 
					<!-- <button type="button" class="btn btn-primary" >ยืนยันการสั่งสินค้า</button> -->
				</div>
				</div>
			</div>
		</div>
    
<script>var base_url = "<?=base_url();?>";</script>
<script src="<?=base_url("public/themes/user/");?>js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>styles/bootstrap4/popper.js"></script>
<script src="<?=base_url("public/themes/user/");?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?=base_url() ?>public/js/jquery.validate.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/easing/easing.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="<?=base_url("public/themes/user/");?>plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?=base_url("public/themes/user/");?>js/shop_custom.js"></script>
<script src="<?=base_url("public/themes/user/");?>js/jquery-confirm.min.js"></script>
<script src="<?=base_url("/public/js/currency.min.js") ?>"></script>
<script src="<?=base_url("/public/js/jquery-dateformat.min.js") ?>"></script>

<script>
    function choosewarranty(warranty){
        if(warranty == 1){
            return "และ";
        }else if(warranty == 2){
            return "หรือ";
        }else{
            return null;
        }
    }
    function changwarranty(warranty){
        if(warranty == 0 || warranty == null){
            return "-";
        }else{
            return warranty;
        }
    }
    function logout(){
        localStorage.clear();
        window.location = base_url+"auth/logout";
    }
</script>
<script src="<?=base_url("/public/themes/user/js/shop.js") ?>"></script>
<script src="<?=base_url("/public/themes/user/js/setup.js") ?>"></script>

     <script>
        function changeUndefind(str) {;
            var newstr = null;
            if(str == undefined || str == null || str == ""){
                newstr = "-";
            }else{
                return str; 
            }
            return newstr;
        }
    </script>
    
    <script>
        function changeStringToDay(str){
        var html = "";
        var day = ["จ","อ","พ","พฤ","ศ","ส","อา"];

        for(var i=0;i<str.length;i++){   // 1111011
            if(str.charAt(i) == "1"){
                html += day[i]+", ";
            }
        }
        return html.substring(0, html.length - 2);
    }
    </script>

    <script>
        function changeStringTooption(str){
        var html = "";

        if(str==1){
          html = "Wifi"+", ";
        }else if(str==2){
          html = "ห้องพักพัดลม"+", ";
        }else if(str==3){
          html = "ห้องพักเเอร์"+", ";
        }else if(str==4){
          html = "ห้องน้ำ";
        }else{
          html = "-"+", ";
        }
        return html.substring();
    }
    </script>

    <script>
        function substr(str) {
            // var str = null;
            var res = str.substring(0, 23);
            if(str.length >= 13){
                res += "...";
            }
            return res;
        }
    </script>

    <script>
        function changeStringGS(str){
            var html = "";
            var job = ["•บริการเปลี่ยนอะไหล่","•บริการเปลี่ยนยางรถ","•บริการเปลี่ยนน้ำมันเครื่อง"];

            for(var i=0;i<str.length;i++){   // 1111011
                if(str.charAt(i) == "1"){
                    html += job[i]+", ";
                }
            }
            return html.substring(0, html.length);
        }
    </script>

    <script>
        var menu = document.getElementById("left-menu-users");
        var navli = menu.getElementsByClassName("nav-link");
        for (var i = 0; i < navli.length; i++) {
          navli[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          if (current.length > 0) { 
            current[0].className = current[0].className.replace(" active", "");
          }
          this.className += " active";
          });
        }
    </script>

    <script>
      checksize();

      $( window ).resize(function() {
        checksize();
      });

      function checksize(){
        var width = $( window ).width();
        if(width <= 991){
          $(".container").attr('class', 'container-fluid');
        }else{
          $(".container-fluid").attr('class', 'container');
        }
      }
    </script>

