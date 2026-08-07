@extends('layouts.app')

@section('content')
<div id="settings-view" class="page-view active">
                <div class="card">
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;"><i class="fa-solid fa-gear" style="color: var(--primary-orange);"></i> System Settings</h2>
                    <div class="form-grid-2" style="margin-top: 1rem;">
                        <div>
                            <label class="form-label">Nama Perusahaan / Organisasi</label>
                            <input type="text" class="form-input" value="PT Berdikari Jaya">
                        </div>
                        <div>
                            <label class="form-label">Batas Minimun Alert Stok (Threshold)</label>
                            <input type="number" class="form-input" value="50">
                        </div>
                    </div>
                </div>
            </div>
@endsection
