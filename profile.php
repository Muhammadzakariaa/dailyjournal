<?php

include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

$username = $_SESSION['username'];
$message = "";
$messageType = "";

// AMBIL DATA USER
$stmt = $conn->prepare("SELECT id, username, password, foto FROM user WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// UPDATE PROFILE 
if (isset($_POST['update_profile'])) {

    $user_id = $user['id'];

    
    // UPDATE PASSWORD 
    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']); // menyesuaikan sistem lama

        $stmt = $conn->prepare("UPDATE user SET password=? WHERE id=?");
        $stmt->bind_param("si", $password, $user_id);

        if ($stmt->execute()) {
            $message = "Password berhasil diubah!";
            $messageType = "success";
        } else {
            $message = "Gagal mengubah password!";
            $messageType = "danger";
        }
        $stmt->close();
    }

    // UPDATE FOTO 
    if (!empty($_FILES['profile_photo']['name'])) {

        $allowed = ['jpg','jpeg','png','gif'];
        $ext = strtolower(pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            if ($_FILES['profile_photo']['size'] <= 2000000) {

                $filename = "profile_".$user_id."_".time().".".$ext;
                $path = "image/".$filename;

                if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $path)) {

                    if (!empty($user['foto']) && file_exists("image/".$user['foto'])) {
                        unlink("image/".$user['foto']);
                    }

                    $stmt = $conn->prepare("UPDATE user SET foto=? WHERE id=?");
                    $stmt->bind_param("si", $filename, $user_id);

                    if ($stmt->execute()) {
                        $message .= " Foto profil berhasil diubah!";
                        $messageType = "success";
                    } else {
                        $message = "Gagal menyimpan foto!";
                        $messageType = "danger";
                    }
                    $stmt->close();
                }
            } else {
                $message = "Ukuran foto maksimal 2MB!";
                $messageType = "danger";
            }
        } else {
            $message = "Format foto harus JPG, PNG, atau GIF!";
            $messageType = "danger";
        }
    }

    // refresh data
    $stmt = $conn->prepare("SELECT id, username, password, foto FROM user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile | My Daily Journal</title>
    <link rel="icon" href="image/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body{min-height:100vh;display:flex;flex-direction:column;}
        .navbar{background:linear-gradient(90deg,#0f9b0f,#00b09b);}
        .user{color:yellow!important;}
        #content{flex:1}
        .profile-photo-preview{width:150px;height:150px;object-fit:cover;border-radius:5px;}
    </style>
</head>
<body>


<section id="content" class="p-1">
<div class="container">

<?php if($message): ?>
<div class="alert alert-<?= $messageType ?>"><?= $message ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" class="form-control" value="<?= $user['username'] ?>" readonly>
</div>

<div class="mb-3">
<label class="form-label">Ganti Password</label>
<input type="password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja" class="form-control" name="password">
</div>

<div class="mb-3">
<label class="form-label">Ganti Foto Profil</label>
<input type="file" class="form-control" name="profile_photo">
</div>

<div class="mb-4">
<label class="form-label">Foto Profil Saat Ini</label><br>
<?php if(!empty($user['foto'])): ?>
<img src="image/<?= $user['foto'] ?>" class="profile-photo-preview">
<?php else: ?>
<i class="bi bi-person-circle fs-1 text-secondary"></i>
<?php endif; ?>
</div>

<button class="btn btn-primary" name="update_profile">Simpan</button>

</form>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
