<div class="modal fade" id="exampleModalEdit{{ $siswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $siswa->nama) }}" placeholder="Masukkan Nama Siswa">
                        <!-- error message for nama -->
                        @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="X PPLG" {{ old('kelas', $siswa->kelas) === 'X PPLG' ? 'selected' : '' }}>X PPLG </option>
                            <option value="XI PPLG" {{ old('kelas', $siswa->kelas) === 'XI PPLG' ? 'selected' : '' }}>XI RPL </option>
                            <option value="XII PPLG" {{ old('kelas', $siswa->kelas) === 'XII PPLG' ? 'selected' : '' }}>XII RPL </option>
                        </select>
                        @error('kelas')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                </form>
            </div>
        </div>
    </div>
</div>