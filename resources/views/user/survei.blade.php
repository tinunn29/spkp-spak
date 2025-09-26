<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertanyaan Survei - DPRD Kota Bogor</title>
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

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .tab-container {
            display: flex;
            margin-bottom: 20px;
        }

        .tab {
            flex: 1;
            padding: 15px;
            text-align: center;
            background-color: #674726;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab:first-child {
            border-radius: 25px 0 0 25px;
            background-color: #674726;
        }

        .tab:last-child {
            border-radius: 0 25px 25px 0;
        }

        .tab.active {
            background-color: #C5AC88;
        }

        .question-card {
            background: #f0ebe4;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .question-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .question-number {
            width: 35px;
            height: 35px;
            background-color: #b8a087;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
        }

        .question-text {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .options-container {
            margin-bottom: 20px;
        }

        .option {
            background-color: #b8a087;
            color: white;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .option:hover {
            background-color: #a08970;
            transform: translateY(-2px);
        }

        .option.selected {
            background-color: #8b7355;
        }

        .option input[type="checkbox"],
        .option input[type="radio"] {
            width: 18px;
            height: 18px;
            margin: 0;
            cursor: pointer;
        }

        .rating-section {
            margin-top: 25px;
        }

        .rating-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .rating-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 2px solid #f0f0f0;
        }

        .rating-value-display {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            color: white;
        }

        .rating-emoji {
            font-size: 35px;
            display: block;
            margin-bottom: 8px;
            animation: bounce 0.5s ease;
        }

        .rating-text {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .rating-score {
            font-size: 14px;
            opacity: 0.9;
        }

        @keyframes bounce {
            0%, 20%, 60%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            80% { transform: translateY(-5px); }
        }

        .rating-slider {
            width: 100%;
            height: 12px;
            border-radius: 6px;
            background: linear-gradient(to right, #ff4757 0%, #ff6348 20%, #ffa502 40%, #7bed9f 60%, #2ed573 80%, #5352ed 100%);
            outline: none;
            -webkit-appearance: none;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .rating-slider:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .rating-slider::-webkit-slider-thumb {
            appearance: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: white;
            border: 4px solid #333;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            transition: all 0.2s ease;
        }

        .rating-slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
            border-color: #667eea;
        }

        .rating-slider::-moz-range-thumb {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: white;
            border: 4px solid #333;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .rating-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 11px;
            color: #666;
            font-weight: 500;
        }

        .rating-label-item {
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .rating-label-emoji {
            font-size: 16px;
            display: block;
        }

        .submit-btn {
            background-color: #b8a087;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 15px 40px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 30px auto 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .submit-btn:hover {
            background-color: #a08970;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }
            
            .question-card {
                padding: 20px;
            }
            
            .tab {
                font-size: 12px;
                padding: 12px;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
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
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            position: relative;
            transform: scale(0.7);
            animation: modalPop 0.3s ease-out forwards;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 36px;
            animation: checkMark 0.6s ease-in-out 0.3s both;
        }

        .modal-title {
            font-size: 32px;
            font-weight: 300;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .modal-subtitle {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .modal-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 12px 30px;
            border-radius: 25px;
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
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        @media (max-width: 480px) {
            .container {
                margin: 0;
                border-radius: 0;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .modal-content {
                padding: 30px 20px;
                max-width: 350px;
            }
            
            .modal-title {
                font-size: 28px;
            }
            
            .modal-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
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
                <h1 class="page-title">Pertanyaan Survei</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="tab-container">
            <div class="tab active" onclick="switchTab('spkp')">SPKP (Survei Persepsi Kepuasan Pelayanan)</div>
            <div class="tab" onclick="switchTab('spak')">SPAK (Survei Persepsi Anti Korupsi)</div>
        </div>

        <!-- SPKP Questions -->
        <div id="spkp-content" class="content-section active">
            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">1</div>
                    <div class="question-text">Persyaratan layanan mudah ditemukan melalui? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Website Resmi</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Media Sosial</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Pengumuman di Kantor</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Tidak Ada</span>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-label">Rating kemudahan ditemukan:</div>
                    <div class="rating-container">
                        <div class="rating-value-display" id="ratingDisplay1">
                            <span class="rating-emoji">😊</span>
                            <div class="rating-text">Mudah</div>
                            <div class="rating-score">85/100</div>
                        </div>
                        <input type="range" class="rating-slider" min="0" max="100" value="85" id="rating1">
                        <div class="rating-labels">
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😡</span>
                                <span>Sangat sulit</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😠</span>
                                <span>Sulit</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😐</span>
                                <span>Cukup</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😊</span>
                                <span>Mudah</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😍</span>
                                <span>Sangat mudah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">2</div>
                    <div class="question-text">Persyaratan pelayanan mudah dimengerti? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option selected" onclick="toggleRadio(this, 'q2')">
                        <input type="radio" name="q2" checked>
                        <span>Ya</span>
                    </div>
                    <div class="option" onclick="toggleRadio(this, 'q2')">
                        <input type="radio" name="q2">
                        <span>Tidak</span>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-label">Rating kemudahan dimengerti:</div>
                    <div class="rating-container">
                        <div class="rating-value-display" id="ratingDisplay2">
                            <span class="rating-emoji">😊</span>
                            <div class="rating-text">Mudah</div>
                            <div class="rating-score">75/100</div>
                        </div>
                        <input type="range" class="rating-slider" min="0" max="100" value="75" id="rating2">
                        <div class="rating-labels">
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😡</span>
                                <span>Sangat sulit</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😠</span>
                                <span>Sulit</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😐</span>
                                <span>Cukup</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😊</span>
                                <span>Mudah</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😍</span>
                                <span>Sangat mudah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">3</div>
                    <div class="question-text">Dokumen yang diminta sesuai dengan kebutuhan pelayanan? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option selected" onclick="toggleRadio(this, 'q3')">
                        <input type="radio" name="q3" checked>
                        <span>Ya</span>
                    </div>
                    <div class="option" onclick="toggleRadio(this, 'q3')">
                        <input type="radio" name="q3">
                        <span>Tidak</span>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-label">Rating kesesuaian dokumen:</div>
                    <div class="rating-container">
                        <div class="rating-value-display" id="ratingDisplay3">
                            <span class="rating-emoji">😊</span>
                            <div class="rating-text">Mudah</div>
                            <div class="rating-score">80/100</div>
                        </div>
                        <input type="range" class="rating-slider" min="0" max="100" value="80" id="rating3">
                        <div class="rating-labels">
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😡</span>
                                <span>Tidak sesuai</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😠</span>
                                <span>Kurang sesuai</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😐</span>
                                <span>Cukup sesuai</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😊</span>
                                <span>Sesuai</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😍</span>
                                <span>Sangat sesuai</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SPAK Questions -->
        <div id="spak-content" class="content-section">
            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">1</div>
                    <div class="question-text">Pernahkah Anda diminta memberikan hadiah/uang oleh petugas? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option" onclick="toggleRadio(this, 'spak_q1')">
                        <input type="radio" name="spak_q1">
                        <span>Ya</span>
                    </div>
                    <div class="option selected" onclick="toggleRadio(this, 'spak_q1')">
                        <input type="radio" name="spak_q1" checked>
                        <span>Tidak</span>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-label">Rating kepercayaan terhadap integritas petugas:</div>
                    <div class="rating-container">
                        <div class="rating-value-display" id="ratingDisplaySpak1">
                            <span class="rating-emoji">😊</span>
                            <div class="rating-text">Terpercaya</div>
                            <div class="rating-score">75/100</div>
                        </div>
                        <input type="range" class="rating-slider" min="0" max="100" value="75" id="ratingSpak1">
                        <div class="rating-labels">
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😡</span>
                                <span>Tidak terpercaya</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😠</span>
                                <span>Kurang terpercaya</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😐</span>
                                <span>Cukup terpercaya</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😊</span>
                                <span>Terpercaya</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😍</span>
                                <span>Sangat terpercaya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">2</div>
                    <div class="question-text">Menurut Anda, seberapa besar kemungkinan masyarakat memberi imbalan? *</div>
                </div>
                
                <div class="rating-section">
                    <div class="rating-container">
                        <div class="rating-value-display" id="ratingDisplaySpak2">
                            <span class="rating-emoji">😐</span>
                            <div class="rating-text">Cukup Besar</div>
                            <div class="rating-score">50/100</div>
                        </div>
                        <input type="range" class="rating-slider" min="0" max="100" value="50" id="ratingSpak2">
                        <div class="rating-labels">
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😍</span>
                                <span>Sangat Kecil</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😊</span>
                                <span>Kecil</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😐</span>
                                <span>Cukup Besar</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😠</span>
                                <span>Besar</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😡</span>
                                <span>Sangat Besar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">3</div>
                    <div class="question-text">Menurut pengamatan Anda, hadiah atau pemberian ke petugas paling sering berupa apa? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option selected" onclick="toggleCheckbox(this)">
                        <input type="checkbox" checked>
                        <span>Uang</span>
                    </div>
                    <div class="option selected" onclick="toggleCheckbox(this)">
                        <input type="checkbox" checked>
                        <span>Barang</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Makanan/Minuman</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Lainnya</span>
                    </div>
                </div>
            </div>

            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">4</div>
                    <div class="question-text">Apakah menurut Anda layanan publik sudah bebas dari korupsi? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option" onclick="toggleRadio(this, 'spak_q4')">
                        <input type="radio" name="spak_q4">
                        <span>Ya, sudah bebas</span>
                    </div>
                    <div class="option selected" onclick="toggleRadio(this, 'spak_q4')">
                        <input type="radio" name="spak_q4" checked>
                        <span>Belum sepenuhnya</span>
                    </div>
                    <div class="option" onclick="toggleRadio(this, 'spak_q4')">
                        <input type="radio" name="spak_q4">
                        <span>Masih banyak korupsi</span>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-label">Rating tingkat bebas korupsi layanan publik:</div>
                    <div class="rating-container">
                        <div class="rating-value-display" id="ratingDisplaySpak4">
                            <span class="rating-emoji">😐</span>
                            <div class="rating-text">Cukup Bersih</div>
                            <div class="rating-score">60/100</div>
                        </div>
                        <input type="range" class="rating-slider" min="0" max="100" value="60" id="ratingSpak4">
                        <div class="rating-labels">
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😡</span>
                                <span>Banyak korupsi</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😠</span>
                                <span>Korupsi cukup banyak</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😐</span>
                                <span>Cukup bersih</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😊</span>
                                <span>Bersih</span>
                            </div>
                            <div class="rating-label-item">
                                <span class="rating-label-emoji">😍</span>
                                <span>Sangat bersih</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-card fade-in">
                <div class="question-header">
                    <div class="question-number">5</div>
                    <div class="question-text">Apa yang menurut Anda paling efektif untuk mencegah korupsi? *</div>
                </div>
                
                <div class="options-container">
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Pengawasan ketat</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Sanksi yang tegas</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Transparansi proses</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Peningkatan gaji petugas</span>
                    </div>
                    <div class="option" onclick="toggleCheckbox(this)">
                        <input type="checkbox">
                        <span>Edukasi masyarakat</span>
                    </div>
                </div>

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
            </div>
        </div>

        <button class="submit-btn" onclick="submitSurvey()">Kirim</button>
    </div>

    <script>
        function toggleCheckbox(element) {
            const checkbox = element.querySelector('input[type="checkbox"]');
            
            // Toggle the checkbox state
            checkbox.checked = !checkbox.checked;
            
            // Update visual state based on checkbox
            if (checkbox.checked) {
                element.classList.add('selected');
            } else {
                element.classList.remove('selected');
            }
        }

        function toggleRadio(element, groupName) {
            // Remove selected class from all options in the group
            const allOptions = document.querySelectorAll(`input[name="${groupName}"]`);
            allOptions.forEach(radio => {
                radio.closest('.option').classList.remove('selected');
            });
            
            // Add selected class to clicked option
            element.classList.add('selected');
            const radio = element.querySelector('input[type="radio"]');
            radio.checked = true;
        }

        function switchTab(tabName) {
            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Activate the clicked tab
            if (tabName === 'spkp') {
                document.querySelector('.tab:first-child').classList.add('active');
                document.getElementById('spkp-content').classList.add('active');
            } else if (tabName === 'spak') {
                document.querySelector('.tab:last-child').classList.add('active');
                document.getElementById('spak-content').classList.add('active');
            }
            
            // Reinitialize animations for the new content
            setTimeout(() => {
                initializeAnimations();
            }, 100);
        }

        function goBack() {
            if (confirm('Apakah Anda yakin ingin kembali? Data yang sudah diisi akan hilang.')) {
                window.history.back();
            }
        }

        function showModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeModal() {
            const modal = document.getElementById('successModal');
            modal.classList.remove('show');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('successModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        function submitSurvey() {
            const activeTab = document.querySelector('.content-section.active').id;
            const formData = { survey_type: activeTab };
            
            if (activeTab === 'spkp-content') {
                // Collect SPKP data
                const q1Checkboxes = document.querySelectorAll('#spkp-content .question-card:nth-child(1) input[type="checkbox"]:checked');
                formData.q1 = Array.from(q1Checkboxes).map(cb => cb.nextElementSibling.textContent);
                formData.q1_rating = document.getElementById('rating1').value;
                
                const q2Radio = document.querySelector('input[name="q2"]:checked');
                formData.q2 = q2Radio ? q2Radio.nextElementSibling.textContent : null;
                formData.q2_rating = document.getElementById('rating2').value;
                
                const q3Radio = document.querySelector('input[name="q3"]:checked');
                formData.q3 = q3Radio ? q3Radio.nextElementSibling.textContent : null;
                formData.q3_rating = document.getElementById('rating3').value;
                
            } else if (activeTab === 'spak-content') {
                // Collect SPAK data
                const spakQ1Radio = document.querySelector('input[name="spak_q1"]:checked');
                formData.spak_q1 = spakQ1Radio ? spakQ1Radio.nextElementSibling.textContent : null;
                formData.spak_q1_rating = document.getElementById('ratingSpak1').value;
                
                formData.spak_q2_rating = document.getElementById('ratingSpak2').value;
                
                const spakQ3Checkboxes = document.querySelectorAll('#spak-content .question-card:nth-child(3) input[type="checkbox"]:checked');
                formData.spak_q3 = Array.from(spakQ3Checkboxes).map(cb => cb.nextElementSibling.textContent);
                
                const spakQ4Radio = document.querySelector('input[name="spak_q4"]:checked');
                formData.spak_q4 = spakQ4Radio ? spakQ4Radio.nextElementSibling.textContent : null;
                formData.spak_q4_rating = document.getElementById('ratingSpak4').value;
                
                const spakQ5Checkboxes = document.querySelectorAll('#spak-content .question-card:nth-child(5) input[type="checkbox"]:checked');
                formData.spak_q5 = Array.from(spakQ5Checkboxes).map(cb => cb.nextElementSibling.textContent);
            }
            
            console.log('Survey Data:', formData);
            alert(`Terima kasih! Survei ${activeTab === 'spkp-content' ? 'SPKP' : 'SPAK'} Anda telah berhasil dikirim.`);
        }

        function initializeAnimations() {
            const cards = document.querySelectorAll('.content-section.active .question-card');
            cards.forEach((card, index) => {
                card.style.animation = 'none';
                setTimeout(() => {
                    card.style.animation = `fadeIn 0.5s ease-in-out ${index * 0.2}s both`;
                }, 100);
            });
        }

        // Add smooth animations when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initializeAnimations();

            // Initialize all rating displays
            updateRatingDisplay('rating1', 'ratingDisplay1', 'service');
            updateRatingDisplay('rating2', 'ratingDisplay2', 'service');
            updateRatingDisplay('rating3', 'ratingDisplay3', 'suitability');
            updateRatingDisplay('ratingSpak1', 'ratingDisplaySpak1', 'trust');
            updateRatingDisplay('ratingSpak2', 'ratingDisplaySpak2', 'corruption');
            updateRatingDisplay('ratingSpak4', 'ratingDisplaySpak4', 'cleanliness');

            // Add interactive slider feedback
            const sliders = document.querySelectorAll('.rating-slider');
            sliders.forEach(slider => {
                slider.addEventListener('input', function() {
                    const displayId = this.id.replace('rating', 'ratingDisplay');
                    let ratingType = 'service';
                    
                    if (this.id.includes('Spak1')) ratingType = 'trust';
                    else if (this.id.includes('Spak2')) ratingType = 'corruption';
                    else if (this.id.includes('Spak4')) ratingType = 'cleanliness';
                    else if (this.id === 'rating3') ratingType = 'suitability';
                    
                    updateRatingDisplay(this.id, displayId, ratingType);
                });
            });
        });

        // Enhanced function to update rating display with different rating types
        function updateRatingDisplay(sliderId, displayId, ratingType = 'service') {
            const slider = document.getElementById(sliderId);
            const display = document.getElementById(displayId);
            const value = parseInt(slider.value);
            
            let emoji, text, bgGradient;
            
            if (ratingType === 'service' || ratingType === 'trust' || ratingType === 'cleanliness') {
                // For service quality, trust, and cleanliness (higher is better)
                if (value >= 80) {
                    emoji = '😍';
                    text = ratingType === 'trust' ? 'Sangat Terpercaya' : 
                           ratingType === 'cleanliness' ? 'Sangat Bersih' : 'Sangat Mudah';
                    bgGradient = 'linear-gradient(135deg, #2ed573 0%, #7bed9f 100%)';
                } else if (value >= 60) {
                    emoji = '😊';
                    text = ratingType === 'trust' ? 'Terpercaya' : 
                           ratingType === 'cleanliness' ? 'Bersih' : 'Mudah';
                    bgGradient = 'linear-gradient(135deg, #7bed9f 0%, #ffa502 100%)';
                } else if (value >= 40) {
                    emoji = '😐';
                    text = ratingType === 'trust' ? 'Cukup Terpercaya' : 
                           ratingType === 'cleanliness' ? 'Cukup Bersih' : 'Cukup';
                    bgGradient = 'linear-gradient(135deg, #ffa502 0%, #ff6348 100%)';
                } else if (value >= 20) {
                    emoji = '😠';
                    text = ratingType === 'trust' ? 'Kurang Terpercaya' : 
                           ratingType === 'cleanliness' ? 'Korupsi Cukup Banyak' : 'Sulit';
                    bgGradient = 'linear-gradient(135deg, #ff6348 0%, #ff4757 100%)';
                } else {
                    emoji = '😡';
                    text = ratingType === 'trust' ? 'Tidak Terpercaya' : 
                           ratingType === 'cleanliness' ? 'Banyak Korupsi' : 'Sangat Sulit';
                    bgGradient = 'linear-gradient(135deg, #ff4757 0%, #c44569 100%)';
                }
            } else if (ratingType === 'corruption') {
                // For corruption likelihood (lower is better)
                if (value >= 80) {
                    emoji = '😡';
                    text = 'Sangat Besar';
                    bgGradient = 'linear-gradient(135deg, #ff4757 0%, #c44569 100%)';
                } else if (value >= 60) {
                    emoji = '😠';
                    text = 'Besar';
                    bgGradient = 'linear-gradient(135deg, #ff6348 0%, #ff4757 100%)';
                } else if (value >= 40) {
                    emoji = '😐';
                    text = 'Cukup Besar';
                    bgGradient = 'linear-gradient(135deg, #ffa502 0%, #ff6348 100%)';
                } else if (value >= 20) {
                    emoji = '😊';
                    text = 'Kecil';
                    bgGradient = 'linear-gradient(135deg, #7bed9f 0%, #ffa502 100%)';
                } else {
                    emoji = '😍';
                    text = 'Sangat Kecil';
                    bgGradient = 'linear-gradient(135deg, #2ed573 0%, #7bed9f 100%)';
                }
            } else if (ratingType === 'suitability') {
                // For document suitability
                if (value >= 80) {
                    emoji = '😍';
                    text = 'Sangat Sesuai';
                    bgGradient = 'linear-gradient(135deg, #2ed573 0%, #7bed9f 100%)';
                } else if (value >= 60) {
                    emoji = '😊';
                    text = 'Sesuai';
                    bgGradient = 'linear-gradient(135deg, #7bed9f 0%, #ffa502 100%)';
                } else if (value >= 40) {
                    emoji = '😐';
                    text = 'Cukup Sesuai';
                    bgGradient = 'linear-gradient(135deg, #ffa502 0%, #ff6348 100%)';
                } else if (value >= 20) {
                    emoji = '😠';
                    text = 'Kurang Sesuai';
                    bgGradient = 'linear-gradient(135deg, #ff6348 0%, #ff4757 100%)';
                } else {
                    emoji = '😡';
                    text = 'Tidak Sesuai';
                    bgGradient = 'linear-gradient(135deg, #ff4757 0%, #c44569 100%)';
                }
            }
            
            display.innerHTML = `
                <span class="rating-emoji">${emoji}</span>
                <div class="rating-text">${text}</div>
                <div class="rating-score">${value}/100</div>
            `;
            
            display.style.background = bgGradient;
            
            // Add bounce animation to emoji
            const emojiElement = display.querySelector('.rating-emoji');
            emojiElement.style.animation = 'none';
            setTimeout(() => {
                emojiElement.style.animation = 'bounce 0.5s ease';
            }, 10);
        }
    </script>
</body>
</html>