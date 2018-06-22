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
                "url": base_url+"apiCaraccessories/SpareBrand/searchSpares",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_brandName = $("#spares_brandName").val(),
                    data.spares_undercarriageId = $("#spares_undercarriageId").val()
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
                            html += '<div class="col-md-3 '+gray+'">'
                                 + '<div class="card card-header-height">'
                                 + '<span class="card-subtitle text-right card-margin"><i class="fa fa-circle lamp"></i> '+statusNameLib[value.status]+'</span>'
                                 + '<div class="card-body text-center">'
                                 + '<h5 class="card-title">'+value.spares_brandName+' </h5>'
                                //  + '<h5 class="card-title">'+value.tire_series+' </h5>'
                                //  + '<h5 class="card-title">'+value.rim+' </h5>'
                                 + '</div>'
                                 + '<div class="card-body text-center card-bottom">'
                                 + '<a href="'+base_url+"caraccessory/SpareBrand/updateSpareBrand/"+value.spares_brandId+"/"+value.spares_undercarriageId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-pencil"></i> แก้ไข</button></a> '
                                 + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5"><i class="ti-trash"></i> ลบ</button>'
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