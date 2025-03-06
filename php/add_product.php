<?php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $descripition = mysqli_real_escape_string($conn, $_POST['descripition']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    if (!empty($name) && !empty($descripition) && !empty($price) && !empty($quantity)) {
        
        $sql = "INSERT INTO products (name, descripition, price, quantity) 
                VALUES ('$name', '$descripition', '$price', '$quantity')";

        if ($conn->query($sql) === TRUE) {
            echo "Produto adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar o produto: " . $conn->error;
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
} else {
    echo "Método de requisição inválido.";
}

$conn->close();
?>