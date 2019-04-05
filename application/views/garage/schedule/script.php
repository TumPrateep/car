<link href="https://fullcalendar.io/releases/core/4.0.2/main.min.css" rel="stylesheet">
<link href="https://fullcalendar.io/releases/daygrid/4.0.1/main.min.css" rel="stylesheet">
<link href="https://fullcalendar.io/releases/timegrid/4.0.1/main.min.css" rel="stylesheet">
<script src="https://fullcalendar.io/releases/core/4.0.2/main.min.js"></script>
<script src="https://fullcalendar.io/releases/interaction/4.0.2/main.min.js"></script>
<script src="https://fullcalendar.io/releases/daygrid/4.0.1/main.min.js"></script>
<script src="https://fullcalendar.io/releases/daygrid/4.0.1/main.min.js"></script>
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
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        defaultView: 'dayGridMonth',
        defaultDate: '2019-04-07',
        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
        {
            title: 'All Day Event',
            start: '2019-04-01'
        },
        {
            title: 'Long Event',
            start: '2019-04-07',
            end: '2019-04-10'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: '2019-04-09T16:00:00'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: '2019-04-16T16:00:00'
        },
        {
            title: 'Conference',
            start: '2019-04-11',
            end: '2019-04-13'
        },
        {
            title: 'Meeting',
            start: '2019-04-12T10:30:00',
            end: '2019-04-12T12:30:00'
        },
        {
            title: 'Lunch',
            start: '2019-04-12T12:00:00'
        },
        {
            title: 'Meeting',
            start: '2019-04-12T14:30:00'
        },
        {
            title: 'Birthday Party',
            start: '2019-04-13T07:00:00'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2019-04-28'
        }
        ]
    });

    calendar.render();
    });
</script>