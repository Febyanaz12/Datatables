<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Implementasi Jquery Datatable dengan PHP</title>

    <!-- Load Datatable & Bootsrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="datatables/lib/css/dataTables.bootstrap.min.css"/>
  </head>
  <body>
    <div class="container">
      <div style="background: whitesmoke;padding: 10px;">
        <h1 style="margin-top: 0;">Implementasi Jquery Datatable dengan PHP</h1>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="table-siswa">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>

    <!-- Load Jquery & Datatable JS -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script type="text/javascript" src="datatables/lib/js/dataTables.bootstrap.min.js"></script>
    <script>
    var tabel = null;

    $(document).ready(function() {
        tabel = $('#table-siswa').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "http://localhost/data_tables/view.php", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[5, 10, 50]], // Combobox Limit
            "columns": [
                { "data": "nim" }, // Tampilkan nis
                { "data": "nama" },  // Tampilkan nama
                { "render": function ( data, type, row ) {  // Tampilkan jenis kelamin
                        var html = ""

                        if(row.jenis_kelamin == 1){ // Jika jenis kelaminnya 1
                            html = 'Laki-laki' // Set laki-laki
              }else{ // Jika bukan 1
                            html = 'Perempuan' // Set perempuan
                        }

                        return html; // Tampilkan jenis kelaminnya
                    }
                },
                { "data": "telp" }, // Tampilkan telepon
                { "data": "alamat" }, // Tampilkan alamat
                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        var html  = "<a href=''>EDIT</a> | "
                        html += "<a href=''>DELETE</a>"

                        return html
                    }
                },
            ],
        });
    });
    </script>
  </body>
</html>