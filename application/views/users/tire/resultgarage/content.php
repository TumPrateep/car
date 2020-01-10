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
                        <h3>ผลการค้นหา<span class="alternate">ยางรถยนต์</span></h3>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <label for="staticEmail" class="col-md-1 col-form-label">จัดเรียง</label>
                <div class="col-md-2">
                    <select class="form-control" id="modelofcarId">
                        <option>ก - ฮ</option>
                        <option>ฮ - ก</option>
                        <option>ราคาต่ำไปสูง</option>
                        <option>ราคาสูงไปต่ำ</option>
                    </select>
                </div>
            </div>
            <br>

            <div class="row toggle-display">
                <div class="col-lg-12">
                    <h4><strong>MICHELIN</strong> PRIMACY4 215/60R17</h4>
                </div>
            </div>

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