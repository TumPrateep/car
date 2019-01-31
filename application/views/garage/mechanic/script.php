<script>
    function deletemechanic(mechanicId,firstName){
        var option = {
            url: "/Mechanic/deleteMechanic?mechanicId="+mechanicId,
            label: "ลบชื่อช่างคนนี้",
            content: "คุณต้องการลบ "+firstName+" ใช่หรือไม่",
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
                "url": base_url+"apiGarage/Mechanic/searchMechanic",
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
                                                    + '<h3>'+value.firstName+' '+value.lastName+'</h3>'
                                                    + '<div class="desc">'
                                                        + '<small>เลขที่ประจำตัวประชาชน</small><br> <span>'+value.personalid+'</span><br>'
                                                        + '<small>เบอร์โทรศัพท์</small><br> '+value.phone+'<br>'
                                                        + '<small>ความถนัด</small><br> '+value.skill+'<br>'
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
                            // '<div class="col-md-3">'        
                            //             +'<div class="card text-left">'
                                            
                            //                 +'<h3 class="card-title"><i class="fa fa-user-circle-o" ></i> ข้อมูลช่าง </h3>'
                            //               +'<hr>'
                                        
                            //                 +'<div class="row">'
                            //                     +'<div class="col-lg-12">'
                            //                         +'<div>'
                            //                             +'<label  title="เลขบัตรประชาชน"> <i class="fa fa-id-card" aria-hidden="true"></i> :</label>'
                            //                             +'<label>'+value.personalid+'</label>'
                            //                         +'</div>'
                            //                         +'<div>'
                            //                             +'<label title="ชื่อ-นามสกุล"> <i class="fa fa-user" aria-hidden="true"></i> :</label>'
                            //                             +'<label>'+value.firstName+' '+value.lastName+'</label>'
                            //                         +'</div>'
                            //                         +'<div>'
                            //                             +'<label title="เบอร์โทร"><i class="fa fa-phone-square" aria-hidden="true"> :</i></label>'
                            //                             +'<label>'+value.phone+'</label>'
                            //                         +'</div>'
                            //                         +'<div>'
                            //                             +'<label title="ความชำนาญ"><i class="fa fa-car" aria-hidden="true"> :</i></label>'
                            //                             +'<label>'+value.skill+'</label>'
                            //                         +'</div>'
                            //                         +'<div>'
                            //                             +'<label title="ประสบการณ์(ปี)"><i class="fa fa-clock-o" aria-hidden="true"> :</i></label>'
                            //                             +'<label>'+value.exp+' '+"ปี"+'</label>'
                            //                         +'</div>'
                            //                     +'</div>'
                            //                 +'</div>'
                            //                 +'<div class="row">'
                            //                     +'<div class=" col-lg-12">'
                            //                         +'<a href="'+base_url+"garage/mechanic/update/"+value.mechanicId+'"><button type="button" class="btn btn-warning   d1 "  id="#"  ><i class="fa fa-pencil-square-o" title="แก้ไข" ></i></button></a>'
                            //                         +'<button type="button" class="delete btn  btn btn-danger  d1"  onclick="deletemechanic('+value.mechanicId+',\''+value.firstName+'\')"><i class="fa fa-trash" title="ลบ"></i></button>'
                            //                     +'</div>'
                            //                 +'</div>'   
                                           
                            //             +'</div>'
                            //         +'</div>';

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
