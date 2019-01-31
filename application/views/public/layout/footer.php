

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">OneTech</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>





<!-- footer -->
<footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
     <!-- Logout Modal-->
     <div class="modal fade-in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="#" onclick="logout()">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Delete Modal-->
    <div class="modal fade-in" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Confirm Modal-->
    <div class="modal fade-in" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade-in" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="lebel-success">บันทึกสำเร็จ</h4>
            <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-check text-success "></i></h1>
            <h6 class="text-center" id="content-success">Success</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary close-modal" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Warning Modal-->
    <div class="modal fade-in" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-warning">Warning</h5>
            <button class="close close-modal" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-exclamation text-warning "></i></h1>
            <h6 class="text-center" id="content-warning">Warning</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary close-modal" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Danger Modal-->
    <div class="modal fade-in" id="danger-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-danger">แจ้งเตือน</h5>
            <button class="close close-modal" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-times text-danger "></i></h1>
            <h6 class="text-center" id="content-danger">Danger</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary close-modal" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function logout(){
        localStorage.clear();
        window.location.assign(base_url+"auth/logout");
      }
    </script>