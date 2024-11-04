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
                        <input type="text" id="user_id" name="user_name" value="{{ $user->name }}" readonly><br><br>
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
                        <input type="date" value="2024-01-01" />
                    </div>
                </form>

        <div class="row center-block text-center">
            <div class="col-1">
            </div>
            <div class="col-5">
                <button type="button" class="btn btn-outline-secondary btn-block">閉じる</button>
            </div>
            <div class="col-5">
                <button type="button" class="btn btn-outline-primary btn-block">新規登録</button>
            </div>
        </form>

        </div>
        <br>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
@endsection
