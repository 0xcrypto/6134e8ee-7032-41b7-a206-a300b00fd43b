@if (! is_null($entity))
    @php
        $permissionValue = old('permissions')["{$group}.{$permissionAction}"] ?? permission_value($entity->permissions, "{$group}.{$permissionAction}")
    @endphp
@endif

<div class="col-md-3 {{$permissionAction}}-col">
    <input type="checkbox" class="checkbox" id="{{ "{$group}-{$permissionAction}" }}" 
        {{ isset($permissionValue) && $permissionValue == 1 ? 'checked' : '' }}/>
        <input type="hidden" name="permissions[{{ "{$group}.{$permissionAction}" }}]" value="{{$permissionValue}}"/>
</div>