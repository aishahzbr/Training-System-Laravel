    @extends('layouts.sbadmin')
    @section('head')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trainings Calendar</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @endsection

    @section('content')
        <div class="container mt-5">
            {{-- For Search --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search trainings">
                        <div class="input-group-append">
                            <button id="searchButton" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="btn-group mb-3" role="group" aria-label="Calendar Actions">
                        <button id="exportButton" class="btn btn-success">Export Calendar</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="calendar" style="width: 100%;height:100vh"></div>

                </div>
            </div>
        </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                var calendarEl = document.getElementById('calendar');
                var events = [];
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    initialView: 'dayGridMonth',
                    events: '/assigns/getEvents',
                    timeZone: 'Asia/Kuala_Lumpur',
                    editable: true,

                    // Deleting The Event
                    eventContent: function(info) {
                    var eventTitle = info.event.title;
                    var eventElement = document.createElement('div');
                    eventElement.innerHTML = '<span style="cursor: pointer;">❌</span>&nbsp; ' + eventTitle;

                    eventElement.querySelector('span').addEventListener('click', function() {
                        if (confirm("Are you sure you want to delete this training?")) {
                            var eventId = info.event.id;
                            console.log('Event ID:', eventId); // Log the event ID
                            $.ajax({
                                method: 'DELETE',
                                url: '/assigns/schedule/' + eventId,
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    console.log('Event deleted successfully.');
                                    calendar.refetchEvents(); // Refresh events after deletion

                                    // Display an alert to the user
                                    alert(response.message);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error deleting event:', error);

                                    // Log the CSRF token
                                    var csrfToken = '{{ csrf_token() }}';
                                    console.log('CSRF Token:', csrfToken);

                                    if (xhr.status === 419) {
                                        console.log('CSRF token mismatch. Refresh the page and try again.');
                                    }
                                }
                            });
                        }
                    });
                        return {
                            domNodes: [eventElement]
                        };
                    },

                    eventDrop: function(info) {
                        var eventId = info.event.id;
                        var newStartDate = info.event.startdate;
                        var newEndDate = info.event.endate || newStartDate;

                        $.ajax({
                            method: 'PUT',
                            url: `/assigns/schedule/${eventId}`,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                start_date: newStartDate,
                                end_date: newEndDate,
                                timeZone:'Asia/Kuala_Lumpur'
                            },
                            success: function() {
                                console.log('Event moved successfully.');
                            },
                            error: function(error) {
                                console.error('Error moving event:', error);
                            }
                        });
                    },





            

                });

            calendar.render();

            // Log a message before making the AJAX request
            console.log('Fetching events from the server...');
            // Log the CSRF token
            var csrfToken = '{{ csrf_token() }}';

            console.log('CSRF Token:', csrfToken);

            $.ajax({
                method: 'GET',
                url: '/assigns/getEvents',
                success: function(response) {
                    console.log('Events fetched successfully:', response);

                    var formattedEvents = response.map(function (event) {
                        var endDatePlusOneDay = new Date(event.endate);
                        endDatePlusOneDay.setDate(endDatePlusOneDay.getDate() + 1);

                        return {
                            id: event.id,
                            title: event.training_title + ' - ' + event.trainers_name,
                            start: event.startdate,
                            end: endDatePlusOneDay.toISOString().split('T')[0],   
                            allDay: true
                        };
                    });
                    // Set the formatted events to FullCalendar
                    calendar.setOption('events', formattedEvents);

                    // Log the event sources
                    console.log(calendar.getEventSources());
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching events:', error);
                }
            });

            </script>
    @endsection