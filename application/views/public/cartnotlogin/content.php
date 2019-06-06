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
                    <a  href="<?=base_url("login") ?>"><button type="#" class="btn btn-orange"> ดำเนินการต่อ</button></a> 
                </div>
            </div>
		</div>
	</div>

</div>