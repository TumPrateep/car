<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>

<script>

    $(document).ready(function () {
        var carprofile = $("#carprofileId");
        var carprofileData = [];
        var table = $('#brand-table').DataTable({
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
                    "url": base_url+"service/Spareundercarriage/search",
                    "dataType": "json",
                    "type": "POST",
                    "data": function ( data ) {
                        data.spares_brandId = $("#spares_brandId").val();
                        data.spares_undercarriageId =$("#spares_undercarriageId").val();
                        data.modelId= $("#modelId").val();
                        data.brandId = $("#brandId").val();
                        data.modelofcarId = $("#modelofcarId").val();
                        // data.year = $("#year").val();
                        data.price = $("#amount").val();
                        // data.can_change = $("#can_change").val();
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
                            var imagePath = base_url+"/public/image/spareproduct/";
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
                                                        +'<div class="product_image d-flex flex-column align-items-center justify-content-center"onclick="gotoDetail(\'spare\',\''+value.spares_undercarriageDataId+'\')"><img src="'+imagePath+value.picture+'"/></div>'
                                                        +'<div class="product_content">'
                                                        +'<div onclick="gotoDetail(\'spare\',\''+value.spares_undercarriageDataId+'\')">'
                                                            +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                            +'<div class="product_name">'
                                                                +'<div><a href="product.html" tabindex="0"><strong> '+value.spares_undercarriageName+' ' + value.spares_brandName +' </strong></a></div>'
                                                                +'<ul>'+value.brandName+' '+ value.modelName +' </ul>'
                                                                // +'<ul>'+value.year+'-'+value.yearEnd+'</ul>'
                                                                +'<ul>'+value.year+'</ul>'
                                                                +'<ul>'+value.machineSize+" "+value.modelofcarName+'</ul>'
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

        $("#btn-search").click(function(){
            event.preventDefault();
            table.ajax.reload();
        })

        

        var spares_undercarriage = $("#spares_undercarriageId");
        var spares_brand = $("#spares_brandId");
        var brand =$("#brandId");
        var model = $("#modelId");
        // var dropdownStart = $("#year");
        // var dropdownStop = $("#yearEnd");
        // var nowYear = (new Date).getFullYear();
        // var startYear = 1990;
        var modelofcar = $("#modelofcarId");
        var year = $("#yearStart");
        var YearEnd = $("#YearEnd");
        var detail = $("#detail");
        var modelName = $("modelName");
        var modelId = $("modelId");



        init();

        function init(){
            getSparesUndercarriage();
            getProfile();
            // year();
        }

        // function year(){
        //         dropdownStart.append('<option value="">เลือกปี</option>');
        //         for(var i=nowYear;i>=startYear;i--){
        //             dropdownStart.append('<option value="'+i+'">'+i+'</option>');
        //         }
        //     }

        function getSparesUndercarriage(){
            $.get(base_url+"service/Spareundercarriage/getAllSpareundercarriage",{},
                function(data){
                    var sparesUndercarriageData = data.data;
                    $.each(sparesUndercarriageData, function( key, value ) {
                        spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                    });
                }
            );
        }

        spares_undercarriage.change(function(){
            spares_brand.html('<option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>');
            $.get(base_url+"service/Spareundercarriage/getAllSpareBrand",{
                spares_undercarriageId: $(this).val()
            },function(data){
                    var sparesBrandData = data.data;
                    $.each( sparesBrandData, function( key, value ) {
                        spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
                    });
                }
            );
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
                    // table.ajax.reload();
                }
            });
        }

        $("#show-search").click(function(){
            $(this).hide(100);
            $("#search-form").slideDown();
        });

        $("#search-hide").click(function(){
            $("#search-form").slideUp();
            $("#show-search").show(100);
        });

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

    });
    
</script>
</body>
</html>