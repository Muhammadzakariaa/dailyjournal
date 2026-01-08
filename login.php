<?php
// memulai session atau melanjutkan session yang sudah ada
session_start();

// menyertakan code dari file koneksi
include "koneksi.php";

// check jika sudah ada user yang login diarahkan ke halaman admin
if (isset($_SESSION['username'])) {
    header("location:admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | My Daily Journal</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="icon" href="img/logo.png" />

    <!-- style -->
     <style>
      body {
        background: linear-gradient(90deg, #0f9b0f, #00b09b);
      }

      .btn {
        background: linear-gradient(90deg, #11998e, #38ef7d);
        color: #000;
        border: none;
      }

    .btn:hover {
        background: linear-gradient(90deg, #0f9b0f, #38ef7d);
        transform: scale(1.03);
      }
     </style>
  </head>
  <body>

    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
          <div class="card border-0 shadow rounded-5">
            <div class="card-body">
              <div class="text-center mb-3">
                <i class="bi bi-person-circle h1 display-4"></i>
                <p>My Daily Journal</p>
                <hr />
              </div>

              <form action="" method="post" id="loginForm">
                <input
                  type="text"
                  name="user"
                  id="user"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Username"
                />
                <input
                  type="password"
                  name="pass"
                  id="pass"
                  class="form-control my-4 py-2 rounded-4"
                  placeholder="Password"
                />
                <div class="text-center my-3 d-grid">
                  <button class="btn rounded-4">Login</button>
                </div>
                <p id="errorMsg" class="text-danger"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script>
  document.getElementById("loginForm").addEventListener("submit", function(event) {
      const user = document.getElementById("user").value.trim();
      const pass = document.getElementById("pass").value.trim();
      const errorMsg = document.getElementById("errorMsg");

      // Reset pesan error
      errorMsg.textContent = "";

      // Cek username kosong
      if (user === "") {
          errorMsg.textContent = "Username tidak boleh kosong!";
          event.preventDefault(); // stop submit (stop kirim data dari form ke server)
          return;
      }

      // Cek password kosong
      if (pass === "") {
          errorMsg.textContent = "Password tidak boleh kosong!";
          event.preventDefault(); // stop submit (stop kirim data dari form ke server)
          return;
      }

      // Jika lolos semua validasi, form akan submit (kirim data dari form ke server)
  });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

 <?php

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //  ambil nilai input
        $userInput = $_POST['user'];
        $passInput = $_POST['pass'];

        // VALIDAI EMPTY FIELD
        if($userInput == "") {
            echo "Username tidak boleh kosong!";
            exit; //hentikan proses
        }

        if ($passInput == "") {
            echo "Password tidak boleh kosong!";
            exit; //hentikan proses
        }


      	$username = $userInput; 
        $password = md5($passInput); //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database

        //prepared statement
        $stmt = $conn->prepare("SELECT * 
                                FROM user 
                                WHERE username=? AND password=?");

        //parameter binding 
        $stmt->bind_param("ss", $username, $password);//username string dan password string
        
        //database executes the statement
        $stmt->execute();
        
        //menampung hasil eksekusi
        $hasil = $stmt->get_result();
        
        //mengambil baris dari hasil sebagai array asosiatif
        $row = $hasil->fetch_array(MYSQLI_ASSOC);

         // Jika semua validasi
        //check apakah ada baris hasil data user yang cocok
        if (!empty($row)) {
		    // jika data ada (berhasil), alihkan ke halaman admin
            $_SESSION['username'] = $username; //simpan variabael pada session
            header("location:admin.php");
        } else {
            // jika data tidak ada (gagal), tetap di halaman login
            header("location:login.php");
        }
     }
    ?>