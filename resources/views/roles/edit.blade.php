<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Breadcrumbs::render('roles.edit', $role) }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $role->name }}
            </h2>
        </div>
    </x-slot>

    <div x-data="{{ json_encode(['RoleHasAllPermissions' => \App\Models\User::roleHasPermissions($role, $allPermissions)]) }}" class="bg-white rounded-xl py-10 px-12 my-5 shadow">

        <form class="row" method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <div class="relative w-full sm:max-w-half sm:flex-half space-y-4">

                <div>
                    <x-ui.label for="name" value="{{ __('Role Name') }}"/>
                    <x-ui.input id="name" type="text" placeholder="Enter Role Name" class="mt-1 block w-full" name="name" value="{{ old('name', $role->name) }}"/>
                    <x-ui.input-error for="name" class="mt-2"/>
                </div>

                <div>
                    <x-ui.label for="permissions" value="{{ __('Permissions') }}"/>

                    <label class="flex flex-row items-center py-3 cursor-pointer">
                        <x-ui.checkbox class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200" id="checkPermissionAll" value="1" x-bind:checked="RoleHasAllPermissions" />
                        <span class="ml-2 text-gray-700 font-medium dark:text-dark-typography">All</span>
                    </label>

                    <hr>

                    @php $i = 1; @endphp

                    @foreach($permissionGroups as $permissionGroup)

                        <div class="grid grid-cols-3 gap-2">

                            @php
                                $permissions = \App\Models\User::getpermissionsByGroupName($permissionGroup->name);
                                $j = 1;
                            @endphp

                            <div class="col-span-3 sm:col-span-1">

                                <label x-data="{{ json_encode(['roleHasPermissions' => \App\Models\User::roleHasPermissions($role, $permissions)]) }}" class="flex flex-row items-center py-3 cursor-pointer">
                                    <x-ui.checkbox
                                        id="{{ $i }}Management"
                                        value="{{ $permissionGroup->name }}"
                                        x-bind:checked="roleHasPermissions"
                                        onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                                        class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200"/>
                                    <span class="ml-2 text-gray-700 font-medium dark:text-dark-typography">{{ $permissionGroup->name }}</span>
                                </label>

                            </div>

                            <div class="col-span-3 sm:col-span-2 py-3 role-{{ $i }}-management-checkbox">

                                @foreach($permissions as $permission)

                                    <label x-data="{{ json_encode(['RoleHasPermissionTo' => $role->hasPermissionTo($permission->name) ]) }}" class="flex flex-row items-center cursor-pointer py-0">
                                        <x-ui.checkbox
                                            id="checkPermission{{ $permission->id }}"
                                            name="permissions[]"
                                            value="{{ $permission->name }}"
                                            x-bind:checked="RoleHasPermissionTo"
                                            onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                                            class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200"/>
                                        <span class="ml-2 text-gray-700 dark:text-dark-typography">{{ ucwords(Str::of($permission->name)->replace('.', ' ')) }}</span>
                                    </label>

                                    @php  $j++; @endphp

                                @endforeach

                            </div>

                        </div>

                        @if(!$loop->last)
                            <hr>
                        @endif

                        @php  $i++; @endphp

                    @endforeach
                </div>
            </div>
            <div class="flex flex-row justify-end space-x-4 py-4">
                <x-ui.secondary-button>
                    Nevermind
                </x-ui.secondary-button>

                <x-ui.button type="submit">
                    {{ __('Update Role') }}
                </x-ui.button>
            </div>
        </form>
    </div>

    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {
                // check and uncheck all the permission
                $("#checkPermissionAll").click(function () {
                    if ($(this).is(':checked')) {
                        $('input[type=checkbox]').prop('checked', true);
                    } else {
                        $('input[type=checkbox]').prop('checked', false);
                    }
                })
            });

            function checkPermissionByGroup(className, checkThis) {
                const groupIdName = $("#" + checkThis.id);
                const classCheckBox = $('.' + className + ' input');
                if (groupIdName.is(':checked')) {
                    classCheckBox.prop('checked', true);
                } else {
                    classCheckBox.prop('checked', false);
                }
                implementAllChecked();
            }

            function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
                const classCheckbox = $('.' + groupClassName + ' input');
                const groupIDCheckBox = $("#" + groupID);
                // if there is any occurrence where something is not selected then make selected = false
                if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
                    groupIDCheckBox.prop('checked', true);
                } else {
                    groupIDCheckBox.prop('checked', false);
                }
                implementAllChecked();
            }

            function implementAllChecked() {
                const countPermissions = {{ count($allPermissions) }};
                const countPermissionGroups = {{ count($permissionGroups) }};
                //  console.log((countPermissions + countPermissionGroups));
                //  console.log($('input[type="checkbox"]:checked').length);
                if ($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)) {
                    $("#checkPermissionAll").prop('checked', true);
                } else {
                    $("#checkPermissionAll").prop('checked', false);
                }
            }
        </script>
    @endpush

</x-app-layout>
