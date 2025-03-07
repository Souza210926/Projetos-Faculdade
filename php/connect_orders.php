<?php

include 'db.php';


$response = array("success" => false);

// Verificar a conexão com o banco de dados
if ($conn->connect_error) {
    $response['message'] = "Falha na conexão com o banco de dados.";
} else {
    
    $sql = "SELECT * FROM orders";  
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $orders = array();
        while($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        
        $response["success"] = true;
        $response["orders"] = $orders;  
    } else {
        $response['message'] = "Nenhum pedido encontrado.";
    }
}


$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
