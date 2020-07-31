<script>
    $("#submit").validate({
        rules: {
            lubricator_price: {
                required: true
            },
            machine_id:{
                required: true
            }
        },
        messages: {
            lubricator_price: {
                required: "กรอกราคาค่าบริการ",
                min: "กรุณากรอกราคาเต็มจำนวน"
            },
            machine_id:{
                required: "เลือกชนิดน้ำมันเครื่อง/เกียร์"
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
                        machine_id:{
                            required: true
                        }
                    },
                    messages: {
                        lubricator_price: {
                            required: "กรอกราคาขอบยาง",
                            max: 'กรอกจำนวนเงินไม่เกิน ' + max_price + ' บาท'
                        },
                        machine_id:{
                            required: "เลือกชนิดน้ำมันเครื่อง/เกียร์"
                        }
                    },

                });
            }
        });
    }

    var machine = $("#machine_id");

    getMachine();

    function getMachine(){
        machine.html('<option value="">เลือกชนิดน้ำมันเครื่อง/เกียร์</option>');
        $.get(base_url+"api/machine/getAllmachine",{},
            function(data){
                var machineData = data.data;
                $.each( machineData, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });
            }
        );
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