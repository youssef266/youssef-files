<!DOCTYPE html>
<html>
  <head>
  <title>product form</title>
<link rel="stylesheet" href="./formstyle.css" type="text/css" >  
</head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div>
      <form action="./insert_products.php" method="post">
        <h1>add product</h1>
        <div class="info">
          <div>
            <label for="name">product name:</label>
            <input type="text" name="name" required placeholder="product name">
          </div>
          <div>  
            <label for="description">description:</label>
            <input type="text" name="description" required placeholder="description">
          </div>
          <div>  
            <label for="price">price:</label>
            <input type="number" name="price" required placeholder="price">
          </div>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </body>
</html>