<ul>
@foreach($childs as $key => $child)
   <li>
       {{ $child->title }}
        @if(count($child->childs))
            @include('menu.manageChild',['childs' => $child->childs])
        @endif
   </li>
@endforeach
</ul>