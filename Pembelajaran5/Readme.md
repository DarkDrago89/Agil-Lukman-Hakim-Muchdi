# 🌐 Latihan Javascript

## 1. Web : [Form Regist](https://darkdrago89.github.io/)
### Sebuah form registrasi yang terdiri dari nama mahasiswa, nim, mata kuliah, dan dosen. Form registrasi ini memiliki aturan sebagai berikut. Ketika pengguna sistem akan mengisikan data nama dengan memasukkan huruf tertentu maka akan muncul rekomendasi tertentu.
## Code
``` html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Registrasi Mahasiswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f5f5f5;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      width: 350px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }
    label {
      display: block;
      margin-top: 10px;
    }
    input, select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    #suggestions {
      border: 1px solid #ccc;
      max-height: 100px;
      overflow-y: auto;
      background: #fff;
      margin-top: 2px;
      border-radius: 5px;
      display: none;
      position: absolute;
      width: 320px;
      z-index: 10;
    }
    #suggestions div {
      padding: 8px;
      cursor: pointer;
    }
    #suggestions div:hover {
      background-color: #eee;
    }
    button {
      margin-top: 15px;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

<h2>Form Registrasi Mahasiswa</h2>

<form id="regForm">
  <label for="nama">Nama Mahasiswa:</label>
  <input type="text" id="nama" name="nama" autocomplete="off">
  <div id="suggestions"></div>

  <label for="nim">NIM:</label>
  <input type="text" id="nim" name="nim">

  <label for="matkul">Mata Kuliah:</label>
  <input type="text" id="matkul" name="matkul">

  <label for="dosen">Dosen:</label>
  <input type="text" id="dosen" name="dosen">

  <button type="submit">Submit</button>
</form>

<script>
  // Data rekomendasi nama
  const namaMahasiswa = [
    "Andi Pratama", "Budi Santoso", "Citra Dewi", "Dian Purnama", 
    "Eko Saputra", "Fajar Baskoro", "Gita Lestari", "Hendra Wijaya"
  ];

  const namaInput = document.getElementById("nama");
  const suggestionsBox = document.getElementById("suggestions");

  // Event ketika user mengetik nama
  namaInput.addEventListener("input", function() {
    const inputVal = this.value.toLowerCase();
    suggestionsBox.innerHTML = "";

    if (inputVal) {
      const filtered = namaMahasiswa.filter(nama => 
        nama.toLowerCase().includes(inputVal)
      );

      if (filtered.length > 0) {
        suggestionsBox.style.display = "block";
        filtered.forEach(nama => {
          const div = document.createElement("div");
          div.textContent = nama;
          div.onclick = function() {
            namaInput.value = this.textContent;
            suggestionsBox.style.display = "none";
          };
          suggestionsBox.appendChild(div);
        });
      } else {
        suggestionsBox.style.display = "none";
      }
    } else {
      suggestionsBox.style.display = "none";
    }
  });

  document.getElementById("regForm").addEventListener("submit", function(e) {
    e.preventDefault();
    if (!namaInput.value || !document.getElementById("nim").value) {
      alert("Nama dan NIM wajib diisi!");
    } else {
      alert("Form berhasil disubmit!");
    }
  });
</script>

</body>
</html>
```

## 2. Web : [Kode Pos](https://darkdrago89.github.io/P5Nomer2/)
### Menampilkan kode pos berdasarkan input provinsi, kabupaten/kota, Kecamatan, dan Kelurahan/Desa.
## Code
```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cari Kode Pos</title>
  <style>
    body { font-family: sans-serif; margin: 20px; }
    select { margin: 8px 0; padding: 5px; width: 100%; max-width: 300px; }
    .result { margin-top: 20px; }
    .alamat { margin-top: 10px; font-style: italic; }
  </style>
</head>
<body>
  <h2>Cari Kode Pos (dengan Desa / Kelurahan)</h2>

  <label for="provinsi">Provinsi:</label><br>
  <select id="provinsi">
    <option value="">-- Pilih Provinsi --</option>
  </select><br>

  <label for="kabkota">Kabupaten / Kota:</label><br>
  <select id="kabkota" disabled>
    <option value="">-- Pilih Kabupaten / Kota --</option>
  </select><br>

  <label for="kecamatan">Kecamatan:</label><br>
  <select id="kecamatan" disabled>
    <option value="">-- Pilih Kecamatan --</option>
  </select><br>

  <label for="desa">Desa / Kelurahan:</label><br>
  <select id="desa" disabled>
    <option value="">-- Pilih Desa / Kelurahan --</option>
  </select><br>

  <div class="result" id="hasilKodePos"></div>
  <div class="alamat" id="alamatTerpilih"></div>

  <script>
    const BASE = 'https://alamat.thecloudalert.com/api';

    const selProv = document.getElementById('provinsi');
    const selKab = document.getElementById('kabkota');
    const selKec = document.getElementById('kecamatan');
    const selDesa = document.getElementById('desa');
    const divHasil = document.getElementById('hasilKodePos');
    const divAlamat = document.getElementById('alamatTerpilih');

    async function fetchAPI(path, params = {}) {
      const url = new URL(BASE + path);
      Object.entries(params).forEach(([k, v]) => {
        if (v !== undefined && v !== null && v !== '') {
          url.searchParams.append(k, v);
        }
      });
      const resp = await fetch(url.toString());
      if (!resp.ok) {
        throw new Error(`HTTP ${resp.status} saat fetch ${url.toString()}`);
      }
      const json = await resp.json();
      return json;
    }

    async function loadProvinsi() {
      try {
        const res = await fetchAPI('/provinsi/get/');
        if (res.result && Array.isArray(res.result)) {
          res.result.forEach(p => {
            const opt = document.createElement('option');
            opt.value = p.id;
            opt.text = p.text;
            selProv.add(opt);
          });
        }
      } catch (err) {
        console.error('Error loadProvinsi:', err);
        divHasil.innerText = 'Gagal memuat provinsi.';
      }
    }

    selProv.addEventListener('change', async () => {
      const provId = selProv.value;
      selKab.innerHTML = `<option value="">-- Pilih Kabupaten / Kota --</option>`;
      selKec.innerHTML = `<option value="">-- Pilih Kecamatan --</option>`;
      selDesa.innerHTML = `<option value="">-- Pilih Desa / Kelurahan --</option>`;
      divHasil.innerText = '';
      divAlamat.innerText = '';
      selKab.disabled = true;
      selKec.disabled = true;
      selDesa.disabled = true;
      if (!provId) return;

      try {
        const res = await fetchAPI('/kabkota/get/', { d_provinsi_id: provId });
        if (res.result && Array.isArray(res.result)) {
          res.result.forEach(k => {
            const opt = document.createElement('option');
            opt.value = k.id;
            opt.text = k.text;
            selKab.add(opt);
          });
          selKab.disabled = false;
        }
      } catch (err) {
        console.error('Error loadKabkota:', err);
        divHasil.innerText = 'Gagal memuat kabupaten / kota.';
      }
    });

    selKab.addEventListener('change', async () => {
      const kabId = selKab.value;
      selKec.innerHTML = `<option value="">-- Pilih Kecamatan --</option>`;
      selDesa.innerHTML = `<option value="">-- Pilih Desa / Kelurahan --</option>`;
      divHasil.innerText = '';
      divAlamat.innerText = '';
      selKec.disabled = true;
      selDesa.disabled = true;
      if (!kabId) return;

      try {
        const res = await fetchAPI('/kecamatan/get/', { d_kabkota_id: kabId });
        if (res.result && Array.isArray(res.result)) {
          res.result.forEach(kec => {
            const opt = document.createElement('option');
            opt.value = kec.id;
            opt.text = kec.text;
            selKec.add(opt);
          });
          selKec.disabled = false;
        }
      } catch (err) {
        console.error('Error loadKecamatan:', err);
        divHasil.innerText = 'Gagal memuat kecamatan.';
      }
    });

    selKec.addEventListener('change', async () => {
      const kecId = selKec.value;
      selDesa.innerHTML = `<option value="">-- Pilih Desa / Kelurahan --</option>`;
      divHasil.innerText = '';
      divAlamat.innerText = '';
      selDesa.disabled = true;
      if (!kecId) return;

      try {
        const res = await fetchAPI('/kelurahan/get/', { d_kecamatan_id: kecId });
        if (res.result && Array.isArray(res.result)) {
          res.result.forEach(desa => {
            const opt = document.createElement('option');
            opt.value = desa.id;
            opt.text = desa.text;
            selDesa.add(opt);
          });
          selDesa.disabled = false;
        }
      } catch (err) {
        console.error('Error loadDesa:', err);
        divHasil.innerText = 'Gagal memuat desa / kelurahan.';
      }
    });

    selDesa.addEventListener('change', async () => {
      const kabId = selKab.value;
      const kecId = selKec.value;
      const desaId = selDesa.value;
      divHasil.innerText = '';
      divAlamat.innerText = '';

      if (!kabId || !kecId || !desaId) return;

      // Tampilkan alamat lengkap
      const namaProv = selProv.options[selProv.selectedIndex].text;
      const namaKab = selKab.options[selKab.selectedIndex].text;
      const namaKec = selKec.options[selKec.selectedIndex].text;
      const namaDesa = selDesa.options[selDesa.selectedIndex].text;
      divAlamat.innerText = `Alamat: ${namaDesa}, ${namaKec}, ${namaKab}, ${namaProv}`;

      try {
        const res = await fetchAPI('/kodepos/get/', { d_kabkota_id: kabId, d_kecamatan_id: kecId });
        if (res.result && Array.isArray(res.result) && res.result.length > 0) {
          // ambil satu kode pos (misalnya pertama)
          const kode = res.result[0].text;
          divHasil.innerHTML = `<strong>Kode Pos:</strong> ${kode}`;
        } else {
          divHasil.innerText = 'Kode pos tidak ditemukan.';
        }
      } catch (err) {
        console.error('Error loadKodepos:', err);
        divHasil.innerText = 'Gagal memuat kode pos.';
      }
    });

    // Inisialisasi
    loadProvinsi();
  </script>
</body>
</html>
```

## 3. Web : [Dropdown List](https://darkdrago89.github.io/P5Nomer3/)
### Membuat dropdown list dengan jenis-jenis motor dan mobil.
## Code
```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dropdown Dinamis Kendaraan</title>
  <style>
    body { font-family: Arial; margin: 30px; }
    label { display: block; margin-top: 15px; }
    select { width: 200px; padding: 5px; }
  </style>
</head>
<body>

  <h2>Form Kendaraan</h2>

  <label>Jenis Kendaraan:</label>
  <select id="selJenis">
    <option value="">-- Pilih Jenis --</option>
  </select>

  <label>Merk:</label>
  <select id="selMerk" disabled>
    <option value="">-- Pilih Merk --</option>
  </select>

  <label>Model:</label>
  <select id="selModel" disabled>
    <option value="">-- Pilih Model --</option>
  </select>

  <script>
    const selJenis = document.getElementById("selJenis");
    const selMerk = document.getElementById("selMerk");
    const selModel = document.getElementById("selModel");

    const dataKendaraan = {
      "Motor": {
        "Yamaha": ["NMAX", "Aerox", "Vixion"],
        "Honda": ["Beat", "Vario", "CBR"],
        "Kawasaki": ["Ninja", "Z1000"],
      },
      "Mobil": {
        "Toyota": ["Avanza", "Innova", "GR Yaris"],
        "Honda": ["Civic", "Accord", "BR-V"],
        "Suzuki": ["Swift", "Ertiga"],
      }
    };

    // Isi dropdown jenis
    Object.keys(dataKendaraan).forEach(jenis => {
      const opt = document.createElement("option");
      opt.value = jenis;
      opt.textContent = jenis;
      selJenis.appendChild(opt);
    });

    selJenis.addEventListener("change", () => {
      const jenisTerpilih = selJenis.value;

      // Reset merk & model
      selMerk.innerHTML = `<option value="">-- Pilih Merk --</option>`;
      selModel.innerHTML = `<option value="">-- Pilih Model --</option>`;
      selModel.disabled = true;

      if (jenisTerpilih === "") {
        selMerk.disabled = true;
        return;
      }

      const merkList = dataKendaraan[jenisTerpilih];
      Object.keys(merkList).forEach(merk => {
        const opt = document.createElement("option");
        opt.value = merk;
        opt.textContent = merk;
        selMerk.appendChild(opt);
      });
      selMerk.disabled = false;
    });

    selMerk.addEventListener("change", () => {
      const jenisTerpilih = selJenis.value;
      const merkTerpilih = selMerk.value;

      // Reset model
      selModel.innerHTML = `<option value="">-- Pilih Model --</option>`;

      if (merkTerpilih === "") {
        selModel.disabled = true;
        return;
      }

      const modelList = dataKendaraan[jenisTerpilih][merkTerpilih];
      modelList.forEach(model => {
        const opt = document.createElement("option");
        opt.value = model;
        opt.textContent = model;
        selModel.appendChild(opt);
      });
      selModel.disabled = false;
    });
  </script>

</body>
</html>
```
