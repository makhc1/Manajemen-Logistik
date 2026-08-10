@extends('layouts.app')

@section('content')
<div id="users-view" class="page-view active">
                <div class="card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A;"><i class="fa-solid fa-users" style="color: var(--primary-orange);"></i> User Management</h2>
                        <button onclick="openUserModal()" class="btn-action" style="background: #3B82F6; color: white; border: none; padding: 0.55rem 1rem; border-radius: 8px; cursor: pointer; font-weight: 600; flex: none; width: fit-content;"><i class="fa-solid fa-plus"></i> Add User</button>
                    </div>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th style="text-align: right;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td style="font-weight: 700;">{{ $user->name }}</td>
                                <td>
                                    @if(isset($user->role) && $user->role === 'WMS Head Manager')
                                        <span style="background: #FFF2EC; color: var(--primary-orange); padding: 2px 8px; border-radius: 6px; font-weight: 800;">{{ $user->role }}</span>
                                    @else
                                        {{ $user->role ?? 'Warehouse Staff' }}
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span style="color: {{ ($user->status ?? 'Active') === 'Active' ? '#10B981' : '#EF4444' }}; font-weight: 700;">
                                        {{ $user->status ?? 'Active' }}
                                    </span>
                                </td>
                                <td style="text-align: right;">
                                    <button onclick="editUser({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ $user->role }}', '{{ $user->status }}', '{{ addslashes($user->profile_image_url) }}')" class="btn-action" style="background: #F1F5F9; color: #3B82F6; padding: 0.4rem 0.6rem; margin-right: 0.25rem; display: inline-flex;"><i class="fa-solid fa-pen"></i></button>
                                    <button onclick="deleteUser({{ $user->id }})" class="btn-action" style="background: #FEE2E2; color: #EF4444; padding: 0.4rem 0.6rem; display: inline-flex;"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
