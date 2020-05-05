<div class="one-third">
        <ul>
                @foreach($childs as $child)
                <li>
                        <a href="{{url('productsByCat/'.$child->id)}}" title="">{{ $child->categoryName }}</a>
                        @if(count($child->childs))
                                @include('product.manageCatMenu',['childs' => $child->childs])
                        @endif
                </li>
                @endforeach
        </ul>
</div>