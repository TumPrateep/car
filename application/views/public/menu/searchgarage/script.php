<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script>
      $(document).ready(function () {
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
                    "url": base_url+"service/garages/searchgarage",
                    "dataType": "json",
                    "type": "POST",
                    "data": function ( data ) {
                        data.garagename = $("#garagename").val();
                        // data.spares_undercarriageId =$("#spares_undercarriageId").val();
                        // data.modelId= $("#modelId").val();
                        // data.brandId = $("#brandId").val();
                        // data.year = $("#year").val();
                        // data.price = $("#amount").val();
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
                            // var imagePath = base_url+"/public/image/spareundercarriage/";
                            $.each(data, function( index, value ) {
                                // var switchVal = "true";
                                // var active = " active";
                                // if(value.status == null){
                                //     return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                                // }else if(value.status != "1"){
                                //     switchVal = "false";
                                //     active = "";
                                // }

                                html += '<div class="col-md-3">'
                                        +'<div class="slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" role="tabpanel">'
                                            +'<div>'
                                                +'<div class="" style="width: 100%; display: inline-block;">'
                                                    +'<div class="border_active active"></div>'
                                                    +'<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">'
                                                        +'<div class="d-flex flex-column align-items-center logo-product">'
                                                            +'<img src="'+base_url+'public/image/role/1.jpg">'
                                                        +'</div>'
                                                        // +'<div class="product_image d-flex flex-column align-items-center justify-content-center"onclick="gotoDetail(\'spare\',\''+value.spares_undercarriageDataId+'\')"><img src="'+imagePath+value.spares_undercarriageDataPicture+'"/></div>'
                                                        +'<div class="product_content">'
                                                        // +'<div onclick="gotoDetail(\'spare\',\''+value.spares_undercarriageDataId+'\')">'
                                                            // +'<div class="product_price">'+currency(value.price, {  precision: 0 }).format()+' บาท</div>'
                                                            +'<div class="product_name">'
                                                                +'<div><strong> '+value.garageName+'  </strong></div>'
                                                                +'<ul>'+value.skill+'  </ul>'

                                                                // +'<ul>'+value.year+'-'+value.yearEnd+'</ul>'
                                                                // +'<ul>'+value.year+'</ul>'
                                                            +'</div>'
                                                            +'</div>'

                                                            +'<div class="container-icon">'
                                                                +'<i class="fa fa-wifi right" aria-hidden="true"></i>'
                                                                +'<i class="fa fa-wifi right" aria-hidden="true"></i>'
                                                                +'<i class="fa fa-wifi right" aria-hidden="true"></i>'
                                                                +'<i class="fa fa-wifi right" aria-hidden="true"></i>'
                                                            +'</div>'

                                                            +'<div class="container-star">'
                                                                +'<img class="star" src="'+base_url+'public/image/StarIconGold.png" >'
                                                                +'<img class="star" src="'+base_url+'public/image/StarIconGold.png" >'
                                                                +'<img class="star" src="'+base_url+'public/image/StarIconGold.png" >'
                                                            +'</div>'
                                                            // +'<div class="product_extras">'
                                                            // +'<button class="product_cart_button" tabindex="0" onclick="setCart(\'spare\',\''+value.spares_undercarriageDataId+'\',this)"><i class="fas fa-shopping-bag"></i> หยิบใส่ตะกร้า</button>'
                                                            // +'</div>'
                                                            +'<div><a href="#">รายละเอียด</a> </div>'
                                                        // +'</div>'
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

        var garagename = $("#garagename");

        $("#btn-search").click(function(){
            event.preventDefault();
            table.ajax.reload();
        })


    });
   

</script>

</body>
</html>
