<script>
$(document).ready(function() {
    
    var table = $('#search-table').DataTable({
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
                    "url": base_url+"service/Garage/search",
                    "dataType": "json",
                    "type": "POST",
                    "data": function ( data ) {
                        data.spares_brandId = $("#spares_brandId").val();
                        data.spares_undercarriageId =$("#spares_undercarriageId").val();
                        data.modelId= $("#modelId").val();
                        data.brandId = $("#brandId").val();
                        data.year = $("#year").val();
                        data.price = $("#amount").val();
                        data.can_change = $("#can_change").val();
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
                                var switchVal = "true";
                                var active = " active";
                                if(value.status == null){
                                    return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                                }else if(value.status != "1"){
                                    switchVal = "false";
                                    active = "";
                                }

                                html += '<div class="col-md-3">'
                                        +'<div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">'
                                            +'<div>'
                                                +'<div class="" style="width: 100%; display: inline-block;">'
                                                    +'<div class="border_active active"></div>'
                                                    +'<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">'
                                                        +'<div class="d-flex flex-column align-items-center logo-product">'
															+'<img src="'+base_url+'public/image/sparesbrand/'+value.spares_brandPicture+'">'
														+'</div>'
                                                        +'<div class="product_image d-flex flex-column align-items-center justify-content-center"onclick="gotoDetail(\'spare\',\''+value.spares_undercarriageDataId+'\')"><img src="'+imagePath+value.spares_undercarriageDataPicture+'"/></div>'
                                                        +'<div class="product_content">'
                                                        +'<div onclick="gotoDetail(\'spare\',\''+value.spares_undercarriageDataId+'\')">'
                                                            +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                            +'<div class="product_name">'
                                                                +'<div><a href="product.html" tabindex="0"><strong> '+value.spares_undercarriageName+' ' + value.spares_brandName +' </strong></a></div>'
                                                                +'<ul>'+value.brandName+' '+ value.modelName +' </ul>'
                                                                // +'<ul>'+value.year+'-'+value.yearEnd+'</ul>'
                                                                +'<ul>'+value.year+'</ul>'
                                                            +'</div>'
                                                            +'</div>'
                                                            +'<div class="product_extras">'
                                                            +'<button class="product_cart_button" tabindex="0" onclick="setCart(\'spare\',\''+value.spares_undercarriageDataId+'\',this)"><i class="fas fa-shopping-bag"></i> หยิบใส่ตะกร้า</button>'
                                                            +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>';
                            });

                            html += '</div>';
                            return html;
                        }
                    }
                ]
        });

    

    var provinceDropdownGarage = $("#provinceIdSearch");
    provinceDropdownGarage.append('<option value="">เลือกจังหวัด</option>');

    var districtDropdownGarage = $('#districtIdSearch');
    districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');

    var subdistrictDropdownGarage = $('#subdistrictIdSearch');
    subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');

    var brand =$("#brandId");

    function onLoad(){
   	  getbrand();
      loadProvinceGarage();
    }

    onLoad();

    function getbrand(brandId = null ){
        $.get(base_url+"service/Spareundercarriage/getAllBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
            }
        );
    }

    function loadProvinceGarage(){
      	$.post(base_url+"apiUser/LocationforRegister/getProvince",{},
        	function(data){
          		var province = data.data;
          		$.each(province, function( index, value ) {
            		provinceDropdownGarage.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
          		});
        	}
      	);
    }

    provinceDropdownGarage.change(function(){
      	var provinceId = $(this).val();
      	loadDistrictGarage(provinceId);
    });

    function loadDistrictGarage(provinceId){
      	districtDropdownGarage.html("");
      	districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');
      	subdistrictDropdownGarage.html("");
      	subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');

      	$.post(base_url+"apiUser/LocationforRegister/getDistrict",{
        	provinceId: provinceId
      	},
          function(data){
          	var district = data.data;
          	$.each(district, function( index, value ) {
            	districtDropdownGarage.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          	});
          }
      	);
    }

    districtDropdownGarage.change(function(){
      	var districtId = $(this).val();
      	loadSubdistrictGarage(districtId);
    });

    function loadSubdistrictGarage(districtId){
      	subdistrictDropdownGarage.html("");
      	subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');
        
      	$.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
        	districtId: districtId
      	},
          function(data){
          	var subDistrict = data.data;
          	$.each(subDistrict, function( index, value ) {
            	subdistrictDropdownGarage.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          	});
          }
      	);
    }

    // register.submit(function (e) { 
    //   e.preventDefault();
    //   var isValid = register.valid();
    //   if(isValid){
    //     var data = register.serialize();
    //     $.post(base_url+"apiUser/Users/creategarage", data,
    //       function (data, textStatus, jqXHR) {
    //         console.log(data);
    //         if(data.message == 200){
    //           window.location = base_url+"login";
    //         }else if(data.message == 3001){
    //          showMessage(data.message);
    //         }
    //       }
    //     );
    //   }      
    // });

  });

   
</script>

</body>

</html>