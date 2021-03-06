<script>
    var tire_modelName = $("#tire_modelName").val();
    var tire_brandId = $("#tire_brandId").val();
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
                "url": base_url+"apicaraccessories/Tiremodel/searchTireModel",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.tire_brandId = $("#tire_brandId").val() ,
                    data.tire_modelName = $("#tire_modelName").val(),
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
                                 + '<h5 class="card-title">'+value.tire_modelName+'</h5>'
                                
                            
                            if(isShow){
                                html += '<a href="'+base_url+"caraccessory/tiremodel/updateTrieModel/"+value.tire_brandId+'/'+value.tire_modelId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-pencil"></i> แก้ไข</button> </a>'
                                + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5" onclick="deleteTireModel(\''+value.tire_brandId+'\',\''+value.tire_modelId+'\',\''+value.tire_modelName+'\')"><i class="ti-trash"></i> ลบ</button>'
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

    function deleteTireModel(tire_brandId, tire_modelId,tire_modelName){
        var option = {
            url: "/tiremodel/deleteTireModel?tire_modelId="+tire_modelId,
            label: "ลบรุ่นยาง",
            content: "คุณต้องการลบ "+tire_modelName+" ใช่หรือไม่",
            gotoUrl: "caraccessory/tiremodel/index/"+tire_brandId
            
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