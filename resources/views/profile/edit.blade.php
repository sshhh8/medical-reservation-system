@extends('layouts.app')
@section('content')
    <p>
        <h1>マイページ</h1>
        <div class="update-profile">
            <br>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ route('profile.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="staticname" class="form-label">氏名</label>
                    <input type="text" class="form-control" id="id" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputostal_code" class="form-label">郵便番号</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ Auth::user()->postal_code }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputaddress" class="form-label">住所</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputphone" class="form-label">電話番号</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
                </div>
                <button type="submit" class="btn btn-outline-secondary btn-block">更新</button>
            </form>
            <br>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary btn-block">ログアウト</button>
            </form>
            <br>
        </div>
    </p>
@endsection
