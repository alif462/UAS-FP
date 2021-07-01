@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List pegawai') }}</div><br>
                <div class="container">
                    <td>
                    <a class="btn btn-info" href="/form-tambah"> Add </a>
                    <a class="btn btn-warning" href="/download-pdf"> Print </a>
                    </td>
                    <br><br>
                <table class="table">
                    <thead class="bg-info text-white">
                      <tr>
                      <th>NIP</th>
                      <th>NAMA</th>
                      <th>ALAMAT</th>
                      <!-- <th>IMAGE</th> -->
                      <th>ACTION</th>
                      </tr>
                    </thead>
                      @if (empty($data))
                          <tr >
                              <td class="alert alert-danger" role="alert" colspan="4">Data Kosong</td>
                          </tr>
                      @endif
                          @foreach($data as $i)
                          <tbody>
                          <tr>
                              <td>{{ $i->plat }}</td> 
                              <td>{{ $i->merk }}</td> 
                              <td>{{ $i->tipe }}</td>
                              <!-- <td><img src="{{ asset('images') }}/{{ $i->profileimage }}" style="max-width:60px;"></td> -->
                              <td>
                                  <a class="btn btn-success" href="/ubah-pegawai/{{$i->id}}">Edit</a>
                                  <a class="btn btn-danger" href="/hapus-pegawai/{{$i->id}}"> Hapus</a>
                              </td>
                          </tr>
                          </tbody>
                          @endforeach
                    </table>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
