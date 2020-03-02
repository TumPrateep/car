<style>
img.pic {
    width: 220px;
    height: 180px;
}

img.icon {
    width: 20px;
    height: 20px;
    cursor: pointer;
}

img.thumbnail {
    width: 60px;
    height: 60px;
    cursor: pointer;
}

p.comment {
    padding: 15px 0px 10px 0px;
}

p.reply {
    padding: 0px 0px 3px 20px;
    /* margin: 0px 0px 0px 0px; */
}
</style>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=699132327152708&autoLogAppEvents=1">
</script>

<div class="container">
    <div class="container">
        <div id="boby">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>รายละเอียด<span class="alternate">ศูนย์บริการคาร์ใจดี</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="hidden" name="garageId" id="garageId" value="<?=$garageId?>">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?=base_url('public/image/garage/' . $garageData->picture)?>" class="pic"
                                        alt="">
                                </div>
                                <div class="col-md-7">
                                    <h5><?=$garageData->garageName?> <div class="fb-share-button"
                                            data-href="<?=base_url('search/garage/detailgarage/' . $garageId)?>"
                                            data-layout=" button" data-size="small"><a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url('search/garage/detailgarage/' . $garageId)?>&amp;src=sdkpreparse"
                                                class="fb-xfbml-parse-ignore">แชร์</a></div>
                                    </h5>
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?=changeStringToDay($garageData->dayopenhour)?></span><br>
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <?=date('H:i', strtotime($garageData->openingtime))?> -
                                        <?=date('H:i', strtotime($garageData->closingtime))?> น.</span><br>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i>
                                        <?=$garageData->phone?></span><br>
                                    <img src="<?=base_url('public/images/icon/wifi.png')?>" class="icon"
                                        title="ไวไฟฟรี">
                                    <img src="<?=base_url('public/images/icon/airconditioner.png')?>" class="icon"
                                        title="มีเครื่องปรับอากาศ">
                                    <img src="<?=base_url('public/images/icon/toilet.png')?>" class="icon"
                                        title="มีสุขา">
                                    <div class="mb-20 text-center">
                                        <h4 id="show-rating">
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <span><strong>ที่อยู่</strong></span><br>
                                    <span id="txt-address"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" id="box-owner">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">
                                <img src="#" id="owner-picture" alt="">
                            </p>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h5>เจ้าของศูนย์บริการ</h5>
                                    <span id="txt-owner"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <span id="show-comment"></span>
                </div>
            </div>
            <br>
            <!-- <div class="row">
                <div class="col-md-12">
                    <h4>แสดงความเห็น</h4>
                </div>
            </div>
            <hr>
            <div class="row form-group">
                <div class="col-md-2 text-center">
                    <img src="<?php echo base_url('public/image/icon/user.png') ?>" class="thumbnail" alt=""><br>
                    <p><small>User Hoorey</small></p>
                </div>
                <div class="col-md-10">
                    <p class="comment">แสดงความเหนนนนนนนนนนนนนนน</p>
                    <p class="reply"><strong>ตอบกลับ</strong></p>
                    <p class="reply">ตอบ 1</p>
                </div>
            </div>
            <hr>
            <div class="row form-group">
                <div class="col-md-2 text-center">
                    <img src="<?php echo base_url('public/image/icon/user.png') ?>" class="thumbnail" alt=""><br>
                    <p><small>User Hoorey</small></p>
                </div>
                <div class="col-md-10">
                    <p class="comment">แสดงความเหนนนนนนนนนนนนนนน</p>
                    <p class="reply"><strong>ตอบกลับ</strong></p>
                    <p class="reply">ตอบ 1</p>
                </div>
            </div>
            <br> -->
        </div>
    </div>
</div>