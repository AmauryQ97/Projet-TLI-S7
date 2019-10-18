<?php
  // Se connecter à la base de données
  include("connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];
  switch($request_method)
  {
    case 'GET':
      // Récupérer les patho
      if(!empty($_GET["id"]))
      {
        $id = intval($_GET["id"]);
        getPatho($id);
      }
      else
      {
        getPatho();
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;

      function getPatho()
  {
    global $conn;
    $query = "SELECT * FROM patho";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }
}

?>