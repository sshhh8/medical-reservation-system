@extends('layouts.app')
@section('content')<html>
    <h1>問診票</h1>
    <p>{{ $reservation->date_formatted }},{{ $reservation->categories->name }}の予定</p>
    <div class="chatbot-window">
        <div class="chatbot-header">
            <p>AIdoctor サポート</p>
        </div>
        <div class="chatbot-messages" id="messages"></div>
        <div class="chatbot-input">
            <input type="text" id="userInput" placeholder="どのような症状がありますか？">
            <button id="sendMessage">送信</button>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#sendMessage').click(function() {
                let message = $('#userInput').val();
                $('#messages').append('<div>あなた: ' + message + '</div>');
                $.post( "{{ route('questionnaire.post') }}" , { message: message }, function(data) {
                    $('#messages').append("<div>AIdoctor:" + data + "</div>");
                });
                $('#userInput').val('');
            });
        });
    </script>
@endsection
