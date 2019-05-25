<div class="shop">
	<div class="container">
		<!-- <h3>จองซ่อมอู่</h3> -->
		<div class="row">
			
            <!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
            <div class="col-md-12">  
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover" id="cart-table">
                            <thead class="orange-table">
                                <tr >
                                    <th width="5%" scope="col"></th>
                                    <th width="10%" scope="col">รูปสินค้า</th>
                                    <th width="20%" scope="col">ชื่อสินค้า</th>
                                    <th width="15%" scope="col">ราคาต่อหน่วย</th>
                                    <th width="20%" scope="col">จำนวน</th>
                                    <th width="15%" scope="col">ราคารวม</th>
                                    <th width="10%" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="cart_list"></tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right"><span class="amount">ราคาสินค้า :</span></th>
                                    <th colspan="2" class="text-right"><span class="amount" id="order_total_cost"></span></th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right"><span class="amount">ราคาค่าขนส่ง :</span></th>
                                    <th colspan="2" class="text-right"><span class="amount" id="order_total_delivery"></span></th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right"><span class="amount">ราคารวม :</span></th>
                                    <th colspan="2" class="text-right"><span class="amount" id="order_total_amount"></span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div><br>
                <div class="col-12 offset-md-10">
                    <button type="#" class="btn btn-orange" onclick="confirm_order()"> ดำเนินการต่อ</button>
                </div>
            </div>
		</div>
	</div>

    <div class="modal fade bd-example-modal-lg" id="confirm-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog modal-lg mw-500" id="maxWidthSelect" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ยืนยันการทำรายการ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="selectGarage">
                        <!-- add comment -->
                        <form id="submit">
                            <div class="row">
                                <input type="hidden" id="orderId" name="orderId" value="">
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">คุณยังไม่ได้ล็อคอินเข้าสู่ระบบ </h5>
                                            <p class="card-text ">กรุณากดปุ่ม "ดำเนินการต่อ" เพื่อลงทะเบียนเเละล็อคอินเข้าสู่ระบบเพื่อทำการยืนยันการซื้อสินค้า </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="modal-footer">
                                <a href="<?=base_url("register");?>"><button type="button" class="btn btn-orange"><span class="fas fa-check"></span> ดำเนินการต่อ</button></a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-times"></span> ปิด</button>
                            </div>
                        </div>
                        </form>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>