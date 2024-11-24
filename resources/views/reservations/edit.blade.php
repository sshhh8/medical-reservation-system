@extends('layouts.app')
@section('content')
    <p>
        <h1>編集</h1>
        <div class="create-reservation">
            <br>
            <form action="{{ route('reservations.update', $reservation) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="staticname" class="form-label">氏名</label>
                    <input type="text" class="form-control" id="user_id" name="user_name" value="{{ $reservation->users->name }}" required>
                    <input type="hidden" name="user_id" value="{{ $reservation->user_id }}">
                </div>
                <div class="mb-3">
                    <label for="inputcategory" class="form-label">診療科</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputdate" class="form-label">日付</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $reservation->date }}" required>
                </div>
                <button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='{{ route('questionnaire.index', $reservation) }}' ">問診票</button>
                <button type="submit" class="btn btn-outline-secondary btn-block">更新</button>
            </form>
            <br>
        </div>
    </p>
@endsection
