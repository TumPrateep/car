<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">คะแนนและรีวิว</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">คะแนนและรีวิว</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="card col-lg-12">
                <!-- search data -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-3 offset-lg-1">
                                <div class="input-group mb-2 mr-sm-2">
                                    <select class="form-control" name="comment" id="comment">
                                        <option value="">ทั้งหมด</option>
                                        <option value="1">ตอบกลับ</option>
                                        <option value="2">ยังไม่ได้ตอบกลับ</option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-comments" ></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control"  placeholder=เดือน name="ratmonth" id="ratmonth">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar-o"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control"  placeholder="ปี" name="ratyear" id="ratyear">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar-o"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info btn-block" id="search"><i class="fa fa-search"></i>  ค้นหา</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="score-top">

                <div class="row">
                    <!-- rating all -->
                    <div class="col-lg-6">
                        <div class="card-rating">
                            <span id="show-rating">
                                        
                            </span>
                        </div>
                    </div>
                    <!-- rating of month -->
                    <div class="col-lg-6">
                        <div class="card-rating">
                            <span id="show-ratingbymonth">
                                        
                            </span>
                            
                        </div>
                    </div>
                </div>
                <!-- search data -->
                <br>
                
                <!-- show comment -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-rating">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span id="show-comment">
                                        
                                    </span>

                                    <!-- <div class="card-comment">
                                        <label>หมายเลข order 10001</label>
                                        <div class="row">
                                            <div class="col-md-2 ">
                                                <span class="score-ceter">
                                                <div class="text-center"><span class="txt-score">3</span></div>
                                                <div class="text-center">
                                                    <i class="fa fa-star Yellow-star" ></i>
                                                    <i class="fa fa-star Yellow-star" ></i>
                                                    <i class="fa fa-star Yellow-star" ></i>
                                                    <i class="fa fa-star" ></i>
                                                    <i class="fa fa-star" ></i>
                                                </div>
                                                <div class="text-center"><span>02/05/2019</span></div>
                                                </span>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label> นาย ธนากร ลิ้มสกุล</label>
                                                    </div>
                                                    <div class="col-md-12" >
                                                        <label>ความคิดเห็น : </label>
                                                        <label>ระบบบใช้งานได้ดี มีค้างบ้าง เข้าใจการใช้งานยากไป</label>
                                                    </div>
                                                    <div class="col-md-12" >
                                                        <div class="row">
                                                            <div class="col-md-2 offset-lg-10">
                                                                <button type="button" class="btn btn-success" onclick="commentrating('+data.orderId+')" id="search"><i class="fa fa-comments"></i>  ตอบกลับ</i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-comment">
                                        <label>หมายเลข order 10003</label>
                                        <div class="row">
                                            <div class="col-md-2 ">
                                                <span class="score-ceter">
                                                <div class="text-center"><span class="txt-score">3</span></div>
                                                <div class="text-center">
                                                    <i class="fa fa-star Yellow-star" ></i>
                                                    <i class="fa fa-star Yellow-star" ></i>
                                                    <i class="fa fa-star Yellow-star" ></i>
                                                    <i class="fa fa-star" ></i>
                                                    <i class="fa fa-star" ></i>
                                                </div>
                                                <div class="text-center"><span>05/05/2019</span></div>
                                                </span>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label> นาย สิทธิชัย เขียวเข็ม</label>
                                                    </div>
                                                    <div class="col-md-12" >
                                                        <label>ความคิดเห็น : </label>
                                                        <label>ระบบบใช้งานได้ดี มีค้างบ้าง เข้าใจการใช้งานยากไป</label>
                                                    </div>
                                                    <div class="col-md-12" >
                                                        <label>ตอบกลับ : </label>
                                                        <label>ขอบุณที่เข้าใช้บรการ</label>
                                                    </div>
                                                    <div class="col-md-12" >
                                                        <div class="row">
                                                            <div class="col-md-2 offset-lg-10">
                                                                <button type="button" class="btn btn-warning" onclick="updatecomment('+data.orderId+')" id="search"><i class="fa fa-comments"></i>  เเก้ไข</i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Container fluid  -->

    <!-- reply modeal -->
    <div class="modal fade bd-example-modal-lg" id="comment-garage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
            <div class="modal-content modal-size-l">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ตอบกลับคอมเมนต์
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <!-- add comment -->
                        <form id="submit">
                            <div class="row">
                                <input type="hidden" id="replyrating" name="replyrating" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label required">คอมเมนต์</label>
                                        <textarea class="form-control textarea-l" id="commentgarage" name="commentgarage" rows="3"></textarea>
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> บันทึก</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- update modal -->
    <div class="modal fade bd-example-modal-lg" id="comment-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
            <div class="modal-content modal-size-l">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เเก้ไขคอมเมนต์
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <!-- update comment -->
                        <form id="update-comment">
                            <div class="row">
                                <input type="hidden" id="updaterating" name="updaterating" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label required">คอมเมนต์</label>
                                        <textarea class="form-control textarea-l" id="editcommentgarage" name="editcommentgarage" rows="3"></textarea>
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> บันทึก</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

