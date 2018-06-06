 
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/usermanagement") ?>">ข้อมูลผู้ใช้งาน</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
      </ol>

      <input type="hidden" name="userId" id="userId" value="<?=$userId ?>">

      <!-- Example DataTables Card-->
        
      <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10">
                <div class="card text-white bg-success">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-user-circle-o" ></i> รายข้อมูลผู้ใช้งาน</h3>
                    </div>
                   
                      <div class="card-body black bg-light">
                      <div class="container">
    <div class="row m-y-2">
        <div class="col-lg-3 pull-lg-8 text-center">
            <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
            <h6 class="m-t-2">ชื่อบทบาท</h6>
        </div>
        <div class="col-lg-9 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h4 class="m-y-2">User Profile</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>
                                Web Designer, UI/UX Engineer
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent Tags</h6>
                        </div>
                        <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Recent Activity</h4>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <h4 class="m-y-2">Recent Messages &amp; Notifications</h4>
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="pull-xs-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="pull-xs-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="pull-xs-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="pull-xs-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
                      </div>
                   
                  </div>
                </div>
            </div>
          </div>
       </section>

