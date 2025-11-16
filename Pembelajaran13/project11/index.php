<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto - PHP Backend</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 30px; }
        .upload-section { margin-bottom: 30px; padding: 20px; border: 2px dashed #ddd; border-radius: 8px; }
        input[type="file"] { margin: 10px 0; }
        button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #0056b3; }
        .photos-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 30px; }
        .photo-card { border: 1px solid #ddd; border-radius: 8px; overflow: hidden; background: white; }
        .photo-card img { width: 100%; height: 200px; object-fit: cover; }
        .photo-info { padding: 15px; }
        .photo-info h3 { font-size: 14px; margin-bottom: 5px; color: #333; word-break: break-all; }
        .photo-info p { font-size: 12px; color: #666; margin: 3px 0; }
        .delete-btn { background: #dc3545; width: 100%; margin-top: 10px; }
        .delete-btn:hover { background: #c82333; }
        .message { padding: 15px; margin: 10px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📸 Upload Foto - PHP Backend API</h1>
        
        <div class="upload-section">
            <h2>Upload Foto</h2>
            <form id="uploadForm">
                <input type="text" id="uploadedBy" placeholder="Nama Anda (opsional)" style="padding: 8px; width: 100%; margin: 10px 0;">
                <input type="file" id="photoInput" name="photos[]" multiple accept="image/*" required>
                <button type="submit">Upload Foto</button>
            </form>
            <div id="message"></div>
        </div>

        <h2>Galeri Foto</h2>
        <div id="photosGrid" class="photos-grid"></div>
    </div>

    <script>
        const API_URL = 'api';

        // Upload photos
        document.getElementById('uploadForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData();
            const files = document.getElementById('photoInput').files;
            const uploadedBy = document.getElementById('uploadedBy').value || 'Guest';

            for (let file of files) {
                formData.append('photos[]', file);
            }
            formData.append('uploaded_by', uploadedBy);

            try {
                const response = await fetch(`${API_URL}/upload.php`, {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                
                showMessage(result.success ? 'success' : 'error', result.message);
                
                if (result.success) {
                    document.getElementById('uploadForm').reset();
                    loadPhotos();
                }
            } catch (error) {
                showMessage('error', 'Error: ' + error.message);
            }
        });

        // Load photos
        async function loadPhotos() {
            try {
                const response = await fetch(`${API_URL}/get_photos.php`);
                const result = await response.json();
                
                if (result.success) {
                    displayPhotos(result.data.photos);
                }
            } catch (error) {
                console.error('Error loading photos:', error);
            }
        }

        // Display photos
        function displayPhotos(photos) {
            const grid = document.getElementById('photosGrid');
            grid.innerHTML = '';

            photos.forEach(photo => {
                const card = document.createElement('div');
                card.className = 'photo-card';
                card.innerHTML = `
                    <img src="${photo.url}" alt="${photo.original_name}">
                    <div class="photo-info">
                        <h3>${photo.original_name}</h3>
                        <p>📁 ${photo.filename}</p>
                        <p>📏 ${formatBytes(photo.size)}</p>
                        <p>👤 ${photo.uploaded_by}</p>
                        <p>📅 ${new Date(photo.uploaded_at).toLocaleString('id-ID')}</p>
                        <button class="delete-btn" onclick="deletePhoto(${photo.id})">🗑️ Hapus</button>
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        // Delete photo
        async function deletePhoto(id) {
            if (!confirm('Yakin ingin menghapus foto ini?')) return;

            try {
                const response = await fetch(`${API_URL}/delete_photo.php?id=${id}`, {
                    method: 'DELETE'
                });
                const result = await response.json();
                
                showMessage(result.success ? 'success' : 'error', result.message);
                
                if (result.success) {
                    loadPhotos();
                }
            } catch (error) {
                showMessage('error', 'Error: ' + error.message);
            }
        }

        // Helper functions
        function showMessage(type, text) {
            const messageDiv = document.getElementById('message');
            messageDiv.className = `message ${type}`;
            messageDiv.textContent = text;
            setTimeout(() => messageDiv.textContent = '', 5000);
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }

        // Load photos on page load
        loadPhotos();
    </script>
</body>
</html>