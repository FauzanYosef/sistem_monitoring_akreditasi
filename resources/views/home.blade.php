@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Main content -->
                    <div class="card-body">
                      <div class="table-responsive">
                          <table class=" table table-bordered table-striped table-hover datatable datatable-DataPengajuan">
                              <thead>
                                  <tr>
                                      <th>
                                          Tahun
                                      </th>
                                      <th>
                                          Nama PT
                                      </th>
                                      <th>
                                          Nama Prodi
                                      </th>
                                      <th>
                                          &nbsp;
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($dataPengajuans as $key => $dataPengajuan)
                                      <tr data-entry-id="{{ $dataPengajuan->id }}">
                                          <td>
                                              {{ $dataPengajuan->tahun_pengajuan ?? '' }}
                                          </td>
                                          <td>
                                              {{ $dataPengajuan->nama_pt ?? '' }}
                                          </td>
                                          <td>
                                              {{ $dataPengajuan->nama_prodi ?? '' }}
                                          </td>
                                          <td>
                                              @can('menu_dashboard_show')
                                                  <a class="btn btn-xs btn-primary" href="{{ route('admin.home.show', $dataPengajuan->id) }}">
                                                      {{ trans('global.view') }}
                                                  </a>
                                              @endcan
                                          </td>

                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div> 
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection