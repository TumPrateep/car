<script>

    function deletetriemodel(tire_modelId,tire_modelName,tire_brandId){
        var option = {
            url: "/Triemodel/deletetriemodel?tire_modelId="+tire_modelId,
            label: "ลบยี่รุ่นยาง",
            content: "คุณต้องการลบ "+tire_modelName+" ใช่หรือไม่",
            gotoUrl: "admin/Tires/Triemodel/"+tire_brandId
        }
        fnDelete(option);
    }

    $("#btn-search").click(function(){
        table.ajax.reload();
    })

    

</script>

</body>
</html>
