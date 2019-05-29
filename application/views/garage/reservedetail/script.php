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
                    picture = base_url+'public/image/lubricatorproduct/'+val.picture;
                    content = val.spares_undercarriageName; 
                    quantity = val.quantity;
                }else if(val.group == "spare"){
                    picture = base_url+'public/image/spareundercarriage/'+val.picture;
                    content = val.spares_undercarriageName; 
                    quantity = val.quantity;
                }
                html += '<tr>'
                            +'<td><img src="'+picture+'" width="80"/></td>'
                            +'<td>'+content+'</td>'
                            +'<td>'+quantity+'</td>'
                            // +'<td>'+currency((val.cost), {  precision: 0 }).format()+' บาท</td>'
                            +'</tr>';
            });
            table.html(html);
        }
    );
});
   
</script>




