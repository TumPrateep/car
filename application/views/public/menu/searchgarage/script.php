<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script>
$(document).ready(function () {
    var brand =$("#brandId");

    var province = $("#provinceIdSearch");
    var district = $("#districtIdSearch");
    var subdistrict = $("#subdistrictIdSearch");

    $('[data-toggle="tooltip"]').tooltip()

    var latitude = null;
    var longitude = null;
    
    init();

    function init(){
        getLocation();
        getProvince();
        getAllBrand();
    }

    function getLocation() {
        $("#sort option[value='3']").remove();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
                $("#sort").append('<option value="3">ระยะทางน้อย-มาก</option>');
                lenderTable();
            }, function(error) {
                latitude = null;
                longitude = null;
                lenderTable();
                alert('ไม่สามารถดึงตำแหน่งปัจจุบันได้');         
            },{timeout:5000});
        } else {
            alert("ไม่สามารถดึงตำแหน่งปัจจุบันได้");
            lenderTable();
        }
    }

    function getProvince(){
        $.post(base_url + "service/Location/getProvince", {},
            function(data) {
                var provinceData = data.data;
                $.each(provinceData, function(index, value) {
                    province.append('<option value="' + value.provinceId + '">' + value.provinceName + '</option>');
                });
            }
        );
    }

    province.change(function(){
        var provinceId = $(this).val();
        getDistrict(provinceId);
    });

    function getDistrict(provinceId){
        district.html("");
        district.append('<option value="">เลือกอำเภอ</option>');
        subdistrict.html("");
        subdistrict.append('<option value="">เลือกตำบล</option>');
        $.post(base_url + "service/Location/getDistrict", {
            provinceId: provinceId
        },function(data) {
            var districtData = data.data;
            $.each(districtData, function(index, value) {
                district.append('<option value="' + value.districtId + '">' + value.districtName + '</option>');
            });
        });
    }

    district.change(function(){
        var districtId = $(this).val();
        getSubDistrict(districtId);
    });

    function getSubDistrict(districtId){
        subdistrict.html("<option value=''>เลือกตำบล</option>");
        $.post(base_url + "service/Location/getSubdistrict", {
            districtId: districtId
        },function(data) {
            var subDistrictData = data.data;
            $.each(subDistrictData, function(index, value) {
                subdistrict.append('<option value="' + value.subdistrictId + '">' + value.subdistrictName + '</option>');
            });
        });
    }   

    function getAllBrand(){
        brand.html("<option value=''>เลือกยี่ห้อรถ</option>");
        $.get(base_url + "service/Brandcar/getAllBrand", {
        },function(data) {
            var brandData = data.data;
            $.each(brandData, function(index, value) {
                brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
            });
        });
    }

    function changeStringToDay(str){
        var html = "";
        var day = ["จ","อ","พ","พฤ","ศ","ส","อา"];

        for(var i=0;i<str.length;i++){   // 1111011
            if(str.charAt(i) == "1"){
                html += day[i]+", ";
            }
        }
        return html.substring(0, html.length - 2);
    }
    var table;
    function lenderTable(){
        table = $('#search-table').DataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "sProcessing":   "กำลังดำเนินการ...",
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดงสินค้า _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบข้อมูล",
                "infoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "lengthMenu": "_MENU_ รายการ",
                "zeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก", // This is the link to the first page
                    "sPrevious": "ก่อนหน้า", // This is the link to the previous page
                    "sNext": "ถัดไป", // This is the link to the next page
                    "sLast": "หน้าสุดท้าย" // This is the link to the last page
                }
            },
            "responsive": true,
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "orderable": false,
            "pageLength": 8,
            "ajax":{
                "url": base_url+"service/garages/searchgarage",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.garagename = $("#garagename").val();
                    data.provinceIdSearch =$("#provinceIdSearch").val();
                    data.districtIdSearch= $("#districtIdSearch").val();
                    data.subdistrictIdSearch = $("#subdistrictIdSearch").val();
                    data.brandId = $("#brandId").val();
                    data.service = $("#Service").val();
                    data.latitude = latitude;
                    data.longitude = longitude;
                    data.sort = $("#sort").val();
                }
            },
            "columns": [
                null
            ],
            "columnDefs": [
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '<div class="row">';
                        var imagePath = base_url+"/public/image/garage/";

                        $.each(data, function( index, value ) {
                            
                            // var serviceall = '';
                            // var servicetype = ['<div><span class="text-service">•</span> ซ่อมช่วงล่าง',' <span class="text-service">•</span> เปลี่ยนยางรถ</div>','<div><span class="text-service">•</span> เปลี่ยนถ่ายน้ำมันเครื่อง</div>'];
                            // var servicegarage = value.garageService ;

                            // for(var i=0;i<servicegarage.length;i++){
                            //     if(servicegarage.charAt(i) == "1"){
                            //         serviceall += servicetype[i] ;
                            //     }
                            // }

                            var option = '';
                        
                                if(value.option1 ==1){
                                    option +='<span class="border-option btn-sm " data-toggle="tooltip" data-placement="top" title="มี Wifi"><i class="fas fa-wifi"></i></span>';
                                }else if(value.option == null){option +='';}
                                if(value.option2 ==2){
                                    option +='<span class="border-option btn-sm" data-toggle="tooltip" data-placement="top" title="มีห้องพักพัดม"><i class="fab fa-yelp"></i></span>';
                                }else if(value.option2 == null){option +='';}
                                if(value.option3 ==3){
                                    option +='<span class="border-option btn-sm" data-toggle="tooltip" data-placement="top" title="มีห้องพักเเอร์"><i class="far fa-snowflake"></i></span>';
                                }else if(value.option3 == null){option +='';}
                                if(value.option4 ==4){
                                    option +='<span class="border-option btn-sm"      data-toggle="tooltip" data-placement="top" title="มีห้องน้ำ"><i class="fas fa-bath"></i></span><div></div>';
                                }else if(value.option4 == null){option +='';}

                            html += '<div class="col-md-4">'
                                    + '<div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">'
                                        + '<div>'
                                            + '<div class="" style="width: 100%; display: inline-block;">'
                                                + '<div class="border_active active"></div>'
                                                + '<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">'
                                                    + '<div class="product_image d-flex flex-column align-items-center justify-content-center" onclick=""><img src="'+imagePath+value.picture+'"></div>'
                                                    + '<div class="product_content">'
                                                        + '<div onclick="">'
                                                            + '<div class="garage-distance distance">'+distance(value.latitude, value.longitude, latitude, longitude, "K")+'</div>'
                                                            + '<div class="garage-name-txt">'+value.garageName+'</div>'
                                                            + '<div><span title="'+changeStringGS(value.garageService)+'">'+substr(changeStringGS(value.garageService))+'</span></div>'
                                                            // + '<div>'+serviceall+'</div>'
                                                            + '<div><span class="error">เปิด</span> '+changeStringToDay(value.dayopenhour)+'<br>'+value.opentime+'</div>'
                                                            + '<div class="option-garage">'+option+'</div>'
                                                            // + '<a href="https://www.google.com/maps/?q='+value.latitude+','+value.longitude+'" target="_blank"><button class="btn btn-danger btn-sm"><i class="fas fa-location-arrow"></i>...Maps</button></a>'
                                                             + '<a href="'+base_url+"comment/"+value.garageId+'" target="_blank"><button class="btn btn-info btn-sm rat-garage">คะเเนนเเละรีวิว</button></a>'
                                                            + '<a href="https://www.google.com/maps/?q='+value.latitude+','+value.longitude+'" target="_blank"><button class="btn btn-danger btn-sm"><i class="fas fa-location-arrow"></i>...Maps</button></a>'
                                                        + '</div>'
                                                        // + '<div class="product_extras"><button class="product_cart_button" tabindex="0" onclick=""><i class="fas fa-shopping-bag"></i> รายละเอียด</button></div>'
                                                    + '</div>'
                                                // + '</div>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                        });

                        html += '</div>';
                        return html;
                    }
                }
            ]
        });
    }

    $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })
});
</script>

</body>
</html>
