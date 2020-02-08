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
var tire_changeId = $("#tire_changeId").val();
$("#submit").submit(function() {
    updatetireChang();
})


function updatetireChang() {
    event.preventDefault();
    var isValid = $("#submit").valid();

    if (isValid) {
        var data = $("#submit").serialize();
        $.post(base_url + "apigarage/Tirechangegarage/update", data,
            function(data) {
                if (data.message == 200) {
                    showMessage(data.message, "garage/charge/tire");
                } else {
                    showMessage(data.message);
                }
            });

    }
}

$.get(base_url + "apigarage/Tirechangegarage/getTireChange", {
    "tire_changeId": tire_changeId
}, function(data) {
    var tireChange = data.data;
    getRim(tireChange.rimId);
    getMaxPrice(tireChange.rimId)
    $("#tire_price").val(tireChange.tire_price);
});

function getMaxPrice(rimId) {
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
                            max: 'กรอกจำนวนเงินไม่เกิน' + max_price
                        }
                    },

                });
            }
        });
    }
}

var tire_rim = $("#tire_rimId");

function getRim(rimId = null) {
    $.get(base_url + "api/Rim/getAllRims", {},
        function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
            });
            tire_rim.val(rimId);
        }
    );
}
</script>