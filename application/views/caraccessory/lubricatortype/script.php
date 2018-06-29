<script>
    var table = $('#lubricatortype-table').DataTable({
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
                "url": base_url+"apiCaraccessories/LubricatorType/searchLubricatorType",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.lubricator_typeName = $("#searchbrand-search").val(),
                    data.column = $("#column").val()
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
                            var gray = "";
                            var isShow = false;

                            if(value.status == '2'){
                                var gray = " filter-gray ";
                                if(value.create_by == userId && value.activeFlag == 2){
                                    isShow = true;
                                }
                            }

                            html += '<div class="col-lg-3 ">'
                                 + '<div class="card card-header-height">'
                                 + '<span class="card-subtitle text-right card-margin '+gray+'"><i class="fa fa-circle lamp"></i> '+statusNameLib[value.status]+'</span>'                                
                                 + '<div class="card-body text-center card-body-height">'
                                 + '<h5 class="card-title">'+value.lubricator_typeName+'</h5>'
                                 + '</div>'
                                 + '<div class="card-body text-center card-bottom">'
                                //  + '<a href="'+base_url+"caraccessory/TireSize/index/"+value.rimId+'">'
                                //  + '<button type="button" class="btn btn-success btn-sm  m-b-10 m-l-5 card-button"><i class="ti-zoom-in"></i> ข้อมูล</button> '
                                 + '</a>'
                            
                            if(isShow){
                                html += '<a href="'+base_url+"caraccessory/tirerim/updatetirerim/"+value.lubricator_typeId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5" onclick="deletelubricator_type(\''+value.lubricator_typeId+'\',\''+value.lubricator_typeName+'\')"><i class="ti-trash"></i> ลบ</button>'
                            }
                                 
                            html += '</div>'
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

    function deletelubricator_type(lubricator_typeId, lubricator_typeName){
        var option = {
            url: "/TireRim/deleteRim?lubricator_typeId="+lubricator_typeId,
            label: "ลบประเภทน้ำมันเครื่อง",
            content: "คุณต้องการลบ "+lubricator_typeName+" ใช่หรือไม่",
            gotoUrl: "caraccessory/lubricatortype"
            
        }
        fnDelete(option);
    }
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

    $("#column").change(function(){
        table.ajax.reload();
    })
</script>

</body>
</html>

