<script>
    $(document).ready(function () {
        var tire_modelId = $('#tire_modelId');
        var tire_sizeId = $('#tire_sizeId');
        var latitude = null;
        var longitude = null;
        var table;
        
        init();

        function init(){
            getLocation();
            // loadDataTable();
        }

        function loadDataTable(){
            
            table = $('#garage-table').DataTable({
                "language": {
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "sProcessing":   "กำลังดำเนินการ...",
                        "emptyTable": "ไม่พบข้อมูล",
                        "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                        "infoEmpty": "ไม่พบข้อมูล",
                        "infoFiltered": "",
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
                        "url": base_url+"service/Selectgarage/search",
                        "dataType": "json",
                        "type": "POST",
                        "data": function ( data ) {
                            data.tire_dataId = $("#tire_dataId").val();
                            data.tire_modelId = $("#tire_modelId").val();
                            // data.rimId = $("#rimId").val();
                            data.tire_sizeId = $("#tire_sizeId").val();
                            // data.price = $("#amount").val();
                            // data.can_change = $("#can_change").val();
                            // data.sort = $("#sort").val();
                            // data.warranty_distance = $("#warranty_distance").val();
                            // data.warranty_year = $("#warranty_year").val();
                            // data.brandId = $("#brandId").val();
                            // data.modelId = $("#modelId").val();
                            // data.modelofcarId = $("#modelofcarId").val();
                            // data.year = $("#year").val();
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

                                var html = '';
                                // $.each(data, function (i, v) { 
                                     html += '<div class="row row-border">'
                                        +'<div class="pic col-md-2 text-center">'
                                            +'<img src="'+base_url+'public/image/garage/'+data.picture+'">'
                                        +'</div>'
                                        +'<div class="col-md-3 address">'
                                            +'<p><strong>'+data.garageName+'</strong></p>'
                                            +'<p>ตำบล/แขวง '+data.subdistrictName+'</p>'
                                            +'<p>อำเภอ/เขต '+data.districtName+'</p>'
                                            +'<p>จังหวัด '+data.provinceName+'</p>'
                                        +'</div>'
                                        +'<div class="detail col-md-2">'
                                            +'<p class="text-center">'+distance(data.latitude, data.longitude, latitude, longitude, "กม.")+'</p>'
                                        +'</div>'
                                        +'<div class="col-md-2 address">'
                                            +'<p><strong>'+data.tireData.tire_brandName+'</strong></p>'
                                            +'<p>'+data.tireData.tire_modelName+'</p>'
                                            +'<p>'+data.tireData.tire_size+'</p>'
                                        +'</div>'
                                        +'<div class="detail col-md-3">'
                                            +'<div class="row">'
                                                +'<div class="col-5 mbt-5">'
                                                    +'<small>จำนวน</small> <input type="number" class="form-control" value="1">'
                                                +'</div>'
                                                +'<div class="col-7">'
                                                    +'<small>ราคา</small><h5><span class="alternate">'+currency((Number(data.tire_price)+Number(data.tireData.price)), {  precision: 0 }).format()+' บาท</span></h5>'
                                                +'</div>'
                                            +'</div>'
                                            +'<span class="mb-10"></span>'
                                            +'<div class="row">'
                                                +'<div class="col-12">'
                                                    +'<a href="'+base_url+'checkout" class="btn btn-main-md width-100p bg-orange btn-lg"><i class="fa fa-shopping-bag" aria-hidden="true"></i> สั่งซื้อสินค้า </a>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                        +'<br>'
                                    +'</div>';
                                // });
                                return html;
                            }
                        }
                    ]
            });
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                    latitude = position.coords.latitude;
                    longitude = position.coords.longitude;
                    $("#sort").append('<option value="3">ระยะทางน้อย-มาก</option>');
                    loadDataTable();
                }, function(error) {
                    latitude = null;
                    longitude = null;
                    loadDataTable();
                    alert('ไม่สามารถดึงตำแหน่งปัจจุบันได้');         
                },{timeout:5000});
            } else {
                alert("ไม่สามารถดึงตำแหน่งปัจจุบันได้");
                loadDataTable();
            }
        }

    });
</script>