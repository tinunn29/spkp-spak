<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            padding: 25px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
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

        /* PERBAIKAN 2: Main content full width dengan flex-grow */
        .main-content {
            flex: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* PERBAIKAN 3: Hero section yang lebih menarik dan full width */
        .hero-section {
            background: linear-gradient(135deg, #b8956b 0%, #a67c5a 50%, #8b6f47 100%);
            color: white;
            padding: 60px 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 300;
            margin-bottom: 25px;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 18px;
            line-height: 1.8;
            opacity: 0.95;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* PERBAIKAN 4: Form container full width dengan max-width yang lebih besar */
        .form-container {
            background: white;
            flex: 1;
            padding: 60px 50px;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 35px;
        }

        .form-label {
            display: block;
            margin-bottom: 12px;
            color: #333;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.3px;
        }

        .required {
            color: #e74c3c;
        }

        .form-select, .form-input, .form-textarea {
            width: 100%;
            padding: 18px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            background: white;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-select:focus, .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #b8956b;
            background: white;
            box-shadow: 0 0 0 3px rgba(184, 149, 107, 0.1);
            transform: translateY(-2px);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 16px center;
            background-repeat: no-repeat;
            background-size: 20px;
            padding-right: 50px;
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-textarea::placeholder {
            color: #999;
        }

        .submit-btn {
            background: linear-gradient(135deg, #b8956b, #a67c5a);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px auto 0;
            min-width: 200px;
            box-shadow: 
                0 8px 25px rgba(184, 149, 107, 0.3),
                0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 12px 35px rgba(184, 149, 107, 0.4),
                0 6px 15px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #c4a177, #b18866);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .submit-icon {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: linear-gradient(135deg, #b8956b, #a67c5a);
            color: white;
            padding: 50px;
            border-radius: 25px;
            text-align: center;
            max-width: 450px;
            width: 90%;
            position: relative;
            transform: scale(0.7);
            animation: modalPop 0.3s ease-out forwards;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4);
        }

        .modal-icon {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 40px;
            animation: checkMark 0.6s ease-in-out 0.3s both;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-title {
            font-size: 36px;
            font-weight: 300;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .modal-subtitle {
            font-size: 18px;
            line-height: 1.6;
            opacity: 0.95;
            margin-bottom: 35px;
        }

        .modal-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 15px 35px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .modal-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes modalPop {
            to {
                transform: scale(1);
            }
        }

        @keyframes checkMark {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 20px 25px;
            }
            
            .page-title {
                font-size: 22px;
            }
            
            .hero-section {
                padding: 40px 25px;
            }
            
            .hero-title {
                font-size: 32px;
            }
            
            .hero-subtitle {
                font-size: 16px;
            }
            
            .form-container {
                padding: 40px 25px;
            }
            
            .form-select, .form-input, .form-textarea {
                padding: 16px 18px;
                font-size: 15px;
            }
            
            .submit-btn {
                padding: 16px 35px;
                font-size: 15px;
            }
            
            .modal-content {
                padding: 40px 25px;
                max-width: 350px;
            }
            
            .modal-title {
                font-size: 30px;
            }
            
            .modal-icon {
                width: 80px;
                height: 80px;
                font-size: 32px;
            }
        }

        @media (max-width: 480px) {
            .header {
                padding: 15px 20px;
            }
            
            .header-left {
                gap: 15px;
            }
            
            .page-title {
                font-size: 20px;
            }
            
            .hero-section {
                padding: 35px 20px;
            }
            
            .hero-title {
                font-size: 28px;
            }
            
            .hero-subtitle {
                font-size: 15px;
            }
            
            .form-container {
                padding: 30px 20px;
            }
            
            .form-group {
                margin-bottom: 25px;
            }
            
            .form-label {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="back-btn" onclick="window.history.back()">&#x2190;</button>
            <div class="logo-header">
                <div class="logo-img img">
                    <img src="images/logo_bogor.svg" alt="Logo Bogor">
                </div>
                <h1 class="page-title">Aspirasi Masyarakat</h1>
            </div>
        </div>
    </header>

    <main class="main-content">
        <!-- PERBAIKAN 7: Hero Section yang lebih menarik dan full width -->
        <div class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Sampaikan Aspirasi Anda</h1>
                <p class="hero-subtitle">
                    Suara Anda adalah fondasi pembangunan daerah yang lebih baik. Sampaikan aspirasi, saran, 
                    kritik, atau keluhan Anda dengan bebas dan bertanggung jawab. Setiap masukan akan kami 
                    tindaklanjuti sesuai dengan prosedur dan prioritas pembangunan yang telah ditetapkan.
                </p>
            </div>
        </div>

        <!-- Form -->
        <div class="form-container">
            <div class="form-wrapper">
                <form id="aspirasiForm">
                    <div class="form-group">
                        <label for="kategori" class="form-label">
                            Pilih Kategori <span class="required">*</span>
                        </label>
                        <select id="kategori" name="kategori" class="form-select" required>
                            <option value="">---Pilih Kategori Aspirasi---</option>
                            <option value="infrastruktur">🏗️ Infrastruktur & Transportasi</option>
                            <option value="kesehatan">🏥 Kesehatan & Sanitasi</option>
                            <option value="pendidikan">🎓 Pendidikan & Kebudayaan</option>
                            <option value="lingkungan">🌱 Lingkungan & Kebersihan</option>
                            <option value="ekonomi">💼 Ekonomi & UMKM</option>
                            <option value="sosial">👥 Sosial & Kemasyarakatan</option>
                            <option value="keamanan">🛡️ Keamanan & Ketertiban</option>
                            <option value="lainnya">📝 Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="judul" class="form-label">
                            Judul Aspirasi <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="judul" 
                            name="judul" 
                            class="form-input" 
                            placeholder="Tulis judul yang singkat dan jelas untuk aspirasi Anda"
                            required
                            maxlength="100"
                        >
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-label">
                            Deskripsi Lengkap <span class="required">*</span>
                        </label>
                        <textarea 
                            id="deskripsi" 
                            name="deskripsi" 
                            class="form-textarea" 
                            placeholder="Jelaskan aspirasi Anda secara detail. Sertakan lokasi, kondisi saat ini, dan solusi yang diharapkan agar kami dapat menindaklanjuti dengan tepat."
                            required
                            maxlength="1000"
                        ></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <span class="submit-icon">📤</span>
                        Kirim Aspirasi
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-icon">✓</div>
            <h2 class="modal-title">Terimakasih!</h2>
            <p class="modal-subtitle">
                Feedback anda sangat berharga bagi kami untuk terus meningkatkan kualitas layanan yang lebih baik.
            </p>
            <button class="modal-btn" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <script>
        function goBack() {
            if (history.length > 1) {
                history.back();
            } else {
                alert('Tidak ada halaman sebelumnya');
            }
        }

        document.getElementById('aspirasiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const kategori = document.getElementById('kategori').value;
            const judul = document.getElementById('judul').value;
            const deskripsi = document.getElementById('deskripsi').value;
            
            if (!kategori || !judul || !deskripsi) {
                alert('Mohon lengkapi semua field yang wajib diisi');
                return;
            }
            
            // Simulasi pengiriman data
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<span class="submit-icon">⏳</span> Mengirim...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                // Show modal instead of alert
                showModal();
                
                // Reset form
                document.getElementById('aspirasiForm').reset();
                
                // Restore button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        function showModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeModal() {
            const modal = document.getElementById('successModal');
            modal.classList.remove('show');
            document.body.style.overflow = 'auto'; // Restore scrolling

            setTimeout(() => {
                window.history.back();
            }, 300);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('successModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        // Auto-resize textarea
        const textarea = document.getElementById('deskripsi');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.max(this.scrollHeight, 150) + 'px';
        });

        // Character counter untuk textarea
        textarea.addEventListener('input', function() {
            const maxLength = 1000;
            const currentLength = this.value.length;
            const remaining = maxLength - currentLength;
            
            // Buat elemen counter jika belum ada
            let counter = document.querySelector('.char-counter');
            if (!counter) {
                counter = document.createElement('div');
                counter.className = 'char-counter';
                counter.style.cssText = 'text-align: right; font-size: 12px; color: #666; margin-top: 5px;';
                this.parentNode.appendChild(counter);
            }
            
            counter.textContent = `${currentLength}/${maxLength} karakter`;
            counter.style.color = remaining < 50 ? '#e74c3c' : '#666';
        });
    </script>
</body>
</html>