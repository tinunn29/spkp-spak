<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPKP & SPAK - Admin Dashboard</title>
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
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
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

        /* Notification Bell */
        .notification-btn {
            position: relative;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-btn:hover {
            background: rgba(107, 87, 16, 0.1);
            transform: scale(1.1);
        }

        .notification-btn:focus {
            outline: none;
            box-shadow: none;
        }

        .notification-icon {
            font-size: 20px;
            color: #6b5710;
        }

        .notification-badge {
            position: absolute;
            top: 2px;
            right: 2px;
            background: #ff4444;
            color: white;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            font-size: 10px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 68, 68, 0.7);
            }
            70% {
                transform: scale(1.1);
                box-shadow: 0 0 0 6px rgba(255, 68, 68, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 68, 68, 0);
            }
        }

        /* Main Content */
        .main-content {
            padding: 60px 30px;
            max-width: 1200px;
            margin: 0 auto;
            flex: 1; /* Ini yang membuat konten mengisi ruang yang tersisa */
            width: 100%;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 80px;
        }

        .menu-card {
            background: linear-gradient(145deg, #f0ead6, #e6dcc4);
            border-radius: 25px;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 25px;
            box-shadow: 
                10px 10px 20px rgba(0, 0, 0, 0.1),
                -10px -10px 20px rgba(255, 255, 255, 0.8);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                15px 15px 30px rgba(0, 0, 0, 0.15),
                -15px -15px 30px rgba(255, 255, 255, 0.9);
        }

        .menu-card:hover::before {
            left: 100%;
        }

        .menu-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            flex-shrink: 0;
            position: relative;
            box-shadow: 
                5px 5px 15px rgba(0, 0, 0, 0.2),
                -5px -5px 15px rgba(255, 255, 255, 0.8);
        }

        .icon-survey {
            background: linear-gradient(145deg, #ff9999, #ff6666);
        }

        .icon-aspirasi {
            background: linear-gradient(145deg, #66b3ff, #3399ff);
        }

        .icon-hasil {
            background: linear-gradient(145deg, #ff9999, #ff6666);
        }

        .icon-user {
            background: linear-gradient(145deg, #66b3ff, #3399ff);
        }

        .icon-export {
            background: linear-gradient(145deg, #ff9999, #ff6666);
        }

        .menu-text {
            flex: 1;
        }

        .menu-title {
            font-size: 24px;
            font-weight: 600;
            color: #6b5710;
            margin-bottom: 5px;
            line-height: 1.2;
        }

        .menu-subtitle {
            font-size: 18px;
            color: #8b7520;
            font-weight: 400;
        }

        /* Footer */
        .footer {
            background: linear-gradient(145deg, #b8a080, #a08c60);
            padding: 40px 30px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-top: auto; /* Ini yang membuat footer menempel di bawah */
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr 300px;
            gap: 40px;
            align-items: center;
        }

        .footer-logo {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .logo-header img {
            width: 70px;
            height: auto;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 16px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .address-section h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #fff;
        }

        .address-text {
            font-size: 16px;
            line-height: 1.4;
            color: rgba(255, 255, 255, 0.9);
        }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
            height: 200px;
            background: linear-gradient(135deg, #ddd, #bbb);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 14px;
            position: relative;
        }

        .map-placeholder {
            text-align: center;
            opacity: 0.7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
            }

            .admin-text {
                display: none;
            }

            .notification-btn {
                padding: 6px;
            }

            .notification-icon {
                font-size: 18px;
            }

            .notification-badge {
                width: 14px;
                height: 14px;
                font-size: 9px;
            }

            .main-content {
                padding: 40px 20px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .menu-card {
                padding: 25px;
                gap: 20px;
            }

            .menu-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
            }

            .menu-title {
                font-size: 20px;
            }

            .menu-subtitle {
                font-size: 16px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
                text-align: center;
            }

            .map-container {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-header">
            <img src="images/logo_bogor.svg" alt="Logo Bogor">
        </div>

        <div class="user-section">
            <span class="admin-text">Admin</span>
            <button class="user-avatar" id="profileBtn" onclick="navigateToProfile()">
                <img src="images/profile.svg" alt="Profile" />
            </button>
            <button class="notification-btn" id="notificationBtn" onclick="navigateToNotifications()">
                <span class="notification-icon">🔔</span>
                <span class="notification-badge">3</span>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="menu-grid">
            <!-- Manajemen Pertanyaan Survei -->
            <div class="menu-card" onclick="navigateTo('manajemen_pertanyaan_survei')">
                <div class="menu-icon icon-survey">
                    👩‍💼
                </div>
                <div class="menu-text">
                    <div class="menu-title">Manajemen</div>
                    <div class="menu-subtitle">Pertanyaan Survei</div>
                </div>
            </div>

            <!-- Kelola Aspirasi Masyarakat -->
            <div class="menu-card" onclick="navigateTo('aspirasi')">
                <div class="menu-icon icon-aspirasi">
                    📊
                </div>
                <div class="menu-text">
                    <div class="menu-title">Kelola Aspirasi</div>
                    <div class="menu-subtitle">Masyarakat</div>
                </div>
            </div>

            <!-- Lihat & Kelola Hasil Survei - SEKARANG DI TENGAH -->
            <div class="menu-card" onclick="navigateTo('hasil_survei')">
                <div class="menu-icon icon-hasil">
                    👩‍💼
                </div>
                <div class="menu-text">
                    <div class="menu-title">Lihat & Kelola</div>
                    <div class="menu-subtitle">Hasil Survei</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="contact-section">
                <div class="footer-logo">
                    <img src="images/logo_bogor.svg" alt="Logo Bogor">
                </div>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">🕐</div>
                        <span>07.30 - 15.00</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <span>dprdbgr@gmail.com</span>
                    </div>
                </div>
            </div>

            <div class="address-section">
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div>
                        <div class="address-text">
                            Jl. Pemuda No.25-29, RT.01/<br>
                            RW.06, Tanah Sareal, Kec.<br>
                            Tanah Sereal, Kota Bogor,<br>
                            Jawa Barat 16161
                        </div>
                    </div>
                </div>
            </div>

            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7845348394947!2d106.79374031477085!3d-6.550579995276635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e8b4e7a339%3A0x6b8f3b0e3e2c3e2e!2sDPRD%20Kota%20Bogor!5e0!3m2!1sen!2sid!4v1678234567890!5m2!1sen!2sid"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi navigasi umum
        function navigateTo(page) {
            // Add loading animation
            event.currentTarget.style.transform = 'scale(0.95)';
            event.currentTarget.style.transition = 'transform 0.1s ease';
            
            setTimeout(() => {
                event.currentTarget.style.transform = 'scale(1)';
            }, 150);

            const routes = {
                manajemen_pertanyaan_survei: '{{ route("admin.manajemen_pertanyaan_survei") }}',
                hasil_survei: '{{ route("admin.hasil_survei") }}',
                aspirasi: '{{ route("admin.aspirasi") }}',
            };
            window.location.href = routes[page] || '/';
        }

        // Fungsi khusus untuk profile (TERPISAH dari user-section)
        function navigateToProfile() {
            console.log('Profile clicked!');
            // Ganti dengan route profile Anda
            window.location.href = '{{ route("admin.profile") }}' || '/profile';
            // Atau bisa juga pakai alert untuk testing:
            // alert('Profil Admin akan muncul di sini!');
        }

        // PERBAIKAN 4: Fungsi navigasi ke halaman notifikasi
        function navigateToNotifications() {
            console.log('Notification clicked!');
            // Navigasi ke halaman notif.blade.php
            window.location.href = '{{ route("admin.notif") }}' || '/admin/notif';
        }

        // Fungsi untuk update badge notifikasi
        function updateNotificationBadge(count) {
            const badge = document.querySelector('.notification-badge');
            if (count > 0) {
                badge.textContent = count;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        }

        // Fungsi untuk update badge notifikasi
        function updateNotificationBadge(count) {
            const badge = document.querySelector('.notification-badge');
            if (count > 0) {
                badge.textContent = count;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        }

        // Add interactive effects untuk menu cards
        const menuCards = document.querySelectorAll('.menu-card');
        menuCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Event listener untuk debugging (bisa dihapus nanti)
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard loaded successfully!');
            console.log('Profile button:', document.getElementById('profileBtn'));
            console.log('Notification button:', document.getElementById('notificationBtn'));
        });
    </script>
</body>
</html>