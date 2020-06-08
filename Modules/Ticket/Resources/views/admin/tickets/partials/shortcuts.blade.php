@push('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('admin::admin.shortcuts.back_to_index', ['name' => trans('ticket::tickets.ticket')]) }}</dd>
    </dl>
@endpush

@push('scripts')
    <script>
        keypressAction([
            { key: 'b', route: "{{ route('admin.tickets.index') }}" }
        ]);
    </script>
@endpush
