<x-layout>
    <x-slot name="title">
        Medical Reservation
    </x-slot>
    <div>
        <br>
        <h1>新規予約</h1>
        <br>
            <div class="border col-7">
                <br>
                <h2>予約作成画面</h2>
                <br>
        <div class="row">
            <div class="col-md">
                <form>
                    <div class="form-group">
                        <label>患者番号：</label>
                        <input type="text" class="form-control" value="000000" disabled>
                    </div>
                    <div class="form-group">
                        <label>氏名：</label>
                        <input type="text" class="form-control" placeholder="山田太郎">
                    </div>
                    <div class="form-group">
                        <label>診療科：</label>
                        <select class="form-control">
                            <option></option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>日付：</label>
                        <input type="date" value="2024-01-01" />
                    </div>
                </form>
            </div>
        </div>
        <div class="row center-block text-center">
            <div class="col-1">
            </div>
            <div class="col-5">
                <button type="button" class="btn btn-outline-secondary btn-block">閉じる</button>
            </div>
            <div class="col-5">
                <button type="button" class="btn btn-outline-primary btn-block">新規登録</button>
            </div>
        </div>
        <br>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
    </div>
</x-layout>
