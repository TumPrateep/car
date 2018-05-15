</div>
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="#" id="btn-delete-modal">ลบ</a>
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
          <div class="modal-body" id="content-success"><i class="fa fa-check"></i>Success</div>
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
          <div class="modal-body" id="content-warning"><i class="fa fa-exclamation"></i>Warning</div>
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
            <h5 class="modal-title" id="lebel-danger">Danger</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="content-danger"><i class="fa fa-times" ></i>Danger</div>
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

    <script>
      function logout(){
        localStorage.clear();
        window.location.assign(base_url+"auth/logout");
      }
    </script>