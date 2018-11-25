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
        var imagePath = baseImage+"spareundercarriage/";
        // $("#brand").html(data.tire_brandName);
        $("#productImage").attr("src", imagePath+data.spares_undercarriageDataPicture);
        // $("#brandImage").attr("src", baseImage+"spareundercarriage/"+data.tire_brandPicture);
        $("#productName").html(data.spares_brandName+" "+data.spares_undercarriageName );
        $("#showBrand").html(data.spares_brandName);
        $("#showModel").html(data.spares_undercarriageName);
        $("#showBrand").html(data.data);
        $("#showNumber").html(data.brandName);
        $("#showType").html(data.modelName);
        $("#year").html(data.year);
        $("#warranty_year").html(changwarranty(data.warranty_year));
        $("#warranty_distance").html(changwarranty(data.warranty_distance));
        $("#warranty").html(choosewarranty(data.warranty));
        // $("#showDistance").html(currency(data.warranty_distance, { precision: 0 }).format()+' กม');
        // $("#showWarranty").html(warranty(data.warranty, data.warranty_year, data.warranty_distance));
        $("#product_price").html(currency(data.price, { precision: 0 }).format()+" บาท");
    }
</script>
</body>
</html>