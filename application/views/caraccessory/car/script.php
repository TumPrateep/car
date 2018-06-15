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
                "url": base_url+"api/CarAccessory/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandName = $("#brand-search").val()
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
                                 + '<div class="card card-header-height">'
                                 + '<span class="card-subtitle text-right card-margin"><i class="fa fa-circle lamp"></i> '+statusNameLib[value.status]+'</span>'
                                 + '<img class="card-img-top" src="'+base_url+'public/image/brand/'+value.brandPic+'" alt="Card image cap">'
                                 + '<div class="card-body text-center">'
                                 + '<h5 class="card-title">'+value.brandName+'</h5>'
                                //  + '<a href="'+base_url+"caraccessory/car/index1/"+value.brandId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> '
                                 + '<a href="'+base_url+"caraccessory/CarModelAccessory/index1/"+value.brandId+'" class="btn btn-primary">Go somewhere</a>'
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