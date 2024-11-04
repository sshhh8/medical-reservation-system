@extends('layouts.app')
@section('content')
    <h1>{{ $user->name }}様の今後の予定</h1>
    @if($reservations->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>患者氏名</th>
                <th>診療科</th>
                <th>日付</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->users->name ?? 'N/A' }}</td> <!-- リレーションを使用 -->
                    <td>{{ $reservation->categories->name ?? 'N/A' }}</td> <!-- リレーションを使用 -->
                    <td>{{ $reservation->date_formatted }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>予約はありません。</p>
    @endif
    <button class="btn" onclick="location.href='{{ route('reservations.create') }}' ">予約追加</button>
    <button class="btn" onclick="location.href='{{ route('reservations.edit', $reservation) }}' ">編集</button>
@endsection
