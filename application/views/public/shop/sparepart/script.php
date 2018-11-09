<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>

<script>
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
            "pageLength": 12,
            "ajax":{
                "url": base_url+"service/Spareundercarriage/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_brandId = $("#spares_brandId").val();
                    data.spares_undercarriageId =$("#spares_undercarriageId").val();
                    // data.modelId= $("#modelId").val();
                    // data.brandId = $("#brandId").val();
                    // data.yearStart = $("#yearStart").val();
                    // data.yer = $("#tire_sizeId").val();
                    data.price = $("#price").val();
                    // data.can_change = $("#can_change").val();
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
                        var imagePath = base_url+"/public/image/spareundercarriage/";
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
                                                    +'<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="'+imagePath+value.spareundercarriage_dataPicture+'"/></div>'
                                                    +'<div class="product_content">'
                                                        +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                        +'<div class="product_name">'
                                                            +'<div><a href="product.html" tabindex="0"><strong> '+value.spares_undercarriageName+' ' + value.spares_brandName +' </strong></a></div>'
                                                            +'<ul>'+value.brandName+' '+ value.modelName +' </ul>'
                                                            +'<ul>'+value.yearStart+'-'+value.yearEnd+'</ul>'
                                                        +'</div>'
                                                        +'<div class="product_extras">'
                                                            +'<button class="product_cart_button" tabindex="0"><i class="fas fa-shopping-bag"></i> หยิบใส่ตะกร้า</button>'
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
    var dropdownStart = $("#yearStart");
    var dropdownStop = $("#yearEnd");
    var nowYear = (new Date).getFullYear();
    var startYear = 1990;

    init();

    function init(){
        getSparesUndercarriage();
        getbrand();
        year();
    }

    function year(){
            dropdownStart.append('<option value="">เลือกปี</option>');
            dropdownStop.append('<option value="">เลือกปี</option>');
            for(var i=nowYear;i>=startYear;i--){
                dropdownStart.append('<option value="'+i+'">'+i+'</option>');
            }
        }

        dropdownStart.change(function(){
            var endStartYear = dropdownStart.val();
            dropdownStop.html('');
            dropdownStop.append('<option value="">เลือกปี</option>');
            if(dropdownStart.val() != ""){
                // dropdownStop.append('<option value="'+nowYear+'">'+nowYear+' (ปัจจุบัน)</option>');
                for(var i=nowYear;i>endStartYear;i--){
                    dropdownStop.append('<option value="'+i+'">'+i+'</option>');
                }
            }
        });

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
    
    function getbrand(brandId = null ){
        $.get(base_url+"service/Tire/getAllBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
            }
        );
    }

    brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        $.get(base_url+"service/Tire/getAllModel",{
            brandId : brandId
        },function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                });
            }
        );
    });

    
        

    $("#show-search").click(function(){
        $(this).hide(100);
        $("#search-form").slideDown();
    });

    $("#search-hide").click(function(){
        $("#search-form").slideUp();
        $("#show-search").show(100);
    });

    


</script>
</body>
</html>