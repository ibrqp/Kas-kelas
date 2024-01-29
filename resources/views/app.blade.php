<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laravel 9 Crud - Bootstrap 5 Modal Add Edit and Delete</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    @include('modal')

    <script>
        $('#editE').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var siswaId = button.data('siswa-id');

            $.ajax({
                url: '/get-siswa-detail/' + siswaId,
                type: 'GET',
                success: function(response) {
                    var siswa = response.siswa;
                    var siswaDetailTableBody = $('#siswaDetailTableBody');

                    siswaDetailTableBody.empty();

                    siswaDetailTableBody.append(
                        '<tr>' +
                        '<td>1</td>' +
                        '<td>' + siswa.nama + '</td>' +
                        '<td>' + siswa.tgl_bayar + '</td>' +
                        '<td>' + 'Rp ' + formatRupiah(siswa.total_bayar) + '</td>' +
                        '</tr>'
                    );
                },
                error: function(error) {
                    console.error('Error fetching siswa detail:', error);
                }
            });
        });

        // Fungsi untuk memformat angka ke format rupiah
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
            return rupiah;
        }
    </script>


    {{-- <!-- Script JS dan Lainnya -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    <script>
        // Script JavaScript yang telah diperbarui
        // ...

        // Fungsi untuk memformat nilai saat pengguna memasukkan angka
        function updateTotal(input) {
            var angka = parseFloat(input.value.replace(/[^\d]/g, ''));
            input.value = formatRupiah(angka);
        }
    </script>

    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>
