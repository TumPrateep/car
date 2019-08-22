<script>
    var table = $('#spares_brand-table').DataTable({
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
            "bLengthChange": true,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"api/Sparespicture/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.spares_undercarriageName = $("#table-search").val(),
                    data.spares_brandName = $("#table-searchs").val()
                  }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                { "data": "spares_undercarriageName" },
                { "data": "spares_brandName" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1,4]
                },
                {
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/sparespicture/updatesparespicture/"+data.spare_pictire_id+'"><button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> ' 
                        +'<button type="button" class="delete btn btn-danger" onclick="deleteSpareBrand(\''+data.spare_pictire_id+'\')"><i class="fa fa-trash"></i></button>';
                    }
                },
                {
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<img src="'+picturePath+'spare_picture/'+data.picture+'" width="100" />';
                    } 
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,1,4,3]},
                { "width": "10%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "20%", "targets": 4 },
                { "width": "12%", "targets": 3 }
            ]	 

    });

    function deleteSpareBrand(spare_pictire_id){
        var option = {
            url: "/sparespicture/deleteSparesPictire?spare_pictire_id="+spare_pictire_id,
            label: "ลบรูปรายการอะไหล่",
            content: "คุณต้องการลบรูปรายการอะไหล่ ใช่หรือไม่",
            gotoUrl: "admin/sparespicture/"
        }
        fnDelete(option);
    }

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })
    
</script>

</body>
</html>
