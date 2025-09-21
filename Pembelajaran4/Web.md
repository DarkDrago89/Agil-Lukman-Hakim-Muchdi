# 🌐 Landpage Webcourse

## P4Web.html
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>WebCourse Landing Page</title>
  <link rel="stylesheet" href="P4Web.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="logo">WebCourse</h1>
      <nav>
        <ul class="nav-links">
          <li><a href="#modules">Modules</a></li>
          <li><a href="#about">About</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <h2>Learn Web Development from Scratch</h2>
      <p>Start your journey with our beginner-friendly modules: HTML, CSS, and JavaScript.</p>
    </div>
  </section>

  <section id="modules" class="modules-section">
    <div class="container">
      <h2 class="section-title">Our Modules</h2>
      <div class="modules-grid">
        <a class="module-card" href="https://www.w3schools.com/html/" target="_blank" rel="noopener">
          <div class="module-icon">🟧</div>
          <h3>HTML Basics</h3>
          <p>Learn to structure web pages using HTML elements and best practices.</p>
        </a>
        <a class="module-card" href="https://www.w3schools.com/css/" target="_blank" rel="noopener">
          <div class="module-icon">🟦</div>
          <h3>CSS Styling</h3>
          <p>Style and layout your web pages beautifully with modern CSS.</p>
        </a>
        <a class="module-card" href="https://www.w3schools.com/js/" target="_blank" rel="noopener">
          <div class="module-icon">🟨</div>
          <h3>JavaScript</h3>
          <p>Add interactivity and dynamic features to your websites with JavaScript.</p>
        </a>
      </div>
    </div>
  </section>

  <section id="about" class="about-section">
    <div class="container">
      <h2>About WebCourse</h2>
      <p>
        WebCourse is designed for absolute beginners who want to start their web development journey. 
        Each module links to trusted resources so you can learn at your own pace.
      </p>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>&copy; 2025 WebCourse. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
```

## P4Web.css
```css
/* Reset and base styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'Segoe UI', Arial, sans-serif;
  background: #f8fafc;
  color: #1e293b;
  line-height: 1.6;
}
.container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

/* Header */
.header {
  background: #fff;
  border-bottom: 1px solid #e2e8f0;
  padding: 1.2rem 0;
  position: sticky;
  top: 0;
  z-index: 10;
}
.logo {
  font-size: 1.7rem;
  font-weight: bold;
  color: #2563eb;
  letter-spacing: 1px;
  display: inline-block;
}
.nav-links {
  list-style: none;
  gap: 2rem;
  margin: 0;
  padding: 0;       
  float: right;
  display: flex;
  align-items: center;
  
}
.nav-links a {
  text-decoration: none;
  color: #64748b;
  font-weight: 500;
  transition: color 0.2s;

}
.nav-links a:hover {
  color: #2563eb;
}

/* Hero */
.hero {
  background: linear-gradient(135deg, #60a5fa 0%, #818cf8 100%);
  color: #fff;
  padding: 4rem 0 3rem 0;
  text-align: center;
}
.hero h2 {
  font-size: 2.5rem;
  margin-bottom: 1rem;
}
.hero p {
  font-size: 1.2rem;
  opacity: 0.95;
}

/* Modules Section */
.modules-section {
  padding: 3rem 0;
}
.section-title {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 2rem;
  color: #1e293b;
}
.modules-grid {
  display: flex;
  gap: 2rem;
  justify-content: center;
  flex-wrap: wrap;
}
.module-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 16px rgba(30,41,59,0.08);
  padding: 2rem 1.5rem;
  text-align: center;
  width: 270px;
  text-decoration: none;
  color: inherit;
  transition: transform 0.2s, box-shadow 0.2s;
  border: 1px solid #e2e8f0;
}
.module-card:hover {
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 8px 32px rgba(59,130,246,0.13);
  border-color: #60a5fa;
}
.module-icon {
  font-size: 2.5rem;
  margin-bottom: 1rem;
}
.module-card h3 {
  font-size: 1.3rem;
  margin-bottom: 0.7rem;
  color: #2563eb;
}
.module-card p {
  color: #475569;
  font-size: 1rem;
}

/* About Section */
.about-section {
  background: #fff;
  padding: 2.5rem 0;
  margin-top: 2rem;
  border-top: 1px solid #e2e8f0;
}
.about-section h2 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: #1e293b;
}
.about-section p {
  color: #64748b;
  font-size: 1.05rem;
}

/* Footer */
.footer {
  background: #1e293b;
  color: #cbd5e1;
  text-align: center;
  padding: 1.5rem 0;
  margin-top: 2rem;
  font-size: 1rem;
}

/* Responsive */
@media (max-width: 900px) {
  .modules-grid {
    flex-direction: column;
    align-items: center;
  }
  .module-card {
    width: 90%;
    margin-bottom: 1.5rem;
  }
  .nav-links {
    float: none;
    justify-content: center;
    margin-top: 1rem;
  }
}
```

<img width="1920" height="1020" alt="Screenshot 2025-09-21 220031" src="https://github.com/user-attachments/assets/9939d1cd-3464-4b16-827f-a08de36ba8e8" />

<img width="1920" height="1020" alt="Screenshot 2025-09-21 220044" src="https://github.com/user-attachments/assets/e3a37f3e-1719-4166-ba91-c4e6038ac3c2" />

