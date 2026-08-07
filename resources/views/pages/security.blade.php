@extends('layouts.app')

@section('content')
<div id="security-view" class="page-view active">
                <div class="card">
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;"><i class="fa-solid fa-shield-halved" style="color: var(--primary-orange);"></i> Security & Access Controls</h2>
                    <p style="font-size: 0.85rem; color: #64748B; margin-bottom: 1.5rem;">Audit log transaksi stok dan perizinan hak akses pengguna.</p>
                    <ul style="font-size: 0.85rem; color: #334155; line-height: 2;">
                        <li>✔ 2FA Verification: <strong>Enforced for Admin</strong></li>
                        <li>✔ WMS Audit Trail Logging: <strong>Active (2,450 logs recorded)</strong></li>
                        <li>✔ Session Timeout: <strong>30 minutes idle</strong></li>
                    </ul>
                </div>
            </div>
@endsection
