@extends('layouts.app')
@section('content')
    <h1>{{ Auth::user()->name ?? 'N/A' }}様の今後の予定</h1>
    <button style="margin-top:50px; margin-bottom:20px;" class="btn btn-outline-secondary" type=“button” onclick="location.href='{{ route('reservations.create') }}' ">新規予約</button>

    @if($reservations->isNotEmpty())
    <form method="GET" action="{{ route('reservations.index') }}">
        @csrf
        <div class="input-group">
            <select name="category_id" class="custom-select" id="inputGroupSelect04" aria-label="select category_id with button addon">
                <option value="" selected>診療科を選んでください</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <input type="submit" value="検索" class="btn btn-outline-secondary">
            </div>
        </div>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>診療科</th>
                <th>日付</th>
                <th>編集</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->categories->name ?? 'N/A' }}</td>
                    <td>{{ $reservation->date_formatted }}</td>
                    <td><button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='{{ route('reservations.edit', $reservation) }}' ">編集</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <tr>
        <td colspan="4">該当する予約はありません。</td>
    </tr>
    @endif
@endsection
