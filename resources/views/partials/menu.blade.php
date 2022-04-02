<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('data_user_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/data-pts*") ? "menu-open" : "" }} {{ request()->is("admin/kodeprodis*") ? "menu-open" : "" }} {{ request()->is("admin/data-prodis*") ? "menu-open" : "" }} {{ request()->is("admin/data-asesors*") ? "menu-open" : "" }} {{ request()->is("admin/pemilihan-asesors*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.dataUser.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('data_pt_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.data-pts.index") }}" class="nav-link {{ request()->is("admin/data-pts") || request()->is("admin/data-pts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dataPt.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kodeprodi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kodeprodis.index") }}" class="nav-link {{ request()->is("admin/kodeprodis") || request()->is("admin/kodeprodis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kodeprodi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('data_prodi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.data-prodis.index") }}" class="nav-link {{ request()->is("admin/data-prodis") || request()->is("admin/data-prodis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dataProdi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('data_asesor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.data-asesors.index") }}" class="nav-link {{ request()->is("admin/data-asesors") || request()->is("admin/data-asesors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dataAsesor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pemilihan_asesor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pemilihan-asesors.index") }}" class="nav-link {{ request()->is("admin/pemilihan-asesors") || request()->is("admin/pemilihan-asesors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pemilihanAsesor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                
                @can('formapt_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/tabel-sertifikasi-eksternals*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-akreditasi-prodis*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-audit-keuangans*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-akre-prodis*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-kerjasama-pts*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-seleksimhsbarus*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-mhs-asings*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-kckpan-dsns*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-jabatan-dosens*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-sertifikasi-dosens*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-dsntdk-tetaps*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-rasio-dsn-mhs*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-penelitian-dosens*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-pkm-dsns*") ? "menu-open" : "" }} {{ request()->is("admin/tabel-rekognisi-dosens*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-perolehan-danas*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-penggunaan-danas*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-ipks*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-prestasi-akademiks*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-prestasi-nons*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-lama-studis*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-rasio-lulus*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-ref-penilaians*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-waktu-lulusans*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-persentase-kerjas*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-referensis*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-kepuasans*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-tempat-kerjas*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-publikasi-ilmiahs*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-sitasi-karyas*") ? "menu-open" : "" }} {{ request()->is("admin/tbl-luaran-lainnyas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-list">

                            </i>
                            <p>
                                Monitoring Data Evaluasi
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('data_pengajuan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.data-pengajuans.index") }}" class="nav-link {{ request()->is("admin/data-pengajuans") || request()->is("admin/data-pengajuans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            Tahun Monitoring
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_sertifikasi_eksternal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-sertifikasi-eksternals.index") }}" class="nav-link {{ request()->is("admin/tabel-sertifikasi-eksternals") || request()->is("admin/tabel-sertifikasi-eksternals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-table">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelSertifikasiEksternal.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_akreditasi_prodi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-akreditasi-prodis.index") }}" class="nav-link {{ request()->is("admin/tabel-akreditasi-prodis") || request()->is("admin/tabel-akreditasi-prodis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelAkreditasiProdi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_audit_keuangan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-audit-keuangans.index") }}" class="nav-link {{ request()->is("admin/tabel-audit-keuangans") || request()->is("admin/tabel-audit-keuangans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelAuditKeuangan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_akre_prodi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-akre-prodis.index") }}" class="nav-link {{ request()->is("admin/tabel-akre-prodis") || request()->is("admin/tabel-akre-prodis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelAkreProdi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_kerjasama_pt_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-kerjasama-pts.index") }}" class="nav-link {{ request()->is("admin/tabel-kerjasama-pts") || request()->is("admin/tabel-kerjasama-pts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelKerjasamaPt.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_seleksimhsbaru_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-seleksimhsbarus.index") }}" class="nav-link {{ request()->is("admin/tabel-seleksimhsbarus") || request()->is("admin/tabel-seleksimhsbarus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-table">

                                        </i>
                                        <p>
                                            Tabel 2.a (Seleksi Mahasiswa Baru)
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_mhs_asing_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-mhs-asings.index") }}" class="nav-link {{ request()->is("admin/tabel-mhs-asings") || request()->is("admin/tabel-mhs-asings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelMhsAsing.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_kckpan_dsn_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-kckpan-dsns.index") }}" class="nav-link {{ request()->is("admin/tabel-kckpan-dsns") || request()->is("admin/tabel-kckpan-dsns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelKckpanDsn.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_jabatan_dosen_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-jabatan-dosens.index") }}" class="nav-link {{ request()->is("admin/tabel-jabatan-dosens") || request()->is("admin/tabel-jabatan-dosens/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelJabatanDosen.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_sertifikasi_dosen_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-sertifikasi-dosens.index") }}" class="nav-link {{ request()->is("admin/tabel-sertifikasi-dosens") || request()->is("admin/tabel-sertifikasi-dosens/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelSertifikasiDosen.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_dsntdk_tetap_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-dsntdk-tetaps.index") }}" class="nav-link {{ request()->is("admin/tabel-dsntdk-tetaps") || request()->is("admin/tabel-dsntdk-tetaps/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelDsntdkTetap.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_rasio_dsn_mh_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-rasio-dsn-mhs.index") }}" class="nav-link {{ request()->is("admin/tabel-rasio-dsn-mhs") || request()->is("admin/tabel-rasio-dsn-mhs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelRasioDsnMh.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_penelitian_dosen_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-penelitian-dosens.index") }}" class="nav-link {{ request()->is("admin/tabel-penelitian-dosens") || request()->is("admin/tabel-penelitian-dosens/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelPenelitianDosen.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_pkm_dsn_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-pkm-dsns.index") }}" class="nav-link {{ request()->is("admin/tabel-pkm-dsns") || request()->is("admin/tabel-pkm-dsns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelPkmDsn.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tabel_rekognisi_dosen_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tabel-rekognisi-dosens.index") }}" class="nav-link {{ request()->is("admin/tabel-rekognisi-dosens") || request()->is("admin/tabel-rekognisi-dosens/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tabelRekognisiDosen.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_perolehan_dana_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-perolehan-danas.index") }}" class="nav-link {{ request()->is("admin/tbl-perolehan-danas") || request()->is("admin/tbl-perolehan-danas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblPerolehanDana.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_penggunaan_dana_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-penggunaan-danas.index") }}" class="nav-link {{ request()->is("admin/tbl-penggunaan-danas") || request()->is("admin/tbl-penggunaan-danas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblPenggunaanDana.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_ipk_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-ipks.index") }}" class="nav-link {{ request()->is("admin/tbl-ipks") || request()->is("admin/tbl-ipks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblIpk.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_prestasi_akademik_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-prestasi-akademiks.index") }}" class="nav-link {{ request()->is("admin/tbl-prestasi-akademiks") || request()->is("admin/tbl-prestasi-akademiks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblPrestasiAkademik.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_prestasi_non_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-prestasi-nons.index") }}" class="nav-link {{ request()->is("admin/tbl-prestasi-nons") || request()->is("admin/tbl-prestasi-nons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblPrestasiNon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_lama_studi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-lama-studis.index") }}" class="nav-link {{ request()->is("admin/tbl-lama-studis") || request()->is("admin/tbl-lama-studis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblLamaStudi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_rasio_lulu_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-rasio-lulus.index") }}" class="nav-link {{ request()->is("admin/tbl-rasio-lulus") || request()->is("admin/tbl-rasio-lulus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblRasioLulu.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_ref_penilaian_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-ref-penilaians.index") }}" class="nav-link {{ request()->is("admin/tbl-ref-penilaians") || request()->is("admin/tbl-ref-penilaians/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblRefPenilaian.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_waktu_lulusan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-waktu-lulusans.index") }}" class="nav-link {{ request()->is("admin/tbl-waktu-lulusans") || request()->is("admin/tbl-waktu-lulusans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblWaktuLulusan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_persentase_kerja_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-persentase-kerjas.index") }}" class="nav-link {{ request()->is("admin/tbl-persentase-kerjas") || request()->is("admin/tbl-persentase-kerjas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblPersentaseKerja.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_referensi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-referensis.index") }}" class="nav-link {{ request()->is("admin/tbl-referensis") || request()->is("admin/tbl-referensis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblReferensi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_kepuasan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-kepuasans.index") }}" class="nav-link {{ request()->is("admin/tbl-kepuasans") || request()->is("admin/tbl-kepuasans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblKepuasan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_tempat_kerja_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-tempat-kerjas.index") }}" class="nav-link {{ request()->is("admin/tbl-tempat-kerjas") || request()->is("admin/tbl-tempat-kerjas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblTempatKerja.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_publikasi_ilmiah_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-publikasi-ilmiahs.index") }}" class="nav-link {{ request()->is("admin/tbl-publikasi-ilmiahs") || request()->is("admin/tbl-publikasi-ilmiahs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblPublikasiIlmiah.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_sitasi_karya_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-sitasi-karyas.index") }}" class="nav-link {{ request()->is("admin/tbl-sitasi-karyas") || request()->is("admin/tbl-sitasi-karyas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblSitasiKarya.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tbl_luaran_lainnya_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tbl-luaran-lainnyas.index") }}" class="nav-link {{ request()->is("admin/tbl-luaran-lainnyas") || request()->is("admin/tbl-luaran-lainnyas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tblLuaranLainnya.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('formpenilaian_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/indikator-penilaians*") ? "menu-open" : "" }} {{ request()->is("admin/penilaian-indikators*") ? "menu-open" : "" }} {{ request()->is("admin/peniliaian-assesors*") ? "menu-open" : "" }} {{ request()->is("admin/form-essais*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.formpenilaian.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('indikator_penilaian_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.indikator-penilaians.index") }}" class="nav-link {{ request()->is("admin/indikator-penilaians") || request()->is("admin/indikator-penilaians/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.indikatorPenilaian.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('penilaian_indikator_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.penilaian-indikators.index") }}" class="nav-link {{ request()->is("admin/penilaian-indikators") || request()->is("admin/penilaian-indikators/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.penilaianIndikator.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('peniliaian_assesor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.peniliaian-assesors.index") }}" class="nav-link {{ request()->is("admin/peniliaian-assesors") || request()->is("admin/peniliaian-assesors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.peniliaianAssesor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('form_essai_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.form-essais.index") }}" class="nav-link {{ request()->is("admin/form-essais") || request()->is("admin/form-essais/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.formEssai.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('upload_file_borang_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/borangs*") ? "menu-open" : "" }} {{ request()->is("admin/fileuploads*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.uploadFileBorang.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('borang_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.borangs.index") }}" class="nav-link {{ request()->is("admin/borangs") || request()->is("admin/borangs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.borang.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('fileupload_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.fileuploads.index") }}" class="nav-link {{ request()->is("admin/fileuploads") || request()->is("admin/fileuploads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.fileupload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('daftar_pengajuan_access')
                    <li class="nav-item">
                        <a href="{{ ("admin.daftar-pengajuans.index") }}" class="nav-link {{ request()->is("admin/daftar-pengajuans") || request()->is("admin/daftar-pengajuans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-clipboard-list">

                            </i>
                            <p>
                                {{ trans('cruds.daftarBerkas.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('laporan_ak_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.laporan-aks.index") }}" class="nav-link {{ request()->is("admin/laporan-aks") || request()->is("admin/laporan-aks/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.laporanAk.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('riwayat_assesman_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.riwayat-assesmen.index") }}" class="nav-link {{ request()->is("admin/riwayat-assesmen") || request()->is("admin/riwayat-assesmen/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.riwayatAssesman.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('daftar_laporan_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.daftar-laporans.index") }}" class="nav-link {{ request()->is("admin/daftar-laporans") || request()->is("admin/daftar-laporans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.daftarLaporan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                
                    <li class="nav-item">
                        <a href="{{ route("admin.downloada") }}" class="nav-link" >
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                Download File Form Penilaian IAPT
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.downloadb") }}" class="nav-link" >
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                Download File For APT9A
                            </p>
                        </a>
                    </li>
                
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    // function downloadfile(){
    //     //e.preventDefault();        
    //     let pathfile = "http://127.0.0.1:8000/PenilaianIAPT.xlsx";
    //     //window.location.href = pathfile;
    // }
</script>