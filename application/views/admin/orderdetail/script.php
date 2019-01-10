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
                if(val.group == "tire"){

                }else if(val.group == "lubricator"){

                }else if(val.group == "spare"){
                    picture = base_url+'public/image/spareundercarriage/'+val.picture;
                    content = '<h1>'+val.spares_undercarriageName+'</h1>'; 
                }

                html += '<tr>';
                    html += '<td>';
                    html += '<img src="'+picture+'" />';
                    html += '</td>';
                    html += '<td>';
                    html += content;
                    html += '</td>';
                html += '</tr>';
            });
            table.html(html);
        }
    );
});
   
</script>

</body>
</html>