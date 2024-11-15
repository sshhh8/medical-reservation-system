@extends('layouts.app')
@section('content')
    <h1>{{ Auth::user()->name }}様の今後の予定</h1>
    <button style="margin-top:50px; margin-bottom:20px;" class="btn btn-outline-secondary" type=“button” onclick="location.href='{{ route('reservations.create') }}' ">新規予約</button>
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
                eventMouseEnter (info) {
                    $(info.el).popover({
                        title: info.event.title,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body',
                        html: true
                    });
                }

                });
                    calendar.render();
                });
    </script>
@endsection
