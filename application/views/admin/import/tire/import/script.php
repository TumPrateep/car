<script src="<?php echo base_url("public/js/papaparse/papaparse.min.js") ?>"></script>
<script>
    var csvData = [];
    var userId = $('#userId').val();

    function save() {
        if (csvData.length > 0) {
            $.post(base_url + "api/data/save_tireimport", {
                    "csvData": csvData
            },
            function(data, textStatus, jqXHR) {
                if(data.message == 200){
                    showMessage(data.message, 'admin/import/tire/'+userId);
                }else{
                    showMessage(data.message);
                }
            })
        }
    }

    $(document).ready(function () {

        $("#form").submit(function(e) {
            e.preventDefault();
            $("#response").attr("class", "");
            $("#response").html("");
            console.log($("#file_input").val());
            var fileType = ".csv";
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" +
                fileType + ")$");
            if (!regex.test($("#file_input").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
                $("#response").html(
                    "ชนิดไฟล์ไม่ถูกต้อง : ไฟล์ <b>" + fileType +
                    "</b>");
                clearTableAndData();
                return false;
            }
            renderTable();
        });

        function renderTable() {
            $('#file_input').parse({
                config: {
                    delimiter: "auto",
                    complete: displayHTMLTable,
                }
            });
        }

        function displayHTMLTable(results) {
            console.log(results);
            var header = "no,workplace_id,workplace_name,workplace_type_code,address,district,province,zipcode,position,condition,detail";
            var isValid = true;
            if (isValid) {
                $("#parsed_csv_list").html("");
                var table = "<table class='table table-striped'>";
                var data = results.data;

                table += "<div>" +
                    "<small>*ตารางแสดงข้อมูลภายในไฟล์ csv </small>" +
                    "</div>";

                for (i = 0; i < data.length - 1; i++) {
                    table += "<tr>";
                    var row = data[i];
                    var cells = row.join(",").split(",");
                    if (i > 0) {
                        csvData.push(cells);
                    }
                    for (j = 0; j < cells.length; j++) {
                        table += "<td>";
                        table += cells[j];
                        table += "</td>";
                    }
                    table += "</tr>";
                }
                table += "</table>";

                table += "<br/>" +
                    "<div>" +
                    "<button type='button' class='btn btn-success' onclick='save()'>บันทึก</button>" +
                    "</div>";
                $("#parsed_csv_list").html(table);
            } else {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
                $("#response").html("รูปแบบไฟล์ไม่ถูกต้อง");
                clearTableAndData();
            }
        }

        function clearTableAndData() {
            csvData = [];
            $("#parsed_csv_list").html("");
        }
        
    });
</script>

</body>
</html>
