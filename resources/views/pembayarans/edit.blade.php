<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Bayar</label>
                                <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar"
                                       value="{{ old('jumlah_bayar') }}" placeholder="Masukkan Angka" oninput="updateTotal(this)">
                                <!-- error message untuk jumlah_bayar -->
                            
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control" name="kelas">
                                    <option value="X PPLG" {{ old('kelas', $pembayaran->kelas) === 'X PPLG' ? 'selected' : '' }}>X PPLG </option>
                                    <option value="XI PPLG" {{ old('kelas', $pembayaran->kelas) === 'XI PPLG' ? 'selected' : '' }}>XI RPL </option>
                                    <option value="XII PPLG" {{ old('kelas', $pembayaran->kelas) === 'XII PPLG' ? 'selected' : '' }}>XII RPL </option>
                                </select>
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script></script>
</body>

</html>
