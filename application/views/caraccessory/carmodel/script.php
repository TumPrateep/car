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
                "url": base_url+"apiCaraccessories/CarModel/searchModel",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandId = $("#brandId").val(),
                    data.search = $("#table-search").val()
                    
                }
            },
            "columns": [
                null
            ],"columnDefs": [
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '<div class="row">';

                        
                        $.each(data, function( index, value ) {
                            $yearBenull=value.yearStart;
                            $yearBenotnull=value.yearStart+" - "+value.yearEnd;
                            $showyear=null;
                            if(value.yearEnd != null){
                                $showyear=$yearBenotnull;
                            }
                            else{
                                $showyear=$yearBenull;
                            }

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
                                 + '<h5 class="card-title">'+value.modelName+'</h5>'
                                 + '<h6 class="card-subtitle mb-2">'+ $showyear+'</h6>'
                                 + '</div>'
                                 + '<div class="card-body text-center card-bottom">'
                                
                                
                            
                            if(isShow){
                                html +=  '<a href="'+base_url+"caraccessory/CarModelAccessory/updateModelCar/"+value.brandId+'/'+value.modelId+'"><button type="button" class="btn btn-warning btn-sm  m-b-10 m-l-5 card-button"><i class="ti-pencil"></i> แก้ไข</button> </a>' 
                                + '<button type="button" class="btn btn-danger btn-sm  m-b-10 m-l-5" onclick="deletecarModel(\''+value.modelId+'\',\''+value.modelName+'\',\''+value.brandId+'\')"><i class="ti-trash"></i> ลบ</button>'
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

    function deletecarModel(modelId, modelName,brandId){
        var option = {
            url: "/CarModel/deleteModel?modelId="+modelId,
            label: "ลบรุ่นรถ",
            content: "คุณต้องการลบ "+modelName+" ใช่หรือไม่",
            gotoUrl: "caraccessory/CarModelAccessory/index1/"+brandId
            
        }
        fnDelete(option);
    }
</script>

</body>
</html>