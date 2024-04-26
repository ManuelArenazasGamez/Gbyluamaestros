<?php
$servername = "localhost";
$username = "root";
$password = "24022009";
$database = "escuelalua";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL para obtener la lista de alumnos por docente y su calificación
$sql = "SELECT 
            A.firstname AS AlumnoNombre,
            A.lastname AS AlumnoApellido,
            D.firstname AS DocenteNombre,
            D.lastname AS DocenteApellido,
            M.nombre AS Materia,
            M.calificacion AS Calificacion
        FROM 
            Materias M
        INNER JOIN 
            Alumno A ON M.idAlumnos = A.id
        INNER JOIN 
            Docente D ON M.idDocentes = D.id";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos por Docente</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            font-size: 16px;
        }
        .container {
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin: 20px auto;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Alumnos por Docente y Materia</h1>
        <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Docente</th>
                    <th>Alumno</th>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["DocenteNombre"] . " " . $row["DocenteApellido"]); ?></td>
                    <td><?php echo htmlspecialchars($row["AlumnoNombre"] . " " . $row["AlumnoApellido"]); ?></td>
                    <td><?php echo htmlspecialchars($row["Materia"]); ?></td>
                    <td><?php echo htmlspecialchars($row["Calificacion"]); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No se encontraron registros.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
