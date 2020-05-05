<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->categoryName }}
            @if(count($child->childs))
                @include('product.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>