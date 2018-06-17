<script>
    var table = $('#brand-table').DataTable({
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
                "url": base_url+"api/CarAccessory/search",
                "dataType": "json",
                "type": "POST",
                "data": function ( data ) {
                    data.brandName = $("#brand-search").val()
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
                            html += '<div class="col-md-3">'
                                 + '<div class="card">'
                                 + '<img class="card-img-top" src="'+base_url+'public/image/brand/'+value.brandPic+'" alt="Card image cap">'
                                 + '<div class="card-body text-center">'
                                 + '<h5 class="card-title">'+value.brandName+'</h5>'
                                 + '<a href="#" class="btn btn-primary">Go somewhere</a>'
                                 + '</div>'
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

    $.fn.select2.defaults.set( "theme", "bootstrap" );

    $("#tireBrand").select2({
        placeholder: "ยี่ห้อยาง",
        ajax: {
            url: base_url+"apiCaraccessories/Tirebrand/getAllTireBrand",
            dataType: 'json',
            delay: 250,
            cache: true,
            method: "post",
            data: function (term, page) {
                return {
                    term: term.term, // search term
                    page: 20
                };
            },
            processResults: function (data, page) {
                console.log(data);
                return {
                    results: data.items
                };
            }
        },
        escapeMarkup: function (markup) { return markup; }
    });

    $("#tireBrand").change(function(){
        $("#tireModel").val(null).trigger('change');
    });

    $("#tireModel").select2({
        placeholder: "รุ่นยาง",
        ajax: {
            url: base_url+"apiCaraccessories/Tiremodel/getAllTireModel",
            dataType: 'json',
            delay: 250,
            cache: true,
            method: "post",
            data: function (term, page) {
                return {
                    term: term.term, // search term
                    page: 20,
                    tireBrandId: $("#tireBrand").val()
                };
            },
            processResults: function (data, page) {
                console.log(data);
                return {
                    results: data.items
                };
            }
        },
        escapeMarkup: function (markup) { return markup; }
    });

    $("#tireRim").select2({
        placeholder: "ขอบยาง",
        ajax: {
            url: base_url+"apiCaraccessories/Tirerim/getAllTireRim",
            dataType: 'json',
            delay: 250,
            cache: true,
            method: "post",
            data: function (term, page) {
                return {
                    term: term.term, // search term
                    page: 20
                };
            },
            processResults: function (data, page) {
                console.log(data);
                return {
                    results: data.items
                };
            }
        },
        escapeMarkup: function (markup) { return markup; }
    });

    $("#tireRim").change(function(){
        $("#tireSize").val(null).trigger('change');
    });

    $("#tireSize").select2({
        placeholder: "ขนาดยาง",
        ajax: {
            url: base_url+"apiCaraccessories/Triesize/getAllTireSize",
            dataType: 'json',
            delay: 250,
            cache: true,
            method: "post",
            data: function (term, page) {
                return {
                    term: term.term, // search term
                    page: 20,
                    tireRimId: $("#tireRim").val()
                };
            },
            processResults: function (data, page) {
                console.log(data);
                return {
                    results: data.items
                };
            }
        },
        escapeMarkup: function (markup) { return markup; }
    });

</script>

</body>
</html>