<div class="col-md-3 index-col">
    @if(array_key_exists('index', $groupPermissions) && ! is_null($entity))
         @php
             $permissionValue = old('permissions')["{$group}.index"] ?? permission_value($entity->permissions, "{$group}.index")
         @endphp

         <input type="checkbox" class="checkbox" id="{{ "{$group}-index" }}" 
         {{ isset($permissionValue) && $permissionValue == 1 ? 'checked' : '' }}/>
         <input type="hidden" name="permissions[{{ "{$group}.index" }}]" value="{{$permissionValue}}"/>
    @endif
 </div>
 <div class="col-md-3 create-col">
     @if(array_key_exists('create', $groupPermissions) && ! is_null($entity))
         @php
             $permissionValue = old('permissions')["{$group}.create"] ?? permission_value($entity->permissions, "{$group}.create")
         @endphp

         <input type="checkbox" class="checkbox" id="{{ "{$group}-create" }}" 
         {{ isset($permissionValue) && $permissionValue == 1 ? 'checked' : '' }}/>
         <input type="hidden" name="permissions[{{ "{$group}.create" }}]" value="{{$permissionValue}}"/>
    @endif
 </div>
 <div class="col-md-3 edit-col">
     @if(array_key_exists('edit', $groupPermissions) && ! is_null($entity))
         @php
             $permissionValue = old('permissions')["{$group}.edit"] ?? permission_value($entity->permissions, "{$group}.edit")
         @endphp

         <input type="checkbox" class="checkbox" id="{{ "{$group}-edit" }}" 
         {{ isset($permissionValue) && $permissionValue == 1 ? 'checked' : '' }}/>
         <input type="hidden" name="permissions[{{ "{$group}.edit" }}]" value="{{$permissionValue}}"/>
    @endif
 </div>
 <div class="col-md-3 destroy-col">
     @if(array_key_exists('destroy', $groupPermissions) && ! is_null($entity))
         @php
             $permissionValue = old('permissions')["{$group}.destroy"] ?? permission_value($entity->permissions, "{$group}.destroy")
         @endphp

         <input type="checkbox" class="checkbox" id="{{ "{$group}-destroy" }}" 
         {{ isset($permissionValue) && $permissionValue == 1 ? 'checked' : '' }}/>
         <input type="hidden" name="permissions[{{ "{$group}.destroy" }}]" value="{{$permissionValue}}"/>
    @endif
 </div>