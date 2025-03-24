<?php
include 'function.php'; // Pastikan koneksi database

if (isset($_POST['query'])) {
    $query = mysqli_real_escape_string($conn, $_POST['query']);

    // Query untuk mencari di tiga tabel (restoran, kuliner, minuman)
    $sql = "
        SELECT 'restoran' AS source, restoran.nama AS nama, restoran.id AS id, restoran.gambar as gambar
        FROM restoran
        WHERE nama LIKE '%$query%'

        UNION ALL

        SELECT 'kuliner' AS source, kuliner.nama AS nama, kuliner.id AS id, kuliner.gambar as gambar
        FROM kuliner
        WHERE nama LIKE '%$query%'

        UNION ALL

        SELECT 'minuman' AS source, minuman.nama AS nama, minuman.id AS id, minuman.gambar as gambar
        FROM minuman
        WHERE nama LIKE '%$query%'
        
        LIMIT 5
    ";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div style="display: flex; align-items: center; padding: 5px 10px; border-bottom: 1px solid #ddd;">';

            // Menampilkan gambar kecil (thumbnail)
            if (!empty($row['gambar'])) {
                echo '<img src="../pbl/dashboard/gambar/' . htmlspecialchars($row['gambar']) . '" alt="Gambar" 
                style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">';
            } else {
                // Jika gambar kosong, tampilkan placeholder
                echo '<img src="placeholder.jpg" alt="Gambar" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">';
            }

            // Menampilkan nama dan deskripsi sebagai link
            echo '<div>';
            echo '<a href="kuliner.php?id=' . htmlspecialchars($row['id']) . '" style="text-decoration: none; color: black;">';
            echo '<strong>' . htmlspecialchars($row['nama']) . '</strong><br>';
            if (!empty($row['deskripsi'])) {
                echo '<small>' . htmlspecialchars($row['deskripsi']) . '</small>';
            }
            echo '</a>';
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo '<div style="padding: 5px 10px;">Tidak ada hasil ditemukan.</div>';
    }
}
?>