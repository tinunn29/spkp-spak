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
            background: whitesmoke;        /* ← sama dengan dashboard */
            min-height: 100vh;
            display: flex;                 /* ← TAMBAHAN untuk sticky footer */
            flex-direction: column;
        }

        .header {
            background: rgba(255, 255, 255, 0.9);   /* ← semi-transparan */
            backdrop-filter: blur(10px);             /* ← TAMBAHAN blur effect */
            padding: 15px 30px;                      /* ← padding sama dengan dashboard */
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);  /* ← shadow lebih soft */
            position: sticky;                        /* ← UBAH jadi sticky */
            top: 0;                                  /* ← TAMBAHAN */
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

        .logo-header img {
            width: 70px;                   /* ← sama dengan dashboard */
            height: auto;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: #6b5710;              /* ← warna tema */
            letter-spacing: 0.5px;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-text {
            font-size: 18px;             /* ← font lebih besar */
            color: #6b5710;              /* ← warna tema */
            font-weight: 500;
        }

        .user-avatar {
            width: 45px;                 /* ← sama dengan dashboard */
            height: 45px;
            border: none;
            padding: 0;
            background: transparent;     /* ← UBAH jadi transparan */
            cursor: pointer;
            border-radius: 50%;
            overflow: hidden;            /* ← TAMBAHAN untuk crop gambar */
            transition: all 0.3s ease;   /* ← UBAH jadi all */
        }

        .user-avatar:hover {
            transform: scale(1.05);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }

        .main-content {
            flex: 1;                     /* ← TAMBAHAN untuk sticky footer */
            padding: 60px 40px;          /* ← padding lebih besar */
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;                 /* ← TAMBAHAN full width */
        }

        .notification-container {
            background: rgba(255, 255, 255, 0.9);   /* ← UBAH jadi putih transparan */
            backdrop-filter: blur(15px);             /* ← TAMBAHAN blur effect */
            padding: 80px 60px;                      /* ← padding lebih besar */
            border-radius: 30px;                     /* ← radius lebih besar */
            text-align: center;
            max-width: 600px;                        /* ← max-width lebih besar */
            width: 100%;
            box-shadow:                              /* ← UBAH shadow lebih soft */
                0 20px 60px rgba(0,0,0,0.08),
                0 8px 25px rgba(184, 149, 107, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.8);  /* ← TAMBAHAN border */
            position: relative;                      /* ← TAMBAHAN untuk shimmer */
            overflow: hidden;                        /* ← TAMBAHAN untuk shimmer */
        }

        /* TAMBAHAN shimmer effect */
        .notification-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(184, 149, 107, 0.08), transparent);
            animation: shimmer 4s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .notification-bell {
            width: 120px;                /* ← lebih besar */
            height: 120px;
            margin: 0 auto 40px;         /* ← margin lebih besar */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b8956b;              /* ← UBAH warna tema */
            background: linear-gradient(145deg, #f8f6f0, #f0ead6);  /* ← TAMBAHAN background */
            border-radius: 50%;          /* ← TAMBAHAN bentuk bulat */
            box-shadow:                  /* ← TAMBAHAN 3D effect */
                10px 10px 30px rgba(0, 0, 0, 0.08),
                -10px -10px 30px rgba(255, 255, 255, 0.9);
            position: relative;          /* ← TAMBAHAN untuk z-index */
            z-index: 2;                  /* ← TAMBAHAN */
            animation: bellFloat 3s ease-in-out infinite;  /* ← TAMBAHAN animasi */
        }

        /* TAMBAHAN animasi float */
        @keyframes bellFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .notification-bell:hover {
            animation-play-state: paused;  /* ← pause animasi saat hover */
            transform: scale(1.08) translateY(-5px);  /* ← zoom saat hover */
        }

        .notification-icon {
            width: 80px;
            height: 80px;
        }

        .notification-title {
            font-size: 32px;             /* ← lebih besar */
            color: #6b5710;              /* ← UBAH warna tema */
            margin-bottom: 20px;
            font-weight: 300;            /* ← UBAH lebih tipis */
            letter-spacing: 1px;         /* ← TAMBAHAN spacing */
            position: relative;          /* ← TAMBAHAN */
            z-index: 2;                  /* ← TAMBAHAN */
        }

        .notification-message {
            font-size: 18px;             /* ← lebih besar */
            color: #8b7520;              /* ← UBAH warna tema */
            line-height: 1.7;            /* ← line height lebih besar */
            position: relative;          /* ← TAMBAHAN */
            z-index: 2;                  /* ← TAMBAHAN */
            opacity: 0.9;                /* ← TAMBAHAN */
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
                <!-- UBAH: Dari div dengan text DPRD jadi img -->
                <img src="images/logo_bogor.svg" alt="Logo Bogor">
            </div>
            <h1 class="page-title">Notifikasi</h1>  <!-- PINDAH: Keluar dari logo-header -->
        </div>
        
        <div class="user-section">
            <span class="admin-text">Admin</span>
            <button class="user-avatar" onclick="goToProfile()">
                <!-- UBAH: Dari emoji jadi img -->
                <img src="images/profile.svg" alt="Profile Admin">
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