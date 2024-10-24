<x-layout>
    <x-slot name="title">
        Medical Reservation
    </x-slot>
    <div>
        <h1>あなたの今後の予定</h1>
        <div>
            @if($reservation->isNotEmpty())
                @foreach($reservations as $reservation)
                    <article>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $reservation->category_id }}</p>
                            <p class="card-text">{{ $reservation->category_id }}</p>
                        </div>
                    </div>
                    </article>
                @endforeach
            @else
                <p>予約はありません。</p>
            @endif
        </div>
    <button class="btn">予約追加</button>
    </div>
</x-layout>
