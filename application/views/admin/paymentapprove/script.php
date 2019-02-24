<script>
    var table = $('#brand-table').DataTable({
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
                "url": base_url+"api/PaymentApprove/searchPaymentApprove",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandName = $("#table-search").val()
                    data.status = $("#status").val()
                }
            },
            "order": [[ 1, "asc" ]],
            "columns": [
                null,
                null,
                { "data": "name" },
                null,
                null,
                // { "data": "money" },
                { "data": "slip" },
                null
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,5,6]
                },{
                    "targets": 0,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return meta.row + 1;
                    }
                },{
                    "targets": 1,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var html = '';
                        html+='<a href="'+base_url+'admin/OrderDetail/show/'+data.orderId+'">#'+data.orderId+'</a><br>';
                        if(data.status==1){
                            html+='<span class="badge badge-warning">รออนุมัติ</span>';
                        }else if(data.status==2){
                            html+='<span class="badge badge-success">อนุมัติ</span>';
                        }else if(data.status==3){
                            html+='<span class="badge badge-danger">ยกเลิกการจอง</span>';
                        }else{
                            html+='<span class="badge badge-default">รอมัดจำ</span>';
                        }
                        return html;
                    }
                },{
                    "targets": 3,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        
                        return currency(data.summary, {  precision: 0 }).format()+' บาท';
                    }
                },{
                    "targets": 4,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        if(data.money != null){
                            return currency(data.money, {  precision: 0 }).format()+' บาท';
                        }else {
                            return '<small><i class="gray">รอจ่ายมัดจำ</i></small>';
                        }
                        
                    }
                },{
                    "targets": 5,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        return '<button type="button" class="btn btn-info"><i class="fa fa-file-image-o" aria-hidden="true"></i></button>';
                    }
                },{
                    "targets": 6,
                    "data": null,
                    "render": function ( data, type, full, meta ) {
                        var disable = "";
                        if(data.status == null){
                            disable = "disabled";
                        }
                        return '<button type="button" class="btn btn-success" '+disable+'  onclick="confirmStatus('+data.paymentId+')">ยืนยัน</button> '
                            +'<button type="button" class="delete btn btn-danger" onclick="cancelStatus('+data.paymentId+')">ยกเลิก</button>';
                    }
                },
                {"className": "dt-center", "targets": [0,1,2,3,4,5,6]}
            ]	 

    });

    function confirmStatus(paymentId){
        var option = {
            url: "/PaymentApprove/changeStatus?paymentId="+paymentId,
            label: "ยืนยันรายการชำระเงิน",
            status: 2,
            content: "คุณต้องการยืนยันรายการชำระเงินนี้ ใช่หรือไม่",
            gotoUrl: "admin/paymentapprove"
        }
        fnConfirm(option);
    }   

    function cancelStatus(paymentId){
        var option = {
            url: "/PaymentApprove/changeStatus?paymentId="+paymentId,
            label: "ยกเลิกรายการชำระเงิน",
            status: 3,
            content: "คุณต้องการยกเลิกรายการชำระเงินนี้ ใช่หรือไม่",
            gotoUrl: "admin/paymentapprove"
        }
        fnConfirm(option);
    }



</script>

</body>
</html>
