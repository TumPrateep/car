<div class="page-wrapper">

        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">ข้อมูลช่าง</h3> 
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">ข้อมูลช่าง</li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
           
                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group " role="group" aria-label="First group" >                    
                        <a href="<?=base_url("garage/mechanic/create") ?>" class="btn btn-success" role="button" aria-pressed="true">เพิ่ม</a>    
                    </div> 
                    <div class="input-group" id="table-Tsearch">
                        <input type="text" class="form-control" placeholder="ชื่อ - ช่าง" id="namemechanic" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                        <div class="input-group-prepend">
                            <div class="input-group-text btn btn-muted" id="btnGroupAddon2"><i class="fa fa-wrench" aria-hidden="true"></i></div>
                        </div> 
                        <input type="text" class="form-control" placeholder="ความชำนาญ" id="skillmechanic" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                        <div class="input-group-prepend">
                            <div class="input-group-text btn btn-muted" id="btnGroupAddon2" ><i class="fa fa-star" aria-hidden="true"></i></div>
                            <button type="button" class="btn btn-success " id="search"> ค้นหา </button>
       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div >
                <table class="table table-bordered no-head" id="Mechanic-table">
                    <thead>
                        <tr>
                        <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">        
                                        <div class="card">
                                            
                                            <h3 class="card-title"><i class="fa fa-user-circle-o" ></i> ข้อมูลช่าง </h3>
                                          <hr>
                                        
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div>
                                                        <label  title="เลขบัตรประชาชน"> <i class="fa fa-id-card" aria-hidden="true"></i>:</label>
                                                        <label>1801700022432</label>
                                                    </div>
                                                    <div>
                                                        <label title="ชื่อ-นามสกุล"> <i class="fa fa-user" aria-hidden="true"></i></label>
                                                        <label>นาย สมศักดิ์  หมั่นสถนอม</label>
                                                    </div>
                                                    <div>
                                                        <label title="เบอร์โทร"><i class="fa fa-phone-square" aria-hidden="true"></i></label>
                                                        <label>082-2919760</label>
                                                    </div>
                                                    <div>
                                                        <label title="ความชำนาญ"><i class="fa fa-car" aria-hidden="true"></i></label>
                                                        <label>BMW</label>
                                                    </div>
                                                    <div>
                                                        <label title="ประสบการณ์(ปี)"><i class="fa fa-clock-o" aria-hidden="true"></i></label>
                                                        <label>10 ปี</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class=" col-lg-12">
                                                    <button type="button" class="btn btn-warning   d1 "  id="#"  > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    <button type="button" class="btn  btn btn-danger  d1"  id="#"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>   
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            a
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            a
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            a
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>        
    </div>

    