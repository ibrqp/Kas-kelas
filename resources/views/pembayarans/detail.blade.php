{{-- pembayaran.index.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pembayaran </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{route('pembayaran.index')}}" class="btn btn-success mb-3">
                            TAMBAH PEMBAYARAN
                        </a>
                        <a href="/siswa" class="btn btn-success mb-3 mx-2">
                            DATA SISWA
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA Siswa</th>
                                    <th scope="col">TANGGAL BAYAR</th>
                                    <th scope="col">JUMLAH BAYAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detail as $key => $post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $post->siswa->nama }}</td>
                                        <td>{{ $post->tgl_bayar }}</td>
                                        <td>{{ $post->jumlah_bayar }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Post belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $detail->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Modal Tambah Pembayaran -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold ">Nama Siswa</label>
                            <select class="form-control " name="id_siswa" id="namaDropdown">
                                <option value="">Select Nama Siswa</option>
                                @foreach ($data as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{ $siswa->kelas }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="font-weight-bold ">Tanggal Bayar</label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                        </div>

                        <!-- Removed duplicated section -->
                        <div class="form-group">
                            <label class="font-weight-bold ">Jumlah Bayar</label>
                            <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar"
                                value="" placeholder="Masukkan Angka" oninput="updateTotal(this)">
                            <!-- error message untuk title -->
                        </div>

                        <div class="d-flex justify-content-end mt-1">
                            <button type="submit" class="btn btn-md btn-primary mx-1">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning mx-1">RESET</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Detail Pembayaran -->
    <div class="modal fade" id="editE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Detail Pembayaran</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">Jumlah Bayar</th>
                                    <!-- Add other headers as needed -->
                                </tr>
                            </thead>
                            <tbody id="siswaDetailTableBody">
                                <!-- Data siswa akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Fungsi untuk memuat detail pembayaran saat modal ditampilkan
        $('#editE').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var siswaId = button.data('siswa-id');

            $.ajax({
                url: '/pembayarans/detail/' + siswaId,
                method: 'GET',
                success: function(data) {
                    $('#siswaDetailTableBody').html(data);
                }
            });
        });

        // Fungsi untuk memformat angka ke dalam format rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp ' + rupiah;
        }

        // Fungsi untuk memformat nilai saat pengguna memasukkan angka
        function updateTotal(input) {
            var angka = parseFloat(input.value.replace(/[^\d]/g, ''));
            input.value = formatRupiah(angka);
        }

        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>


</body>

</html>
