<div {{ $attributes->merge(['class' => 'alert alert-' . $type . ($needDismiss ? ' alert-dismissible' : '') . ' fade show']) }}
    role="alert">
    @if (isset($title))
        <strong>
            {{ $title }}
        </strong>
    @endif

    {{ $slot }}

    @if ($needDismiss)
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif
</div>
