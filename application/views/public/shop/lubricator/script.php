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
                "url": base_url+"service/Lubricator/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    
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
                                                    +'<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src=""/></div>'
                                                    +'<div class="product_content">'
                                                        +'<div class="product_price">680 .-</div>'
                                                        +'<div class="product_name">'
                                                            +'<div><a href="product.html" tabindex="0"><strong> SK ZIC </strong></a></div>'
                                                            +'<ul>4L</ul>'
                                                            +'<ul>X3 15W-60</ul>'
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


</script>
</body>
</html>