<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('downloada', 'HomeController@getDownloada')->name('downloada');
    Route::get('downloadb', 'HomeController@getDownloadb')->name('downloadb');
    //Route::resource('menu-dashboards', 'MenuDashboardController');
    Route::resource('home', 'HomeController');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Tabel Seleksimhsbaru
    Route::delete('tabel-seleksimhsbarus/destroy', 'TabelSeleksimhsbaruController@massDestroy')->name('tabel-seleksimhsbarus.massDestroy');
    Route::post('tabel-seleksimhsbarus/parse-csv-import', 'TabelSeleksimhsbaruController@parseCsvImport')->name('tabel-seleksimhsbarus.parseCsvImport');
    Route::post('tabel-seleksimhsbarus/process-csv-import', 'TabelSeleksimhsbaruController@processCsvImport')->name('tabel-seleksimhsbarus.processCsvImport');
    Route::resource('tabel-seleksimhsbarus', 'TabelSeleksimhsbaruController');

    // Data Pt
    Route::delete('data-pts/destroy', 'DataPtController@massDestroy')->name('data-pts.massDestroy');
    Route::post('data-pts/parse-csv-import', 'DataPtController@parseCsvImport')->name('data-pts.parseCsvImport');
    Route::post('data-pts/process-csv-import', 'DataPtController@processCsvImport')->name('data-pts.processCsvImport');
    Route::resource('data-pts', 'DataPtController');

    // Data Prodi
    Route::delete('data-prodis/destroy', 'DataProdiController@massDestroy')->name('data-prodis.massDestroy');
    Route::post('data-prodis/parse-csv-import', 'DataProdiController@parseCsvImport')->name('data-prodis.parseCsvImport');
    Route::post('data-prodis/process-csv-import', 'DataProdiController@processCsvImport')->name('data-prodis.processCsvImport');
    Route::resource('data-prodis', 'DataProdiController');

    // Data Asesor
    Route::delete('data-asesors/destroy', 'DataAsesorController@massDestroy')->name('data-asesors.massDestroy');
    Route::post('data-asesors/parse-csv-import', 'DataAsesorController@parseCsvImport')->name('data-asesors.parseCsvImport');
    Route::post('data-asesors/process-csv-import', 'DataAsesorController@processCsvImport')->name('data-asesors.processCsvImport');
    Route::resource('data-asesors', 'DataAsesorController');

    // Indikator Penilaian
    Route::delete('indikator-penilaians/destroy', 'IndikatorPenilaianController@massDestroy')->name('indikator-penilaians.massDestroy');
    Route::post('indikator-penilaians/parse-csv-import', 'IndikatorPenilaianController@parseCsvImport')->name('indikator-penilaians.parseCsvImport');
    Route::post('indikator-penilaians/process-csv-import', 'IndikatorPenilaianController@processCsvImport')->name('indikator-penilaians.processCsvImport');
    Route::resource('indikator-penilaians', 'IndikatorPenilaianController');

    // Penilaian Indikator
    Route::delete('penilaian-indikators/destroy', 'PenilaianIndikatorController@massDestroy')->name('penilaian-indikators.massDestroy');
    Route::post('penilaian-indikators/parse-csv-import', 'PenilaianIndikatorController@parseCsvImport')->name('penilaian-indikators.parseCsvImport');
    Route::post('penilaian-indikators/process-csv-import', 'PenilaianIndikatorController@processCsvImport')->name('penilaian-indikators.processCsvImport');
    Route::resource('penilaian-indikators', 'PenilaianIndikatorController');

    // Pemilihan Asesor
    Route::delete('pemilihan-asesors/destroy', 'PemilihanAsesorController@massDestroy')->name('pemilihan-asesors.massDestroy');
    Route::resource('pemilihan-asesors', 'PemilihanAsesorController');

    // Peniliaian Assesor
    Route::delete('peniliaian-assesors/destroy', 'PeniliaianAssesorController@massDestroy')->name('peniliaian-assesors.massDestroy');
    Route::resource('peniliaian-assesors', 'PeniliaianAssesorController');

    // Kodeprodi
    Route::delete('kodeprodis/destroy', 'KodeprodiController@massDestroy')->name('kodeprodis.massDestroy');
    Route::resource('kodeprodis', 'KodeprodiController');

    // Tabel Sertifikasi Eksternal
    Route::delete('tabel-sertifikasi-eksternals/destroy', 'TabelSertifikasiEksternalController@massDestroy')->name('tabel-sertifikasi-eksternals.massDestroy');
    Route::post('tabel-sertifikasi-eksternals/parse-csv-import', 'TabelSertifikasiEksternalController@parseCsvImport')->name('tabel-sertifikasi-eksternals.parseCsvImport');
    Route::post('tabel-sertifikasi-eksternals/process-csv-import', 'TabelSertifikasiEksternalController@processCsvImport')->name('tabel-sertifikasi-eksternals.processCsvImport');
    Route::resource('tabel-sertifikasi-eksternals', 'TabelSertifikasiEksternalController');

    // Tabel Akreditasi Prodi
    Route::delete('tabel-akreditasi-prodis/destroy', 'TabelAkreditasiProdiController@massDestroy')->name('tabel-akreditasi-prodis.massDestroy');
    Route::post('tabel-akreditasi-prodis/parse-csv-import', 'TabelAkreditasiProdiController@parseCsvImport')->name('tabel-akreditasi-prodis.parseCsvImport');
    Route::post('tabel-akreditasi-prodis/process-csv-import', 'TabelAkreditasiProdiController@processCsvImport')->name('tabel-akreditasi-prodis.processCsvImport');
    Route::resource('tabel-akreditasi-prodis', 'TabelAkreditasiProdiController');

    // Tabel Audit Keuangan
    Route::delete('tabel-audit-keuangans/destroy', 'TabelAuditKeuanganController@massDestroy')->name('tabel-audit-keuangans.massDestroy');
    Route::resource('tabel-audit-keuangans', 'TabelAuditKeuanganController');

    // Tabel Akre Prodi
    Route::delete('tabel-akre-prodis/destroy', 'TabelAkreProdiController@massDestroy')->name('tabel-akre-prodis.massDestroy');
    Route::post('tabel-akre-prodis/parse-csv-import', 'TabelAkreProdiController@parseCsvImport')->name('tabel-akre-prodis.parseCsvImport');
    Route::post('tabel-akre-prodis/process-csv-import', 'TabelAkreProdiController@processCsvImport')->name('tabel-akre-prodis.processCsvImport');
    Route::resource('tabel-akre-prodis', 'TabelAkreProdiController');

    // Tabel Kerjasama Pt
    Route::delete('tabel-kerjasama-pts/destroy', 'TabelKerjasamaPtController@massDestroy')->name('tabel-kerjasama-pts.massDestroy');
    Route::post('tabel-kerjasama-pts/media', 'TabelKerjasamaPtController@storeMedia')->name('tabel-kerjasama-pts.storeMedia');
    Route::post('tabel-kerjasama-pts/ckmedia', 'TabelKerjasamaPtController@storeCKEditorImages')->name('tabel-kerjasama-pts.storeCKEditorImages');
    Route::post('tabel-kerjasama-pts/parse-csv-import', 'TabelKerjasamaPtController@parseCsvImport')->name('tabel-kerjasama-pts.parseCsvImport');
    Route::post('tabel-kerjasama-pts/process-csv-import', 'TabelKerjasamaPtController@processCsvImport')->name('tabel-kerjasama-pts.processCsvImport');
    Route::resource('tabel-kerjasama-pts', 'TabelKerjasamaPtController');

    // Tabel Mhs Asing
    Route::delete('tabel-mhs-asings/destroy', 'TabelMhsAsingController@massDestroy')->name('tabel-mhs-asings.massDestroy');
    Route::post('tabel-mhs-asings/parse-csv-import', 'TabelMhsAsingController@parseCsvImport')->name('tabel-mhs-asings.parseCsvImport');
    Route::post('tabel-mhs-asings/process-csv-import', 'TabelMhsAsingController@processCsvImport')->name('tabel-mhs-asings.processCsvImport');
    Route::resource('tabel-mhs-asings', 'TabelMhsAsingController');

    // Tabel Kckpan Dsn
    Route::delete('tabel-kckpan-dsns/destroy', 'TabelKckpanDsnController@massDestroy')->name('tabel-kckpan-dsns.massDestroy');
    Route::post('tabel-kckpan-dsns/parse-csv-import', 'TabelKckpanDsnController@parseCsvImport')->name('tabel-kckpan-dsns.parseCsvImport');
    Route::post('tabel-kckpan-dsns/process-csv-import', 'TabelKckpanDsnController@processCsvImport')->name('tabel-kckpan-dsns.processCsvImport');
    Route::resource('tabel-kckpan-dsns', 'TabelKckpanDsnController');

    // Tabel Jabatan Dosen
    Route::delete('tabel-jabatan-dosens/destroy', 'TabelJabatanDosenController@massDestroy')->name('tabel-jabatan-dosens.massDestroy');
    Route::post('tabel-jabatan-dosens/parse-csv-import', 'TabelJabatanDosenController@parseCsvImport')->name('tabel-jabatan-dosens.parseCsvImport');
    Route::post('tabel-jabatan-dosens/process-csv-import', 'TabelJabatanDosenController@processCsvImport')->name('tabel-jabatan-dosens.processCsvImport');
    Route::resource('tabel-jabatan-dosens', 'TabelJabatanDosenController');

    // Tabel Sertifikasi Dosen
    Route::delete('tabel-sertifikasi-dosens/destroy', 'TabelSertifikasiDosenController@massDestroy')->name('tabel-sertifikasi-dosens.massDestroy');
    Route::post('tabel-sertifikasi-dosens/parse-csv-import', 'TabelSertifikasiDosenController@parseCsvImport')->name('tabel-sertifikasi-dosens.parseCsvImport');
    Route::post('tabel-sertifikasi-dosens/process-csv-import', 'TabelSertifikasiDosenController@processCsvImport')->name('tabel-sertifikasi-dosens.processCsvImport');
    Route::resource('tabel-sertifikasi-dosens', 'TabelSertifikasiDosenController');

    // Tabel Dsntdk Tetap
    Route::delete('tabel-dsntdk-tetaps/destroy', 'TabelDsntdkTetapController@massDestroy')->name('tabel-dsntdk-tetaps.massDestroy');
    Route::post('tabel-dsntdk-tetaps/parse-csv-import', 'TabelDsntdkTetapController@parseCsvImport')->name('tabel-dsntdk-tetaps.parseCsvImport');
    Route::post('tabel-dsntdk-tetaps/process-csv-import', 'TabelDsntdkTetapController@processCsvImport')->name('tabel-dsntdk-tetaps.processCsvImport');
    Route::resource('tabel-dsntdk-tetaps', 'TabelDsntdkTetapController');

    // Tabel Rasio Dsn Mhs
    Route::delete('tabel-rasio-dsn-mhs/destroy', 'TabelRasioDsnMhsController@massDestroy')->name('tabel-rasio-dsn-mhs.massDestroy');
    Route::post('tabel-rasio-dsn-mhs/parse-csv-import', 'TabelRasioDsnMhsController@parseCsvImport')->name('tabel-rasio-dsn-mhs.parseCsvImport');
    Route::post('tabel-rasio-dsn-mhs/process-csv-import', 'TabelRasioDsnMhsController@processCsvImport')->name('tabel-rasio-dsn-mhs.processCsvImport');
    Route::resource('tabel-rasio-dsn-mhs', 'TabelRasioDsnMhsController');

    // Tabel Penelitian Dosen
    Route::delete('tabel-penelitian-dosens/destroy', 'TabelPenelitianDosenController@massDestroy')->name('tabel-penelitian-dosens.massDestroy');
    Route::post('tabel-penelitian-dosens/parse-csv-import', 'TabelPenelitianDosenController@parseCsvImport')->name('tabel-penelitian-dosens.parseCsvImport');
    Route::post('tabel-penelitian-dosens/process-csv-import', 'TabelPenelitianDosenController@processCsvImport')->name('tabel-penelitian-dosens.processCsvImport');
    Route::resource('tabel-penelitian-dosens', 'TabelPenelitianDosenController');

    // Tabel Pkm Dsn
    Route::delete('tabel-pkm-dsns/destroy', 'TabelPkmDsnController@massDestroy')->name('tabel-pkm-dsns.massDestroy');
    Route::post('tabel-pkm-dsns/parse-csv-import', 'TabelPkmDsnController@parseCsvImport')->name('tabel-pkm-dsns.parseCsvImport');
    Route::post('tabel-pkm-dsns/process-csv-import', 'TabelPkmDsnController@processCsvImport')->name('tabel-pkm-dsns.processCsvImport');
    Route::resource('tabel-pkm-dsns', 'TabelPkmDsnController');

    // Tabel Rekognisi Dosen
    Route::delete('tabel-rekognisi-dosens/destroy', 'TabelRekognisiDosenController@massDestroy')->name('tabel-rekognisi-dosens.massDestroy');
    Route::post('tabel-rekognisi-dosens/parse-csv-import', 'TabelRekognisiDosenController@parseCsvImport')->name('tabel-rekognisi-dosens.parseCsvImport');
    Route::post('tabel-rekognisi-dosens/process-csv-import', 'TabelRekognisiDosenController@processCsvImport')->name('tabel-rekognisi-dosens.processCsvImport');
    Route::resource('tabel-rekognisi-dosens', 'TabelRekognisiDosenController');

    // Tbl Perolehan Dana
    Route::delete('tbl-perolehan-danas/destroy', 'TblPerolehanDanaController@massDestroy')->name('tbl-perolehan-danas.massDestroy');
    Route::post('tbl-perolehan-danas/parse-csv-import', 'TblPerolehanDanaController@parseCsvImport')->name('tbl-perolehan-danas.parseCsvImport');
    Route::post('tbl-perolehan-danas/process-csv-import', 'TblPerolehanDanaController@processCsvImport')->name('tbl-perolehan-danas.processCsvImport');
    Route::resource('tbl-perolehan-danas', 'TblPerolehanDanaController');

    // Tbl Penggunaan Dana
    Route::delete('tbl-penggunaan-danas/destroy', 'TblPenggunaanDanaController@massDestroy')->name('tbl-penggunaan-danas.massDestroy');
    Route::post('tbl-penggunaan-danas/parse-csv-import', 'TblPenggunaanDanaController@parseCsvImport')->name('tbl-penggunaan-danas.parseCsvImport');
    Route::post('tbl-penggunaan-danas/process-csv-import', 'TblPenggunaanDanaController@processCsvImport')->name('tbl-penggunaan-danas.processCsvImport');
    Route::resource('tbl-penggunaan-danas', 'TblPenggunaanDanaController');

    // Tbl Ipk
    Route::delete('tbl-ipks/destroy', 'TblIpkController@massDestroy')->name('tbl-ipks.massDestroy');
    Route::post('tbl-ipks/parse-csv-import', 'TblIpkController@parseCsvImport')->name('tbl-ipks.parseCsvImport');
    Route::post('tbl-ipks/process-csv-import', 'TblIpkController@processCsvImport')->name('tbl-ipks.processCsvImport');
    Route::resource('tbl-ipks', 'TblIpkController');

    // Tbl Prestasi Akademik
    Route::delete('tbl-prestasi-akademiks/destroy', 'TblPrestasiAkademikController@massDestroy')->name('tbl-prestasi-akademiks.massDestroy');
    Route::post('tbl-prestasi-akademiks/parse-csv-import', 'TblPrestasiAkademikController@parseCsvImport')->name('tbl-prestasi-akademiks.parseCsvImport');
    Route::post('tbl-prestasi-akademiks/process-csv-import', 'TblPrestasiAkademikController@processCsvImport')->name('tbl-prestasi-akademiks.processCsvImport');
    Route::resource('tbl-prestasi-akademiks', 'TblPrestasiAkademikController');

    // Tbl Prestasi Non
    Route::delete('tbl-prestasi-nons/destroy', 'TblPrestasiNonController@massDestroy')->name('tbl-prestasi-nons.massDestroy');
    Route::post('tbl-prestasi-nons/parse-csv-import', 'TblPrestasiNonController@parseCsvImport')->name('tbl-prestasi-nons.parseCsvImport');
    Route::post('tbl-prestasi-nons/process-csv-import', 'TblPrestasiNonController@processCsvImport')->name('tbl-prestasi-nons.processCsvImport');
    Route::resource('tbl-prestasi-nons', 'TblPrestasiNonController');

    // Tbl Lama Studi
    Route::delete('tbl-lama-studis/destroy', 'TblLamaStudiController@massDestroy')->name('tbl-lama-studis.massDestroy');
    Route::post('tbl-lama-studis/parse-csv-import', 'TblLamaStudiController@parseCsvImport')->name('tbl-lama-studis.parseCsvImport');
    Route::post('tbl-lama-studis/process-csv-import', 'TblLamaStudiController@processCsvImport')->name('tbl-lama-studis.processCsvImport');
    Route::resource('tbl-lama-studis', 'TblLamaStudiController');

    // Tbl Rasio Lulus
    Route::delete('tbl-rasio-lulus/destroy', 'TblRasioLulusController@massDestroy')->name('tbl-rasio-lulus.massDestroy');
    Route::post('tbl-rasio-lulus/parse-csv-import', 'TblRasioLulusController@parseCsvImport')->name('tbl-rasio-lulus.parseCsvImport');
    Route::post('tbl-rasio-lulus/process-csv-import', 'TblRasioLulusController@processCsvImport')->name('tbl-rasio-lulus.processCsvImport');
    Route::resource('tbl-rasio-lulus', 'TblRasioLulusController');

    // Tbl Ref Penilaian
    Route::delete('tbl-ref-penilaians/destroy', 'TblRefPenilaianController@massDestroy')->name('tbl-ref-penilaians.massDestroy');
    Route::post('tbl-ref-penilaians/parse-csv-import', 'TblRefPenilaianController@parseCsvImport')->name('tbl-ref-penilaians.parseCsvImport');
    Route::post('tbl-ref-penilaians/process-csv-import', 'TblRefPenilaianController@processCsvImport')->name('tbl-ref-penilaians.processCsvImport');
    Route::resource('tbl-ref-penilaians', 'TblRefPenilaianController');

    // Tbl Waktu Lulusan
    Route::delete('tbl-waktu-lulusans/destroy', 'TblWaktuLulusanController@massDestroy')->name('tbl-waktu-lulusans.massDestroy');
    Route::post('tbl-waktu-lulusans/parse-csv-import', 'TblWaktuLulusanController@parseCsvImport')->name('tbl-waktu-lulusans.parseCsvImport');
    Route::post('tbl-waktu-lulusans/process-csv-import', 'TblWaktuLulusanController@processCsvImport')->name('tbl-waktu-lulusans.processCsvImport');
    Route::resource('tbl-waktu-lulusans', 'TblWaktuLulusanController');

    // Tbl Persentase Kerja
    Route::delete('tbl-persentase-kerjas/destroy', 'TblPersentaseKerjaController@massDestroy')->name('tbl-persentase-kerjas.massDestroy');
    Route::post('tbl-persentase-kerjas/parse-csv-import', 'TblPersentaseKerjaController@parseCsvImport')->name('tbl-persentase-kerjas.parseCsvImport');
    Route::post('tbl-persentase-kerjas/process-csv-import', 'TblPersentaseKerjaController@processCsvImport')->name('tbl-persentase-kerjas.processCsvImport');
    Route::resource('tbl-persentase-kerjas', 'TblPersentaseKerjaController');

    // Tbl Referensi
    Route::delete('tbl-referensis/destroy', 'TblReferensiController@massDestroy')->name('tbl-referensis.massDestroy');
    Route::post('tbl-referensis/parse-csv-import', 'TblReferensiController@parseCsvImport')->name('tbl-referensis.parseCsvImport');
    Route::post('tbl-referensis/process-csv-import', 'TblReferensiController@processCsvImport')->name('tbl-referensis.processCsvImport');
    Route::resource('tbl-referensis', 'TblReferensiController');

    // Tbl Kepuasan
    Route::delete('tbl-kepuasans/destroy', 'TblKepuasanController@massDestroy')->name('tbl-kepuasans.massDestroy');
    Route::post('tbl-kepuasans/parse-csv-import', 'TblKepuasanController@parseCsvImport')->name('tbl-kepuasans.parseCsvImport');
    Route::post('tbl-kepuasans/process-csv-import', 'TblKepuasanController@processCsvImport')->name('tbl-kepuasans.processCsvImport');
    Route::resource('tbl-kepuasans', 'TblKepuasanController');

    // Tbl Tempat Kerja
    Route::delete('tbl-tempat-kerjas/destroy', 'TblTempatKerjaController@massDestroy')->name('tbl-tempat-kerjas.massDestroy');
    Route::post('tbl-tempat-kerjas/parse-csv-import', 'TblTempatKerjaController@parseCsvImport')->name('tbl-tempat-kerjas.parseCsvImport');
    Route::post('tbl-tempat-kerjas/process-csv-import', 'TblTempatKerjaController@processCsvImport')->name('tbl-tempat-kerjas.processCsvImport');
    Route::resource('tbl-tempat-kerjas', 'TblTempatKerjaController');

    // Tbl Publikasi Ilmiah
    Route::delete('tbl-publikasi-ilmiahs/destroy', 'TblPublikasiIlmiahController@massDestroy')->name('tbl-publikasi-ilmiahs.massDestroy');
    Route::post('tbl-publikasi-ilmiahs/parse-csv-import', 'TblPublikasiIlmiahController@parseCsvImport')->name('tbl-publikasi-ilmiahs.parseCsvImport');
    Route::post('tbl-publikasi-ilmiahs/process-csv-import', 'TblPublikasiIlmiahController@processCsvImport')->name('tbl-publikasi-ilmiahs.processCsvImport');
    Route::resource('tbl-publikasi-ilmiahs', 'TblPublikasiIlmiahController');

    // Tbl Sitasi Karya
    Route::delete('tbl-sitasi-karyas/destroy', 'TblSitasiKaryaController@massDestroy')->name('tbl-sitasi-karyas.massDestroy');
    Route::post('tbl-sitasi-karyas/parse-csv-import', 'TblSitasiKaryaController@parseCsvImport')->name('tbl-sitasi-karyas.parseCsvImport');
    Route::post('tbl-sitasi-karyas/process-csv-import', 'TblSitasiKaryaController@processCsvImport')->name('tbl-sitasi-karyas.processCsvImport');
    Route::resource('tbl-sitasi-karyas', 'TblSitasiKaryaController');

    // Tbl Luaran Lainnya
    Route::delete('tbl-luaran-lainnyas/destroy', 'TblLuaranLainnyaController@massDestroy')->name('tbl-luaran-lainnyas.massDestroy');
    Route::post('tbl-luaran-lainnyas/parse-csv-import', 'TblLuaranLainnyaController@parseCsvImport')->name('tbl-luaran-lainnyas.parseCsvImport');
    Route::post('tbl-luaran-lainnyas/process-csv-import', 'TblLuaranLainnyaController@processCsvImport')->name('tbl-luaran-lainnyas.processCsvImport');
    Route::resource('tbl-luaran-lainnyas', 'TblLuaranLainnyaController');

    // Borang
    Route::delete('borangs/destroy', 'BorangController@massDestroy')->name('borangs.massDestroy');
    Route::resource('borangs', 'BorangController');

    // Fileupload
    Route::delete('fileuploads/destroy', 'FileuploadController@massDestroy')->name('fileuploads.massDestroy');
    Route::post('fileuploads/media', 'FileuploadController@storeMedia')->name('fileuploads.storeMedia');
    Route::post('fileuploads/ckmedia', 'FileuploadController@storeCKEditorImages')->name('fileuploads.storeCKEditorImages');
    Route::resource('fileuploads', 'FileuploadController');

    // Form Essai
    Route::delete('form-essais/destroy', 'FormEssaiController@massDestroy')->name('form-essais.massDestroy');
    Route::resource('form-essais', 'FormEssaiController');

    // Daftar Pengajuan
    // Route::delete('daftar-pengajuans/destroy', 'DaftarPengajuanController@massDestroy')->name('daftar-pengajuans.massDestroy');
    // Route::resource('daftar-pengajuans', 'DaftarPengajuanController');

    // Laporan Ak
    Route::delete('laporan-aks/destroy', 'LaporanAkController@massDestroy')->name('laporan-aks.massDestroy');
    Route::resource('laporan-aks', 'LaporanAkController');

    // Riwayat Assesmen
    Route::delete('riwayat-assesmen/destroy', 'RiwayatAssesmenController@massDestroy')->name('riwayat-assesmen.massDestroy');
    Route::resource('riwayat-assesmen', 'RiwayatAssesmenController');

    // Daftar Laporan
    Route::delete('daftar-laporans/destroy', 'DaftarLaporanController@massDestroy')->name('daftar-laporans.massDestroy');
    Route::resource('daftar-laporans', 'DaftarLaporanController');
    
    // Data Pengajuan
    Route::delete('data-pengajuans/destroy', 'DataPengajuanController@massDestroy')->name('data-pengajuans.massDestroy');
    Route::resource('data-pengajuans', 'DataPengajuanController');

     // Menu Dashboard
    Route::delete('menu-dashboards/destroy', 'MenuDashboardController@massDestroy')->name('menu-dashboards.massDestroy');
    Route::resource('menu-dashboards', 'MenuDashboardController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});