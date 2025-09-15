# 🌐 Belajar CSS

## P4.html

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeeksforGeeks - Portfolio</title>
    <link rel="stylesheet" href="P4.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="logo">GeeksforGeeks</h1>
            <p class="tagline">A Computer Science Portal for Geeks</p>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="portfolio-section">
                <h2>Portfolio</h2>
                
                <div class="cards-container">
                    <div class="card html-card">
                        <div class="card-header">
                            <h3>HTML</h3>
                        </div>
                        <div class="card-content">
                            <h4>HTML Tutorials</h4>
                            <p>HTML stands for HyperText Markup Language. It is used to design web pages using markup language. HTML is the combination of Hypertext and Markup language. Hypertext defines the link between the web pages.</p>
                            <a href="https://www.w3schools.com/html/" target="_blank" class="card-link">Learn More</a>
                        </div>
                    </div>

                    <div class="card css-card">
                        <div class="card-header">
                            <h3>CSS</h3>
                        </div>
                        <div class="card-content">
                            <h4>CSS Tutorials</h4>
                            <p>CSS (Cascading Style Sheets) is used to set the style in web pages that contain HTML elements. It sets the background color, font-size, font-family, color, etc property of elements on a web page.</p>
                            <a href="https://www.w3schools.com/css/" target="_blank" class="card-link">Learn More</a>
                        </div>
                    </div>

                    <div class="card php-card">
                        <div class="card-header">
                            <h3>PHP</h3>
                        </div>
                        <div class="card-content">
                            <h4>PHP Tutorials</h4>
                            <p>PHP is a server-side scripting language designed specifically for web development. PHP is an acronym for "PHP: Hypertext Preprocessor". PHP is a server-side scripting language designed specifically for web development.</p>
                            <a href="https://www.w3schools.com/php/" target="_blank" class="card-link">Learn More</a>
                        </div>
                    </div>

                    <div class="card javascript-card">
                        <div class="card-header">
                            <h3>JAVASCRIPT</h3>
                        </div>
                        <div class="card-content">
                            <h4>JavaScript Tutorials</h4>
                            <p>JavaScript is the world most popular lightweight, interpreted compiled programming language. It is also known as scripting language for web pages. It is well-known for the development of web pages.</p>
                            <a href="https://www.w3schools.com/js/" target="_blank" class="card-link">Learn More</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>

```

## P4.css

```css
/* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header styles */
header {
    background-color: #fff;
    border-bottom: 1px solid #e0e0e0;
    padding: 20px 0;
}

.logo {
    color: #2e8b57;
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 5px;
}

.tagline {
    color: #666;
    font-size: 14px;
    margin: 0;
}

/* Main content */
main {
    padding: 40px 0;
}

.portfolio-section h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 30px;
    font-weight: normal;
}

/* Cards container */
.cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Card styles */
.card {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}


.card-header {
    padding: 15px 20px;
    color: white;
    font-weight: bold;
    text-align: center;
}

.card-header h3 {
    font-size: 18px;
    margin: 0;
}

.card-content {
    padding: 20px;
}

.card-content h4 {
    color: #333;
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: bold;
}

.card-content p {
    color: #666;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.card-link {
    display: inline-block;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.card-link:hover {
    background-color: #0056b3;
    text-decoration: none;
}

/* Individual card colors */
.html-card .card-header {
    background: linear-gradient(135deg, #4a90e2, #357abd);
}

.css-card .card-header {
    background: linear-gradient(135deg, #50c878, #2e8b57);
}

.php-card .card-header {
    background: linear-gradient(135deg, #4a90e2, #357abd);
}

.javascript-card .card-header {
    background: linear-gradient(135deg, #50c878, #2e8b57);
}
```

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/9a2a6518-aeea-4c3f-b273-672fa3b0f183" />

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/befb268e-0bfb-4fef-8a98-7db454c947c2" />

