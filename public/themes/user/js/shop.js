    var data = [];
    var numberOfCart = 0;
    var cartCount = $("#cart_count");
    function setCart(group, productId){
        setProductData(group, productId, 1)
        setNumberOfCart();
    }

    function setProductData(group, productId, number){
        var index = data.findIndex(x => (x.productId === productId && x.group === group));
        if(index >= 0){
            data[index].number += 1;
        }else{
            var product = {
                "productId": productId,
                "number": number,
                "group": group 
            };
            data.push(product);
            localStorage.setItem("data", JSON.stringify(data));
        }
    } 

    function setNumberOfCart(){
        console.log(data);
        numberOfCart = data.length;
        cartCount.html(numberOfCart);
    }

    $(document).ready(function () {
        data = JSON.parse(localStorage.getItem("data"));
        if(data == null || data == undefined){
            data = [];
        }
        setNumberOfCart();
    });