<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - DPRD</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
        }

        .header {
            background-color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: #666;
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .back-btn:hover {
            color: #333;
        }

        .logo-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #2c5aa0, #1e4080);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .admin-text {
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(45deg, #ff9a9e, #fecfef);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.05);
        }

        .main-content {
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
        }

        .notification-container {
            background: rgba(197, 172, 136, 0.35);
            padding: 60px 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .notification-bell {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2A0800;
        }

        .notification-icon {
            width: 80px;
            height: 80px;
        }

        .notification-title {
            font-size: 24px;
            color: #666;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .notification-message {
            font-size: 16px;
            color: #999;
            line-height: 1.5;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 12px 15px;
            }

            .page-title {
                font-size: 18px;
            }

            .logo-img {
                width: 35px;
                height: 35px;
                font-size: 12px;
            }

            .user-avatar {
                width: 30px;
                height: 30px;
            }

            .main-content {
                padding: 30px 15px;
            }

            .notification-container {
                padding: 40px 25px;
            }

            .notification-bell {
                width: 60px;
                height: 60px;
            }

            .notification-icon {
                width: 60px;
                height: 60px;
            }

            .notification-title {
                font-size: 20px;
            }

            .notification-message {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <button class="back-btn" onclick="goBack()">&#x2190;</button>
            <div class="logo-header">
                <div class="logo-img">
                    DPRD
                </div>
                <h1 class="page-title">Notifikasi</h1>
            </div>
        </div>
        <div class="user-section">
            <span class="admin-text">Admin</span>
            <button class="user-avatar" onclick="goToProfile()">
                👤
            </button>
        </div>
    </header>

    <main class="main-content">
        <div class="notification-container">
            <div class="notification-bell">
                <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
            </div>
            <h2 class="notification-title">Belum Ada Notifikasi</h2>
            <p class="notification-message">Kami akan memberi tahu Anda jika ada informasi terbaru!</p>
        </div>
    </main>

    <script>
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = '/dashboard';
            }
        }

        function goToProfile() {
            window.location.href = '/profile';
        }

        // Efek hover pada notification bell
        const notificationBell = document.querySelector('.notification-bell');
        
        notificationBell.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.3s ease';
        });

        notificationBell.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>