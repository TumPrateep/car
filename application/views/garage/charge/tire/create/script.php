<script>
$("#submit").validate({
    rules: {
        tire_price: {
            required: true
        },
        tire_rimId: {
            required: true
        }
    },
    messages: {
        tire_price: {
            required: "กรุณากรอกราคาขอบยาง",
        },
        tire_rimId: {
            required: "กรุณาเลือกขอบยาง"
        }
    },
});

var settings = $('form').validate().settings;

$('#tire_rimId').change(function(e) {
    e.preventDefault();
    let rimId = $(this).val();

    if (rimId) {
        $.get(base_url + "apigarage/garagegroup/getMaxPriceService", {
            'rimId': rimId
        }, function(data, textStatus, jqXHR) {
            let max_price = data.max;
            if (max_price) {
                $.extend(true, settings, {
                    rules: {
                        tire_price: {
                            required: true,
                            max: max_price
                        },
                    },
                    messages: {
                        tire_price: {
                            required: "กรอกราคาขอบยาง",
                            max: 'กรอกจำนวนเงินไม่เกิน ' + max_price + 'บาท'
                        }
                    },

                });
            }
        });
    }
});

$("#submit").submit(function() {
    createtirechange();
})

var tire_rim = $("#tire_rimId");

getRim();

function getRim(rimId = null) {
    $.get(base_url + "api/Rim/getAllRims", {},
        function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
            });
        }
    );
}

function createtirechange() {
    event.preventDefault();
    var isValid = $("#submit").valid();
    if (isValid) {
        var data = $("#submit").serialize();
        $.post(base_url + "apigarage/Tirechangegarage/createtirechange", data,
            function(data) {
                if (data.message == 200) {
                    showMessage(data.message, "garage/charge/tire/");
                } else {
                    showMessage(data.message, );
                }
            });

    }
}
</script>