<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei SPKP & SPAK - DPRD Kota Bogor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', serif;
            background: whitesmoke;
            min-height: 100vh;
        }

        .header {
            background-color: #CAB6A3;
            padding: 20px;
            display: flex;
           justify-content: center;
            gap: 20px;
        }

        .logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo::before {
            font-size: 12px;
            color: #8B4513;
        }

        .header-text h1 {
            font-size: 28px;
            color: #4a4a4a;
            margin-bottom: 5px;
        }

        .header-text p {
            font-size: 16px;
            color: #666;
            font-style: italic;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-left: 8px solid #CAB6A3;
        }

        .card h2 {
            text-align: center;
            font-size: 22px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }

        .card p {
            text-align: center;
            line-height: 1.6;
            color: #666;
            margin-bottom: 20px;
        }

        .card ol, .card ul {
            margin-left: 20px;
            color: #555;
        }

        .card li {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .evaluation-section {
            text-align: center;
        }

        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #CAB6A3;
            color: white;
        }

        .btn-secondary {
            background-color: #CAB6A3;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Footer */
        .footer {
            /* Hapus width: 100vw; dan margin-left: calc(-50vw + 50%); */
            width: 100%; /* Ambil 100% lebar parent container */
            height: auto; /* Biarkan tinggi menyesuaikan konten */
            display: flex;
            justify-content: space-between;
            align-items: center; /* Ubah stretch ke center agar konten tidak meregang vertikal */
            gap: 30px;
            padding: 30px;
            background: #CAB6A3;
            border-radius: 30px 30px 0 0; /* Hanya sudut atas yang melengkung */
            box-shadow: 0 -8px 25px rgba(0, 0, 0, 0.1); /* Shadow ke atas */
            margin-top: auto; /* PENTING: Mendorong footer ke bawah di flex container */
            color: white;
        }

        .footer-left {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 0 0 auto; /* Ubah dari 300px agar lebih responsif */
        }

        .footer-left img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .footer-text-box {
            font-size: 18px;
            color: #333; /* Warna teks jadi gelap seperti di gambar */
            font-weight: 600;
            line-height: 1.3;
        }

        .footer-middle {
            flex: 1; /* Allows the map container to take remaining space */
            min-width: 280px; /* Minimum width for the map */
            display: flex; /* To center map container if it doesn't take full flex-grow */
            justify-content: center;
            align-items: center;
        }

        .map-container {
            width: 100%;
            height: 200px; /* Tinggi map container tetap */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: #f0f4f8;
            position: relative;
        }

        .map-container iframe { /* Pastikan iframe mengisi penuh kontainer map */
            width: 100%;
            height: 100%;
        }

        .map-placeholder {
            display: none;
        }

        .footer-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            flex: 0 0 auto; /* Ubah dari 280px agar lebih responsif */
            color: #555; /* Warna teks kontak jadi abu-abu */
        }

        .footer-right h3 {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 0;
        }

        .contact-item img {
            width: 20px;
            height: 20px;
            object-fit: contain;
            filter: invert(39%) sepia(21%) saturate(200%) hue-rotate(170deg) brightness(90%) contrast(89%);
        }

        .contact-item span {
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .button-container {
                flex-direction: column;
                align-items: center;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="images/logo_bogor.svg" alt="Logo Bogor">
        </div>
        <div class="header-text">
            <h1>DPRD Kota Bogor</h1>
            <p>Sekretariat Dewan Perwakilan Rakyat</p>
        </div>
    </header>

    <div class="container">
        <div class="card">
            <h2>Survei SPKP & SPAK</h2>
            <p>Website ini untuk mengukur Persepsi Kepuasan Pelayanan (SPKP) dan Persepsi Anti Korupsi (SPAK) dalam mendukung peningkatan kualitas pelayanan publik yang transparan, akuntabel, dan bebas dari praktik korupsi di lingkungan Sekretariat DPRD Kota Bogor.</p>
        </div>

        <div class="card">
            <h2>SPKP (Survei Persepsi Kepuasan Pelayanan)</h2>
            <p>SPKP ini dilakukan bertujuan untuk:</p>
            <ol>
                <li>Memastikan sejauh mana standar pelayanan yang telah ditetapkan oleh Sekretariat DPRD dapat dilaksanakan sesuai dengan ketentuan</li>
                <li>Memastikan sejauhmana tingkat kepuasan para pemakai atas kepentingan dalam menerima layanan yang disediakan oleh Sekretariat DPRD</li>
                <li>Mengevaluasi kinerja dan kualitas pelayanan Sekretariat DPRD untuk upaya perbaikan berkelanjutan</li>
            </ol>
        </div>

        <div class="card">
            <h2>SPAK (Survei Persepsi Anti Korupsi)</h2>
            <p>SPAK dilakukan bertujuan untuk:</p>
            <ol>
                <li>Mengetahui tingkat integritas, independensi, profesionalisme dari SDM Sekretariat DPRD dalam memberikan pelayanan</li>
                <li>Mengetahui sejauh mana adanya kemungkinan kemungkinan terjadinya indikasi kecurangan, praktek praktek kolusi, korupsi dan nepotisme, percaloan, pungutan liar dan sebagainya yang menghambat terwujudnya zona integritas unit kerja menuju wilayah bebas korupsi dan wilayah birokrasi yang bersih dan melayani.</li>
            </ol>
        </div>

        <div class="card evaluation-section">
            <h2>Berpartisipasilah dalam Evaluasi</h2>
            <p>Website ini untuk mengukur Persepsi Kepuasan Pelayanan (SPKP) dan Persepsi Anti Korupsi (SPAK) dalam mendukung peningkatan kualitas pelayanan publik yang transparan, akuntabel, dan bebas dari praktik korupsi di lingkungan Sekretariat DPRD Kota Bogor.</p>
            <p>Jika Anda memiliki saran, keluhan, kritik, pujian, atau aspirasi lainnya terkait pelayanan dan kinerja Sekretariat DPRD Kota Bogor, silakan sampaikan melalui tombol berikut:</p>
            
            <div class="button-container">
                <a href="{{ route('user.survei') }}" class="btn btn-primary">Mulai survei sekarang</a>
                <a href="{{ route('user.aspirasi') }}" class="btn btn-secondary">Sampaikan Aspirasi</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-left">
            <img src="{{ asset('images/logo_bogor.svg') }}" alt="Logo Bogor">
            <div class="footer-text-box">
                Survei SPKP / SPAK<br>dan Aspirasi Masyarakat
            </div>
        </div>

        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.78453488258!2d106.79061097486899!3d-6.551717993437976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e3d9f7a77b%3A0xc3f1d8f5d0b4b2c1!2sDPRD%20Kota%20Bogor!5e0!3m2!1sen!2sid!4v1701768800000!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="footer-right">
            <h3>Kontak</h3>
            <div class="contact-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z'/%3E%3C/svg%3E" alt="Location Icon">
                <span>Jl. Pemuda No.25, Tanah Sareal, Kota Bogor.</span>
            </div>
            <div class="contact-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z'/%3E%3C/svg%3E" alt="Phone Icon">
                <span>(0251) 8323472</span>
            </div>
            <div class="contact-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z'/%3E%3C/svg%3E" alt="Email Icon">
                <span>dprdbgr@gmail.com</span>
            </div>
        </div>
    </div>

    <script>
        // Add smooth scrolling and interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn');
            
            buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                const href = this.getAttribute('href');

                // Ripple effect
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);

                // Delay sedikit sebelum pindah halaman
                setTimeout(() => {
                    window.location.href = href;
                }, 300); // 300ms = waktu efek
            });
        });
            
            // Add fade-in animation for cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>