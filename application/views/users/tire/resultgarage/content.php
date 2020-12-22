<style>
.btn-result {
    padding: 7px 7px 7px 7px;
}

div.address {
    margin: auto;
}

*,
::after,
::before {
    box-sizing: border-box;
}

ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
}

.detail {
    width: -webkit-fill-available !important;
}
.option{
    line-height: 120%;
    font-style: italic;
}
.fs-20{
    font-size: 20px;
}
</style>



<section class="section pricing" id="search">
    <input type="hidden" name="tire_modelId" id="tire_modelId" value="<?=$tire_modelId?>">
    <input type="hidden" name="tire_sizeId" id="tire_sizeId" value="<?=$tire_sizeId?>">
    <input type="hidden" name="tire_dataId" id="tire_dataId" value="<?=$tire_dataId?>">
    <div class="container">
        <div id="boby">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>สั่งสินค้า/<span class="alternate">เลือกศูนย์บริการติดตั้งฟรี</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <p id="txt-mobile-display" class="fs-20"></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group row justify-content-end">
                        <label for="staticEmail" class="col-md-4 col-form-label">จัดเรียง</label>
                        <div class="col-md-8">
                            <select class="form-control" id="modelofcarId">
                                <option>ก - ฮ</option>
                                <option>ฮ - ก</option>
                                <option>ราคาต่ำไปสูง</option>
                                <option>ราคาสูงไปต่ำ</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="borderTB">
                <table class="" id="garage-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
</section>