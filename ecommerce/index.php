<?php include('php/db.php')?>

<div id="product-list">
    <?php
    $result = $conn->query("SELEC * FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='product'>
            <h3>{$row['name']}</h3>
            <p>{$row['descripition']}</p>
            <p>Price: $ {$row['price']}</p>
        </div>";
    }
    ?>
</div>
