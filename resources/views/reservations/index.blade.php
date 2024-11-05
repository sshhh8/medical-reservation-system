@extends('layouts.app')
@section('content')
    <h1>あなたの今後の予定</h1>
    <button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='{{ route('reservations.create') }}' ">予約追加</button>
    @if($reservations->isNotEmpty())
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
                    {{-- <td>{{ $reservation->users->name ?? 'N/A' }}</td> --}}
                    <td>{{ $reservation->categories->name ?? 'N/A' }}</td>
                    <td>{{ $reservation->date_formatted }}</td>
                    <td><button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='{{ route('reservations.edit', $reservation) }}' ">編集</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>予約はありません。</p>
    @endif
@endsection
