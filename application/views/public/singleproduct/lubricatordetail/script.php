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
        var imagePath = baseImage+"lubricatordata/";
        $("#brand").html(data.lubricator_brandName);
        $("#productImage").attr("src", imagePath+data.lubricator_dataPicture);
        $("#brandImage").attr("src", baseImage+"lubricator_brand/"+data.lubricator_brandPicture);
        $("#productName").html(data.lubricator_brandName+" "+data.lubricatorName+" "+data.lubricator_number+" ขนาด "+data.capacity+" ลิตร");
        $("#showBrand").html(data.lubricator_brandName);
        $("#showModel").html(data.lubricatorName);
        $("#showBrand").html(data.lubricator_brandName);
        $("#showNumber").html(data.lubricator_number);
        $("#showType").html(data.lubricator_typeName);
        $("#showDistance").html(currency(data.lubricator_typeSize, { precision: 0 }).format()+' กม');
        $("#showWarranty").html(warranty(data.warranty, data.warranty_year, data.warranty_distance));
        $("#product_price").html(currency(data.price, { precision: 0 }).format()+" บาท");
    }
</script>
</body>
</html>