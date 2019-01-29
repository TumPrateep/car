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