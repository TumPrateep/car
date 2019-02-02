(function($) {

    // -- check all

    // $('#allday').click(function(event) {   
    //     if(this.checked) {
    //         // Iterate each checkbox
    //         $(':checkbox').each(function() {
    //             this.checked = true;                        
    //         });
    //     } else {
    //         $(':checkbox').each(function() {
    //             this.checked = false;                       
    //         });
    //     }
    // });

    $('#allday').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $('#monday').each(function() {
                this.checked = true;                        
            });
            $('#tuesday').each(function() {
                this.checked = true;                        
            });
            $('#wednesday').each(function() {
                this.checked = true;                        
            });
            $('#thursday').each(function() {
                this.checked = true;                        
            });
            $('#friday').each(function() {
                this.checked = true;                        
            });
            $('#saturday').each(function() {
                this.checked = true;                        
            });
            $('#sunday').each(function() {
                this.checked = true;                        
            });
        } else {
            $('#monday').each(function() {
                this.checked = false;                       
            });
            $('#tuesday').each(function() {
                this.checked = false;                        
            });
            $('#wednesday').each(function() {
                this.checked = false;                        
            });
            $('#thursday').each(function() {
                this.checked = false;                        
            });
            $('#friday').each(function() {
                this.checked = false;                        
            });
            $('#saturday').each(function() {
                this.checked = false;                        
            });
            $('#sunday').each(function() {
                this.checked = false;                        
            });
        }
    });

    $('#monday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            if ('#tuesday' == true) {
                $('#allday').each(function() {
                    this.checked = true;                        
                });
            }
           
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });

    $('#tuesday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            $('#allday').each(function() {
                this.checked = true;                        
            });
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });

    $('#wednesday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            $('#allday').each(function() {
                this.checked = true;                        
            });
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });

    $('#thursday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            $('#allday').each(function() {
                this.checked = true;                        
            });
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });

    $('#friday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            $('#allday').each(function() {
                this.checked = true;                        
            });
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });

    $('#saturday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            $('#allday').each(function() {
                this.checked = true;                        
            });
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });

    $('#sunday').click(function(event) {   
        if(this.checked ) {
            // Iterate each checkbox
            $('#allday').each(function() {
                this.checked = true;                        
            });
        }
         else {
            $('#allday').each(function() {
                this.checked = false;                       
            });
        }
    });




   
        
})(jQuery);