<script>
    $("#submit").validate({
        rules: {
            lubricator_price: {
                required: true
            }
        },
        messages: {
            lubricator_price: {
                required: "กรอกราคาค่าบริการ",
                min: "กรุณากรอกราคาเต็มจำนวน"
            }
        },
    });

    var settings = $('form').validate().settings;

    init();

    function init(){
        $.get(base_url + "apigarage/garagegroup/getMaxPriceLubricatorlimitService", 
            function(data, textStatus, jqXHR) {
            let max_price = data.max;
            if (max_price) {
                $.extend(true, settings, {
                    rules: {
                        lubricator_price: {
                            required: true,
                            max: max_price
                        },
                    },
                    messages: {
                        lubricator_price: {
                            required: "กรอกราคาขอบยาง",
                            max: 'กรอกจำนวนเงินไม่เกิน ' + max_price + ' บาท'
                        }
                    },

                });
            }
        });
    }


    $("#submit").submit(function(){
        createlubricatorchangegarage();
    })

    function createlubricatorchangegarage(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apigarage/Lubricatorchange/createLubricatorchangegarage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/lubricator");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }

       

</script>