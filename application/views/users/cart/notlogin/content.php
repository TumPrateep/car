<style>
*,
::after,
::before {
    box-sizing: border-box;
}

.pt-10{
    padding: 10px;
}

ul.pagination li a {
    font-size: 13px;
}

table>thead {
    display: none;
}

.btn-result {
    padding: 7px 7px 7px 7px;
}

div.brand img {
    margin: 45px 0px 0px 0px;
    width: 100%;
    height: auto;
}

.card-body.order {
    background-color: #ff6600;
    color: aliceblue;
    padding: 0.5rem;
}

.card.pointer {
    cursor: pointer;
}

.order>h5 {
    color: white !important;
}

.footer.order {
    background-color: #343a40;
    color: white;
}

.detail {
    width: -webkit-fill-available !important;
}

input[type="checkbox"] {
    width: 30px;
    height: 30px;
}

.btn-fb {
    padding: 15px 20px;
    background: #ffffff;
    outline: none;
    font-size: 0.9375rem;
    color: #222222;
    border: 2px solid #e5e5e5;
    border-radius: 6;
}

.btn-fb:hover {
    background-color: #3b5998;
}

.btn-google {
    padding: 15px 20px;
    background: #ffffff;
    outline: none;
    font-size: 0.9375rem;
    color: #222222;
    border: 2px solid #e5e5e5;
    border-radius: 6;
}

.btn-google:hover {
    background-color: #dd4b39;
}

.hide {
    display: none;
}

.google-button {
    height: 40px;
    width: 100%;
    border-width: 0;
    background: white;
    color: #737373;
    border-radius: 5px;
    white-space: nowrap;
    box-shadow: 1px 1px 0px 1px rgba(0, 0, 0, 0.05);
    transition-property: background-color, box-shadow;
    transition-duration: 150ms;
    transition-timing-function: ease-in-out;
    padding: 0;
}

.google-button__icon {
    display: inline-block;
    vertical-align: middle;
    margin: 0px 0 8px 8px;
    width: 18px;
    height: 18px;
    box-sizing: border-box;
}

.form-control{
    margin-bottom: 10px;
}

</style>
<section class="section pricing" id="search">
    <div class="container">
        <div id="boby">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3>ตะกร้า<span class="alternate">สินค้า</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">  
                    <table class="table table-hover" id="cart-table">
                        <tbody id="cart_list"></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right"><div class="row"><div class="col-9"><span class="font-italic">ราคารวมสินค้าในตะกร้า : </span></div><div class="col"><span class="font-italic" id="total-amount"></span></div></div></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-right"><div class="row"><div class="col-9"><span class="amount">ราคารวม : </span></div><div class="col"><span class="amount alternate" id="order_total_amount"></span></div></div></th>
                            </tr>
                        </tfoot>
                    </table>                 
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <button class="btn btn-main-md width-100p bg-orange" onclick="gotoLogin()"> จองวันเข้าใช้บริการ</button> 
                </div>
            </div>
            <br>
        </div>
	</div>
</section>