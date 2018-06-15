Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ยี่ห้อรถ</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("caraccessory/car"); ?>">ยี่ห้อรถ</a></li>
                <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
        </div>
    </div>
   
    <div class="container-fluid">   
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-success">

                    <div class="card-header">
                        <h4 class="m-b-0 text-white">เพิ่มยี่ห้อรถ</h4>
                    </div>
                    <div class="card-body">
                        <!-- <form action="#"> -->
                            <div class="form-body">
                                <h3 class="card-title m-t-15">รายละเอียด</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">ชื่อยี่ห้อรถ</label>
                                            <input type="text" id="firstName" class="form-control" placeholder="ชื่อยี่ห้อรถ">
                                            <small class="form-control-feedback"> This is inline help </small> </div>
                                        </div>       
                                    </div>
                                       
                                    <h3 class="box-title m-t-40">รูปภาพ</h3>
                                    <hr>
                                    
                                    <form class="dropzone">
                                        <div class="fallback"><input name="file" type="file" multiple /></div>
                                    </form>  
                                    <h6 class="card-subtitle">เพิ่ม <code>รูปภาพ</code> ที่นี้</h6>
                                           
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div>
                            </div>
<<<<<<< HEAD
                        <!-- </form>  -->  
=======
                        <!-- </form>    -->
>>>>>>> 9ff969eb6fdcd03b0fe125a084cc24fae3240d2d

                        <!-- <h4 class="card-title">Dropzone</h4>
                        <h6 class="card-subtitle">For multiple file upload put class <code>.dropzone</code> to form.</h6>
                        <form action="#" class="dropzone">
                            <div class="fallback"><input name="file" type="file" multiple /></div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>   
    </div>



    <!-- End Container fluid 