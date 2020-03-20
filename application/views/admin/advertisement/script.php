<script>
    var table = $('#news-table').DataTable({
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
                "url": base_url+"api/publish/searchadvertisement",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.advertisement_name = $("#table-search").val(),
                    data.status = $("#status").val()
                }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                { "data": "advertisement_name" },
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1]
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/advertisement/updateadvertisement/"+data.advertisement_id+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> '
                            +'<button type="button" class="delete btn btn-danger" onclick="deleteadvertisement('+data.advertisement_id+',\''+data.advertisement_name+'\')"><i class="fa fa-trash"></i></button>';
                    }
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
                        var path = pathImage + "publish/"+data.advertisement_picture;
                        var imageHtml = '<img src="'+ path +'" class="rounded" width="100px">';
                        return imageHtml;
                    }
                },{
                    "targets": 3,
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
                        +'<button type="button" class="btn btn-sm btn-toggle '+active+'" data-toggle="button" aria-pressed="'+switchVal+'" autocomplete="Off" onclick="updateStatus('+data.advertisement_id+','+data.status+')">'
                        +'<div class="handle"></div>'
                        +'</button>'
                        +'</div>';
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": []},
                {"className": "dt-center", "targets": [0,1,2,4,3]},
                { "width": "10%", "targets": 0 },
                { "width": "25%", "targets": 1 },
                { "width": "20%", "targets": 4 },
                { "width": "12%", "targets": 3 }
            ]	 
    });
   
    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

     function updateStatus(advertisement_id, status){
        $.post(base_url+"api/publish/changeStatus",{
            "advertisement_id": advertisement_id,
            "status": status
        },function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/advertisement/");
            }else{
                showMessage(data.message,"admin/advertisement/");
            }
        });
    }
    function deleteadvertisement(advertisement_id, advertisement_name){
        var option = {
            url: "/publish/deleteadvertisement?advertisement_id="+advertisement_id,
            label: "ลบโฆษณา",
            content: "คุณต้องการลบ "+advertisement_name+" ใช่หรือไม่",
            gotoUrl: "admin/advertisement"
        }
        fnDelete(option);
    }

   
</script>

</body>
</html>