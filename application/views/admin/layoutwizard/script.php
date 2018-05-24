<script type="text/javascript">
    $(document).ready(function(){
        $("#role").imagepicker({
          show_label: true
        });
        // Toolbar extra buttons
        var btnFinish = $('<button disabled></button>').text('Finish')
                .addClass('btn btn-info btn-finish')
                .on('click', function(){ alert('Finish Clicked'); });
        var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function(){ $('#smartwizard').smartWizard("reset"); });
        
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect:'fade',
            // showStepURLhash: true,
            toolbarSettings: {
                // toolbarPosition: 'both',
                toolbarButtonPosition: 'end',
                toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                // removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            }
        });

        // $('#smartwizard').smartWizard("reset");
        
        $("#form-1").validate({
          rules:{
            firstname: {
              required: true
            }
          },
          messages:{
            firstname: {
              required: "กรุณากรอกชื่อ"
            }
          }
        });

        $("#form-2").validate({
          rules:{
            role: {
              required: true
            }
          },
          messages:{
            role: {
              required: "กรุณาเลือกประเภทผู้ใช้งาน"
            }
          }
        });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if(stepDirection === 'forward' && elmForm){ 
                var id = "#form-"+(stepNumber+1);
                var isValid = $(id).valid();
                return isValid;
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 2){
                showRole();
                $('.btn-finish').prop('disabled', false);
            }else{
                $('.btn-finish').prop('disabled', true);
            }
        });

        function showRole(){
          var role = $("#role").val();
          render(role);
        }

        function render(role){
          // $("#form-3").html(role);
        }
    });
</script>
</body>
</html>