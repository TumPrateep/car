
<style>
    html, body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 40px auto;
    }
</style>

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
            editable: true,
            eventLimit: true
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