    var cartData = [];
    var numberOfCart = 0;
    var cartCount = $("#cart_count");
    function setCart(group, productId){
        setProductData(group, productId, 1)
        setNumberOfCart();
    }

    function setProductData(group, productId, number){
        var index = cartData.findIndex(x => (x.productId === productId && x.group === group));
        if(index >= 0){
            cartData[index].number += 1;
        }else{
            var product = {
                "productId": productId,
                "number": number,
                "group": group 
            };
            cartData.push(product);
        }
        localStorage.setItem("data", JSON.stringify(cartData));
    }

    

    function setNumberOfCart(){
        console.log(cartData);
        numberOfCart = cartData.length;
        cartCount.html(numberOfCart);
    }

    $(document).ready(function () {
        cartData = JSON.parse(localStorage.getItem("data"));
        if(cartData == null || cartData == undefined){
            cartData = [];
        }
        setNumberOfCart();
    });