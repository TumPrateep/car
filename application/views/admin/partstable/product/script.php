<script>
    
    $(document).ready(function () {
        var parts_table_id = $('#parts_table_id').val();
        var table = $('#tbl-product');
        $.get(base_url+"api/partsproductlist/getProductTableList", {
            "parts_table_id": parts_table_id
        },function (data, textStatus, jqXHR) {
            if(data.products){
                let products = data.products;
                let partstable = data.table;
                let table_product = data.table_product;

                let html = '<table class="table table-striped table-bordered">';
                html += '<tr class="text-center">';
                html += '<td></td>'
                $.each(partstable, function (i, v) { 
                    html += '<td>';
                    html += v.kilometre+' กม.';
                    html += '</td>';
                });
                html += '<td></td>'
                html += '</tr>';
                $.each(products, function (i, v) { 
                    html += '<tr>';
                    html += '<td>'+v.partsName+'</td>';
                    $.each(table_product[v.partId], function (ti, tv) { 
                        html += '<td>';
                        let status = false;
                        if(tv){
                            if(tv.status == 1){
                                status = true;
                            }
                        }
                        if(status){
                            html += '/';
                        }else{
                            html += '-';
                        }
                        html += '</td>';
                    });
                    html += '<td class="text-center"><a href="'+base_url+'admin/partstable/product_edit/'+parts_table_id+'/'+v.partId+'" type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a></td>';
                    html += '</tr>';
                });
                html += '</table>';
                table.html(html);
            }
        });
    });

</script>

</body>
</html>