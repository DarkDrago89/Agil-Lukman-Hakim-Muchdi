# Latihan Javascript

## 1. Web : [DarkDrago89.github.io](https://darkdrago89.github.io/)
### Buatlah sebuah form registrasi yang terdiri dari nama mahasiswa, nim, mata kuliah, dan dosen. Form registrasi ini memiliki aturan sebagai berikut. Ketika pengguna sistem akan mengisikan data nama dengan memasukkan huruf tertentu maka akan muncul rekomendasi tertentu. Gunakan referensi di internet ataupun yang lainnya untuk memecahkan kasus tersebut.
## Code .html
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


