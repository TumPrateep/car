<script>

$(document).ready(function () {
    var cartDataDetail = [];
    $.post(base_url+"service/Cart/carDetail", {"cartData": cartData},
        function (data, textStatus, jqXHR) {
            cartDataDetail = data;
            showCart();
        }
    );

    function showCart(){
        var html = "";
        var cartList = $("#cart_list");
        cartData = JSON.parse(localStorage.getItem("data"));
        $.each(cartData, function( index, value ) {
            if(value.group == "lubricator"){
                html += getLubricator(value);
            }else if(value.group == "tire"){

            }else{

            }
        });
        
        cartList.html(html);
    }

    function getLubricator(value){
        var product = cartDataDetail["lubricator"][value.productId];
        var html = '<li class="cart_item clearfix">'
            +'<div class="cart_item_image"><img src="'+base_url+'public/image/lubricatordata/'+product.picture+'" alt=""></div>'
            +'<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">'
                +'<div class="cart_item_name cart_info_col">'
                    +'<div class="cart_item_title">Name</div>'
                    +'<div class="cart_item_text">'+product.brandName+' '+product.name+' '+product.lubricatorNumber+' 15W-60</div>'
                +'</div>'
        
                +'<div class="cart_item_quantity cart_info_col">'
                    +'<div class="cart_item_title">Quantity</div>'
                    +'<div class="cart_item_text">'
                        +'<div class="input-group mb-3 col-lg-6">'
                            +'<div class="input-group-prepend">'
                                +'<button class="btn btn-danger btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>'
                            +'</div>'
                            +'<input type="number" id="qty_input" class="form-control form-control-sm" value="'+value.number+'" min="1">'
                            +'<div class="input-group-prepend">'
                                +'<button class="btn btn-orange btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div class="cart_item_price cart_info_col">'
                    +'<div class="cart_item_title">Price</div>'
                    +'<div class="cart_item_text">'+currency((product.price*value.number), {  precision: 0 }).format()+' บาท</div>'
                +'</div>'
                +'<div class="cart_item_total cart_info_col">'
                    +'<div class="cart_item_title">Delete</div>'
                    +'<div class="cart_item_text ">'
                        +'<button type="button" class="btn btn-orange"><i class="fa fa-trash"></i></button>'
                    +'</div>'
                +'</div>'
                
            +'</div>'
        +'</li>';
        
        return html;
    }
    
});

</script>
</body>
</html>