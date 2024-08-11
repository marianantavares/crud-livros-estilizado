<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $data_lancamento = $_POST['data_lancamento'];
    $editora = $_POST['editora'];
    $stmt = $pdo->prepare("UPDATE livros SET titulo = ?, autor = ?, data_lancamento = ?, editora = ? WHERE id = ?");
    $stmt->execute([$titulo, $autor, $data_lancamento, $editora, $id]);
    header('Location: read-livro.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar livro</title>
    <link rel="stylesheet" href="../css/style-create.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Livros</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-livro.php">Listar Livros</a></li>
                <li><a href="create-livro.php">Adicionar Livro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="wrapper">
            <h2>Editar livro</h2>
            <form method="POST">
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" value="<?= $livro['titulo'] ?>" required>
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?= $livro['autor'] ?>" required>
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" id="data_lancamento" name="data_lancamento" value="<?= $livro['data_lancamento'] ?>" required>
                <label for="editora">Editora:</label>
                <input type="editora" id="editora" name="editora" value="<?= $livro['editora'] ?>" required>
                <br>
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Livros</p>
    </footer>
</body>
</html>


<script>

    const addButton = document.querySelector('button[type="submit"]');
        addButton.addEventListener('mouseover', function() {
        this.style.backgroundColor = '#8a0077';
        });

        addButton.addEventListener('mouseout', function() {
            this.style.backgroundColor = '#9f12c2';
        });

</script>