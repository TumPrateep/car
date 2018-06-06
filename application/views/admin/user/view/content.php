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
                     <div class="col-lg-2 pull-lg-8 text-center">
                        <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
                        <h6 class="m-t-2">ชื่อบทบาท</h6>
                     </div>
                     <div class="col-lg-10 push-lg-4">
                        <ul class="nav nav-tabs">
                           <li class="nav-item">
                              <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">ข้อมูลผู้ใช้งาน</a>
                           </li>
                           <li class="nav-item">
                              <a href="" data-target="#messages" data-toggle="tab" class="nav-link">ข้อมูลเพิ่มเติม</a>
                           </li>
                        </ul>
                        <div class="tab-content p-b-3">
                           <div class="tab-pane active" id="profile"><br>
                              <h5 class="m-t-2"><span class="fa fa-user-circle-o "></span> รายข้อมูลผู้ใช้งาน</h5>
                              <div class="row">
                                 <div class="col-md-6">
                                    <h6>ชื่อ-สกุล</h6>
                                    <p>
                                       Admin Cjd
                                    </p>
                                    <h6>ที่อยู่</h6>
                                    <p>
                                       xx  ม.xx ต. xxxx อ. xxxxx จ.xxxxxx  xxxxx
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <h6>เบอร์โทรศัพท์</h6>
                                    <p>
                                       09xxxxxxxx
                                    </p>
                                 </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-12">
                                    <h5 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> สมัครใช้งานเมื่อ</h5>
                                    <p>
                                       12:45  03/14/2018.
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="messages"><br>
                              <h4 class="m-y-2"> ผู้ใช้งาน</h4>
                              <div class="row">
                                 <div class="col-md-6">
                                    <h6>ป้ายทะเบียนรถ</h6>
                                    <p>
                                       xx-0000
                                    </p>
                                    <h6>จังหวัด</h6>
                                    <p>
                                       xxxxxxxxx
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <h6>เลขไมล์</h6>
                                    <p>
                                       xxxxxxxx
                                    </p>
                                    <h6>สีรถ</h6>
                                    <p>
                                       xxxx
                                    </p>
                                 </div>
                                </div>
                                <div class="row text-center" >
                                  <div class="col-md-4">
                                    <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
                                    <h6 class="m-t-2">รูปด้านหน้ารถ</h6>
                                  </div>
                                  <div class="col-md-4">
                                    <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
                                    <h6 class="m-t-2">รูปด้านหลังรถ</h6>
                                  </div>
                                  <div class="col-md-4">
                                    <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
                                    <h6 class="m-t-2">รูปป้ายวงกลม  </h6>
                                  </div>
                              </div>
                              <hr/>
                              <h4 class="m-y-2"> อู่</h4>
                              <div class="row">
                                 <div class="col-md-6">
                                    <h6>ชื่ออู่</h6>
                                    <p>
                                       xxxxxx
                                    </p>
                                    <h6>เลขบัตรประชาชน</h6>
                                    <p>
                                       xxxxxxxxx
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <h6>หมายเลขทะเบียนการค้า</h6>
                                    <p>
                                       xxxxxxxx
                                    </p>
                                    <h6>ที่อยู่</h6>
                                    <p>
                                       xx ม.xx ต. xxxx อ. xxxxx จ.xxxxxx xxxxx
                                    </p>
                                 </div>
                                 <div class="row text-center" >
                                  <div class="col-md-12 ">
                                    <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
                                    <h6 class="m-t-2">ภาพของอู่</h6>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <h4 class="m-y-2"> ร้านอะไหล่</h4>
                              <div class="row">
                                 <div class="col-md-6">
                                    <h6>ชื่อร้านอะไหล่</h6>
                                    <p>
                                       xxxxxxxxx
                                    </p>
                                    <h6>เลขบัตรประชาชน</h6>
                                    <p>
                                       xxxxxxxxx
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <h6>หมายเลขทะเบียนการค้า</h6>
                                    <p>
                                       xxxxxxxx
                                    </p>
                                    <h6></h6>
                                    <p>
                                       xx ม.xx ต. xxxx อ. xxxxx จ.xxxxxx xxxxx
                                    </p>
                                 </div>
                              </div>
                              <hr/>
                              <h4 class="m-y-2"> ผู้ดูแลระบบ</h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>