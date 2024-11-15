@extends('layouts.app')
@section('content')
    <div>
        <br>
        <h1>新規予約</h1>
        <br>
            <div class="border col-7">
                <br>
                <h2>予約作成画面</h2>
                <br>
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>氏名：</label>
                        <input type="text" id="user_id" name="user_name" value="{{ $user->name }}" required><br><br>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    <div class="form-group">
                        <label>診療科：</label>
                        <select id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>日付：</label>
                        <input type="datetime" id="date" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="row center-block text-center">
                        <div class="col-5">
                            <button type="button" class="btn btn-outline-secondary btn-block" onclick="location.href='{{ route('reservations.index') }}'">戻る</button>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-outline-secondary btn-block">新規登録</button>
                        </div>
                    </div>
                </form>
            </div>
        <br>
    </div>
</body>
@endsection
