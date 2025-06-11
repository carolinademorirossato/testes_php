<?php
// Associação
class Aluno {
    public $nome;
    public function __construct($nome) {
        $this->nome = $nome;
    }
}

class Professor {
    public $nome;
    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function orientar(Aluno $aluno) {
        return "Professor {$this->nome} está orientando o aluno {$aluno->nome}.";
    }
}

// Agregação
class Turma {
    public $nome;
    public $alunos = [];
    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function adicionarAluno(Aluno $aluno) {
        $this->alunos[] = $aluno;
    }

    public function listarAlunos() {
        $lista = "<strong>Alunos da turma {$this->nome}:</strong><ul>";
        foreach ($this->alunos as $aluno) {
            $lista .= "<li>{$aluno->nome}</li>";
        }
        $lista .= "</ul>";
        return $lista;
    }
}

// Composição
class RegistroDeNotas {
    private $notas = [];

    public function adicionarNota($disciplina, $nota) {
        $this->notas[$disciplina] = $nota;
    }

    public function exibirNotas() {
        $texto = "<ul>";
        foreach ($this->notas as $disciplina => $nota) {
            $texto .= "<li>Nota em <strong>{$disciplina}</strong>:{$nota}</li>";
        }
        $texto .= "</ul>";
        return $texto;
    }
}

class AlunoComNotas {
    public $nome;
    private $registro;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->registro = new RegistroDeNotas();
    }

    public function adicionarNota($disciplina, $nota) {
        $this->registro->adicionarNota($disciplina, $nota);
    }

    public function exibirNotas() {
        return "<strong>Notas de {$this->nome}:</strong><br>" . $this->registro->exibirNotas();
    }
}

// Interceptação
class TurmaProxy {
    private $turma;

    public function __construct(Turma $turma) {
        $this->turma = $turma;
    }

    public function adicionarAluno(Aluno $aluno) {
        echo "<div class='log'>Interceptado: adicionando aluno <strong> {$aluno->nome}</strong> à turma <strong>{$this->turma->nome}</strong>.</div>";
        $this->turma->adicionarAluno($aluno);
    }

    public function listarAlunos() {
        return $this->turma->listarAlunos();
    }
}

// Interface HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - Orientação a Objetos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            padding: 20px;
        }
        h2 {
            color: #2c3e50;
        }
        h3 {
            color: #2980b9;
            margin-top: 30px;
        }
        .log {
            background-color: #ecf0f1;
            border-left: 4px solid #3498db;
            padding: 10px;
            margin: 5px 0;
            font-size: 0.95em;
        }
        ul {
            margin-top: 5px;
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        .box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-left: 5px solid #2980b9;
            padding: 15px;
            margin: 15px 0;
            box-shadow: 1px 1px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <h2>Sistema Escolar - Demonstração de OOP com CSS</h2>

    <?php
    // Demonstração de Associação
    $professor = new Professor("João");
    $aluno1 = new Aluno("Maria");
    $aluno2 = new Aluno("Carlos");

    echo "<div class='box'>";
    echo "<h3>Associação</h3>";
    echo $professor->orientar($aluno1) . "<br>";
    echo "</div>";

    // Agregação com Interceptação
    $turma = new Turma("3 Ano");
    $proxy = new TurmaProxy($turma);

    echo "<div class='box'>";
    echo "<h3>Interceptação + Agregação</h3>";
    $proxy->adicionarAluno($aluno1);
    $proxy->adicionarAluno($aluno2);
    echo $proxy->listarAlunos();
    echo "</div>";

    // Composição
    $alunoNotas = new AlunoComNotas("Ana");
    $alunoNotas->adicionarNota("Matemática", 9.5);
    $alunoNotas->adicionarNota("Português", 8.0);

    echo "<div class='box'>";
    echo "<h3>Composição</h3>";
    echo $alunoNotas->exibirNotas();
    echo "</div>";
    ?>
    
</body>
</html>