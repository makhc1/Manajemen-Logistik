@extends('layouts.app')

@section('content')
<div id="users-view" class="page-view active">
                <div class="card">
                    <div class="page-header-row">
                        <div>
                            <h2 class="page-title"><i class="fa-solid fa-users" class="text-primary-orange"></i> User Management</h2>
                            <p class="page-subtitle-mt-1">Kelola hak akses dan peran (role) staf gudang Anda.</p>
                        </div>
                        <button id="openUserModalBtn" class="btn-action btn-primary-fit"><i class="fa-solid fa-plus"></i> Add User</button>
                    </div>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="fw-bold">{{ $user->name }}</td>
                                <td>
                                    @if(isset($user->role) && $user->role === 'WMS Head Manager')
                                        <span class="role-badge">{{ $user->role }}</span>
                                    @else
                                        {{ $user->role ?? 'Warehouse Staff' }}
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="fw-bold {{ ($user->status ?? 'Active') === 'Active' ? 'text-success' : 'text-danger' }}">
                                        {{ $user->status ?? 'Active' }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <button data-id="{{ $user->id }}" data-name="{{ addslashes($user->name ?? '') }}" data-email="{{ addslashes($user->email ?? '') }}" data-role="{{ addslashes($user->role ?? '') }}" data-status="{{ addslashes($user->status ?? '') }}" data-image="{{ addslashes($user->profile_image_url ?? '') }}" class="btn-action btn-edit btn-edit-user"><i class="fa-solid fa-pen"></i></button>
                                    <button data-id="{{ $user->id }}" class="btn-action btn-delete btn-delete-user"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
