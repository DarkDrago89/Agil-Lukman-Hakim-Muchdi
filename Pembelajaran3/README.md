# 🌐 Pembuatan Table, Form, dan Frame

## Table HTML
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Make Table, form, frame, Hyperlink</title>
</head>
<body bg colour = "white">
    <font size = "4" color = "black" face = "times new roman">
    <table border = "2">
        <caption align = `top`><b>Tabel Daftar Mahasiswa di ITS</b></caption>
    <tr bgcolor = "grey">
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">NIM</th>
        <th rowspan="2">Jurusan</th> 
        <th colspan="2">Nilai</th>
    </tr>
    <tr bgcolor = "grey">
        <th>UTS</th>
        <th>UAS</th>
    </tr>
    <tr>
        <td align = "left">1</td>
        <td align = "left">Agil Lukman Hakim Muchdi</td>
        <td align = "left">5025241037</td>
        <td align = "left">Teknik Informatika</td>
        <td align = "center">85</td>
        <td align = "center">90</td>
    <tr>
        <td align = "left">2</td>
        <td align = "left">Budi Santoso</td>
        <td align = "left">5025241300</td>
        <td align = "left">Teknik Informatika</td>
        <td align = "center">80</td>
        <td align = "center">85</td>
    </tr>
    <tr>
    </table>
</body>
</html>

```
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/c20f413b-74c1-4f83-b722-4ff953194bc8" />

## Form HTML
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi</title>  
    <meta charset="UTF-8" />
    <meta name="viewport" content="="width=device-width, initial-scale=1.0" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding : 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: "white";
        }

        .main {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow:inset 0 0 25px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        .main h2 {
            color: "blue";
            margin-bottom: 20px;
        }

        .label{
            display: block;
            margin-bottom: 20px;
            color: "black";
            font-weight: bold;
        }

        input [type="text"],
        input [type="email"],
        input [type="password"],
        select {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #000000;
            border-radius: 5px;
        }
         button[type="submit"]{
            padding: 15 px;
            border-radius: 10px;
            border: none;
            background-color: "lightblue";
            color: black;
            cursor: pointer;
            width: 90%;
            font-size: 18px;
         }
    </style>
</head>
<body> 
    <div class="main">
        <h2>Form Registrasi</h2>
        <form action="" method="post">
            <label class="label">Nama Lengkap:
                <input type="text" id= "Nama Lengkap" name="nama" required>
            </label>
            <label class="label">Email:
                <input type="email" id="email" name="email" required>
            </label>
            <label class="label">Password:
                <input type="password" name="password" required>
            </label>
            <label class="label">Jenis Kelamin:
                <select name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </label>
            <label class="label">Jurusan:
                <select name="jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="ti">Teknik Informatika</option>
                    <option value="si">Sistem Informasi</option>
                    <option value="tk">Teknik Komputer</option>
                    <option value="ka">Komputerisasi Akuntansi</option>
                </select>
            </label>
            <label class="contact">Kontak:</label>
            <input type="text" id="contact" name="contact" required>


            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
```

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/88fcf586-67e1-4a6c-9d1f-5d0efaa13563" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/2b0b6061-b12d-4b55-906e-28c1aec679eb" />

## Frame
### HTML
```html
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="P3css.css">
</head>
<body>
	<div class="wrap">
		<div class="header">			
			<h1>Malas Ngoding</h1>
			<p>Tutorial belajar membuat layout website sederhana</p>
		</div>
		<div class="menu">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">HTML</a></li>
				<li><a href="#">CSS</a></li>
				<li><a href="#">PHP</a></li>
				<li><a href="#">Javascript</a></li>				
			</ul>
		</div>
		<div class="badan">			
			<div class="sidebar">
				sidebar
				<ul>
					<li><a href="#">Tutorial HTML dasar</a></li>
					<li><a href="#">Tutorial CSS dasar</a></li>
					<li><a href="#">Tutorial PHP dasar</a></li>
					<li><a href="#">Tutorial JQuery dasar</a></li>				
				</ul>
			</div>
			<div class="content">
				content
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			footer
		</div>
	</div>
</body>
</html>
```

### CSS

```css
.wrap{
	background: blue;
	width: 900px;
	margin: 10px auto;
}
 
/*bagian header*/
.wrap .header{
	background: green;
	/*height: 50px;*/
	padding: 2px 10px;
}
 
/*akhir header*/
 
/*bagian menu*/
.wrap .menu{
	background: yellow;
}
 
.wrap .menu ul{
	padding: 0;
	margin: 0;
	background: yellow;
	overflow: hidden;
}
 
.wrap .menu ul li{
	float: left;
	list-style-type: none;
	padding: 10px;
}
/*akhir menu*/
 
.clear{
	clear: both;
}
 
.badan{
	height: 450px;
}
/*bagian sidebar*/
.wrap .badan .sidebar{
	background: orange;
	float: left;	
	width: 25%;
	height: 100%;
}
 
/*akhir sidebar*/
 
.wrap .badan .content{
	background: red;
	float: left;
	height: 100%;
	width: 75%;	
}
 
.wrap .footer{
	width: 100%;
	padding: 10px;
}
```

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/7ba83abb-a061-4ada-bb43-1bdaff1c04bf" />
