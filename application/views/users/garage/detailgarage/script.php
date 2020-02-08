<script>
$(document).ready(function() {
    var garageId = $('#garageId').val();

    init();

    function init() {
        getGarageData();
    }

    function getGarageData() {
        $.get(base_url + "service/garages/getGarageById", {
            'garageId': garageId
        }, function(res, textStatus, jqXHR) {
            let garage = res.garage;
            let owner = res.owner;
            if (garage) {
                let addressHtml =
                    'บ้านเลขที่ ' + garage.hno +
                    ' ตำบล' + garage.subdistrictName + ' อำเภอ' + garage.districtName +
                    ' จังหวัด' + garage.provinceName + ' ' + garage.postCode;
                $('#txt-address').html(addressHtml);
            }

            if (owner) {
                let ownerHtml =
                    '<span>' + owner.titleName + ' ' + owner.firstName +
                    ' ' + owner.lastName +
                    '</span><br><span><i class="fa fa-phone" aria-hidden="true"></i> ' + owner.phone +
                    '</span>'
                $('#txt-owner').html(ownerHtml);
            } else {
                $('#txt-owner').html(' - ');
                $('#box-owner').hide();
            }
        });
    }
});
</script>