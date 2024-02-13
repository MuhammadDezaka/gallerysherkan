@extends('layouts.app')

@section('title','Album')
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
        
                    </div>
                    <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-success waves-effect waves-light"
                            data-toggle="modal" data-target="#myModal">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Nama Album</th>
                        <th>Deskripsi</th>
                        <th>Tanggal dibuat</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ( $data as $item )
                        <tr>
                            <td>{{ $item->nama_album }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal_dibuat }}</td>
                            <td class="text-center">
                                <Button class="btn btn-info" data-toggle="modal" data-target="#editModal{{ $item->id }}" >Edit</Button>
                                {{-- modal untuk edit --}}
                                <div id="editModal{{ $item->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('album.edit', $item->id) }}">
                                            @csrf
                                                <input type="hidden" name="id">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Data Album</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label"><strong>Nama Album</strong></label>
                                                        <input class="form-control" type="text" id="input_nama_sekolah" name="nama_album" value="{{ $item->nama_album }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label"><strong>Deskripsi</strong></label>
                                                        <textarea  name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{ $item->deskripsi }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">Simpan Data</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <Button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{ $item->id }}">Hapus</Button>

                                {{-- modal untuk hapus --}}
                                <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal{{ $item->id }}" aria-hidden="true"> 
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Hapus</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Yakin ingin menghapus Data ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('album.delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('album.store') }}">
            @csrf
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Data Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="example-text-input" class="form-label"><strong>Nama Album</strong></label>
                        <input class="form-control" type="text" id="input_nama_sekolah" name="nama_album">
                    </div>
                    <div class="mb-3">
                        <label for="example-text-input" class="form-label"><strong>Deskripsi</strong></label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    
                    <button type="submit" class="btn btn-success waves-effect waves-light">Simpan Data</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection