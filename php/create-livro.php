<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $data_lancamento = $_POST['data_lancamento'];
    $editora = $_POST['editora'];
    $stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, data_lancamento, editora) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titulo, $autor, $data_lancamento, $editora]);
    header('Location: read-livro.php');
}
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="../css/style-create.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Livros</h1><br>
        <nav>
            <ul>
                <li><a href="../index.php" class="btn">Home</a></li>
                <li><a href="read-livro.php" class="btn">Listar Livros</a></li>
                <li><a href="create-livro.php" class="btn">Adicionar Livro</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="wrapper">
             <h2>Adicionar Livro</h2>
            <form method="POST">
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" required> <br>
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required> <br>
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" id="data_lancamento" name="data_lancamento" required><br>
                <label for="editora">Editora:</label>
                <input type="text" id="editora" name="editora" required> <br>
                <button type="submit">Adicionar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Livros</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const tituloInput = document.querySelector('#titulo');
            const autorInput = document.querySelector('#autor');
            const dataLancamentoInput = document.querySelector('#data_lancamento');
            const editoraInput = document.querySelector('#editora');

            form.addEventListener('submit', function(event) {
               
                if (!tituloInput.value || !autorInput.value || !dataLancamentoInput.value || !editoraInput.value) {
                    alert('Preencha todos os campos.');
                    event.preventDefault();
                }
            });

            const addButton = document.querySelector('button[type="submit"]');
            addButton.addEventListener('mouseover', function() {
                this.style.backgroundColor = '#0066ff';
            });

            addButton.addEventListener('mouseout', function() {
                this.style.backgroundColor = '#9f12c2';
            });

            listarLivros();
        });
    </script>
</body>
</html>