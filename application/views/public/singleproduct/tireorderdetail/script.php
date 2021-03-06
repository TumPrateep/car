<script>
    var group = $("#group").val();
    var productId = $("#productId").val();

    $.post(base_url+"service/Cart/getDetail", {"group":group,"productId":productId}, 
        function (data, textStatus, jqXHR) {
            console.log(data);
            setProductDetail(data);
        }
    );

    function setProductDetail(data){
        var baseImage = base_url+"/public/image/";
        var imagePath = baseImage+"tireproduct/";
        $("#brand").html(data.tire_brandName);
        $("#productImage").attr("src", imagePath+data.picture);
        $("#brandImage").attr("src", baseImage+"tire_brand/"+data.tire_brandPicture);
        $("#productName").html(data.tire_brandName+" "+data.tire_modelName+" "+data.tire_size );
        $("#showBrand").html(data.tire_brandName);
        $("#showModel").html(data.tire_modelName);
        $("#showBrand").html(data.data);
        $("#showNumber").html(data.tire_size);
        // $("#showType").html(data.lubricator_typeName);
        $("#showDistance").html(currency(data.warranty_distance, { precision: 0 }).format()+' กม');
        $("#showWarranty").html(warranty(data.warranty, data.warranty_year, data.warranty_distance));
        $("#product_price").html(currency(data.price, { precision: 0 }).format()+" บาท");
        $("#warranty_year").html(changwarranty(data.warranty_year));
        $("#warranty_distance").html(changwarranty(data.warranty_distance));
        $("#warranty").html(choosewarranty(data.warranty));
    }
</script>
</body>
</html>