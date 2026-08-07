@extends('layouts.app')

@section('content')
<div id="warehouses-view" class="page-view active">
                <div class="card">
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;"><i class="fa-solid fa-warehouse" style="color: var(--primary-orange);"></i> Warehouses Management</h2>
                    <p style="font-size: 0.85rem; color: #64748B; margin-bottom: 1.5rem;">Kelola cabang gudang dan alokasi etalase rak penyimpanan.</p>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                        <div style="background: #F8FAFC; border: 1px solid #E2E8F0; padding: 1.25rem; border-radius: 12px;">
                            <h4 style="font-weight: 800; color: #0F172A;">Gudang Utama Jakarta</h4>
                            <p style="font-size: 0.75rem; color: #64748B;">Kapasitas: 85% (12,450 / 15,000 unit)</p>
                            <span style="font-size: 0.7rem; background: #E85A1C; color: white; padding: 2px 8px; border-radius: 6px; font-weight: 700; margin-top: 0.5rem; display: inline-block;">AKTIF</span>
                        </div>
                        <div style="background: #F8FAFC; border: 1px solid #E2E8F0; padding: 1.25rem; border-radius: 12px;">
                            <h4 style="font-weight: 800; color: #0F172A;">Gudang Cabang Surabaya</h4>
                            <p style="font-size: 0.75rem; color: #64748B;">Kapasitas: 42% (4,200 / 10,000 unit)</p>
                            <span style="font-size: 0.7rem; background: #10B981; color: white; padding: 2px 8px; border-radius: 6px; font-weight: 700; margin-top: 0.5rem; display: inline-block;">OPERASIONAL</span>
                        </div>
                        <div style="background: #F8FAFC; border: 1px solid #E2E8F0; padding: 1.25rem; border-radius: 12px;">
                            <h4 style="font-weight: 800; color: #0F172A;">Gudang Transit Bandung</h4>
                            <p style="font-size: 0.75rem; color: #64748B;">Kapasitas: 20% (1,000 / 5,000 unit)</p>
                            <span style="font-size: 0.7rem; background: #2563EB; color: white; padding: 2px 8px; border-radius: 6px; font-weight: 700; margin-top: 0.5rem; display: inline-block;">TRANSIT</span>
                        </div>
                    </div>
                </div>
            </div>
@endsection
