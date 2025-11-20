<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Hasil Survei - SPKP & SPAK</title>
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

        /* Filter Section */
        .filter-section {
            background: #EBE2D5;
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(139, 117, 32, 0.2);
            position: relative;
            overflow: hidden;
        }

        .filter-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #AE8F72;
        }

        .filter-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .filter-icon {
            font-size: 20px;
            color: white;
        }

        .filter-title {
            font-size: 20px;
            font-weight: 700;
            color: black;
            margin: 0;
        }

        .filter-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 16px;
            font-weight: 600;
            color: black;
        }

        .form-control {
            padding: 15px 20px;
            border: none;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
            font-size: 16px;
            color: #3d2914;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-control:focus {
            outline: none;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            background: white;
        }

        .form-control::placeholder {
            color: #999;
        }

        .date-group {
            grid-column: 1 / -1;
        }

        .date-input {
            background: rgba(255, 255, 255, 0.95);
            position: relative;
        }

        .date-input::-webkit-calendar-picker-indicator {
            background: url('data:image/svg+xml;utf8,<svg fill="%23666" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>');
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .apply-btn {
            padding: 15px 40px;
            background: linear-gradient(145deg, #D0C4A6, #AE8F72);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 6px 20px rgba(61, 41, 20, 0.3);
            align-self: center;
            justify-self: center;
            grid-column: 1 / -1;
            max-width: 200px;
        }

        .apply-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 30px rgba(61, 41, 20, 0.4);
        }

        /* Data Section */
        .data-section {
            background: linear-gradient(145deg, #ffffff, #f8f6f0);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(139, 117, 32, 0.1);
            border: 1px solid rgba(190, 168, 135, 0.2);
            position: relative;
            overflow: hidden;
        }

        .data-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #AE8F72;
        }

        .data-title {
            font-size: 22px;
            font-weight: 700;
            color: black;
            margin-bottom: 25px;
            padding-left: 5px;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
            border-radius: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(139, 117, 32, 0.1);
        }

        .table-header th {
            padding: 20px 15px;
            text-align: left;
            font-size: 14px;
            font-weight: 700;
            color: white;
            background: #AE8F72;
            border-bottom: 2px solid #6b5710;
        }

        .table-header th:first-child {
            text-align: center;
            width: 60px;
        }

        .table-header th:last-child {
            text-align: center;
            width: 100px;
        }

        .table-row {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .table-row:hover {
            background: linear-gradient(145deg, #f8f6f0, #f0ead6);
            transform: scale(1.01);
        }

        .table-row td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(190, 168, 135, 0.2);
            font-size: 14px;
            color: #3d2914;
        }

        .row-number {
            text-align: center;
            font-weight: 700;
            color: #6b5710;
            background: linear-gradient(145deg, #f8f6f0, #f0ead6);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .respondent-name {
            font-weight: 600;
            color: #3d2914;
        }

        .survey-type {
            padding: 8px 15px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
            display: inline-block;
        }

        .survey-type.spkp {
            background: #D0C4A6;
            color: white;
        }

        .survey-type.spak {
            background: #AE8F72;
            color: white;
        }

        .service-type {
            font-size: 13px;
            color: #6b5710;
            line-height: 1.4;
        }

        .timestamp {
            font-size: 13px;
            color: #666;
            font-weight: 500;
        }

        .detail-btn {
            padding: 10px 20px;
            background: #AE8F72;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(139, 117, 32, 0.2);
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0 auto;
        }

        .detail-btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 8px 20px rgba(139, 117, 32, 0.3);
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

            .filter-form {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .date-group {
                grid-column: 1;
            }

            .filter-section {
                padding: 25px 20px;
            }

            .data-section {
                padding: 25px 15px;
            }

            .table-header th,
            .table-row td {
                padding: 15px 10px;
                font-size: 12px;
            }

            .survey-type {
                padding: 6px 10px;
                font-size: 10px;
            }

            .detail-btn {
                padding: 8px 15px;
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            .data-table {
                font-size: 11px;
            }
            
            .table-header th,
            .table-row td {
                padding: 10px 8px;
            }
            
            .respondent-name {
                font-size: 12px;
            }
            
            .service-type {
                font-size: 11px;
            }
            
            .timestamp {
                font-size: 11px;
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
                <h1 class="page-title">Lihat & Kelola Hasil Survei</h1>
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
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-header">
                <span class="filter-icon">🔽</span>
                <h2 class="filter-title">Filter Data</h2>
            </div>
            
            <div class="filter-form">
                <div class="form-group">
                    <label class="form-label">Jenis Survei</label>
                    <select class="form-control" id="jenisSurvei">
                        <option value="">---Jenis Survei---</option>
                        <option value="spkp">SPKP</option>
                        <option value="spak">SPAK</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Jenis Layanan</label>
                    <select class="form-control" id="jenisLayanan">
                        <option value="">---Jenis Layanan---</option>
                        <option value="layanan-umum">Layanan Umum</option>
                        <option value="perizinan">Layanan Perizinan & Keuangan</option>
                        <option value="perundingan">Layanan Perundingan-undangan</option>
                        <option value="humas">Layanan Humas & Protokol</option>
                    </select>
                </div>
                
                <div class="form-group date-group">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control date-input" id="tanggal" placeholder="dd / mm / yyyy">
                </div>
                
                <button class="apply-btn" onclick="applyFilter()">Terapkan</button>
            </div>
        </div>

        <!-- Data Section -->
        <div class="data-section">
            <h3 class="data-title">Data Responden</h3>
            
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-header">
                        <tr>
                            <th>No.</th>
                            <th>Nama Responden</th>
                            <th>Jenis Survei</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal & Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTableBody">
                        <tr class="table-row">
                            <td>
                                <div class="row-number">1</div>
                            </td>
                            <td>
                                <div class="respondent-name">Dyndra Seravina</div>
                            </td>
                            <td>
                                <span class="survey-type spkp">SPKP</span>
                            </td>
                            <td>
                                <div class="service-type">Layanan Umum</div>
                            </td>
                            <td>
                                <div class="timestamp">30/07/2025 | 10:12</div>
                            </td>
                            <td>
                                <button class="detail-btn" onclick="goToDetail(1)">
                                    👁️ Detail
                                </button>
                            </td>
                        </tr>
                        
                        <tr class="table-row">
                            <td>
                                <div class="row-number">2</div>
                            </td>
                            <td>
                                <div class="respondent-name">Mahendra Putra</div>
                            </td>
                            <td>
                                <span class="survey-type spak">SPAK</span>
                            </td>
                            <td>
                                <div class="service-type">Layanan Perizinan & Keuangan</div>
                            </td>
                            <td>
                                <div class="timestamp">30/07/2025 | 13:43</div>
                            </td>
                            <td>
                                <button class="detail-btn" onclick="goToDetail(2)">
                                    👁️ Detail
                                </button>
                            </td>
                        </tr>
                        
                        <tr class="table-row">
                            <td>
                                <div class="row-number">3</div>
                            </td>
                            <td>
                                <div class="respondent-name">Johnny Saputra</div>
                            </td>
                            <td>
                                <span class="survey-type spkp">SPKP</span>
                            </td>
                            <td>
                                <div class="service-type">Layanan Perundingan-undangan</div>
                            </td>
                            <td>
                                <div class="timestamp">31/07/2025 | 12:14</div>
                            </td>
                            <td>
                                <button class="detail-btn" onclick="goToDetail(3)">
                                    👁️ Detail
                                </button>
                            </td>
                        </tr>
                        
                        <tr class="table-row">
                            <td>
                                <div class="row-number">4</div>
                            </td>
                            <td>
                                <div class="respondent-name">Jennie Rafaella</div>
                            </td>
                            <td>
                                <span class="survey-type spak">SPAK</span>
                            </td>
                            <td>
                                <div class="service-type">Layanan Humas & Protokol</div>
                            </td>
                            <td>
                                <div class="timestamp">31/07/2025 | 16:65</div>
                            </td>
                            <td>
                                <button class="detail-btn" onclick="goToDetail(4)">
                                    👁️ Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function goBack() {
            window.history.back();
        }

        // Fungsi untuk redirect ke halaman detail
        function goToDetail(id) {
            // Mengarahkan ke halaman admin/detail.blade.php dengan parameter ID
            window.location.href = `admin.detail`;
        }

        function applyFilter() {
            const jenisSurvei = document.getElementById('jenisSurvei').value;
            const jenisLayanan = document.getElementById('jenisLayanan').value;
            const tanggal = document.getElementById('tanggal').value;
            
            // Add loading animation
            const btn = event.target;
            btn.style.transform = 'scale(0.95)';
            btn.innerHTML = 'Memfilter...';
            
            setTimeout(() => {
                btn.style.transform = 'scale(1)';
                btn.innerHTML = 'Terapkan';
                
                // Simulate filtering
                console.log('Filter applied:', {
                    jenisSurvei,
                    jenisLayanan,
                    tanggal
                });
                
                // Here you would typically make an API call to filter the data
                filterData(jenisSurvei, jenisLayanan, tanggal);
            }, 1000);
        }

        function filterData(survei, layanan, tanggal) {
            // This is a simulation - in real app, this would filter the actual data
            const tableBody = document.getElementById('dataTableBody');
            let filteredData = [
                {
                    id: 1,
                    nama: 'Dyndra Seravina',
                    jenis: 'SPKP',
                    layanan: 'Layanan Umum',
                    waktu: '30/07/2025 | 10:12'
                },
                {
                    id: 2,
                    nama: 'Mahendra Putra',
                    jenis: 'SPAK',
                    layanan: 'Layanan Perizinan & Keuangan',
                    waktu: '30/07/2025 | 13:43'
                },
                {
                    id: 3,
                    nama: 'Johnny Saputra',
                    jenis: 'SPKP',
                    layanan: 'Layanan Perundingan-undangan',
                    waktu: '31/07/2025 | 12:14'
                },
                {
                    id: 4,
                    nama: 'Jennie Rafaella',
                    jenis: 'SPAK',
                    layanan: 'Layanan Humas & Protokol',
                    waktu: '31/07/2025 | 16:65'
                }
            ];

            // Apply filters
            if (survei) {
                filteredData = filteredData.filter(item => item.jenis.toLowerCase() === survei.toLowerCase());
            }
            if (layanan) {
                filteredData = filteredData.filter(item => 
                    item.layanan.toLowerCase().includes(layanan.toLowerCase().replace('-', ' '))
                );
            }

            // Update table
            updateTable(filteredData);
        }

        function updateTable(data) {
            const tableBody = document.getElementById('dataTableBody');
            tableBody.innerHTML = '';

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.className = 'table-row';
                row.innerHTML = `
                    <td>
                        <div class="row-number">${index + 1}</div>
                    </td>
                    <td>
                        <div class="respondent-name">${item.nama}</div>
                    </td>
                    <td>
                        <span class="survey-type ${item.jenis.toLowerCase()}">${item.jenis}</span>
                    </td>
                    <td>
                        <div class="service-type">${item.layanan}</div>
                    </td>
                    <td>
                        <div class="timestamp">${item.waktu}</div>
                    </td>
                    <td>
                        <button class="detail-btn" onclick="goToDetail(${item.id})">
                            👁️ Detail
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Enhanced interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to form controls
            const formControls = document.querySelectorAll('.form-control');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                control.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Add click animation to table rows
            const tableRows = document.querySelectorAll('.table-row');
            tableRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    if (!e.target.closest('.detail-btn')) {
                        this.style.transform = 'scale(1.01)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 150);
                    }
                });
            });
        });

        // Auto-populate date with today's date
        document.getElementById('tanggal').valueAsDate = new Date();
    </script>
</body>
</html>