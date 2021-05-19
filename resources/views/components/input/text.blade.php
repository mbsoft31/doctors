@props(['id'])
<input
    id="{{$id}}"
    name="{{$id}}"
    type="text"
    {{ $attributes->merge(['class' => "focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" ]) }}
 />
