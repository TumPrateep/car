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
                "url": base_url+"apicaraccessories/lubricatornumber/searchLubricatornumber",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.lubricator_number = $("#SearchNumber").val(),
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
                                + '<div class="card-body text-center">'
                                + '<h5 class="card-title">'+value.lubricator_number+'</h5>'
                                + '</div>'
                                + '<div class="card-body text-left">'
                                + '<small>ชนิดน้ำมันเครื่อง</small> '
                                + '<h5 class="card-title"><span class="badge badge-pill badge-'+lubricatorClass[value.lubricator_gear]+'">'+lubricatorLib[value.lubricator_gear]+'</span></h5>'
                                + '<small>ประเภทน้ำมันเครื่อง</small> '
                                + '<h5 class="card-title">'+nullOrVal(value.lubricator_typeName)+'</h5>'
                                + '<small>ระยะทาง</small> '
                                + '<h5 class="card-title">'+nullOrVal(value.lubricator_typeSize)+' กิโลเมตร</h5>'
                                + '</div>'
                                + '<div class="card-body text-center card-bottom">'
                                + '</a>'
                            
                            if(isShow){
                                html += '<a href="'+base_url+"caraccessory/numberlubricator/updatelubricatorNumber/"+value.lubricator_numberId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                 + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5" onclick="deleteNumberLubricator(\''+value.lubricator_numberId+'\',\''+value.lubricator_number+'\')"><i class="ti-trash"></i> ลบ</button>';
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

    function deleteNumberLubricator(lubricator_numberId, lubricator_number){
        var option = {
            url: "/lubricatornumber/delete?lubricator_numberId="+lubricator_numberId,
            label: "ลบยี่ห้อยาง",
            content: "คุณต้องการลบ "+lubricator_number+" ใช่หรือไม่",
            gotoUrl: "caraccessory/numberlubricator"
            
        }
        fnDelete(option);
    }



    $("#btn-search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    
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