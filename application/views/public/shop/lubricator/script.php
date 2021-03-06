<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script>

    var carprofile = $("#carprofileId");
    var carprofileData = [];
    var brand =$("#brandId");
    var model = $("#modelId");
    var modelofcar =$("#modelofcarId");
    var detail = $("#detail");
    var table;

    function getProfile(){
        var userId = localStorage.userId;
        console.log(userId);
        if(userId != undefined || userId != null){
            var html = '<option value="">เลือกทะเบียนรถ</option>';
            carprofileData = [];
            $.get(base_url+"service/Carprofile/getAllCarProfileByUserId", {},
                function (data, textStatus, jqXHR) {
                    $.each(data, function (i, v) { 
                        html += '<option value="'+v.car_profileId+'">'+v.character_plate+' '+v.number_plate+' '+v.provinceforcarName+'</option>';
                        carprofileData[v.car_profileId] = v;
                    });

                    carprofile.html(html);
                }
            );
            getbrand();
        }else{
            $("#carprofile-box").hide();
            getbrand();
        }
    }

    carprofile.change(function(){
        var carprofileId = $(this).val();
        
        if(carprofileData.length > 0 && carprofileId != ""){
            getbrand(carprofileData[carprofileId]);
        }else{
            getbrand();
        }
    });

    function getbrand(carprofile = null){
            brand.html('<option value="">เลือกยี่ห้อรถ</option>');
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });

                    if(carprofile != null){
                        brand.val(carprofile.brandId);
                        getModel(carprofile);
                    }
                }
            );
        }

        brand.change(function(){
            getModel();
        });

        function getModel(carprofile = null){
            var brandId = brand.val();
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                    });

                    if(carprofile != null){
                        model.val(carprofile.modelId);
                        getDetail(carprofile);
                    }
                }
            );
        }

        model.change(function(){
            getDetail();
        });

        function getDetail(carprofile = null){
            var modelName = $("#modelId option:selected").text();
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            // year.html('<option value="">เลือกปีผลิต</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');            
            $.get(base_url+"service/Carselect/getCarYear",{
                modelName : modelName
            },function(data){
                var detailData = data.data;
                $.each( detailData, function( key, value ) {
                    detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
                });
                if(carprofile != null){
                    detail.val(carprofile.modelId);
                    getModelOfCar(carprofile);
                }
            });
        }
        
        detail.change(function(){
            getModelOfCar();
        });

        function getModelOfCar(carprofile = null){
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"service/Carselect/getCarDetail",{
                modelId : detail.val()
            },function(data){
                var carModelData = data.data;
                console.log(carModelData);
                $.each( carModelData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
                });
                if(carprofile != null){
                    modelofcar.val(carprofile.modelofcarId);
                    table.ajax.reload();
                }
            });
        }

    $(document).ready(function () {

        table = $('#brand-table').DataTable({
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
                    "url": base_url+"service/Lubricator/search",
                    "dataType": "json",
                    "type": "POST",
                    "data": function ( data ) {
                        data.lubricatortypeFormachineId = $("#lubricatortypeFormachineId").val();
                        data.lubricator_gear = ($("#lubricator_gear").val() != "")? $("#lubricator_gear").val(): 1;
                        data.lubricator_brandId = $("#lubricator_brandId").val();
                        data.lubricatorId = $("#lubricatorId").val();
                        data.price = $("#amount").val();
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
                            var imagePath = base_url+"/public/image/lubricatorproduct/";
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
															+'<img src="'+base_url+'public/image/lubricator_brand/'+value.lubricator_brandPicture+'">'
														+'</div>'
                                                        +'<div class="product_image d-flex flex-column align-items-center justify-content-center" onclick="gotoDetail(\'lubricator\',\''+value.lubricator_dataId+'\')"><img src="'+imagePath+value.picture+'"/></div>'
                                                        +'<div class="product_content">'
                                                            +'<div onclick="gotoDetail(\'lubricator\',\''+value.lubricator_dataId+'\')">'
                                                                +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                                +'<div class="product_name">'
                                                                    +'<div><a href="product.html" tabindex="0"><strong> '+value.lubricator_brandName+' '+value.lubricatorName+' </strong></a></div>'
                                                                    +'<ul>'+value.lubricator_number+' '+value.capacity+' ลิตร</ul>'
                                                                    +'<ul> '+value.lubricator_typeName+'</ul>'
                                                                    +'<ul> '+value.lubricatortypeFormachine+'</ul>'
                                                                +'</div>'
                                                            +'</div>'
                                                            +'<div class="product_extras">'
                                                                +'<button class="product_cart_button" tabindex="0" onclick="setCart(\'lubricator\',\''+value.lubricator_dataId+'\',this)"><i class="fas fa-shopping-bag"></i> หยิบใส่ตะกร้า</button>'
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

        $("#btn-search").click(function(){
            event.preventDefault();
            table.ajax.reload();
        })

        function init(){
            getLubracatorBrand();
            getProfile();
            // getlubricatortypeFormachine();
            // getbrand();
        }
        init();

        var lubricator_brand = $("#lubricator_brandId");
        var lubricator = $("#lubricatorId");
        var lubricator_gear = $("#lubricator_gear");
        var lubricatortypeFormachine = $("#lubricatortypeFormachineId");
        var year = $("#yearStart");
        var YearEnd = $("#YearEnd");
        var modelName = $("modelName");
        var modelId = $("modelId");


        function getLubracatorBrand(){
            $.get(base_url+"service/Lubricator/getAllLubricatorBrand",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        lubricator_brand.append('<option value="' + value.lubricator_brandId + '">' + value.lubricator_brandName + '</option>');
                    });
                }
            );
        }

        lubricator_gear.change(function(){
            lubricator_brand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
            lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
            if(lubricator_gear.val() != ""){
                getLubracatorBrand(); 
            }
        });

        lubricator_brand.change(function(){
            lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
            $.get(base_url+"service/Lubricator/getAllLubricator",{
                lubricator_brandId: $(this).val(),
                lubricator_gear: lubricator_gear.val()
            },function(data){
                    var lubricatorData = data.data;
                    $.each( lubricatorData, function( key, value ) {
                        lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
                    });
                }
            );
        });

        var lubricatorGear = $(".lubricator_gear");
        var lubricatorClass = $(".lubricator");
        lubricatorGear.hide();
        $("input[name='options']").change(function(){
            var option = $(this).val();
            var html = '';
            lubricator.val("");
            lubricator_brand.html('<option value="">เลือกยี่ห้อน้ำมันเครื่อง</option>');
            lubricator.html('<option value="">เลือกรุ่นน้ำมันเครื่อง</option>');
            getLubracatorBrand();
            if(option == "on"){
                html = '<option value="1">น้ำมันเครื่อง</option>';
                lubricatorGear.hide();
                lubricatorClass.show();
            }else{
                html += '<option value="2">น้ำมันเกียร์ธรรมดา</option>'
                        + '<option value="3">น้ำมันเกียร์ออโต</option>';
                lubricatorGear.show();
                lubricatorClass.hide();
            }
            lubricator_gear.html(html);
        });

});
   
</script>
</body>
</html>