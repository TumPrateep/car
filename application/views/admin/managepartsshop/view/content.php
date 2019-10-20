<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
   <li class="breadcrumb-item">
      <a href="<?=base_url("admin/usermanagement") ?>">ข้อมูลผู้ใช้งาน</a>
   </li>
   <li class="breadcrumb-item active">เพิ่มผู้ใช้งาน</li>
</ol>
<input type="hidden" name="car_accessoriesId" id="car_accessoriesId" value="<?=$car_accessoriesId ?>">
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
                        <img src="" class="m-x-auto img-fluid img-circle" id="avatar">
                        <h6 class="m-t-2" id="role-name"></h6>
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
                                    <h6><b>ชื่อ-สกุล</b></h6>
                                    <p id="name"></p>
                                 </div>
                                 <div class="col-md-6">
                                    <h6><b>เบอร์โทรศัพท์</b></h6>
                                    <p id="phone"></p>
                                 </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                  <h6><b>ที่อยู่</b></h6>
                                    <p>
                                      <span id="address"></span>
                                      ตำบล/แขวง <span id="subdistrict"></span>
                                      อำเภอ/เขต <span id="district"></span>
                                      จังหวัด <span id="province"></span>
                                      รหัสไปรษณีย์ <span id="postCode"></span>
                                    </p>
                                  </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-12">
                                    <h5 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> สมัครใช้งานเมื่อ</h5>
                                    <p id="createAt"></p>
                                 </div>
                              </div> 
                           </div>
                           <div class="tab-pane" id="messages"><br>
                                <div class="row">
                                  <div class="col-md-6">
                                      <h6><b>ชื่อร้านอะไหล่</b></h6>
                                      <p id="accessoryName"></p>
                                  </div>
                                  <div class="col-md-6">
                                    <h6><b>หมายเลขทะเบียนการค้า</b></h6>
                                      <p id="accessoryBusinessRegistration"></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <h6><b>เลขบัตรประชาชน</b></h6>
                                    <p id="accessoryidcard"></p>
                                  </div>
                                  <div class="col-md-6">
                                    <h6><b>ชื่อเจ้าของร้านอะไหล่</b></h6>
                                    <p id="accessoryMaster"></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <h6><b>ที่อยู่</b></h6>
                                    <p>
                                      <span id="accessoryAddress"></span>
                                      ตำบล/แขวง <span id="accessorySubdistrict"></span>
                                      อำเภอ/เขต <span id="accessoryDistrict"></span>
                                      จังหวัด <span id="accessoryProvince"></span>
                                      รหัสไปรษณีย์ <span id="accessoryPostCode"></span>
                                    </p>
                                  </div>
                                </div>
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