<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once 'conexion.php';

function respond($success, $data = null, $error = null, $code = 200) {
    http_response_code($code);
    echo json_encode(['success' => $success, 'data' => $data, 'error' => $error]);
    exit;
}

function validateSoci($data, $requireFields = true) {
    if ($requireFields) {
        foreach (['nom', 'cognoms', 'email'] as $f) {
            if (empty($data[$f])) return "Camp obligatori: $f";
        }
    }
    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return 'Format email invàlid';
    }
    if (!empty($data['dni']) && !preg_match('/^\d{8}[A-Za-z]$/', $data['dni'])) {
        return 'Format DNI invàlid (8 dígits + lletra)';
    }
    return null;
}

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($method === 'GET') {
    if ($id) {
        $stmt = $conexion->prepare("SELECT * FROM socis WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) respond(false, null, 'Soci no trobat', 404);
        respond(true, $row);
    } else {
        $stmt = $conexion->query("SELECT * FROM socis ORDER BY id DESC");
        respond(true, $stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}

if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
    $err = validateSoci($data, true);
    if ($err) respond(false, null, $err, 422);

    $stmt = $conexion->prepare("
        INSERT INTO socis (nom, cognoms, email, telefon, data_naixement, adreca, dni, tipus_quota, quota_mensual, actiu, observacions, data_alta)
        VALUES (:nom, :cognoms, :email, :telefon, :data_naixement, :adreca, :dni, :tipus_quota, :quota_mensual, :actiu, :observacions, CURDATE())
    ");
    $stmt->execute([
        ':nom'           => $data['nom'],
        ':cognoms'       => $data['cognoms'],
        ':email'         => $data['email'],
        ':telefon'       => $data['telefon'] ?? null,
        ':data_naixement'=> $data['data_naixement'] ?? null,
        ':adreca'        => $data['adreca'] ?? null,
        ':dni'           => $data['dni'] ?? null,
        ':tipus_quota'   => $data['tipus_quota'] ?? 'basic',
        ':quota_mensual' => $data['quota_mensual'] ?? null,
        ':actiu'         => isset($data['actiu']) ? (int)$data['actiu'] : 1,
        ':observacions'  => $data['observacions'] ?? null,
    ]);
    $newId = $conexion->lastInsertId();
    $stmt2 = $conexion->prepare("SELECT * FROM socis WHERE id = :id");
    $stmt2->execute([':id' => $newId]);
    respond(true, $stmt2->fetch(PDO::FETCH_ASSOC), null, 201);
}

if ($method === 'PUT') {
    if (!$id) respond(false, null, 'Falta ?id', 400);
    $data = json_decode(file_get_contents('php://input'), true) ?? [];
    $err = validateSoci($data, false);
    if ($err) respond(false, null, $err, 422);

    $fields = ['nom','cognoms','email','telefon','data_naixement','adreca','dni','tipus_quota','quota_mensual','actiu','observacions'];
    $set = [];
    $params = [':id' => $id];
    foreach ($fields as $f) {
        if (array_key_exists($f, $data)) {
            $set[] = "$f = :$f";
            $params[":$f"] = $data[$f];
        }
    }
    if (!$set) respond(false, null, 'Cap camp per actualitzar', 422);

    $stmt = $conexion->prepare("UPDATE socis SET " . implode(', ', $set) . " WHERE id = :id");
    $stmt->execute($params);
    if ($stmt->rowCount() === 0) respond(false, null, 'Soci no trobat', 404);
    $stmt2 = $conexion->prepare("SELECT * FROM socis WHERE id = :id");
    $stmt2->execute([':id' => $id]);
    respond(true, $stmt2->fetch(PDO::FETCH_ASSOC));
}

if ($method === 'DELETE') {
    if (!$id) respond(false, null, 'Falta ?id', 400);
    $stmt = $conexion->prepare("DELETE FROM socis WHERE id = :id");
    $stmt->execute([':id' => $id]);
    if ($stmt->rowCount() === 0) respond(false, null, 'Soci no trobat', 404);
    respond(true, ['deleted' => $id]);
}

respond(false, null, 'Mètode no suportat', 405);
