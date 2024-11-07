@extends('layouts.app')
@section('content')
    <h1>{{ Auth::user()->name ?? 'N/A' }}様の今後の予定</h1>
    <button style="margin-top:50px; margin-bottom:20px;" class="btn btn-outline-secondary" type=“button” onclick="location.href='{{ route('reservations.create') }}' ">新規予約</button>

    @if($reservations->isNotEmpty())
    <form method="GET" action="{{ route('reservations.index') }}">
        @csrf
        <input type="text" name="search" placeholder="名前で検索" value="{{ old('keyword', $keyword) }}">
        <button type="submit">検索</button>
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
            @forelse ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->categories->name ?? 'N/A' }}</td>
                    <td>{{ $reservation->date_formatted }}</td>
                    <td><button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='{{ route('reservations.edit', $reservation) }}' ">編集</button></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">該当する予約はありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @else
        <p>予約はありません。</p>
    @endif
@endsection
