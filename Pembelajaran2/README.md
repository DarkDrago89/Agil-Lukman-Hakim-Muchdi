# 🌐 Profil HTML

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Agil Lukman</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        h2 {
            color: #3498db;
            margin: 20px 0 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ddd;
        }
        
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 15px auto;
            display: block;
            border: 3px solid #3498db;
        }
        
        .contact-info {
            margin: 15px 0;
            text-align: center;
        }
        
        .section {
            margin-bottom: 20px;
        }
        
        p {
            margin-bottom: 10px;
        }
        
        ul {
            margin-left: 20px;
            margin-bottom: 15px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        .experience {
            margin-bottom: 15px;
        }
        
        .experience-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .experience-title {
            font-weight: bold;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .skill {
            background-color: #e8f4fc;
            padding: 5px 10px;
            border-radius: 15px;
            color: #3498db;
        }
        
        .hobby {
            background-color: #e6f7ee;
            padding: 5px 10px;
            border-radius: 15px;
            color: #27ae60;
        }
        
        .weakness {
            background-color: #fdeaea;
            padding: 5px 10px;
            border-radius: 15px;
            color: #e74c3c;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        textarea {
            min-height: 100px;
        }
        
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .social-links {
            text-align: center;
            margin-top: 15px;
        }
        
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>AGIL LUKMAN HAKIM MUCHDI</h1>
            <img src="c:\Users\MyBook Hype AMD\AppData\Local\Packages\5319275A.WhatsAppDesktop_cv1g1gvanyjgm\TempState\EB854E7DF0F079FA3BCB336E87383F9E\WhatsApp Image 2025-09-01 at 08.34.19_c8769e19.jpg" alt="Foto Profil" class="profile-img">
            
            <div class="contact-info">
                <p><strong>TTL:</strong> Kediri, 15 Agustus 2006</p>
                <p><strong>Alamat:</strong> Jalan Budi Utomo No. 40 Pagu, Kec. Pagu, Kab. Kediri</p>
                <p><strong>Telepon:</strong> 087790374991</p>
                <p><strong>Email:</strong> agillukman89@gmail.com | 5025241037@student.its.ac.id</p>
            </div>
        </header>
        
        <section class="section">
            <h2>LATAR BELAKANG</h2>
            <p>Seorang mahasiswa Teknik Informatika yang ingin menekuni bidang teknologi dan finance sebagai landasan untuk kedepannya menjadi seorang <em>businessman</em> yang bergerak di bidang teknologi.</p>
        </section>
        
        <section class="section">
            <h2>HOBI</h2>
            <div class="skills-container">
                <span class="hobby">Bermain Game</span>
                <span class="hobby">Badminton</span>
                <span class="hobby">Tidur</span>
            </div>
        </section>
        
        <section class="section">
            <h2>PENGALAMAN</h2>
            
            <div class="experience">
                <div class="experience-header">
                    <span class="experience-title">Remaja Masjid</span>
                    <span>Jul 2021 - Jul 2024</span>
                </div>
                <ul>
                    <li>Menjadi panitia pada hari-hari besar keagamaan</li>
                    <li>Menjadi Ketua Remaja Masjid</li>
                </ul>
            </div>
            
            <div class="experience">
                <div class="experience-header">
                    <span class="experience-title">Seller Online Shop</span>
                    <span>Feb 2021 - Des 2021</span>
                </div>
                <ul>
                    <li>Mendesain logo dan tabel produk</li>
                    <li>Mempromosikan barang yang dijual</li>
                </ul>
            </div>
            
            <div class="experience">
                <div class="experience-header">
                    <span class="experience-title">Junior Programmer</span>
                    <span>Jul 2023 - Sekarang</span>
                </div>
                <ul>
                    <li>Membuat program dengan Python, C/C++</li>
                </ul>
            </div>
        </section>
        
        <section class="section">
            <h2>RIWAYAT PENDIDIKAN</h2>
            <table>
                <tr>
                    <th>Tahun</th>
                    <th>Institusi</th>
                    <th>Jurusan</th>
                </tr>
                <tr>
                    <td>2019 - 2021</td>
                    <td>MTs Negeri 1 Kediri</td>
                    <td>MIPA</td>
                </tr>
                <tr>
                    <td>2021 - 2024</td>
                    <td>SMA Negeri 2 Pare</td>
                    <td>MIPA</td>
                </tr>
            </table>
        </section>
        
        <section class="section">
            <h2>KEMAMPUAN</h2>
            <div class="skills-container">
                <span class="skill">Koordinasi</span>
                <span class="skill">Komunikasi</span>
                <span class="skill">Problem Solving</span>
                <span class="skill">Komitmen</span>
                <span class="skill">Adaptabilitas</span>
            </div>
        </section>
        
        <section class="section">
            <h2>KEKURANGAN</h2>
            <div class="skills-container">
                <span class="weakness">Meremehkan hal kecil</span>
                <span class="weakness">Kurang kreatif</span>
            </div>
        </section>
        
        <section class="section">
            <h2>HUBUNGI SAYA</h2>
            <form>
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                
                <button type="submit">Kirim Pesan</button>
            </form>
        </section>
        
        <section class="section">
            <h2>MEDIA SOSIAL</h2>
            <div class="social-links">
                <a href="https://instagram.com/agil_7852" target="_blank">Instagram</a>
                <a href="https://www.linkedin.com/in/agil-lukman-hakim-muchdi-852a6a309" target="_blank">LinkedIn</a>
            </div>
        </section>
    </div>
</body>
</html>
```

<img width="1920" height="1020" alt="Screenshot 2025-09-01 083534" src="https://github.com/user-attachments/assets/6ddc6396-eb87-483d-8e50-d3e37307615c" />
<img width="1920" height="1020" alt="Screenshot 2025-09-01 083542" src="https://github.com/user-attachments/assets/b0fb9898-9a3e-4ae0-936b-9fba26e975e9" />
<img width="1920" height="1020" alt="Screenshot 2025-09-01 084645" src="https://github.com/user-attachments/assets/148768be-3d67-4891-ac5d-bee56afaf1a7" />


