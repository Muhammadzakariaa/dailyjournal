<?php
//query untuk mengambil data article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows;

// menghitung jumlah data gallery
$sql2 = "SELECT * FROM gallery";
$hasil2 = $conn->query($sql2);

//menghitung jumlah baris data gallery
$jumlah_gallery = $hasil2->num_rows;

// Ambil data user yang sedang login
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT username, foto FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();
$stmt->close();
?>

<style>
    .profile-section {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .profile-photo-dashboard {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #e0e0e0;
        margin: 20px auto;
        display: block;
    }
    
    .welcome-text {
        color: #666;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    
    .username-text {
        color: #dc3545;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 30px;
    }
    
    .dashboard-cards {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }
    
    .stat-card {
        width: 280px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 30px;
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .stat-card-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .stat-icon-text {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.1rem;
    }
    
    .stat-icon-text i {
        font-size: 1.5rem;
    }
    
    .stat-badge {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #dc3545;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: bold;
    }
</style>

<!-- Profile Section -->
<div class="profile-section">
    <p class="welcome-text">Selamat Datang,</p>
    <h2 class="username-text"><?= htmlspecialchars($user_data['username']) ?></h2>

    <?php
    $fotoPath = "image/" . $user_data['foto'];
    ?>

    <?php if (!empty($user_data['foto']) && file_exists($fotoPath)): ?>
        <img src="<?= htmlspecialchars($fotoPath) ?>" 
             alt="Profile Photo" 
             class="profile-photo-dashboard">
    <?php else: ?>
        <div class="profile-photo-dashboard d-flex align-items-center justify-content-center bg-light">
            <i class="bi bi-person-circle" style="font-size:120px;color:#ccc;"></i>
        </div>
    <?php endif; ?>
</div>


<!-- Dashboard Cards -->
<div class="dashboard-cards">
    <!-- Article Card -->
    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-icon-text">
                <i class="bi bi-newspaper"></i>
                <span>Article</span>
            </div>
            <div class="stat-badge">
                <?= $jumlah_article ?>
            </div>
        </div>
    </div>
    
    <!-- Gallery Card -->
    <div class="stat-card">
        <div class="stat-card-content">
            <div class="stat-icon-text">
                <i class="bi bi-camera"></i>
                <span>Gallery</span>
            </div>
            <div class="stat-badge">
                <?= $jumlah_gallery ?>
            </div>
        </div>
    </div>
</div>