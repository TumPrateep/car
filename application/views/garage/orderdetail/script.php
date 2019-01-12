<script>

$(document).ready(function () {
    var table = $("#showOrder");
    var orderId = $("#orderId").val();
    $.get(base_url+"service/Orderdetail/orderDetail?orderId="+orderId, {},
        function (data, textStatus, jqXHR) {
            var html = '';
            $.each(data, function (index, val) { 
                var picture = "";
                var content = "";
                var quantity = "";

                if(val.group == "tire"){

                }else if(val.group == "lubricator"){

                }else if(val.group == "spare"){
                    picture = base_url+'public/image/spareundercarriage/'+val.picture;
                    content = val.spares_undercarriageName; 
                    quantity = val.quantity;
                }

                html += '<tr>';
                    html += '<td>';
                    html += '<img src="'+picture+'" />';
                    html += '</td>';
                    html += '<td>';
                    html += content;
                    html += '</td>';
                    html += '<td>';
                    html += quantity;
                    html += '</td>';
                html += '</tr>';
    //  var html = '<li class="cart_item clearfix">'
    //     +'<div class="cart_item_image"><a href="'+base_url+'shop/detail/spare/'+value.productId+'"><img src="'+base_url+'public/image/spareundercarriage/'+product.picture+'" alt=""></a></div>'
    //     +'<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">'
    //         +'<div class="cart_item_name cart_info_col">'
    //             +'<div class="cart_item_title">ชื่อสินค้า</div>'
    //             +'<div class="cart_item_text"><a href="'+base_url+'shop/detail/spare/'+value.content+'">'+product.spares_brandName+' '+product.spares_undercarriageName+' '+product.brandName+' '+product.modelName+' '+product.year+'</a></div>'
    //         +'</div>'
    
    //         +'<div class="cart_item_quantity cart_info_col">'
    //             +'<div class="cart_item_title">จำนวน</div>'
    //             +'<div class="cart_item_text">'
    //                 +'<div class="input-group mb-3 col-lg-6">'
    //                     +'<input type="number" class="form-control form-control-sm qty_input" value="'+value.quantity+'" min="1" onblur="setNumber('+index+', this)">'
    //                 +'</div>'
    //             +'</div>'
    //         +'</div>'
    //     +'</div>'
    // +'</li>';
            });
            table.html(html);
        }
    );
});
   
</script>

</body>
</html>