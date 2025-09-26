<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Aspirasi Masyarakat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: whitesmoke;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: #6b5710;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(107, 87, 16, 0.1);
            transform: translateX(-3px);
        }

        .logo-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
        }

        .logo-img img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .page-title {
            font-size: 24px;
            color: #6b5710;
            font-weight: 600;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-text {
            font-size: 18px;
            color: #6b5710;
            font-weight: 500;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border: none;
            padding: 0;
            background: transparent;
            cursor: pointer;
            border-radius: 50%;
            overflow: hidden;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }

        .container {
            padding: 20px 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }

        .stats-grid-bottom {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .stat-card {
            background-color: #e8e0d4;
            padding: 20px 16px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 13px;
            color: #666;
            font-weight: 500;
        }

        .search-section {
            padding: 0;
            border-radius: 0;
            margin-bottom: 16px;
        }

        .search-input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            border: none;
            border-radius: 8px;
            background-color: white;
            font-size: 14px;
            margin-bottom: 12px;
            position: relative;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-wrapper {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
        }

        .category-select {
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            background-color: white;
            font-size: 14px;
            color: #666;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .download-btn {
            background: linear-gradient(45deg, #815A40);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .download-btn:hover {
            background: linear-gradient(45deg, #815A40);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 87, 16, 0.3);
        }

        .aspirasi-card {
            background-color: #e8e0d4;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            position: relative;
        }

        .aspirasi-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 12px;
            color: #666;
        }

        .classification-info {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #666;
        }

        .divisi-select {
            border: none;
            background: transparent;
            font-size: 12px;
            color: #815A40;
            font-weight: 500;
            cursor: pointer;
            padding: 2px;
        }

        .arrow-icon {
            color: #666;
            font-size: 12px;
        }

        .status-select {
            border: none;
            background: transparent;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            padding: 2px;
            border-radius: 3px;
        }

        .status-select.status-proses {
            color: #856404;
            background-color: rgba(255, 193, 7, 0.1);
        }

        .status-select.status-terima {
            color: #155724;
            background-color: rgba(40, 167, 69, 0.1);
        }

        .status-select.status-tolak {
            color: #721c24;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .aspirasi-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .aspirasi-content {
            font-size: 14px;
            color: #555;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .status-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
        }

        .status-menunggu {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-setuju {
            background-color: #d4edda;
            color: #155724;
        }

        .status-perbaikan {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-kritik {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-saran {
            background-color: #cce7ff;
            color: #004085;
        }

        .status-keluhan {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-pujian {
            background-color: #d4edda;
            color: #155724;
        }

        .action-btn {
            background: none;
            border: none;
            color: #666;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            border-radius: 6px;
            transition: background-color 0.2s;
        }

        .action-btn:hover {
            background-color: rgba(0,0,0,0.05);
        }

        .dots-menu {
            position: absolute;
            bottom: 12px;
            right: 16px;
            color: #999;
            font-size: 18px;
            cursor: pointer;
            padding: 4px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .dots-menu:hover {
            background-color: rgba(0,0,0,0.1);
        }

        .user-anonymous {
            opacity: 0.6;
        }

        .aspirasi-card.faded {
            opacity: 0.7;
        }

        .aspirasi-card.faded .aspirasi-title {
            color: #666;
        }

        .aspirasi-card.faded .aspirasi-content {
            color: #999;
        }

        /* CSS untuk tampilan yang disembunyikan (faded) */
        .aspirasi-card.faded {
            opacity: 0.5; /* Membuat kartu lebih buram */
            transition: opacity 0.3s ease;
        }

        .aspirasi-card.hidden {
            display: none; /* Menyembunyikan kartu sepenuhnya */
        }

        /* Popup Menu Styles */
        .popup-menu {
            position: absolute;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            min-width: 120px;
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.2s ease;
            pointer-events: none;
            bottom: 0;
            right: 0;
        }

        .popup-menu.show {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
        }

        .popup-menu-item {
            padding: 12px 16px;
            cursor: pointer;
            color: #333;
            font-size: 13px;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .popup-menu-item:last-child {
            border-bottom: none;
        }

        .popup-menu-item:hover {
            background-color: #f5f5f5;
        }

        .popup-menu-item:first-child {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .popup-menu-item:last-child {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Overlay untuk menutup popup */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
            display: none;
        }

        .popup-overlay.show {
            display: block;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <button class="back-btn" onclick="window.history.back()">&#x2190;</button>
            <div class="logo-header">
                <div class="logo-img img">
                    <img src="images/logo_bogor.svg" alt="Logo Bogor">
                </div>
                <h1 class="page-title">Manajemen Pertanyaan Survei</h1>
            </div>
        </div>
        <div class="user-section">
            <span class="admin-text">Admin</span>
            <button class="user-avatar" id="profileBtn">
                <img src="images/profile.svg" alt="Profile" />
            </button>
        </div>
    </header>

    <div class="container">
        <div class="search-section">
            <div class="search-wrapper">
                <span class="search-icon">🔍</span>
                <input type="text" class="search-input" placeholder="Keyword: [Nama, Tanggal]">
            </div>
            <select class="category-select">
                <option>Semua Kategori</option>
                <option>Keluhan</option>
                <option>Saran</option>
                <option>Kritik</option>
            </select>
            <select class="category-select" style="margin-top: 12px;">
                <option>Divisi</option>
                <option>Divisi Umum</option>
                <option>Keuangan</option>
                <option>Perundang Undangan</option>
                <option>Fasilitasi</option>
            </select>
        </div>

        <button class="download-btn" onclick="downloadPDF()">
            <span>📥</span>
            Unduh PDF
        </button>

        <div class="aspirasi-card" data-id="aspirasi-1">
            <div class="status-badge status-keluhan">Keluhan</div>
            <div class="aspirasi-header">
                <span>👤 Aliza Putri</span>
                <span>📅 1/8/2025</span>
                <button class="action-btn" onclick="toggleVisibility('aspirasi-1')">
                    🔗 Sembunyikan
                </button>
                <div class="classification-info">
                    <select class="divisi-select" onchange="updateDivisi('aspirasi-1', this.value)">
                        <option value="umum" selected>Divisi Umum</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="perundang">Perundang Undangan</option>
                        <option value="fasilitasi">Fasilitasi</option>
                    </select>
                    <span class="arrow-icon">→</span>
                    <select class="status-select status-proses" onchange="updateStatus('aspirasi-1', this.value)">
                        <option value="proses" selected>Sedang Diproses</option>
                        <option value="terima">Diterima</option>
                        <option value="tolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="aspirasi-title">Perbaikan Jalan Pajajaran yang Rusak</div>
            <div class="aspirasi-content">Mohon untuk segera memperbaiki jalan Pajajaran yang sudah berlubang-lubang. Kondisi ini sangat mengganggu aktivitas masyarakat Bogor, terutama saat musim hujan.</div>
            <div class="dots-menu" onclick="showPopupMenu(event, 'aspirasi-1')">⋯</div>
        </div>

        <div class="aspirasi-card" data-id="aspirasi-2">
            <div class="status-badge status-pujian">Pujian</div>
            <div class="aspirasi-header">
                <span>👤 Hendery Gunawan</span>
                <span>📅 1/8/2025</span>
                <button class="action-btn" onclick="toggleVisibility('aspirasi-2')">
                    🔗 Sembunyikan
                </button>
                <div class="classification-info">
                    <select class="divisi-select" onchange="updateDivisi('aspirasi-2', this.value)">
                        <option value="umum" selected>Divisi Umum</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="perundang">Perundang Undangan</option>
                        <option value="fasilitasi">Fasilitasi</option>
                    </select>
                    <span class="arrow-icon">→</span>
                    <select class="status-select status-proses" onchange="updateStatus('aspirasi-2', this.value)">
                        <option value="proses" selected>Sedang Diproses</option>
                        <option value="terima">Diterima</option>
                        <option value="tolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="aspirasi-title">Apresiasi Program Bantuan Sosial DPRD</div>
            <div class="aspirasi-content">Terima kasih atas program bantuan sosial untuk masyarakat kurang mampu di Kota Bogor. Program ini sangat membantu keluarga kami.</div>
            <div class="dots-menu" onclick="showPopupMenu(event, 'aspirasi-2')">⋯</div>
        </div>

        <div class="aspirasi-card" data-id="aspirasi-3">
            <div class="status-badge status-saran">Saran</div>
            <div class="aspirasi-header">
                <span>👤 Syifa Ariana</span>
                <span>📅 1/8/2025</span>
                <button class="action-btn" onclick="toggleVisibility('aspirasi-3')">
                    🔗 Sembunyikan
                </button>
                <div class="classification-info">
                    <select class="divisi-select" onchange="updateDivisi('aspirasi-3', this.value)">
                        <option value="umum" selected>Divisi Umum</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="perundang">Perundang Undangan</option>
                        <option value="fasilitasi">Fasilitasi</option>
                    </select>
                    <span class="arrow-icon">→</span>
                    <select class="status-select status-proses" onchange="updateStatus('aspirasi-3', this.value)">
                        <option value="proses" selected>Sedang Diproses</option>
                        <option value="terima">Diterima</option>
                        <option value="tolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="aspirasi-title">Usulan Pembangunan RTH di Bogor Utara</div>
            <div class="aspirasi-content">Saya mengusulkan pembangunan Ruang Terbuka Hijau (RTH) di area Bogor Utara untuk meningkatkan kualitas udara dan tempat rekreasi masyarakat.</div>
            <div class="dots-menu" onclick="showPopupMenu(event, 'aspirasi-3')">⋯</div>
        </div>

        <div class="aspirasi-card" data-id="aspirasi-4">
            <div class="status-badge status-kritik">Kritik</div>
            <div class="aspirasi-header">
                <span>👤 Muhammad Satrio</span>
                <span>📅 1/8/2025</span>
                <button class="action-btn" onclick="toggleVisibility('aspirasi-4')">
                    🔗 Sembunyikan
                </button>
                <div class="classification-info">
                    <select class="divisi-select" onchange="updateDivisi('aspirasi-4', this.value)">
                        <option value="umum" selected>Divisi Umum</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="perundang">Perundang Undangan</option>
                        <option value="fasilitasi">Fasilitasi</option>
                    </select>
                    <span class="arrow-icon">→</span>
                    <select class="status-select status-proses" onchange="updateStatus('aspirasi-4', this.value)">
                        <option value="proses" selected>Sedang Diproses</option>
                        <option value="terima">Diterima</option>
                        <option value="tolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="aspirasi-title">Kritik Terkait Transportasi Umum di Bogor</div>
            <div class="aspirasi-content">Sistem transportasi umum di Kota Bogor masih perlu perbaikan. Angkot sering tidak sesuai trayek dan jadwal bus tidak teratur.</div>
            <div class="dots-menu" onclick="showPopupMenu(event, 'aspirasi-4')">⋯</div>
        </div>

        <div class="aspirasi-card faded user-anonymous" data-id="aspirasi-5">
            <div class="status-badge status-keluhan">Keluhan</div>
            <div class="aspirasi-header">
                <span>👤 User Anonymous</span>
                <span>📅 1/8/2025</span>
                <button class="action-btn" onclick="toggleVisibility('aspirasi-5')">
                    🔗 Tampilkan
                </button>
                <div class="classification-info">
                    <select class="divisi-select" onchange="updateDivisi('aspirasi-5', this.value)">
                        <option value="umum" selected>Divisi Umum</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="perundang">Perundang Undangan</option>
                        <option value="fasilitasi">Fasilitasi</option>
                    </select>
                    <span class="arrow-icon">→</span>
                    <select class="status-select status-proses" onchange="updateStatus('aspirasi-5', this.value)">
                        <option value="proses" selected>Sedang Diproses</option>
                        <option value="terima">Diterima</option>
                        <option value="tolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="aspirasi-title">Konten Tidak Pantas</div>
            <div class="aspirasi-content">Ini adalah contoh aspirasi yang mengandung konten tidak pantas dan menyerang netralitas pemerintah yang baik.</div>
            <div class="dots-menu" onclick="showPopupMenu(event, 'aspirasi-5')">⋯</div>
        </div>
    </div>

    <!-- Popup Menu -->
    <div class="popup-overlay" onclick="closePopupMenu()"></div>
    <div class="popup-menu" id="popupMenu">
        <div class="popup-menu-item" onclick="changeCategory('keluhan')">
            <span>📢</span> Keluhan
        </div>
        <div class="popup-menu-item" onclick="changeCategory('saran')">
            <span>💡</span> Saran
        </div>
        <div class="popup-menu-item" onclick="changeCategory('kritik')">
            <span>⚠️</span> Kritik
        </div>
        <div class="popup-menu-item" onclick="changeCategory('pujian')">
            <span>👏</span> Pujian
        </div>
    </div>

    <script>
    // Contoh data aspirasi
    let dataAspirasi = [
        { id: 'aspirasi-1', status: 'tampil', kategori: 'keluhan', divisi: 'umum', statusProses: 'proses' },
        { id: 'aspirasi-2', status: 'tampil', kategori: 'pujian', divisi: 'keuangan', statusProses: 'terima' },
        { id: 'aspirasi-3', status: 'tampil', kategori: 'saran', divisi: 'fasilitasi', statusProses: 'proses' },
        { id: 'aspirasi-4', status: 'tampil', kategori: 'kritik', divisi: 'perundang', statusProses: 'tolak' },
        { id: 'aspirasi-5', status: 'sembunyi', kategori: 'keluhan', divisi: 'umum', statusProses: 'tolak' }
    ];

    let currentAspirasiId = null;

    function downloadPDF() {
        alert('Mengunduh data aspirasi dalam format PDF...');
    }

    function updateDivisi(aspirasiId, newDivisi) {
        const aspirasi = dataAspirasi.find(a => a.id === aspirasiId);
        if (aspirasi) {
            aspirasi.divisi = newDivisi;
        }
    }

    function updateStatus(aspirasiId, newStatus) {
        const aspirasi = dataAspirasi.find(a => a.id === aspirasiId);
        if (aspirasi) {
            aspirasi.statusProses = newStatus;
        }
        
        // Update visual styling
        const cardElement = document.querySelector(`.aspirasi-card[data-id="${aspirasiId}"]`);
        const statusSelect = cardElement.querySelector('.status-select');
        
        // Remove all status classes
        statusSelect.classList.remove('status-proses', 'status-terima', 'status-tolak');
        
        // Add new status class
        statusSelect.classList.add(`status-${newStatus}`);
    }

    function toggleVisibility(aspirasiId) {
        const cardElement = document.querySelector(`.aspirasi-card[data-id="${aspirasiId}"]`);
        if (!cardElement) {
            console.error('Aspirasi dengan ID', aspirasiId, 'tidak ditemukan.');
            return;
        }

        const button = cardElement.querySelector('.action-btn');

        if (cardElement.classList.contains('faded')) {
            cardElement.classList.remove('faded');
            button.innerHTML = '🔗 Sembunyikan';
            updateAspirasiStatus(aspirasiId, 'tampil');
        } else {
            cardElement.classList.add('faded');
            button.innerHTML = '🔗 Tampilkan';
            updateAspirasiStatus(aspirasiId, 'sembunyi');
        }
        
        updateStats();
    }

    function updateAspirasiStatus(aspirasiId, newStatus) {
        const aspirasi = dataAspirasi.find(a => a.id === aspirasiId);
        if (aspirasi) {
            aspirasi.status = newStatus;
        }
    }
    
    function updateStats() {
        const hiddenCount = dataAspirasi.filter(a => a.status === 'sembunyi').length;
        const totalCount = dataAspirasi.length;
        
        const totalElement = document.querySelector('.stats-grid .stat-card:nth-child(1) .stat-number');
        const hiddenElement = document.querySelector('.stats-grid-bottom .stat-card:nth-child(2) .stat-number');
        
        if (totalElement) totalElement.textContent = totalCount;
        if (hiddenElement) hiddenElement.textContent = hiddenCount;
    }

    function showPopupMenu(event, aspirasiId) {
        event.stopPropagation();
        currentAspirasiId = aspirasiId;
        
        const popup = document.getElementById('popupMenu');
        const overlay = document.querySelector('.popup-overlay');
        const dotsButton = event.target;
        const card = dotsButton.closest('.aspirasi-card');
        
        const cardRect = card.getBoundingClientRect();
        const dotsRect = dotsButton.getBoundingClientRect();
        
        popup.style.position = 'absolute';
        popup.style.bottom = '40px';
        popup.style.right = '16px';
        
        overlay.classList.add('show');
        popup.classList.add('show');
    }

    function closePopupMenu() {
        const popup = document.getElementById('popupMenu');
        const overlay = document.querySelector('.popup-overlay');
        
        popup.classList.remove('show');
        overlay.classList.remove('show');
        currentAspirasiId = null;
    }

    function changeCategory(newCategory) {
        if (!currentAspirasiId) return;
        
        const cardElement = document.querySelector(`.aspirasi-card[data-id="${currentAspirasiId}"]`);
        const statusBadge = cardElement.querySelector('.status-badge');
        
        const categoryMap = {
            'keluhan': 'Keluhan',
            'saran': 'Saran', 
            'kritik': 'Kritik',
            'pujian': 'Pujian'
        };
        
        statusBadge.textContent = categoryMap[newCategory];
        statusBadge.className = `status-badge status-${newCategory}`;
        
        const aspirasi = dataAspirasi.find(a => a.id === currentAspirasiId);
        if (aspirasi) {
            aspirasi.kategori = newCategory;
        }
        
        closePopupMenu();
    }

    document.addEventListener('click', function(event) {
        const popup = document.getElementById('popupMenu');
        const overlay = document.querySelector('.popup-overlay');
        
        if (!event.target.closest('.dots-menu') && !event.target.closest('.popup-menu')) {
            popup.classList.remove('show');
            overlay.classList.remove('show');
            currentAspirasiId = null;
        }
    });
    
    document.addEventListener('DOMContentLoaded', updateStats);
</script>
</body>
</html>