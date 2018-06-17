<script>
    var table = $('#model-table').DataTable({
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
                "url": base_url+"apiCaraccessories/Tiremodel/searchTireModel",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_brandId = $("#tire_brandId").val() ,
                    data.tire_modelName = $("#tire_modelName").val()     
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
                        
                            var gray = (value.status == '2')?" filter-gray ":"";
                            html += '<div class="col-lg-3 '+gray+'">'
                                 + '<div class="card card-height">'
                                 + '<span class="card-subtitle mb-2">รุ่นยาง <i class="fa fa-circle lamp"></i> '+statusNameLib[value.status]+'</span>'
                                 + '<div class="card-body text-center card-body-height">'
                                 + '<h5 class="card-title">'+value.tire_modelName+'</h5>'
                                 + '</div>'
                                 + '<div class="card-body text-center card-bottom">'
                                 + '<button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-user"></i> แก้ไข</button> '
                                 + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5"><i class="ti-user"></i> ลบ</button>'
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

    $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })
</script>

</body>
</html>