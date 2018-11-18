<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script>
    $(document).ready(function () {
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
                    "url": base_url+"service/Lubricator/search",
                    "dataType": "json",
                    "type": "POST",
                    "data": function ( data ) {
                        data.lubricatortypeFormachineId = $("#lubricatortypeFormachineId").val();
                        data.lubricator_gear = $("#lubricator_gear").val();
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
                            var imagePath = base_url+"/public/image/lubricatordata/";
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
                                                        +'<div class="product_image d-flex flex-column align-items-center justify-content-center" onclick="gotoDetail(\'lubricator\',\''+value.lubricator_dataId+'\')"><img src="'+imagePath+value.lubricator_dataPicture+'"/></div>'
                                                        +'<div class="product_content">'
                                                            +'<div onclick="gotoDetail(\'lubricator\',\''+value.lubricator_dataId+'\')">'
                                                                +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                                +'<div class="product_name">'
                                                                    +'<div><a href="product.html" tabindex="0"><strong> '+value.lubricator_brandName+' </strong></a></div>'
                                                                    +'<ul>'+value.capacity+' ลิตร</ul>'
                                                                    +'<ul>'+value.lubricatorName+' '+value.lubricator_number+'</ul>'
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


        
        init();

        function init(){
            getLubracatorBrand();
            getlubricatortypeFormachine();
            
        }


        var lubricator_brand = $("#lubricator_brandId");
        var lubricator = $("#lubricatorId");
        var lubricator_gear = $("#lubricator_gear");
        var lubricatortypeFormachine = $("#lubricatortypeFormachineId");

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
                // lubricator_gear: lubricator_gear.val()
            },function(data){
                    var lubricatorData = data.data;
                    $.each( lubricatorData, function( key, value ) {
                        lubricator.append('<option value="' + value.lubricatorId + '">' + value.lubricatorName + " " + value.capacity + " ลิตร " + value.lubricator_number + '</option>');
                    });
                }
            );
        });

        function getlubricatortypeFormachine(){
            $.get(base_url+"service/Lubricator/getAlllubricatortypeFormachine",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        lubricatortypeFormachine.append('<option value="' + value.lubricatortypeFormachineId + '">' + value.lubricatortypeFormachine + '</option>');
                    });
                }
            );
        }
    });
</script>
</body>
</html>