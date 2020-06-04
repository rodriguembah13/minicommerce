@foreach($packs as $pack)
<div class="item-1 h">
    <img src="images/clothes.jpg" alt="Image" class="img-fluid">
    <div class="item-1-contents">
        <h3>{{$pack->name}} <span style="color: #0a0c0d">({{$pack->price}} F)</span></h3>
        <ul>
            @foreach($pack->linePacks as $line)
                <li class="d-flex"><span class="quantity">{{$line->quantity}}</span> <span>{{$line->product->name}}</span> <span class="price ml-auto">${{$line->product->price}}</span></li>
            @endforeach
        </ul>
        <a class="btn btn-primary" href="{{ route('front.table', $pack->id) }}">Commander</a>
    </div>

</div>
@endforeach
