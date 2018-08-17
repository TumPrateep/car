<script>
    var table = $('#brand-table').DataTable({
        "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "sProcessing":   "กำลังดำเนินการ...",
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
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
                "url": base_url+"apiCaraccessories/TireData/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_brandId = $("#tire_brandId").val();
                    data.tire_modelId = $("#tire_modelId").val();
                    data.rimId = $("#rimId").val();
                    data.tire_sizeId = $("#tire_sizeId").val();
                    data.price = $("#price").val();
                    data.can_change = $("#can_change").val();
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

                        $.each(data, function( index, value ) {

                            html += '<div class="col-lg-4" col-md-8>'
                                 + '<div class="card card-header-height">'
                                 + '<div class="text-center">'
                                 	+ '<h2>ประเภทยี่ห้อน้ำมันเครื่อง</h2>'
                                 + '</div>'
                                    + '<div class="card-body">'
                                        + '<img class="card-img-top" src="http://localhost/car/public/image/tire/tire.jpg">'
                                    + '</div>'
                                    + '<div class="card-body">'
                                        + '<div class="text-center">'
                                            + '<h3>ยี่ห้อน้ำมันเครื่อง/รุ่นน้ำมันเครื่อง</h3>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<span>ชนิดน้ำมันเครื่อง </span>'
                                            + '<span>ระยะทาง xxxx</span>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<span>รับประกัน 2 ปี</span>'
                                            + '<span>หรือ</span>'
                                            + '<span>รับประกัน 1000 กม.</span>'
                                        + '</div>'
                                        + '<div class="text-center">'
                                            + '<a href="'+base_url+"caraccessory/TireData/updatetiredata/"+value.tire_dataId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button button-p-helf"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                            + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5 card-button button-p-helf" onclick="deletetiredata(\''+value.tire_dataId+'\', \''+value.tire_modelName+'/'+value.tire_brandName+' '+value.tire_size+'\')"><i class="ti-trash"></i> ลบ</button>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>';
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