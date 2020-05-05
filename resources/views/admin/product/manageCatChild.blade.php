@foreach($childs as $child)
    <option value="{{$child->id}}">&nbsp;&nbsp;&nbsp;&#x251c;&#x2500;{{$child->categoryName}}</option>
    @if(count($child->childs))
        @include('admin.product.manageCatChild',['childs' => $child->childs])
    @endif
@endforeach