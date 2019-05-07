<script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            themeSystem: 'bootstrap4',
            locale: 'th',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonIcons: true, // show the prev/next text
            weekNumbers: false,
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            displayEventTime: false,
            eventLimit: true,
            eventClick: function(event){
                console.log(event);
                $("#eventOrder").html(event.orderId);
                $("#eventStart").html(event.start.toISOString());
                $("#eventPlate").html(event.plate);
                $("#eventName").html(event.nameuser);
                $("#eventLink").html('<a href="'+base_url+'garage/reservedetail/reservedetail/'+event.orderId+'">คลิก</a>');
                $("#eventModal").modal('show');
            }
        })

        init();

        function init(){

            $.get(base_url+"apiGarage/Schedule/getEvent", {},
                function (data, textStatus, jqXHR) {
                    calendar.fullCalendar( 'addEventSource', data.data );
                }
            );
        }

        $('.fc-prev-button, .fc-next-button').click(function(){
            var moment = $('#calendar').fullCalendar('getDate');
            // alert("The current date of the calendar is " + moment.format('M'));
        });

    });
</script>