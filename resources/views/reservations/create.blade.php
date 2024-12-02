@extends('layouts.app')
@section('content')
    <div>
        <br>
        <h1>新規予約</h1>
        <br>
            <div class="create-reservation">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <br>
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="staticname" class="form-label">氏名</label>
                        <input type="text" class="form-control" id="user_id" name="user_name" value="{{ $user->name }}" required>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
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
                        <input type="datetime-local" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-block">新規登録</button>
                </form>
                <br>
            </div>
        <br>
    </div>
</body>
@endsection
