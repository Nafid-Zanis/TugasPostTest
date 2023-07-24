<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasantri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!--Layout Data -->
        <div class="card mb-3">
            <div class="card-header bg-dark text-white text-center">
                TUGAS PROJEK KELOMPOK WEB PROGRAMMING CI4
            </div>
        </div>
        <!--MODAL-->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Tambah Data Mahasantri
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
                        <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- JIKA ERROR -->
                        <div class="alert alert-danger error" role="alert" style="display: none;">
                            Error
                        </div>
                        <!--Jika SUkses -->
                        <div class="alert alert-success sukses" role="alert" style="display: none;">
                            Sukses
                        </div>
                        <!--INPUT DATA DISINI-->
                        <input type="hidden" id="inputId">
                        <div class="mb-3 row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputNim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAlamat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputJurusan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dataMahasantri as $k => $v) {
                    $nomor = $nomor + 1;
                ?>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $v['nama'] ?></td>
                        <td><?php echo $v['nim'] ?></td>
                        <td><?php echo $v['alamat'] ?></td>
                        <td><?php echo $v['jurusan'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit(<?php echo $v['id'] ?>)">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?php echo $v['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!---->
    Penambahan dari Tri
    <!---->
    <!---->
    Penambahan dari Aris
    <!---->
    <!---->
    Penambahan dari Nely
    <!---->
    Penambahan dari Nafid 1
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        function hapus($id) {
            var result = confirm('Yakin mau menghapus kenangan ? ');
            if (result) {
                window.location = "<?php echo site_url("mahasantri/hapus") ?>/" + $id;
            }
        }

        function bersihkan() {
            $('inputNama').val('');
            $('inputNim').val('');
            $('inputAlamat').val('');
            $('inputJurusan').val('');
        }
        $('.tombol-tutup').on('click', function() {
            if ($('.sukses').is(":visible")) {
                window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING'] ?>";
            }
            $('.alert').hide();
            bersihkan();
        });

        function edit($id) {
            $.ajax({
                url: "<?php echo site_url("mahasantri/edit") ?>/" + $id,
                type: "get",
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.$id != '') {
                        $('#inputId').val($obj.id);
                        $('#inputNama').val($obj.nama);
                        $('#inputNim').val($obj.nim);
                        $('#inputAlamat').val($obj.alamat);
                        $('#inputjurusan').val($obj.jurusan);
                    }
                }

            })
        }

        $('#tombolSimpan').on('click', function() {
            var $id = $('#inputId').val();
            var $nama = $('#inputNama').val();
            var $nim = $('#inputNim').val();
            var $alamat = $('#inputAlamat').val();
            var $jurusan = $('#inputJurusan').val();

            $.ajax({
                url: "<?php echo site_url("mahasantri/simpan") ?>",
                type: "POST",
                data: {
                    id: $id,
                    nama: $nama,
                    nim: $nim,
                    alamat: $alamat,
                    jurusan: $jurusan
                },
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                }
            })
            bersihkan();
        });
    </script>
</body>

</html>