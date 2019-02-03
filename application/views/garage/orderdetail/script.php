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

                // html += '<tr>';
                //     html += '<td>';
                //     html += '<img src="'+picture+'" />';
                //     html += '</td>';
                //     html += '<td>';
                //     html += content;
                //     html += '</td>';
                //     html += '<td>';
                //     html += quantity;
                //     html += '</td>';
                // html += '</tr>';

                         html += '<tr>'
                            +'<td><img src="'+picture+'" width="80"/></td>'
                            +'<td>'+content+'</td>'
                            +'<td>'+quantity+'</td>'
                            
                            +'</tr>';
            });
            table.html(html);
        }
    );
});
   
</script>

</body>
</html>