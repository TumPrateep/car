<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/charge/tireservice") ?>">ราคาค่าขนส่งยางรถยนต์</a>
        </li>
        <li class="breadcrumb-item active">แกไขราคาค่าขนส่งยางรถยนต์</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขราคาเปลี่ยนยาง</h3>
                        </div>

                        <form id="submit">
                            <input type="hidden" name="tire_serviceId" id="tire_serviceId" value="<?=$tire_serviceId?>">
                            <div class="card-body black bg-light">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>ชื่อขอบยาง</label> <span class="error">*</span>
                                        <select class="form-control" name="tire_rimId" id="tire_rimId">
                                            <option value="">กรุณาเลือกขอบยาง</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ราคาค่าบริการเปลี่ยนขอบยาง</label> <span class="error">*</span>
                                        <input type="number" class="form-control" placeholder="กรุณากรอกราคาค่าบริการเปลี่ยนขอบยาง" name="price" id="price">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>