<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Data Pt
    Route::apiResource('data-pts', 'DataPtApiController');

    // Data Prodi
    Route::apiResource('data-prodis', 'DataProdiApiController');

    // Data Asesor
    Route::apiResource('data-asesors', 'DataAsesorApiController');

    // Indikator Penilaian
    Route::apiResource('indikator-penilaians', 'IndikatorPenilaianApiController');

    // Penilaian Indikator
    Route::apiResource('penilaian-indikators', 'PenilaianIndikatorApiController');

    // Kodeprodi
    Route::apiResource('kodeprodis', 'KodeprodiApiController');
});