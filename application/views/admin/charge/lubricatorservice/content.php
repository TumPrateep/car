
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url("admin/charge/lubricatorservice") ?>">ราคาค่าขนส่งน้ำมันเครื่อง</a>
        </li>
      </ol>

      <!-- Example DataTables Card-->

    <div class="card-tools one">
      <form id="form-search">
        <div class="row justify-content-between">
          <div class="col-md-2">
            <a class="btn btn-primary btn-block create" href="<?=base_url("admin/charge/createlubricatorservice") ?>">
              <i class="fa fa-plus">  สร้าง</i>
            </a>
          </div>
        </div>
       
      </form>
    </div>

     <div class="table-responsive">
      <table class="table table-bordered" id="service-table" width="100%" cellspacing="0">
        <thead>
          <th><i class="fa fa-sort"></i>  ลำดับ</th>
          <th><i class="fa fa-usd" ></i>  ราคาค่าจัดส่ง</th>
          <th><i class="fa fa-pencil text-center"></i>  แก้ไข</th>
        </thead>	
      </table>
    </div>

  
