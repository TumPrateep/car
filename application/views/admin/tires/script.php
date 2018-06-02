<script>
function deleterim(rimId,rimName){
        var option = {
            url: "/Rim/deleteRim?rimId="+rimId,
            label: "ลบยี่ขอบยาง",
            content: "คุณต้องการลบ "+rimName+" ใช่หรือไม่",
            gotoUrl: "admin/Tires"
        }
        fnDelete(option);
    }
    

</script>

</body>
</html>
