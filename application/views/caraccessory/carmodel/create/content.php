<!--Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary"> เพิ่มข้อมูลรุ่นรถ</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
         <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/carmodelaccessory/index1/$brandId"); ?>">รุ่นรถ</a></li>
         <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
      </ol>
   </div>
</div>

<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="card card-header">
            <div class="card-title">
               <h4><i class="fa fa-fw fa-car"></i> เพิ่มข้อมูลรุ่นรถ</h4>
            </div>
            <div class="card-body">
               <div class="basic-form">
                  <form id="submit">
                     <input type="hidden" id="brandId" name="brandId" value="<?=$brandId ?>">
                     <div class="form-group">
                        <label class="control-label">ชื่อรุ่นรถ</label><span class="error">*</span>
                        <input type="text" class="form-control" placeholder="ชื่อรุ่นรถ" name="modelName" id="modelName">
                     </div>
                     <div class="row">
                        <div class="col-lg-5">
                           <div class="form-group">
                              <label>ปีที่ผลิต</label> <span class="error">*</span> <label id="yearStart-error" class="error" for="yearStart"></label>
                              <div class="">
                                 <select class="form-control" name="yearStart" id="yearStart"></select>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-2 to-year">
                           <label>ถึง</label>
                        </div>
                        <div class="col-lg-5 to-year">
                           <select class="form-control" name="yearEnd" id="yearEnd"></select>
                        </div>
                     </div>
                     <div class="row p-t-20">
                        <div class="col-md-12 card-grid">
                           <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> บันทึก</button>
                           <a href="<?=base_url("caraccessory/carmodelaccessory/index1/$brandId"); ?>">
                           <button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>
                           </a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Container fluid -->