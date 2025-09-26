<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pertanyaan Survei - SPKP & SPAK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        
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
            max-width: 1500px;
            margin: 0 auto;
        }

        /* Tabs */
        .tabs-container {
            margin-bottom: 30px;
        }

        .tabs {
            display: flex;
            background: whitesmoke;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(139, 117, 32, 0.15);
            border: 1px solid rgba(190, 168, 135, 0.3);
        }

        .tab {
            flex: 1;
            padding: 25px 35px;
            background: transparent;
            border: none;
            font-size: 18px;
            font-weight: 700;
            color: #6b5710;
            cursor: pointer;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .tab:hover::before {
            left: 100%;
        }

        .tab.active {
            background: #815A40;
            color: white;
            box-shadow: inset 0 2px 10px rgba(139, 117, 32, 0.1);
        }

        .tab:not(.active):hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Content Area */
        .content-area {
            background: linear-gradient(145deg, #ffffff, #f8f6f0);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(139, 117, 32, 0.1);
            border: 1px solid rgba(190, 168, 135, 0.2);
            position: relative;
            overflow: hidden;
        }

        .content-area::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #bea887, #a08c60, #8b7520);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-export {
            background: #815A40;
            color: white;
        }

        .btn-export:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(139, 117, 32, 0.3);
        }

        .btn-add {
            background: #815A40;
            color: white;
        }

        .btn-add:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(107, 87, 16, 0.3);
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        .survey-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .survey-table th {
            background: #f8f9fa;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #e9ecef;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .survey-table td {
            padding: 16px;
            border-bottom: 1px solid #f1f3f5;
            vertical-align: middle;
        }

        .survey-table tr:hover {
            background: #f8f9fa;
        }

        .checkbox {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #3b82f6;
        }

        .question-number {
            font-weight: 600;
            color: #6c757d;
            width: 40px;
            text-align: center;
        }

        .up-down-arrows {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            margin-left: 8px;
            color: #6c757d;
            font-size: 12px;
            cursor: pointer;
        }

        .question-text {
            color: #2c3e50;
            line-height: 1.4;
            max-width: 300px;
        }

        .question-required {
            color: #dc2626;
            margin-left: 4px;
        }

        .question-type {
            color: #6c757d;
            font-size: 13px;
        }

        .status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status.active {
            background: #dcfce7;
            color: #16a34a;
        }

        .status.draft {
            background: #f3f4f6;
            color: #6b7280;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .action-icon {
            width: 32px;
            height: 32px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            background: white;
            font-size: 14px;
        }

        .action-icon:hover {
            background: #f3f4f6;
            border-color: #d1d5db;
        }

        .action-icon.view { color: #3b82f6; }
        .action-icon.edit { color: #f59e0b; }
        .action-icon.delete { color: #ef4444; }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                padding: 20px 15px;
            }

            .tabs {
                flex-direction: column;
            }

            .tab {
                border-right: none;
                border-bottom: 1px solid #e9ecef;
            }

            .tab:last-child {
                border-bottom: none;
            }

            .action-buttons {
                flex-direction: column;
            }

            .survey-table {
                font-size: 12px;
            }

            .survey-table th,
            .survey-table td {
                padding: 8px 12px;
            }
        }

        /* Loading Animation */
        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: calc(200px + 100%) 0; }
        }

        .loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200px 100%;
            animation: shimmer 1.5s infinite;
        }

        /* Responsive */
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

            .tab {
                padding: 20px 25px;
                font-size: 16px;
            }

            .content-area {
                padding: 25px 20px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn {
                justify-content: center;
                padding: 14px 28px;
            }

            .table-row td {
                padding: 20px 15px;
            }

            .question-text {
                font-size: 14px;
                max-width: 250px;
            }
        }

        @media (max-width: 480px) {
            .tabs {
                flex-direction: column;
            }

            .tab {
                border-radius: 0;
            }

            .tab:first-child {
                border-radius: 20px 20px 0 0;
            }

            .tab:last-child {
                border-radius: 0 0 20px 20px;
            }
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 24px 24px 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
        }

        .close-btn:hover {
            background: #f0f0f0;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 0 2px rgba(139, 69, 19, 0.1);
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .options-container {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 16px;
            background: #fafafa;
        }

        .option-item {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
            align-items: center;
        }

        .option-item:last-child {
            margin-bottom: 0;
        }

        .option-input {
            flex: 1;
        }

        .btn-remove {
            background: #ffebee;
            color: #d32f2f;
            border: none;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-add-option {
            background: #e8f5e8;
            color: #2e7d32;
            border: 1px dashed #81c784;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            margin-top: 12px;
        }

        .modal-footer {
            padding: 0 24px 24px 24px;
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn-cancel {
            background: #f8f9fa;
            color: #666;
            border: 1px solid #ddd;
        }

        .btn-save {
            background: #8B4513;
            color: white;
        }

        .hidden {
            display: none;
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

    <main class="main-container">
        <div class="tabs-container">
            <div class="tabs">
                <button class="tab active" onclick="switchTab('spkp')">SPKP - Survei Persepsi Kepuasan Pelayanan</button>
                <button class="tab" onclick="switchTab('spak')">SPAK - Survei Persepsi Anti Korupsi</button>
            </div>
        </div>

        <div class="content-area">
            <div class="action-buttons">
                <button class="btn btn-export" onclick="exportToPDF()">
                    📄 Export to PDF
                </button>
                <button class="btn btn-add" onclick="openModal()">
                    ➕ Tambah Pertanyaan
                </button>
            </div>

            <div class="table-container">
                <table class="survey-table">
                    <thead>
                        <tr>
                            <th style="width: 40px;"></th>
                            <th style="width: 80px;">Urutan</th>
                            <th>Pertanyaan</th>
                            <th style="width: 120px;">Tipe</th>
                            <th style="width: 80px;">Status</th>
                            <th style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="questionTableBody">
                        </tbody>
                </table>
            </div>

            <!-- Modal Tambah/Edit Pertanyaan -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Tambah Pertanyaan Baru</h3>
                <button class="close-btn" onclick="closeModal()">×</button>
            </div>
            
            <div class="modal-body">
                <form id="questionForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Urutan Pertanyaan</label>
                            <input type="number" class="form-control" id="questionOrder" min="1" value="5">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="questionStatus">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Draft</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tipe Pertanyaan</label>
                        <select class="form-control" id="questionType" onchange="handleTypeChange()">
                            <option value="">Pilih tipe pertanyaan</option>
                            <option value="text">Text Input</option>
                            <option value="textarea">Text Area</option>
                            <option value="multiple_choice">Multiple Choice</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="radio">Radio Button</option>
                            <option value="rating">Rating Scale</option>
                            <option value="checkbox_rating">Checkbox & Rating</option>
                            <option value="multiple_rating">Multiple Choice & Rating</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pertanyaan</label>
                        <textarea class="form-control" id="questionText" placeholder="Masukkan teks pertanyaan di sini..." rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi/Keterangan (Opsional)</label>
                        <textarea class="form-control" id="questionDescription" placeholder="Tambahkan deskripsi atau penjelasan tambahan..." rows="2"></textarea>
                    </div>

                    <!-- Options Container (untuk multiple choice, radio, checkbox) -->
                    <div class="form-group hidden" id="optionsGroup">
                        <label class="form-label">Pilihan Jawaban</label>
                        <div class="options-container" id="optionsContainer">
                            <div class="option-item">
                                <input type="text" class="form-control option-input" placeholder="Pilihan 1">
                                <button type="button" class="btn-remove" onclick="removeOption(this)">×</button>
                            </div>
                            <div class="option-item">
                                <input type="text" class="form-control option-input" placeholder="Pilihan 2">
                                <button type="button" class="btn-remove" onclick="removeOption(this)">×</button>
                            </div>
                        </div>
                        <button type="button" class="btn-add-option" onclick="addOption()">+ Tambah Pilihan</button>
                    </div>

                    <!-- Rating Settings -->
                    <div class="form-group hidden" id="ratingGroup">
                        <label class="form-label">Pengaturan Rating</label>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Skala Minimum</label>
                                <input type="number" class="form-control" id="ratingMin" value="1" min="1">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Skala Maksimum</label>
                                <input type="number" class="form-control" id="ratingMax" value="5" max="10">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Label Minimum</label>
                                <input type="text" class="form-control" id="ratingMinLabel" placeholder="Sangat Tidak Setuju">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Label Maksimum</label>
                                <input type="text" class="form-control" id="ratingMaxLabel" placeholder="Sangat Setuju">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 8px;">
                            <input type="checkbox" id="isRequired">
                            <span>Pertanyaan ini wajib diisi</span>
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-cancel" onclick="closeModal()">Batal</button>
                <button class="btn btn-save" onclick="saveQuestion()">Simpan Pertanyaan</button>
            </div>
        </div>
    </div>
    </main>

    <script>
    let currentTab = 'spkp';
        let spkpQuestions = [
            { id: 'spkp-1', text: "Persyaratan layanan mudah ditemukan?", type: "Check box & rating", status: "Aktif" },
            { id: 'spkp-2', text: "Persyaratan pelayanan mudah dimengerti?", type: "Check box & rating", status: "Aktif" },
            { id: 'spkp-3', text: "Dokumen yang diminta sesuai dengan kebutuhan pelayanan?", type: "Multiple Choice", status: "Aktif" },
            { id: 'spkp-4', text: "Apakah Anda merasa jumlah persyaratan terlalu banyak?", type: "Multiple Choice & rating", status: "Aktif" },
            { id: 'spkp-5', text: "Informasi perubahan persyaratan disampaikan dengan jelas?", type: "Multiple Choice", status: "Aktif" },
            { id: 'spkp-6', text: "Media informasi persyaratan mana yang Anda gunakan?", type: "Check box", status: "Aktif" },
            { id: 'spkp-7', text: "Apakah persyaratan selalu diperbarui sesuai peraturan terbaru?", type: "Multiple Choice", status: "Aktif" },
            { id: 'spkp-8', text: "Kemudahan akses dokumen persyaratan?", type: "Multiple choice & rating", status: "Aktif" },
            { id: 'spkp-9', text: "Informasi tentang siapa yang bisa membantu jika bingung soal syarat?", type: "Multiple choice", status: "Aktif" },
            { id: 'spkp-10', text: "Secara keseluruhan, Anda puas terhadap informasi persyaratan yang tersedia?", type: "Multiple choice & rating", status: "Draf" }
        ];

        let spakQuestions = [
            { id: 'spak-1', text: "Pernahkah Anda diminta memberikan hadiah/uang oleh petugas?", type: "Multiple choice & rating", status: "Aktif" },
            { id: 'spak-2', text: "Menurut Anda, seberapa besar kemungkinan masyarakat memberi imbalan?", type: "Rating", status: "Aktif" },
            { id: 'spak-3', text: "Dalam bentuk apakah gratifikasi yang paling sering terjadi menurut pengamatan Anda?", type: "Check box", status: "Aktif" },
            { id: 'spak-4', text: "Apakah Anda tahu bahwa memberi hadiah kepada petugas adalah pelanggaran?", type: "Multiple Choice & rating", status: "Aktif" },
            { id: 'spak-5', text: "Apakah Anda pernah menyaksikan praktik gratifikasi di lingkungan DPRD?", type: "Multiple Choice & rating", status: "Aktif" },
            { id: 'spak-6', text: "Seberapa mudah melaporkan gratifikasi di lingkungan Sekretariat DPRD?", type: "Rating", status: "Aktif" },
            { id: 'spak-7', text: "Saluran pelaporan mana yang Anda tahu?", type: "Check box", status: "Aktif" },
            { id: 'spak-8', text: "Apakah menurut Anda pegawai di lingkungan Sekretariat DPRD bebas dari gratifikasi?", type: "Rating", status: "Aktif" },
            { id: 'spak-9', text: "Seberapa yakin Anda bahwa laporan gratifikasi akan ditindaklanjuti?", type: "Rating", status: "Aktif" },
            { id: 'spak-10', text: "Seberapa penting pengawasan masyarakat terhadap praktik gratifikasi?", type: "Rating", status: "Aktif" }
        ];

        let editingQuestionId = null;

        const modalOverlay = document.getElementById('modalOverlay');
        const modalTitle = document.getElementById('modalTitle');
        const questionOrderInput = document.getElementById('questionOrder');
        const questionStatusSelect = document.getElementById('questionStatus');
        const questionTypeSelect = document.getElementById('questionType');
        const questionTextInput = document.getElementById('questionText');
        const questionDescriptionInput = document.getElementById('questionDescription');
        const isRequiredCheckbox = document.getElementById('isRequired');
        const optionsGroup = document.getElementById('optionsGroup');
        const optionsContainer = document.getElementById('optionsContainer');
        const ratingGroup = document.getElementById('ratingGroup');
        const ratingMinInput = document.getElementById('ratingMin');
        const ratingMaxInput = document.getElementById('ratingMax');
        const ratingMinLabelInput = document.getElementById('ratingMinLabel');
        const ratingMaxLabelInput = document.getElementById('ratingMaxLabel');

        function renderQuestions(questions) {
            const tableBody = document.getElementById('questionTableBody');
            tableBody.innerHTML = '';
            questions.forEach((q, index) => {
                const row = document.createElement('tr');
                row.dataset.questionId = q.id;
                const statusClass = q.status.toLowerCase() === 'aktif' ? 'active' : 'draft';
                const eyeIcon = q.status.toLowerCase() === 'aktif' ? '<i class="fas fa-eye" title="Sembunyikan"></i>' : '<i class="fas fa-eye-slash" title="Tampilkan"></i>';
                row.innerHTML = `
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <span class="question-number">${index + 1}</span>
                            <div class="up-down-arrows">
                                <span class="arrow-up" onclick="moveQuestionUp('${q.id}')">↑</span>
                                <span class="arrow-down" onclick="moveQuestionDown('${q.id}')">↓</span>
                            </div>
                        </div>
                    </td>
                    <td class="question-text">
                        ${q.text}${q.required ? '<span class="question-required">*</span>' : ''}
                    </td>
                    <td class="question-type">${q.type}</td>
                    <td><span class="status ${statusClass}">${q.status}</span></td>
                    <td>
                        <div class="actions">
                            <div class="action-icon view" title="Lihat" onclick="toggleQuestionStatus('${q.id}')">
                                ${eyeIcon}
                            </div>
                            <div class="action-icon edit" title="Edit" onclick="editQuestion('${q.id}')">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="action-icon delete" title="Hapus" onclick="deleteQuestion('${q.id}')">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function switchTab(tabType) {
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));
            currentTab = tabType;
            if (tabType === 'spkp') {
                document.querySelector('[onclick="switchTab(\'spkp\')"]').classList.add('active');
                renderQuestions(spkpQuestions);
            } else {
                document.querySelector('[onclick="switchTab(\'spak\')"]').classList.add('active');
                renderQuestions(spakQuestions);
            }
        }

        function openModal(questionId = null) {
            modalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
            resetForm();

            if (questionId) {
                editingQuestionId = questionId;
                modalTitle.textContent = 'Edit Pertanyaan';
                loadQuestionData(questionId);
            } else {
                editingQuestionId = null;
                modalTitle.textContent = 'Tambah Pertanyaan Baru';
                const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;
                questionOrderInput.value = currentQuestions.length + 1;
            }
        }

        function closeModal() {
            modalOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        function resetForm() {
            questionOrderInput.value = '';
            questionStatusSelect.value = 'aktif';
            questionTypeSelect.value = '';
            questionTextInput.value = '';
            questionDescriptionInput.value = '';
            isRequiredCheckbox.checked = false;
            optionsGroup.classList.add('hidden');
            ratingGroup.classList.add('hidden');
            optionsContainer.innerHTML = '';
        }

        function handleTypeChange() {
            const type = questionTypeSelect.value;
            optionsGroup.classList.add('hidden');
            ratingGroup.classList.add('hidden');

            if (['multiple_choice', 'radio', 'checkbox', 'checkbox_rating', 'multiple_rating'].includes(type)) {
                optionsGroup.classList.remove('hidden');
                // Tambahkan opsi default jika belum ada
                if (optionsContainer.childElementCount === 0) {
                    addOption();
                    addOption();
                }
            }

            if (['rating', 'checkbox_rating', 'multiple_rating'].includes(type)) {
                ratingGroup.classList.remove('hidden');
            }
        }

        function addOption(value = '') {
            const optionItem = document.createElement('div');
            optionItem.className = 'option-item';
            optionItem.innerHTML = `
                <input type="text" class="form-control option-input" placeholder="Masukkan pilihan jawaban..." value="${value}">
                <button type="button" class="btn-remove" onclick="removeOption(this)">×</button>
            `;
            optionsContainer.appendChild(optionItem);
        }

        function removeOption(button) {
            button.parentElement.remove();
        }

        function editQuestion(questionId) {
            openModal(questionId);
        }

        function loadQuestionData(questionId) {
            const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;
            const question = currentQuestions.find(q => q.id === questionId);

            if (question) {
                questionOrderInput.value = currentQuestions.indexOf(question) + 1;
                questionStatusSelect.value = question.status === 'Aktif' ? 'aktif' : 'nonaktif';

                let typeValue;
                if (question.type === 'Text Input') typeValue = 'text';
                else if (question.type === 'Text Area') typeValue = 'textarea';
                else if (question.type === 'Multiple Choice') typeValue = 'multiple_choice';
                else if (question.type === 'Checkbox') typeValue = 'checkbox';
                else if (question.type === 'Radio Button') typeValue = 'radio';
                else if (question.type === 'Rating Scale') typeValue = 'rating';
                else if (question.type === 'Checkbox & Rating') typeValue = 'checkbox_rating';
                else if (question.type === 'Multiple Choice & Rating') typeValue = 'multiple_rating';

                questionTypeSelect.value = typeValue;
                
                // Panggil handleTypeChange untuk menampilkan grup opsi/rating yang relevan
                handleTypeChange();

                questionTextInput.value = question.text;
                questionDescriptionInput.value = question.description || '';
                isRequiredCheckbox.checked = question.required;

                // Isi opsi jawaban
                if (question.options) {
                    optionsContainer.innerHTML = '';
                    question.options.forEach(option => addOption(option));
                } else {
                    optionsContainer.innerHTML = '';
                }

                // Isi pengaturan rating
                if (question.ratingMin) {
                    ratingMinInput.value = question.ratingMin;
                    ratingMaxInput.value = question.ratingMax;
                    ratingMinLabelInput.value = question.ratingMinLabel;
                    ratingMaxLabelInput.value = question.ratingMaxLabel;
                }
            }
        }

        function saveQuestion() {
            const order = parseInt(questionOrderInput.value);
            const status = questionStatusSelect.value === 'aktif' ? 'Aktif' : 'Draft';
            const type = questionTypeSelect.value;
            const text = questionTextInput.value;
            const description = questionDescriptionInput.value;
            const required = isRequiredCheckbox.checked;

            if (!text || !type || isNaN(order)) {
                alert('Mohon lengkapi semua data wajib (Urutan, Tipe, dan Pertanyaan).');
                return;
            }

            let questionData = {
                id: editingQuestionId || 'q' + (new Date()).getTime(),
                text: text,
                type: questionTypeSelect.options[questionTypeSelect.selectedIndex].text,
                status: status,
                required: required,
                description: description,
            };

            if (['multiple_choice', 'radio', 'checkbox', 'checkbox_rating', 'multiple_rating'].includes(type)) {
                const options = Array.from(optionsContainer.querySelectorAll('.option-input')).map(input => input.value).filter(val => val.trim() !== '');
                questionData.options = options;
            }
            
            if (['rating', 'checkbox_rating', 'multiple_rating'].includes(type)) {
                questionData.ratingMin = parseInt(ratingMinInput.value);
                questionData.ratingMax = parseInt(ratingMaxInput.value);
                questionData.ratingMinLabel = ratingMinLabelInput.value;
                questionData.ratingMaxLabel = ratingMaxLabelInput.value;
            }

            const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;

            if (editingQuestionId) {
                const index = currentQuestions.findIndex(q => q.id === editingQuestionId);
                if (index > -1) {
                    // Perbarui data
                    currentQuestions[index] = { ...currentQuestions[index], ...questionData };
                    // Hapus dan tambahkan kembali untuk mengubah urutan
                    const [removed] = currentQuestions.splice(index, 1);
                    currentQuestions.splice(order - 1, 0, removed);
                }
            } else {
                currentQuestions.splice(order - 1, 0, questionData);
            }
            
            renderQuestions(currentQuestions);
            closeModal();
        }

        function deleteQuestion(questionId) {
            if (confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')) {
                const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;
                const index = currentQuestions.findIndex(q => q.id === questionId);
                if (index > -1) {
                    currentQuestions.splice(index, 1);
                    renderQuestions(currentQuestions);
                }
            }
        }

        function toggleQuestionStatus(questionId) {
            const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;
            const question = currentQuestions.find(q => q.id === questionId);
            if (question) {
                if (question.status === "Aktif") {
                    question.status = "Draft";
                } else {
                    question.status = "Aktif";
                }
                renderQuestions(currentQuestions);
            }
        }

        function exportToPDF() {
            alert('Fungsi Export to PDF sedang dalam pengembangan.');
        }

        function moveQuestionUp(questionId) {
            const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;
            const currentIndex = currentQuestions.findIndex(q => q.id === questionId);
            if (currentIndex > 0) {
                const temp = currentQuestions[currentIndex];
                currentQuestions[currentIndex] = currentQuestions[currentIndex - 1];
                currentQuestions[currentIndex - 1] = temp;
                renderQuestions(currentQuestions);
            }
        }

        function moveQuestionDown(questionId) {
            const currentQuestions = currentTab === 'spkp' ? spkpQuestions : spakQuestions;
            const currentIndex = currentQuestions.findIndex(q => q.id === questionId);
            if (currentIndex < currentQuestions.length - 1) {
                const temp = currentQuestions[currentIndex];
                currentQuestions[currentIndex] = currentQuestions[currentIndex + 1];
                currentQuestions[currentIndex + 1] = temp;
                renderQuestions(currentQuestions);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderQuestions(spkpQuestions);
        });
</script>
</body>
</html>