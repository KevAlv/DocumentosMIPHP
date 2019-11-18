<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "id11393087_parcial2";
    $table = "foja"; // lets create a table named Employees.
    $table2 = "documento"; // lets create a table named Employees.
    // we will get actions from the app to do operations in the database...
    $action = $_POST["action"]; 
    // Create Connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    // Check Connection
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
        return;
    }
    if("GET_ALL" == $action){
        $db_data = array();
        $sql = "SELECT Nro,Page,Image,Contenido,Id_documento,CodExpediente from $table ORDER BY Nro ASC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $db_data[] = $row;
            }
            // Send back the complete records as a json
            echo json_encode($db_data);
        }else{
            echo "error";
        }
        $conn->close();
        return;
    }
    if("GET_ALL_DOCUMENTS" == $action){
        $db_data = array();
        $sql = "SELECT CodExpediente,Id,Documento,Fecha from Documento ORDER BY Fecha DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $db_data[] = $row;
            }
            // Send back the complete records as a json
            echo json_encode($db_data);
        }else{
            echo "error";
        }
        $conn->close();
        return;
    }
?>