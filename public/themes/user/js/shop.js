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
        myAlertTop();
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

    function myAlertTop(){
        $(".myAlert-top").show();
        $(".myAlert-top").css("z-index", "1000");
        setTimeout(function(){
          $(".myAlert-top").hide(); 
          $(".myAlert-top").css("z-index", "0");
        }, 2000);
    }

    function gotoDetail(group, productId){
        window.location.href = base_url+"shop/detail/"+group+"/"+productId;
    }

    $("#quantity_inc_button").click(function(){
        var quantity = $("#quantity_input");
        quantity.val(parseInt(quantity.val())+1);
    });

    $("#quantity_dec_button").click(function(){
        var quantity = $("#quantity_input");
        var number = parseInt(quantity.val());
        if(number > 1){
            quantity.val(parseInt(quantity.val())-1);
        }
    });

    var lubricatorLib = [
        "",
        "น้ำมันเครื่อง",
        "น้ำมันเกียร์ธรรมดา",
        "น้ำมันเกียร์ออโต"
    ];

    var lubricatorClass = [
        "",
        "secondary",
        "info",
        "success"
    ];

    function nullOrVal(value){
        if(value == null){
            return '<span>-</span>';
        }else{
            return value;
        }
    }

    function warranty(warranty, warranty_year, warranty_distance){
        var strWarranty = "";

        if(warranty_year != 0){
            strWarranty += warranty_year+" ปี ";
        }

        if(warranty != 0 && warranty != null){
            strWarranty += (warranty == 1)? "และ ":"หรือ ";
        }

        if(warranty_distance != 0){
            strWarranty += warranty_distance+" km";
        }

        if(strWarranty == ""){
            strWarranty = "-";
        }else{
            strWarranty = strWarranty;
        }

        return strWarranty;
    }

    function mailOrFitted(can_change){
        if(can_change == 1){
            return "เปลี่ยนทันที";
        }else{
            return "สั่งจอง";
        }
    }