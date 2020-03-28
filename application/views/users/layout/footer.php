<?php $basedata = loadBasicData();?>
<!-- Subfooter -->
<footer class="subfooter">
    <div class="container">
        <div class="row">
            <div class="col-md-10 align-self-center">
                <div class="copyright-text">
                    <p><a href="#"><?=$basedata->name?></a> &#169; 2019, <?=htmlSelfData()?></p>
                </div>
            </div>
            <div class="col-md-2">
                <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebel-delete"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="content-delete"><i class="fa fa-trash-o"></i>Delete</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <button class="btn btn-primary" id="btn-delete-modal">ลบ</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebel-confirm"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="content-confirm"><i class="fa fa-trash-o"></i></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <button class="btn btn-primary" id="btn-confirm-modal">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal-->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebel-success">บันทึกสำเร็จ</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="display-3 text-center"><i class="fa fa-check text-success "></i></h1>
                <h6 class="text-center" id="content-success">Success</h6>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!-- Warning Modal-->
<div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebel-warning">Warning</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="display-3 text-center"><i class="fa fa-exclamation text-warning "></i></h1>
                <h6 class="text-center" id="content-warning">Warning</h6>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
<!-- Danger Modal-->
<div class="modal fade" id="danger-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lebel-danger">แจ้งเตือน</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="display-3 text-center"><i class="fa fa-times text-danger "></i></h1>
                <h6 class="text-center" id="content-danger">Danger</h6>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

<div class="modal-loading" id="loading">
    <div class="modal-loading-content">
        <div class="cssload-bell">
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
            <div class="cssload-circle">
                <div class="cssload-inner"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal-cart">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center"><i class="far fa-check-circle correct-logo"></i> <br>สินค้าถูกหยิบใส่ตะกร้าแล้ว
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">เลือกสินค้าต่อ</button>
                <a href="<?=base_url("shop/cart")?>"><button type="button" class="btn btn-orange btn-block">
                        ยืนยันการสั่งสินค้า</button></a>
                <!-- <button type="button" class="btn btn-primary" >ยืนยันการสั่งสินค้า</button> -->
            </div>
        </div>
    </div>
</div>

<div class="banner-bottom" style="bottom: 1%; left: 24%; width: 100%;">
    <div style="width: 100%;float: left;height: 20px;border:none;outline: none;cursor:pointer;" role="button" tabindex="0">
        <div style="background-color: #fafafa;color: #ff6600;display: inline-block;padding: 3px 8px;border-radius: 56%;border:1px solid #000;font-size: 12px;position: absolute;z-index: 70;left: 56%;font-weight: 900;margin-top: 10px;">
                 x 
        </div>
    </div>
    <!-- <a href="#" target="_blank"> -->
        <div class="visible-md visible-lg" id="advertisement_picture_show" style="background-repeat: no-repeat;background-size: contain;background-position: center;height: 120px;width: 57%;position: relative;">
          
        </div>
     
    <!-- </a>  -->
</div>