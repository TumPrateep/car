<style>
    .btn-result{
        padding: 7px 7px 7px 7px;
    }
    div.address{
        margin: auto;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }
    ul.pagination li a {
        font-size: 13px;
    }

    table > thead {
        display: none;
    }
    .detail{
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
            <div class="row justify-content-end">
                <span class="text"> จัดเรียง:</span>
                <div class="col-md-2">
                    <div class="text-right">
                        <select class="form-control sortby justify-content-end" id="modelofcarId">
                            <option>ก - ฮ</option>
                            <option>ฮ - ก</option>
                            <option>ราคาต่ำไปสูง</option>
                            <option>ราคาสูงไปต่ำ</option>
                        </select>
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