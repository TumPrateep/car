<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?=base_url("admin/charge/lubricatorservice") ?>">ราคาค่าขนส่งน้ำมันเครื่อง</a>
        </li>
        <li class="breadcrumb-item active">แก้ไขราคาค่าขนส่งน้ำมันเครื่อง</li>
    </ol>
    <!-- Icon Cards-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card text-white bg-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa fa-wrench"></i> แก้ไขราคาค่าขนส่งน้ำมันเครื่อง</h3>
                        </div>

                        <form id="submit">
                            <input type="hidden" name="lubricator_serviceId" id="lubricator_serviceId" value="<?=$lubricator_serviceId?>">
                            <div class="card-body black bg-light">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label>ประเภทน้ำมันเครื่อง/เกียร์</label>
                                        <select class="form-control" name="machineId" id="machineId">
                                            <option value="">เลือกประเภทเครื่องยนต์</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ราคาค่าขนส่งน้ำมันเครื่อง</label> <span class="error">*</span>
                                        <input type="number" class="form-control" placeholder="กรุณากรอกราคาค่าขนส่งน้ำมันเครื่อง" name="price" id="price">
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