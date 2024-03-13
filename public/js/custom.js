document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prevYear,prev,next,nextYear today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            initialDate: '2024-02-12', // Updated to February 2024
            navLinks: true, // Enables day/week navigation
            editable: true,
            dayMaxEvents: true, // Allows "more" link for numerous events
            events: [{
                    title: 'Audit Kick-off',
                    start: '2024-02-01'
                },
                {
                    title: 'IT Audit',
                    start: '2024-02-07',
                    end: '2024-02-10'
                },
                {
                    groupId: 999,
                    title: 'Controls Review',
                    start: '2024-02-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Follow-up Review',
                    start: '2024-02-16T16:00:00'
                },
                {
                    title: 'Audit Planning',
                    start: '2024-02-11',
                    end: '2024-02-13'
                },
                {
                    title: 'Risk Meeting',
                    start: '2024-02-12T10:30:00',
                    end: '2024-02-12T12:30:00'
                },
                {
                    title: 'Strategy Lunch',
                    start: '2024-02-12T12:00:00'
                },
                {
                    title: 'Findings Presentation',
                    start: '2024-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2024-02-12T17:30:00'
                },
                {
                    title: 'Gala Dinner',
                    start: '2024-02-12T20:00:00'
                },
                {
                    title: 'Retirement Party',
                    start: '2024-02-13T07:00:00'
                },
                {
                    title: 'CPA Webinar',
                    url: 'http://google.com/',
                    start: '2024-02-28'
                }
            ]
        });

        calendar.render();
    });


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const panel = button.closest('.panel-dismissible');
            if (panel) {
                panel.remove();
            }
        });
    });
});     

 











