@foreach($packs as $pack)
<div class="item-1 h">
    <img src="images/hero_2.jpg" alt="Image" class="img-fluid">
    <div class="item-1-contents">
        <h3>{{$pack->name}}</h3>
        <ul>
            @foreach($pack->linePacks as $line)
                <li class="d-flex"><span>{{$line->product->name}}</span> <span class="price ml-auto">${{$line->product->price}}</span></li>
            @endforeach
            {{--<li class="d-flex"><span>Shampoo</span> <span class="price ml-auto">$29.00</span></li>
            <li class="d-flex"><span>Blow Dry</span><span class="price ml-auto">$10.00</span></li>
            <li class="d-flex"><span>Iron</span><span class="price ml-auto">$32.00</span></li>
            <li class="d-flex"><span>Brazilian Blow Out</span><span class="price ml-auto">$23.00</span></li>
            <li class="d-flex"><span>Hair Art</span><span class="price ml-auto">$54.00</span></li>--}}
        </ul>
        <a class="btn btn-primary">choisir</a>
    </div>

</div>
@endforeach