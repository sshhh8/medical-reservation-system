@extends('layouts.app')
@section('content')
    <div class="content-title">
        <h1>{{ Auth::user()->name }}様の今後の予定</h1>
        <button class="btn btn-outline-secondary" type=“button” onclick="location.href='{{ route('reservations.create') }}' ">新規予約</button>
    </div>
    <div id='calendar'></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: 'ja',
                height: 'auto',
                firstDay: 1,
                headerToolbar: {
                    left: "dayGridMonth,timeGridWeek,listMonth",
                    center: "title",
                    right: "today prev,next"
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
                });
                    calendar.render();
                });
    </script>
@endsection
