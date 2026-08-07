@extends('layouts.app')

@section('content')
<div id="users-view" class="page-view active">
                <div class="card">
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;"><i class="fa-solid fa-users" style="color: var(--primary-orange);"></i> User Management</h2>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-weight: 700;">Liara</td>
                                <td><span style="background: #FFF2EC; color: var(--primary-orange); padding: 2px 8px; border-radius: 6px; font-weight: 800;">WMS Head Manager</span></td>
                                <td>liara@berdikarijaya.co.id</td>
                                <td><span style="color: #10B981; font-weight: 700;">Active</span></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700;">Yohanes Jalan</td>
                                <td>Warehouse Supervisor</td>
                                <td>yohanes@berdikarijaya.co.id</td>
                                <td><span style="color: #10B981; font-weight: 700;">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
