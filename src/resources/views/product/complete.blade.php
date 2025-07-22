@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('payment_method'))
    <p>支払い方法：
        <span>
            @if(session('payment_method') === 'convenience')
                コンビニ払い
            @elseif(session('payment_method') === 'card')
                クレジットカード
            @endif
        </span>
    </p>
@endif
