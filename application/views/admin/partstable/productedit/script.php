<script>
    
    $(document).ready(function () {
        var parts_table_id = $('#parts_table_id').val();
        var partId = $('#partId').val();
        var form = $('#submit');

        $.get(base_url+"api/partsproductlist/getProducts", { parts_table_id: parts_table_id, partId: partId },
            function (data, textStatus, jqXHR) {
                let list = data.list;
                let html = '';
                $.each(list, function (i, v) { 
                     html += '<div class="form-check">'
                        +'<input class="form-check-input" type="checkbox" value="'+v.parts_table_list_id+'" name="table_list[]" id="check-'+v.parts_table_list_id+'">'
                        +'<label class="form-check-label font-20" for="check-'+v.parts_table_list_id+'">'
                            +v.kilometre + ' กม.'
                        +'</label>'
                    +'</div>';
                });
                $('#product-id').html(html);

                let products = data.products;
                $.each(products, function (i, v) { 
                     $('#check-'+v.parts_table_list_id).prop("checked", true);
                });
            }
        );

        form.submit(function (e) { 
            e.preventDefault();
            let table_list_id = $('input:checkbox:checked').map(function(){
                return this.value; 
            }).get();
            
            $.post(base_url+"api/partsproductlist/create",{
                partId: partId,
                table_list_id: table_list_id
            },
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partstable/product/"+parts_table_id);
                }else{
                    showMessage(data.message,);
                }
            });
        });
        
    });

</script>

</body>
</html>