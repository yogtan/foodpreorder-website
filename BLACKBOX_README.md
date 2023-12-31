 # Product Page Design with CSS and HTML

This project demonstrates how to create a visually appealing product page using HTML and CSS. The goal is to provide a user-friendly interface that showcases product information, images, and other relevant details. The layout is designed to be responsive, ensuring a consistent user experience across different devices.

## Step 1: HTML Structure

The HTML structure serves as the foundation of the product page. It defines the overall layout and organization of the content. Here's a breakdown of the key elements:

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Product Page</h1>
  </header>

  <main>
    <div class="product-info">
      <div class="product-image">
        <img src="product-image.jpg" alt="Product Image">
      </div>
      <div class="product-details">
        <h2>Product Name</h2>
        <p>Product Description</p>
        <p>Price: $100</p>
      </div>
    </div>
  </main>

  <footer>
    <p>Copyright 2023</p>
  </footer>
</body>
</html>
```

- The `<header>` element contains the page title.
- The `<main>` element is where the main content of the page is placed, including the product information and image.
- The `<footer>` element contains copyright information.

## Step 2: CSS Styling

The CSS stylesheet is responsible for the visual appearance of the product page. It defines the layout, typography, colors, and other design elements. Here are some important CSS rules:

```css
body {
  font-family: 'Arial', sans-serif;
}

.product-info {
  display: flex;
  justify-content: space-between;
}

.product-image {
  width: 50%;
}

.product-details {
  width: 50%;


Generated by [BlackboxAI](https://www.blackbox.ai)