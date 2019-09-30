$(document).ready(function() {
    tire();

    function render(data) {
        var title = $("#title");
        var content = $("#content");

        title.html(data.title);
        content.html(data.content);
    }

    function tire() {
        var data = {
            title: 'ยางรถยนต์',
            content: '<div class="row"><div class="col-md-6"><!-- Pricing Item --><div class="pricing-item"><div class="pricing-heading"><!-- Title --><div class="title"><h6>ค้นหาจากข้อมูลรถ</h6></div></div><div class="pricing-body"><div class="form-group"><select class="form-control main" id="brandId"><option>ยี่ห้อรถยนต์</option></select></div><div class="form-group"><select class="form-control main" id="model_name"><option>รุ่นรถยนต์</option></select></div><div class="form-group"><select class="form-control main" id="year"><option>ปีผลิต</option></select></div><div class="form-group"><select class="form-control main" id="modelofcarId"><option>รายละเอียดรุ่น</option></select></div><div class="text-center"><button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button></div></div></div></div><div class="col-md-6"><!-- Pricing Item --><div class="pricing-item"><div class="pricing-heading"><!-- Title --><div class="title"><h6>ค้นหาจากขนาดยาง</h6></div></div><div class="pricing-body"><div class="form-group"><select class="form-control main"><option>ยี่ห้อยาง</option></select></div><div class="form-group"><select class="form-control main"><option>รุ่นยาง</option></select></div><div class="form-group"><select class="form-control main"><option>ขอบยาง</option></select></div><div class="form-group"><select class="form-control main" id="select-ticket"><option>ขนาดยาง</option></select></div><div class="text-center"><button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button></div></div></div></div></div>'
        }
        render(data);
    }

    $("#1").click(function(e) {
        removeActive();
        $(this).addClass("active");
        tire();
    });

    $("#2").click(function(e) {
        removeActive();
        $(this).addClass("active");
        var data = {
            title: 'น้ำมันเกียร์',
            content: '<div class="row"><div class="col-md-6"><!-- Pricing Item --><div class="pricing-item"><div class="pricing-heading"><!-- Title --><div class="title"><h6>ค้าหาจากข้อมูลรถ</h6></div></div><div class="pricing-body"><div class="form-group"><select class="form-control main"><option>ยี่ห้อรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>รุ่นรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>ประเภทเครื่องยนต์</option></select></div><div class="form-group"><select class="form-control main" id="select-ticket"><option>ชนิดเกียร์</option></select></div><div class="text-center"><button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button></div></div></div></div></div>'
        }
        render(data);
    });

    $("#3").click(function(e) {
        removeActive();
        $(this).addClass("active");
        var data = {
            title: 'โช๊คอัพ',
            content: '<div class="row"><div class="col-md-6"><!-- Pricing Item --><div class="pricing-item"><div class="pricing-heading"><!-- Title --><div class="title"><h6>ค้าหาจากข้อมูลรถ</h6></div></div><div class="pricing-body"><div class="form-group"><select class="form-control main"><option>ยี่ห้อรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>รุ่นรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>ปีผลิต</option></select></div><div class="form-group"><select class="form-control main" id="select-ticket"><option>รายละเอียดรุ่น</option></select></div><div class="text-center"><button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button></div></div></div></div></div>'
        }
        render(data);
    });

    $("#4").click(function(e) {
        removeActive();
        $(this).addClass("active");
        var data = {
            title: 'แบตเตอรี่',
            content: '<div class="row"><div class="col-md-6"><!-- Pricing Item --><div class="pricing-item"><div class="pricing-heading"><!-- Title --><div class="title"><h6>ค้าหาจากข้อมูลรถ</h6></div></div><div class="pricing-body"><div class="form-group"><select class="form-control main"><option>ยี่ห้อรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>รุ่นรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>ปีผลิต</option></select></div><div class="form-group"><select class="form-control main" id="select-ticket"><option>รายละเอียดรุ่น</option></select></div><div class="text-center"><button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button></div></div></div></div></div>'
        }
        render(data);
    });

    $("#5").click(function(e) {
        removeActive();
        $(this).addClass("active");
        var data = {
            title: 'ผ้าเบรค',
            content: '<div class="row"><div class="col-md-6"><!-- Pricing Item --><div class="pricing-item"><div class="pricing-heading"><!-- Title --><div class="title"><h6>ค้าหาจากข้อมูลรถ</h6></div></div><div class="pricing-body"><div class="form-group"><select class="form-control main"><option>ยี่ห้อรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>รุ่นรถยนต์</option></select></div><div class="form-group"><select class="form-control main"><option>ปีผลิต</option></select></div><div class="form-group"><select class="form-control main" id="select-ticket"><option>รายละเอียดรุ่น</option></select></div><div class="text-center"><button class="btn btn-transparent-md"><i class="fa fa-search"></i> ค้นหา</button></div></div></div></div></div>'
        }
        render(data);
    });

    $("#6").click(function(e) {
        removeActive();
        $(this).addClass("active");
        var data = {
            title: 'อู่ใกล้เคียง',
            content: ''
        }
        render(data);
    });

    function removeActive() {
        $(".active").removeClass("active");
    }

});