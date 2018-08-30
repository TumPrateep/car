<script>
    var base_url = "<?=base_url() ?>";
    var picturePath = base_url+"public/image/"
    var roleNameLib = [
        "",
        "ผู้ดูแลระบบ",
        "ร้านอะไหล่",
        "อู่",
        "ผู้ใช้งาน"
    ];
    var statusNameLib = [
        "",
        "เปิดใช้งาน",
        "ปิดใช้งาน"
    ];

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

        if(warranty != 0){
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

</script>