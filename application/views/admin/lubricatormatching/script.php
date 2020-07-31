<script>
    var table = $('#lubricator-table').DataTable({
        "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "ไม่พบข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                "infoEmpty": "ไม่พบข้อมูล",
                "infoFiltered": "(กรอง 1 จากทั้งหมด _MAX_ รายการ)",
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
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/Lubricatormatching/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.lubricator_typeName = $("#table-search").val(),
                    // data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                // { "data": "lubricator_brandName" },
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,2]
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return data.brandName+'<br><span class="badge badge-info">'+data.modelName+'</span>';
                    }
                },
                {
                    "targets": 2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return "ปี"+" "+data.yearStart+"-"+data.yearEnd+" <br>"+data.detail;
                    }
                },
                {
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        let str = '';
                        if(data.lubricator_gear){
                            str = lubricatorLib[data.lubricator_gear]
                        }
                        return str;
                    }
                },
                {
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return data.lubricator_number;
                    }
                },
                {
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var switchVal = "true";
                        var active = " active";
                        if(data.status == null){
                            return '<small><i class="gray">ไม่พบข้อมูล</i></small>';
                        }else if(data.status != "1"){
                            switchVal = "false";
                            active = "";
                        }
                        return '<div>'
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.lubricator_matching_id+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="delete btn btn-danger" onclick="deleteLubricatorMatching('+data.lubricator_matching_id+',\''+data.lubricatorName+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]},
                {"className": "dt-head-center", "targets": []}
            ]	
        });

        $("#form-search").submit(function(){
            event.preventDefault();
            table.ajax.reload();
        })
            
        function deleteLubricatorMatching(lubricator_matching_id,lubricator_name){
            var option = {
                url: "/Lubricatormatching/delete?lubricator_matching_id="+lubricator_matching_id,
                label: "ลบประเภทน้ำมัน",
                content: "คุณต้องการลบ "+lubricator_name+" ใช่หรือไม่",
                gotoUrl: "admin/lubricatormatching"
            }
            fnDelete(option);
        }

        function updateStatus(lubricator_matching_id,status){
            $.post(base_url+"api/Lubricatormatching/changeStatus",{
                "lubricator_matching_id": lubricator_matching_id,
                "status": status
            },function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatormatching");
                }else{
                    showMessage(data.message);
                }
            });
        }
   
</script>

</body>
</html>