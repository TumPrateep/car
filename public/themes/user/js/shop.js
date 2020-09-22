    var cartData = [];
    var numberOfCart = 0;
    var cartCount = $("#cart_count");

    function setCart(group, productId, select, garageId) {
        setProductData(group, productId, select, garageId)
        setNumberOfCart();
    }

    function setProductData(group, productId, selected, garageId) {
        var number = $(selected).val();
        var index = cartData.findIndex(x => (x.productId === productId && x.group === group));
        if (index >= 0) {
            cartData[index].number += parseInt(number);
        } else {
            var product = {
                "productId": productId,
                "number": parseInt(number),
                "group": group,
                "garageId": garageId
            };
            cartData.push(product);
        }
        localStorage.setItem("data", JSON.stringify(cartData));
        // myAlertTop();
        synchroData();
        fly(selected);
    }

    function synCartData(path = '') {
        var userId = localStorage.getItem("userId");
        if (userId != null) {
            localStorage.data = JSON.stringify([]);
            $.post(base_url + "service/Cart/getUserCart", {},
                function(data) {
                    // console.log(data);
                    if (data.length > 0) {
                        cartData = [];
                        $.each(data, function(index, value) {
                            var product = {
                                "productId": value.productId,
                                "number": parseInt(value.quantity),
                                "group": value.group,
                                "garageId": value.garageId
                            };
                            cartData.push(product);
                        });
                    }
                    localStorage.setItem("data", JSON.stringify(cartData));
                    if (path) {
                        window.location = path;
                    }
                }
            );
        }
    }

    function synLogin(path) {
        var userId = localStorage.getItem("userId");
        if (userId != null) {
            $.post(base_url + "service/Cart/createCart", { "cartData": cartData }, function(data) {
                console.log(data);
                synCartData(path)
            });
        }
    }

    // function setCartItem(productId, role) {
    //     var quantity = $("#quantity_input").val();
    //     $.each(cartData, function(key, value) {
    //         if (value.productId == productId && value.group == role) {
    //             cartData[key].number = parseInt(quantity);
    //             localStorage.setItem("data", JSON.stringify(cartData));
    //             setNumberOfCart();
    //             return false;
    //         }
    //     });
    //     var index = cartData.findIndex(x => (x.productId === productId && x.group === group));
    //     if (index >= 0) {
    //         cartData[index].number = parseInt(quantity);
    //     } else {
    //         var product = {
    //             "productId": productId,
    //             "number": quantity,
    //             "group": role
    //         };
    //         cartData.push(product);
    //     }
    //     localStorage.setItem("data", JSON.stringify(cartData));
    //     setNumberOfCart();
    // }

    function setNumberOfCart() {
        console.log(cartData);
        var count = 0;
        $.each(cartData, function(index, value) {
            count += parseInt(value.number);
        });
        numberOfCart = count;
        cartCount.html(numberOfCart);
        // synchroData();
    }

    $(document).ready(function() {
        cartData = JSON.parse(localStorage.getItem("data"));
        if (cartData == null || cartData == undefined) {
            cartData = [];
        }
        setNumberOfCart();
    });

    // function myAlertTop(){
    //     $(".myAlert-top").show();
    //     $(".myAlert-top").css("z-index", "1000");
    //     setTimeout(function(){
    //       $(".myAlert-top").hide(); 
    //       $(".myAlert-top").css("z-index", "0");
    //     }, 2000);
    // }

    function fly(select) {
        if (select != null) {
            $("#modal-cart").modal('show');
        }
    };

    function gotoDetail(group, productId) {
        window.location.href = base_url + "shop/detail/" + group + "/" + productId;
    }

    $("#quantity_inc_button").click(function() {
        var quantity = $("#quantity_input");
        quantity.val(parseInt(quantity.val()) + 1);
    });

    $("#quantity_dec_button").click(function() {
        var quantity = $("#quantity_input");
        var number = parseInt(quantity.val());
        if (number > 1) {
            quantity.val(parseInt(quantity.val()) - 1);
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

    function nullOrVal(value) {
        if (value == null) {
            return '<span>-</span>';
        } else {
            return value;
        }
    }

    function warranty(warranty, warranty_year, warranty_distance) {
        var strWarranty = "";

        if (warranty_year != 0) {
            strWarranty += warranty_year + " ปี ";
        }

        if (warranty != 0 && warranty != null) {
            strWarranty += (warranty == 1) ? "และ " : "หรือ ";
        }

        if (warranty_distance != 0) {
            strWarranty += warranty_distance + " km";
        }

        if (strWarranty == "") {
            strWarranty = "-";
        } else {
            strWarranty = strWarranty;
        }

        return strWarranty;
    }

    function mailOrFitted(can_change) {
        if (can_change == 1) {
            return "เปลี่ยนทันที";
        } else {
            return "สั่งจอง";
        }
    }

    function synchroData() {
        var userId = localStorage.getItem("userId");
        if (userId != null) {
            $.post(base_url + "service/Cart/createCart", { "cartData": cartData }, function(data) {
                console.log(data);
            });
        }
    }