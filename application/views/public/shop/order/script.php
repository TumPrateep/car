<link rel="stylesheet" href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css") ?>">
<link rel="stylesheet" href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>">
<script src="<?=base_url("/public/vendor/datatables/jquery.dataTables.js") ?>"></script>
<script src="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
<script src="<?php echo base_url() ?>public/js/datatable-responsive.js"></script>
<script src="<?php echo base_url() ?>public/js/jquery-dateformat.min.js"></script>

<script>
    var table = $('#order-table').DataTable({
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
                "url": base_url+"service/Order/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    // data.status = $("#status").val()
                }
            },
            "order": [[ 2, "asc" ]],
            "columns": [
                null,
                null,
                null,
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,1,3]
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return jQuery.format.date(data.create_at, "dd/MM/yyyy HH:mm:ss");
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<a href="'+base_url+"admin/car/model/"+data.orderId+'"><button type="button" class="btn btn-info"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a> '
                    }
                },
                {
                    "targets":2,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var  orderstatus = "<span>";
                        
                            if(data.status == "1"){
                                orderstatus +="รอมัดจำ";
                            }
                            else if(data.status == "2"){
                                orderstatus +="รอเข้าให้บริการ";
                            }

                            orderstatus += "</span>";
                           
                        return  orderstatus;
                    
                         
                    }
                        

                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },
                
                { "orderable": false, "targets": 0 },
                {"className": "dt-head-center", "targets": [2]},
                {"className": "dt-center", "targets": [0,1,3]},
                { "width": "15%", "targets": 0 },
                { "width": "20%", "targets": 1 },
                { "width": "20%", "targets": 2 },
                { "width": "20%", "targets": 3 }
            ]	 

    });

    $("#form-search").submit(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>

</body>
</html>
