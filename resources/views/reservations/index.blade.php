@extends('layouts.app')
@section('head-scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });
        </script>
@endsection
@section('content')
    <div class="content-title">
        <h1>{{ Auth::user()->name }}様の今後の予定</h1>
        <button class="btn btn-outline-secondary" type=“button” onclick="location.href='{{ route('reservations.create') }}' ">新規予約</button>
    </div>
    <div id='calendar'></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var initialView = window.innerWidth < 768 ? 'listMonth' : 'timeGridWeek';
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: initialView,
                timeZone: "Asia/Tokyo",
                locale: 'ja',
                height: 'auto',
                firstDay: 1,
                headerToolbar: {
                    left: "dayGridMonth,timeGridWeek,listMonth",
                    center: "title",
                    right: "today prev,next",
                },
                dayCellContent: function(arg){
		            return arg.date.getDate();
	            },
                buttonText: {
                    today: '今月',
                    month: '月',
                    week: '週',
                    list: 'リスト'
                },
                noEventsContent: 'スケジュールはありません',
                eventSources: [
                {
                    url: '/events',
                },
                ],
                eventSourceFailure () {
                    console.error('エラーが発生しました。');
                },
                windowResize: function(view) {
                if (window.innerWidth < 768) {
                    calendar.changeView('listMonth');
                } else {
                    calendar.changeView('timeGridWeek');
                }
                },
                });
                    calendar.render();
                });
    </script>
@endsection
