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
</style>



<section class="section pricing" id="search">
    <input type="hidden" name="machine_id" id="machine_id" value="<?=$machine_id?>">
    <input type="hidden" name="lubricator_numberId" id="lubricator_numberId" value="<?=$lubricator_numberId?>">
    <input type="hidden" name="lubricator_dataId" id="lubricator_dataId" value="<?=$lubricator_dataId?>">
    <div class="container">
        <div id="boby">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>สั่งสินค้า/<span class="alternate">เลือกศูนย์บริการติดตั้งฟรี</span></h3>
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
                    <h4 id="txt-mobile-display"></h4>
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