<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Responden - SPKP & SPAK</title>
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

        /* Main Content */
        .main-container {
            padding: 40px 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Breadcrumb */
        .breadcrumb {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #666;
        }

        .breadcrumb a {
            color: #AE8F72;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #6b5710;
        }

        .breadcrumb-separator {
            color: #999;
        }

        .breadcrumb-current {
            color: #6b5710;
            font-weight: 500;
        }

        /* Responden Info Card */
        .responden-card {
            background: linear-gradient(145deg, #ffffff, #f8f6f0);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(139, 117, 32, 0.1);
            border: 1px solid rgba(190, 168, 135, 0.2);
            position: relative;
            overflow: hidden;
        }

        .responden-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #AE8F72, #D0C4A6);
        }

        .responden-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .responden-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .responden-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(145deg, #AE8F72, #D0C4A6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 700;
            color: white;
            box-shadow: 0 10px 25px rgba(139, 117, 32, 0.3);
        }

        .responden-details h2 {
            font-size: 28px;
            color: #3d2914;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .responden-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .survey-badge {
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }

        .survey-badge.spkp {
            background: #D0C4A6;
            color: white;
        }

        .survey-badge.spak {
            background: #AE8F72;
            color: white;
        }

        .timestamp-badge {
            background: rgba(107, 87, 16, 0.1);
            color: #6b5710;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
        }

        .status-badge {
            background: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Survey Details Grid */
        .survey-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .survey-section {
            background: linear-gradient(145deg, #ffffff, #f8f6f0);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(139, 117, 32, 0.1);
            border: 1px solid rgba(190, 168, 135, 0.2);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #3d2914;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-icon {
            font-size: 20px;
        }

        .info-group {
            margin-bottom: 15px;
        }

        .info-label {
            font-size: 13px;
            color: #666;
            font-weight: 600;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 16px;
            color: #3d2914;
            font-weight: 500;
        }

        /* Responses Section */
        .responses-section {
            background: linear-gradient(145deg, #ffffff, #f8f6f0);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(139, 117, 32, 0.1);
            border: 1px solid rgba(190, 168, 135, 0.2);
            position: relative;
            overflow: hidden;
        }

        .responses-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #AE8F72, #D0C4A6);
        }

        .responses-title {
            font-size: 22px;
            font-weight: 700;
            color: #3d2914;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .question-item {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #AE8F72;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .question-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 117, 32, 0.15);
        }

        .question-number {
            font-size: 14px;
            color: #AE8F72;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .question-text {
            font-size: 16px;
            color: #3d2914;
            font-weight: 600;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .answer-value {
            font-size: 15px;
            color: #666;
            background: #f8f6f0;
            padding: 12px 16px;
            border-radius: 10px;
            border-left: 3px solid #D0C4A6;
        }

        /* Answer Types Styling */
        .checkbox-answers, .radio-answers {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .checkbox-item, .radio-item, .choice-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .checkbox-item.checked, .radio-item.selected, .choice-item.selected {
            background: rgba(174, 143, 114, 0.1);
            border-left: 3px solid #AE8F72;
        }

        .checkbox, .radio, .choice-marker {
            font-size: 16px;
            color: #AE8F72;
            font-weight: 700;
            min-width: 20px;
        }

        .checkbox-text, .radio-text, .choice-text {
            font-size: 14px;
            color: #3d2914;
            font-weight: 500;
        }

        .multiple-choice-answer {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sub-rating {
            margin-top: 15px;
            padding: 15px;
            background: rgba(174, 143, 114, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(174, 143, 114, 0.2);
        }

        /* Rating Display */
        .rating-display {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .star {
            font-size: 18px;
            color: #ffc107;
        }

        .star.empty {
            color: #ddd;
        }

        .rating-text {
            margin-left: 10px;
            font-weight: 600;
            color: #6b5710;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(145deg, #AE8F72, #D0C4A6);
            color: white;
            box-shadow: 0 6px 20px rgba(139, 117, 32, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 30px rgba(139, 117, 32, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 30px rgba(108, 117, 125, 0.4);
            background: #5a6268;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .survey-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
            }

            .page-title {
                font-size: 20px;
            }

            .admin-text {
                display: none;
            }

            .main-container {
                padding: 25px 15px;
            }

            .responden-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .responden-info {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .responden-meta {
                justify-content: center;
            }

            .responden-details h2 {
                font-size: 24px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
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
                <h1 class="page-title">Detail Responden</h1>
            </div>
        </div>
        <div class="user-section">
            <span class="admin-text">Admin</span>
            <button class="user-avatar" id="profileBtn">
                <img src="images/profile.svg" alt="Profile" />
            </button>
        </div>
    </header>

    <main class="main-container">
        <!-- Responden Info Card -->
        <div class="responden-card">
            <div class="responden-header">
                <div class="responden-info">
                    <div class="responden-details">
                        <h2 id="respondenName">Dyndra Seravina</h2>
                        <div class="responden-meta">
                            <span class="survey-badge spkp" id="surveyType">SPKP</span>
                            <span class="timestamp-badge" id="surveyDate">30/07/2025 | 10:12</span>
                            <span class="status-badge">✓ Selesai</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calculation Modal/Section -->
        <div class="calculation-section" id="calculationSection" style="display: none;">
            <div class="calculation-card">
                <h3 class="calculation-title">
                    <span>🧮</span>
                    Detail Perhitungan Skor Survei
                </h3>
                
                <div class="calculation-methods">
                    <div class="method-item">
                        <h4 class="method-title">📋 Multiple Choice</h4>
                        <p class="method-desc">Dinilai lewat bobot per pilihan</p>
                        <div class="method-example">
                            <strong>Contoh:</strong> "Dokumen yang diminta sesuai dengan kebutuhan pelayanan?"<br>
                            • Sangat sesuai → <span class="score-badge">Skor 4</span><br>
                            • Cukup sesuai → <span class="score-badge">Skor 3</span><br>
                            • Kurang sesuai → <span class="score-badge">Skor 2</span><br>
                            • Tidak sesuai → <span class="score-badge">Skor 1</span>
                        </div>
                    </div>

                    <div class="method-item">
                        <h4 class="method-title">☑️ Checkbox</h4>
                        <p class="method-desc">Tiap pilihan diberi skor individual berdasarkan jumlah yang dipilih</p>
                        <div class="method-example">
                            <strong>Contoh:</strong> "Persyaratan layanan mudah ditemukan"<br>
                            • ≤2 pilihan → <span class="score-badge">Skor 2 (Sulit ditemukan)</span><br>
                            • 3 pilihan → <span class="score-badge">Skor 3 (Cukup mudah)</span><br>
                            • ≥4 pilihan → <span class="score-badge">Skor 4 (Sangat mudah)</span><br>
                            <em>Plus rating tambahan dari sub-pertanyaan</em>
                        </div>
                    </div>

                    <div class="method-item">
                        <h4 class="method-title">⭐ Rating Scale</h4>
                        <p class="method-desc">Langsung digunakan sebagai skor</p>
                        <div class="method-example">
                            <strong>Contoh:</strong> "Seberapa puas Anda terhadap pelayanan?"<br>
                            • ⭐⭐⭐⭐⭐ → <span class="score-badge">Skor 5</span><br>
                            • ⭐⭐⭐⭐ → <span class="score-badge">Skor 4</span><br>
                            • ⭐⭐⭐ → <span class="score-badge">Skor 3</span><br>
                            • ⭐⭐ → <span class="score-badge">Skor 2</span><br>
                            • ⭐ → <span class="score-badge">Skor 1</span>
                        </div>
                    </div>
                </div>

                <div class="score-breakdown">
                    <h4 class="breakdown-title">📊 Breakdown Skor Responden Ini:</h4>
                    <div class="breakdown-grid">
                        <div class="breakdown-item">
                            <span class="q-number">P1</span>
                            <span class="q-type">Checkbox + Rating</span>
                            <span class="q-score">6/8</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P2</span>
                            <span class="q-type">Ya/Tidak + Rating</span>
                            <span class="q-score">5/5</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P3</span>
                            <span class="q-type">Multiple Choice</span>
                            <span class="q-score">4/4</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P4</span>
                            <span class="q-type">Rating</span>
                            <span class="q-score">5/5</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P5</span>
                            <span class="q-type">Rating</span>
                            <span class="q-score">4/5</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P6</span>
                            <span class="q-type">Ya/Tidak</span>
                            <span class="q-score">3/3</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P7</span>
                            <span class="q-type">Rating</span>
                            <span class="q-score">5/5</span>
                        </div>
                        <div class="breakdown-item">
                            <span class="q-number">P8</span>
                            <span class="q-type">Text (Bonus)</span>
                            <span class="q-score">+0/3</span>
                        </div>
                    </div>
                    
                    <div class="total-calculation">
                        <div class="calc-formula">
                            <strong>Formula:</strong> (Total Skor / Maksimal Skor) × 100%<br>
                            <strong>Hasil:</strong> (32 / 38) × 100% = <span class="final-score">84%</span>
                        </div>
                        
                        <div class="rating-conversion">
                            <strong>Konversi ke Rating Bintang:</strong><br>
                            84% = 4.2 ⭐ (Sangat Baik)
                        </div>
                    </div>
                </div>

                <button class="close-calculation-btn" onclick="toggleCalculation()">
                    ✕ Tutup
                </button>
            </div>
        </div>

        <!-- Survey Details Grid -->
        <div class="survey-grid">
            <div class="survey-section">
                <h3 class="section-title">
                    <span class="section-icon">📋</span>
                    Informasi Survei
                </h3>
                <div class="info-group">
                    <div class="info-label">Jenis Survei</div>
                    <div class="info-value" id="detailSurveyType">Survei Persepsi Kualitas Pelayanan (SPKP)</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Jenis Layanan</div>
                    <div class="info-value" id="detailServiceType">Layanan Umum</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Waktu Pengisian</div>
                    <div class="info-value" id="detailTimestamp">30 Juli 2025, 10:12 WIB</div>
                </div>
            </div>

            <div class="survey-section">
                <h3 class="section-title">
                    <span class="section-icon">📊</span>
                    Ringkasan Hasil & Skema Penilaian
                </h3>
                <div class="info-group">
                    <div class="info-label">Total Pertanyaan</div>
                    <div class="info-value">8 pertanyaan</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Rating Keseluruhan</div>
                    <div class="info-value">
                        <div class="rating-display">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star empty">★</span>
                            <span class="rating-text">4.2 dari 5.0</span>
                        </div>
                    </div>
                </div>
                <div class="info-group">
                    <div class="info-label">Kategori Penilaian</div>
                    <div class="info-value" style="color: #28a745; font-weight: 600;">Sangat Baik</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Skor Total</div>
                    <div class="info-value">32 dari 38 (84%)</div>
                </div>
                <div class="info-group">
                    <div class="info-label">Metode Perhitungan</div>
                    <div class="info-value">
                        <button class="show-calculation-btn" onclick="toggleCalculation()">
                            📋 Lihat Detail Perhitungan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responses Section -->
        <div class="responses-section">
            <h3 class="responses-title">
                <span>💬</span>
                Jawaban Detail
            </h3>

            <div class="question-item">
                <div class="question-score">6/8</div>
                <div class="question-number">Pertanyaan 1</div>
                <div class="question-text">Persyaratan layanan mudah ditemukan:</div>
                <div class="answer-value">
                    <div class="checkbox-answers">
                        <div class="checkbox-item checked">
                            <span class="checkbox">✓</span>
                            <span class="checkbox-text">Website resmi</span>
                        </div>
                        <div class="checkbox-item">
                            <span class="checkbox">☐</span>
                            <span class="checkbox-text">Media sosial</span>
                        </div>
                        <div class="checkbox-item checked">
                            <span class="checkbox">✓</span>
                            <span class="checkbox-text">Pengumuman di kantor</span>
                        </div>
                        <div class="checkbox-item">
                            <span class="checkbox">☐</span>
                            <span class="checkbox-text">Tidak tahu</span>
                        </div>
                    </div>
                    <div class="sub-rating">
                        <div class="sub-question">Rating kemudahan ditemukan:</div>
                        <div class="rating-display">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star empty">★</span>
                            <span class="rating-text">4 dari 5</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">5/5</div>
                <div class="question-number">Pertanyaan 2</div>
                <div class="question-text">Persyaratan pelayanan mudah dimengerti?</div>
                <div class="answer-value">
                    <div class="radio-answers">
                        <div class="radio-item selected">
                            <span class="radio">●</span>
                            <span class="radio-text">Ya</span>
                        </div>
                        <div class="radio-item">
                            <span class="radio">○</span>
                            <span class="radio-text">Tidak</span>
                        </div>
                    </div>
                    <div class="sub-rating">
                        <div class="sub-question">Seberapa mudah dipahami?</div>
                        <div class="rating-display">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="rating-text">5 dari 5</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">4/4</div>
                <div class="question-number">Pertanyaan 3</div>
                <div class="question-text">Dokumen yang diminta sesuai dengan kebutuhan pelayanan?</div>
                <div class="answer-value">
                    <div class="multiple-choice-answer">
                        <div class="choice-item selected">
                            <span class="choice-marker">●</span>
                            <span class="choice-text">Sangat sesuai</span>
                        </div>
                        <div class="choice-item">
                            <span class="choice-marker">○</span>
                            <span class="choice-text">Cukup sesuai</span>
                        </div>
                        <div class="choice-item">
                            <span class="choice-marker">○</span>
                            <span class="choice-text">Kurang sesuai</span>
                        </div>
                        <div class="choice-item">
                            <span class="choice-marker">○</span>
                            <span class="choice-text">Tidak sesuai</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">5/5</div>
                <div class="question-number">Pertanyaan 4</div>
                <div class="question-text">Bagaimana penilaian Anda terhadap kecepatan waktu pelayanan?</div>
                <div class="answer-value">
                    <div class="rating-display">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="rating-text">5 - Sangat Baik</span>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">4/5</div>
                <div class="question-number">Pertanyaan 5</div>
                <div class="question-text">Bagaimana penilaian Anda terhadap kesesuaian biaya pelayanan?</div>
                <div class="answer-value">
                    <div class="rating-display">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                        <span class="rating-text">4 - Baik</span>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">3/3</div>
                <div class="question-number">Pertanyaan 6</div>
                <div class="question-text">Apakah ada kendala dalam proses pelayanan?</div>
                <div class="answer-value">
                    <div class="radio-answers">
                        <div class="radio-item">
                            <span class="radio">○</span>
                            <span class="radio-text">Ya</span>
                        </div>
                        <div class="radio-item selected">
                            <span class="radio">●</span>
                            <span class="radio-text">Tidak</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">5/5</div>
                <div class="question-number">Pertanyaan 7</div>
                <div class="question-text">Bagaimana penilaian Anda terhadap kompetensi/kemampuan petugas dalam pelayanan?</div>
                <div class="answer-value">
                    <div class="rating-display">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="rating-text">5 - Sangat Baik</span>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-score">+0/3</div>
                <div class="question-number">Pertanyaan 8</div>
                <div class="question-text">Saran dan masukan untuk perbaikan pelayanan:</div>
                <div class="answer-value">
                    Pelayanan sudah sangat baik, hanya perlu ditingkatkan lagi untuk sistem antrian digitalnya agar lebih efisien. Terima kasih atas pelayanan yang memuaskan.
                </div>
            </div> - Baik</span>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-number">Pertanyaan 6</div>
                <div class="question-text">Apakah ada kendala dalam proses pelayanan?</div>
                <div class="answer-value">
                    <div class="radio-answers">
                        <div class="radio-item">
                            <span class="radio">○</span>
                            <span class="radio-text">Ya</span>
                        </div>
                        <div class="radio-item selected">
                            <span class="radio">●</span>
                            <span class="radio-text">Tidak</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-number">Pertanyaan 7</div>
                <div class="question-text">Bagaimana penilaian Anda terhadap kompetensi/kemampuan petugas dalam pelayanan?</div>
                <div class="answer-value">
                    <div class="rating-display">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="rating-text">5 - Sangat Baik</span>
                    </div>
                </div>
            </div>

            <div class="question-item">
                <div class="question-number">Pertanyaan 8</div>
                <div class="question-text">Saran dan masukan untuk perbaikan pelayanan:</div>
                <div class="answer-value">
                    Pelayanan sudah sangat baik, hanya perlu ditingkatkan lagi untuk sistem antrian digitalnya agar lebih efisien. Terima kasih atas pelayanan yang memuaskan.
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="exportToPDF()">
                📄 Export PDF
            </button>
        </div>
    </main>

    <script>
        // Get ID from URL parameters
        function getUrlParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Sample data for different respondents
        const respondentData = {
            1: {
                name: "Dyndra Seravina",
                avatar: "DS",
                surveyType: "SPKP",
                serviceType: "Layanan Umum",
                timestamp: "30/07/2025 | 10:12",
                detailTimestamp: "30 Juli 2025, 10:12 WIB",
                rating: 4.2,
                category: "Sangat Baik",
                score: 84
            },
            2: {
                name: "Mahendra Putra",
                avatar: "MP",
                surveyType: "SPAK",
                serviceType: "Layanan Perizinan & Keuangan",
                timestamp: "30/07/2025 | 13:43",
                detailTimestamp: "30 Juli 2025, 13:43 WIB",
                rating: 3.8,
                category: "Baik",
                score: 76
            },
            3: {
                name: "Johnny Saputra",
                avatar: "JS",
                surveyType: "SPKP",
                serviceType: "Layanan Perundingan-undangan",
                timestamp: "31/07/2025 | 12:14",
                detailTimestamp: "31 Juli 2025, 12:14 WIB",
                rating: 4.5,
                category: "Sangat Baik",
                score: 90
            },
            4: {
                name: "Jennie Rafaella",
                avatar: "JR",
                surveyType: "SPAK",
                serviceType: "Layanan Humas & Protokol",
                timestamp: "31/07/2025 | 16:65",
                detailTimestamp: "31 Juli 2025, 16:05 WIB",
                rating: 4.0,
                category: "Baik",
                score: 80
            }
        };

        function loadRespondentData() {
            const id = getUrlParameter('id') || '1';
            const data = respondentData[id];
            
            if (data) {
                // Update responden info
                document.getElementById('respondenAvatar').textContent = data.avatar;
                document.getElementById('respondenName').textContent = data.name;
                document.getElementById('surveyType').textContent = data.surveyType;
                document.getElementById('surveyType').className = `survey-badge ${data.surveyType.toLowerCase()}`;
                document.getElementById('surveyDate').textContent = data.timestamp;
                
                // Update detail info
                document.getElementById('detailSurveyType').textContent = 
                    data.surveyType === 'SPKP' ? 
                    'Survei Persepsi Kualitas Pelayanan (SPKP)' : 
                    'Survei Persepsi Anti Korupsi (SPAK)';
                document.getElementById('detailServiceType').textContent = data.serviceType;
                document.getElementById('detailTimestamp').textContent = data.detailTimestamp;
                
                // Update rating display
                updateRatingDisplay(data.rating);
                
                // Update category and score
                document.querySelector('.info-value[style*="color: #28a745"]').textContent = data.category;
                document.querySelector('.info-group:last-child .info-value').textContent = `${data.score} dari 100`;
            }
        }

        function updateRatingDisplay(rating) {
            const ratingDisplays = document.querySelectorAll('.rating-display');
            ratingDisplays.forEach((display, index) => {
                if (index === 0) { // Main rating display
                    const stars = display.querySelectorAll('.star');
                    const fullStars = Math.floor(rating);
                    
                    stars.forEach((star, i) => {
                        if (i < fullStars) {
                            star.classList.remove('empty');
                        } else {
                            star.classList.add('empty');
                        }
                    });
                    
                    const ratingText = display.querySelector('.rating-text');
                    if (ratingText) {
                        ratingText.textContent = `${rating} dari 5.0`;
                    }
                }
            });
        }

        function goBack() {
            window.history.back();
        }

        function exportToPDF() {
            // Add loading effect
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '📄 Mengexport...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                alert('PDF berhasil diexport!');
            }, 2000);
        }

        // Load data when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadRespondentData();
        });
    </script>
</body>
</html>