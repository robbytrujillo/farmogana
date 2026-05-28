<?php
include 'partials/header.php';
include 'config/db.php';

/*
|--------------------------------------------------------------------------
| AMBIL DATA HISTORY
|--------------------------------------------------------------------------
*/

$history = mysqli_query($conn, "
    SELECT * FROM scan_history
    ORDER BY created_at DESC
    LIMIT 5
");

/*
|--------------------------------------------------------------------------
| HITUNG STATISTIK
|--------------------------------------------------------------------------
*/

$totalScan = mysqli_num_rows(mysqli_query($conn,
    "SELECT id FROM scan_history"
));

$totalHealthy = mysqli_num_rows(mysqli_query($conn,
    "SELECT id FROM scan_history WHERE status='Healthy'"
));

$totalWarning = mysqli_num_rows(mysqli_query($conn,
    "SELECT id FROM scan_history WHERE status='Warning'"
));
?>

<div class="app profile-page">

    <!-- TOP HEADER -->
    <div class="d-flex align-items-center mb-4">

        <a href="index.php" class="text-success fs-3 me-3 text-decoration-none">
            <i class="bi bi-arrow-left"></i>
        </a>

        <h4 class="mb-0 fw-bold">
            Profile
        </h4>

    </div>


    <!-- PROFILE CARD -->
    <div class="header-profile">

        <img src="https://ui-avatars.com/api/?name=Robby+I&background=2f9e44&color=fff&size=200">

        <h4 class="mt-3 mb-1">
            Robby Ilhamkusuma
        </h4>

        <p class="text-muted mb-1">
            robby@farmogana.id
        </p>

        <small class="text-muted">
            📍 Gunung Putri, Bogor
        </small>

        <button class="btn btn-success mt-3 px-4">
            Edit Profile
        </button>

    </div>


    <!-- STATS -->
    <div class="card-ui stats-box">

        <div>
            <h4><?= $totalScan ?></h4>
            <small>Total Scan</small>
        </div>

        <div>
            <h4><?= $totalHealthy ?></h4>
            <small>Healthy</small>
        </div>

        <div>
            <h4><?= $totalWarning ?></h4>
            <small>Warning</small>
        </div>

    </div>


    <!-- ACCOUNT SETTINGS -->
    <div class="card-ui">

        <h5 class="mb-3">Account Settings</h5>

        <div class="menu-item">
            <i class="bi bi-envelope-fill"></i>
            Change Email
        </div>

        <div class="menu-item">
            <i class="bi bi-geo-alt-fill"></i>
            Change City
        </div>

        <div class="menu-item">
            <i class="bi bi-lock-fill"></i>
            Change Password
        </div>

    </div>


    <!-- SCAN HISTORY -->
    <div class="card-ui">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Scan History</h5>

            <a href="history.php" class="text-success text-decoration-none">
                View All
            </a>
        </div>

        <?php if(mysqli_num_rows($history) > 0): ?>

        <?php while($row = mysqli_fetch_assoc($history)): ?>

        <?php
                    $status = $row['status'];

                    if($status == 'Healthy'){
                        $badge = 'success';
                    } elseif($status == 'Warning'){
                        $badge = 'warning';
                    } else {
                        $badge = 'danger';
                    }
                ?>

        <div class="history-item">

            <div class="d-flex justify-content-between">

                <strong>
                    <?= $row['tanaman'] ?>
                </strong>

                <span class="text-<?= $badge ?>">
                    <?= $status ?>
                </span>

            </div>

            <small class="text-muted">
                <?= date('d M Y - H:i', strtotime($row['created_at'])) ?> WIB
            </small>

        </div>

        <?php endwhile; ?>

        <?php else: ?>

        <div class="text-center text-muted py-3">
            Belum ada history scan
        </div>

        <?php endif; ?>

    </div>

</div>

<?php include 'partials/footer.php'; ?>