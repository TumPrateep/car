<section class="section pricing" id="search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3>ความรู้/<span class="alternate">ข่าวสาร</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($news)){ ?>
                <div class="col-md-12">
                    <h4><?=$news->news_title?></h4>
                    <div class="row">
                        <div class="col-lg-5"><img src="<?=base_url('public/image/news/'.$news->news_picture)?>"></div>
                        <div class="col-lg-7">
                            <?=$news->news_content?>
                        </div>
                    </div>
                    <br>
                </div>                
            <?php }else{ ?>
                <div class="col-md-12 center"><h2>ไม่มีข้อมูล</h2></div>
            <?php } ?>
        </div>
    </div>
</section>