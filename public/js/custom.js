$(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            var window = $( document ).width();
            if(window > 700){
              $('.fixed.menu').transition('fade in');
            }
          },
          onBottomPassedReverse: function() {
            var window = $( document ).width();
            if(window > 700){
              $('.fixed.menu').transition('fade out');
            }
            // else{
            //   $('.fixed.menu').hide();
            // }
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;