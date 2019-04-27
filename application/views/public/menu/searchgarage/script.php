<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script>
$(document).ready(function () {
    var brand =$("#brandId");

    var province = $("#provinceIdSearch");
    var district = $("#districtIdSearch");
    var subdistrict = $("#subdistrictIdSearch");

    var latitude = null;
    var longitude = null;
    
    init();

    function init(){
        getLocation();
        getProvince();
        getAllBrand();
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
                lenderTable();
            }, function(error) {
                latitude = null;
                longitude = null;
                lenderTable();
                alert('ไม่สามารถดึงตำแหน่งปัจจุบันได้');         
            },{timeout:5000});
        } else {
            alert("ไม่สามารถดึงตำแหน่งปัจจุบันได้");
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
        district.html("<option value=''>เลือกอำเภอ</option>");
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
        $.get(base_url + "service/BrandCar/getAllBrand", {
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
                    "render": function ( data, type, full, meta, value ) {
                        var html = '<div class="row">';
                        var imagePath = base_url+"/public/image/garage/";

                        var  orderstatus = '111';
                        
                            // if(value.option1 ==1){
                            //     orderstatus +='88';
                            // }else if(data.option1 == null){
                            //     orderstatus +='99';
                            // }

                            // orderstatus += '</span>';
                        console.log(data.option1);
                           
                        

                        $.each(data, function( index, value ) {
                        html += '<div class="col-md-4">'
                                + '<div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">'
                                    + '<div>'
                                        + '<div class="" style="width: 100%; display: inline-block;">'
                                            + '<div class="border_active active"></div>'
                                            + '<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">'
                                            + '<div class="product_image d-flex flex-column align-items-center justify-content-center" onclick=""><img src="'+imagePath+value.picture+'"></div>'
                                            + '<div class="product_content">'
                                                + '<div onclick="">'
                                                    + '<div class="garage-name">'+value.garageName+'</div>'
                                                    + '<div>ซ่อมๆๆ</div>'
                                                    + '<div><span class="error">เปิด</span> '+changeStringToDay(value.dayopenhour)+'<br>'+value.opentime+'</div>'
                                                    + '<div>'+value.option1+''+value.option2+''+value.option3+''+value.option4+'</div>'

                                                    // if(value.option1 == 1){
                                                    //     + ' 1111'
                                                    // }else if(value.option1 == null){
                                                    //     + '3333'
                                                    // }

                                                    + '<div> 222'+orderstatus+'</div>'
                                                    + '<div class="distance">'+distance(value.latitude, value.longitude, latitude, longitude, "K")+'</div>'
                                                + '</div>'
                                                + '<div class="product_extras"><button class="product_cart_button" tabindex="0" onclick=""><i class="fas fa-shopping-bag"></i> รายละเอียด</button></div>'
                                            + '</div>'
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
