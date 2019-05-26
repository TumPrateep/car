<script>
    function deletemechanic(mechanicId,firstName){
        var option = {
            url: "/Mechanic/deleteMechanic?mechanicId="+mechanicId,
            label: "ลบข้อมูลช่าง",
            content: "คุณต้องการลบช่าง "+firstName+" ใช่หรือไม่",
            gotoUrl: "garage/Mechanic"
        }
        fnDelete(option);
    }

    var table = $('#Mechanic-table').DataTable({
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
            "bLengthChange": false,
            "searching": false,
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url+"apigarage/Mechanic/searchMechanic",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.firstName = $("#namemechanic").val()
                    data.skill = $("#skillmechanic").val()
                    //data.status = $("#status").val()
                }
            },
            "order": [[ 0, "asc" ]],
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
                            html+= '<div class="col-md-3">'
                                        + '<div class="card">'
                                            + '<div class="card-body">'
                                                + '<div class="card-two">'
                                                    + '<header>'
                                                        + '<div class="avatar">'
                                                            + '<img src="'+picturePath+'mechanic/'+value.picture+'" width="100" />'
                                                        + '</div>'
                                                    + '</header>'
                                                    + '<h3 title="'+value.firstName+' '+value.lastName+'">'+substr(value.firstName+' '+value.lastName)+''+'<br>'+''+'ช่าง '+''+value.nickName+'</h3>'
                                                    // + '<h4>'+value.nickName+'</h4>'  
                                                    + '<div class="desc">'
                                                        + '<small>เลขที่ประจำตัวประชาชน</small><br> <span>'+value.personalid+'</span><br>'
                                                        + '<small>เบอร์โทรศัพท์</small><br> '+value.phone+'<br>'
                                                        + '<span title="'+changeStringjop(value.job)+'"><small>ความเชี่ยวชาญด้านรถ</small><br> '+substr(changeStringjop(value.job))+'</span><br>'
                                                        + '<small>ประสบการณ์</small><br> '+value.exp+' '+"ปี"+'<br>'
                                                    + '</div>'
                                                    +'<div class="row">'
                                                        +'<div class=" col-lg-12">'
                                                            +'<a href="'+base_url+"garage/mechanic/update/"+value.mechanicId+'"><button type="button" class="btn btn-warning   d1 "  id="#"  ><i class="fa fa-pencil-square-o" title="แก้ไข" ></i></button></a>' 
                                                            +'<button type="button" class="delete btn  btn btn-danger  d1"  onclick="deletemechanic('+value.mechanicId+',\''+value.firstName+'\')"><i class="fa fa-trash" title="ลบ"></i></button>'
                                                        +'</div>'
                                                    +'</div>'
                                                + '</div>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>';

                        })

                        html += '</div>';
                        return html;

                    }

                },
             
            ]	 
    });
    
    $("#search").click(function(){
        event.preventDefault();
        table.ajax.reload();
    })

</script>

</body>
</html>
