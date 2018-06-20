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
                "url": base_url+"apiCaraccessories/TireBrand/searchTirebrand",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_brandName = $("#brand-search").val()
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
                                 + '<img class="card-img-top" src="'+base_url+'public/image/tire_brand/'+value.tire_brandPicture+'" alt="Card image cap">'
                                 + '<div class="card-body text-center">'
                                 + '<h5 class="card-title">'+value.tire_brandName+'</h5>'
                                 + '</div>'
                                 + '<div class="card-body text-center card-bottom">'
                                 + '<a href="'+base_url+"caraccessory/TireModel/index1/"+value.tire_brandId+'">'
                                 + '<button type="button" class="btn btn-success btn-sm  m-b-10 m-l-5 card-button"><i class="ti-zoom-in"></i> ข้อมูล</button> '
                                 + '</a>'
                                 + '<button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-pencil"></i> แก้ไข</button> '
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