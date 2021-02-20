@if (Session::has('success'))
    <x-alert needDismiss>
        <slot name="title">
            {{-- @if (!isset($title))
                Register
                @else
                {{ $title }}
            @endif --}}

            @if (isset($title))
                {{ $title }}
            @endif
        </slot>
        {{ session('success') }}
    </x-alert>
@elseif(Session::has("failure"))
    <x-alert type="danger" needDismiss>
        <slot name="title">
            {{-- @if (!isset($title))
                Failed!
                @else
                {{ $title }} Failed!
            @endif --}}
            @if (isset($title))
                {{ $title }}
            @endif
        </slot>
        {{ session('failure') }}
    </x-alert>
@endif
