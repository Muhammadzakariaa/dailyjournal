<div class="container">
    		<div class="row mb-2">
                <div class="col-md-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg"></i> Tambah Gallery
                </button>
            </div>
                <div class="col-md-6">
            	    <div class="input-group">
                        <input type="text" id="search" class="form-control" placeholder="Ketik minimal 3 karakter untuk pencarian..">
                            <span class="input-group-text">
                            <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul</th>
                        <th class="w-50">Deskripsi</th>
                        <th class="w-50">Gambar</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                	<tbody id="result">
                
                    </tbody>
            </table>
        </div>

        <!-- Modal Tambah Gallery -->
         <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah Gallery</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="post" action="" enctype="multipart/form-data">
             <div class="modal-body">
            				<div class="mb-3">
							<label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Gallery" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi">Deskripsi</label>
                            <textarea class="form-control" placeholder="Tuliskan Deskripsi Gallery" name="isi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Total -->
    <?php
$total = 0;
$queryTotal = $conn->query("SELECT COUNT(*) AS total FROM gallery");
if ($queryTotal) {
    $dataTotal = $queryTotal->fetch_assoc();
    $total = $dataTotal['total'];
}
?>

<div class="mt-2 d-flex align-items-center">
  <span>Total Gallery:</span>
  <span class="fw-bold ms-2"><?= $total; ?></span>
</div>


    <!-- Pagination -->
    <nav aria-label="...">
  <ul class="pagination justify-content-end">
    <li class="page-item"><a href="#" class="page-link">First</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-current="page">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    <li class="page-item"><a class="page-link" href="#">Last</a></li>
  </ul>
</nav>

</div>




<script>
    function loadData(keyword = '') {
        $.ajax({
            url: "gallery_search.php",
            type: "POST",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $("#result").html(data);
            }
        });
    }

    // load awal
    loadData();

    // event pencarian
    $("#search").on("keyup", function() {
        let keyword = $(this).val();

        if (keyword.length >=3 || keyword.length === 0) {
             loadData(keyword);
        }
    });
</script>

<?php
include "upload_foto.php";

//jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    //jika ada file baru yang dikirim  
    if ($nama_gambar != '') {
        //panggil function upload_foto untuk cek detail file yg diupload user
        //function ini memiliki keluaran sebuah array yang berisi status dan message
        $cek_upload = upload_foto($_FILES["gambar"]);

        //cek status upload file hasilnya true/false
        if ($cek_upload['status']) {
            //jika true maka message berisi nama file gambar
            $gambar = $cek_upload['message'];
        } else {
            //jika true maka message berisi pesan error, tampilkan dalam alert
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=gallery';
            </script>";
            die;
        }
    }


    		//cek apakah ada id yang dikirimkan dari form
    if (isset($_POST['id'])) {
        //jika ada id, lakukan update data dengan id tersebut
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            //jika tidak ganti gambar
            $gambar = $_POST['gambar_lama'];
        } else {
            //jika ganti gambar, hapus gambar lama
            unlink("image/" . $_POST['gambar_lama']);
        }

        $stmt = $conn->prepare("UPDATE gallery 
                                SET 
                                judul =?,
                                isi =?,
                                gambar = ?,
                                tanggal = ?,
                                username = ?
                                WHERE id = ?");

        $stmt->bind_param("sssssi", $judul, $isi, $gambar, $tanggal, $username, $id);
        $simpan = $stmt->execute();
    } else {
		    //jika tidak ada id, lakukan insert data baru
        $stmt = $conn->prepare("INSERT INTO gallery (judul,isi,gambar,tanggal,username)
                                VALUES (?,?,?,?,?)");

        $stmt->bind_param("sssss", $judul, $isi, $gambar, $tanggal, $username);
        $simpan = $stmt->execute();
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=gallery';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
 
//jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != '') {
        //hapus file gambar dari folder /image
        unlink("image/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id =?");

    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=article';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=article';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>