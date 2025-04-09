<?php
// Classe base (pai) para todas as contas bancárias
class ContaBancaria {
    protected $titular;
    protected $saldo;
    protected $numeroConta;

    public function __construct($titular, $saldoInicial, $numeroConta) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        $this->numeroConta = $numeroConta;
    }

    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
            echo "Depósito de R$ {$valor} realizado. Novo saldo: R$ {$this->saldo}\n";
        } else {
            echo "Valor de depósito inválido!\n";
    }
}

    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            echo "Saque de R$ {$valor} realizado. Novo saldo: R$ {$this->saldo}\n";
            return true;
        } else {
            echo "Saldo insuficiente ou valor inválido!\n";
            return false;
    }
}

    public function consultarSaldo() {
        echo "Saldo atual: R$ {$this->saldo}\n";
        return $this->saldo;
}

    public function getTitular() {
        return $this->titular;
}

    public function getNumeroConta() {
        return $this->numeroConta;
    }
}

// Classe ContaCorrente que herda de ContaBancaria
class ContaCorrente extends ContaBancaria {
    private $limiteChequeEspecial;
    private $taxaManutencao;

    public function __construct($titular, $saldoInicial, $numeroConta, $limiteChequeEspecial, $taxaManutencao) {
        parent::__construct($titular, $saldoInicial, $numeroConta);
        $this->limiteChequeEspecial = $limiteChequeEspecial;
        $this->taxaManutencao = $taxaManutencao;
    }

    // Sobrescreve o método sacar para incluir o cheque especial
    public function sacar($valor) {
        $saldoDisponivel = $this->saldo + $this->limiteChequeEspecial;

        if ($valor > 0 && $valor <= $saldoDisponivel) {
            $this->saldo -= $valor;
            echo "Saque de R$ {$valor} realizado. Novo saldo: R$ {$this->saldo}\n";

            if ($this->saldo < 0) {
                echo "Atenção: Você está usando seu cheque especial!\n";
            }
            return true;
        } else {
            echo "Limite de saque excedido ou valor inválido!\n";
            return false;
        }
    }

    public function cobrarTaxaManutencao() {
        $this->saldo -= $this->taxaManutencao;
        echo "Taxa de manutenção de R$ {$this->taxaManutencao} cobrada. Novo saldo: R$ {$this->saldo}\n";
    }
}

// Classe ContaPoupanca que herda de ContaBancaria
class ContaPoupanca extends ContaBancaria {
    private $taxaRendimento;

    public function __construct($titular, $saldoInicial, $numeroConta, $taxaRendimento) {
        parent::__construct($titular, $saldoInicial, $numeroConta);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $rendimento = $this->saldo * $this->taxaRendimento;
        $this->saldo += $rendimento;
        echo "Rendimento de R$ {$rendimento} aplicado. Novo saldo: R$ {$this->saldo}\n";
    }

    // Conta poupança não permite saldo negativo
    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            echo "Saque de R$ {$valor} realizado. Novo saldo: R$ {$this->saldo}\n";
            return true;
        } else {
            echo "Saldo insuficiente na poupança!\n";
            return false;
        }
    }
}

// Testando as classes
echo "=== Conta Corrente ===\n";
$contaCorrente = new ContaCorrente("João Silva", 1000, "12345-6", 500, 20);
$contaCorrente->consultarSaldo();
$contaCorrente->depositar(500);
$contaCorrente->sacar(2000); // Usará o cheque especial
$contaCorrente->cobrarTaxaManutencao();

echo "\n=== Conta Poupança ===\n";
$contaPoupanca = new ContaPoupanca("Maria Souza", 3000, "78901-2", 0.005);
$contaPoupanca->consultarSaldo();
$contaPoupanca->aplicarRendimento();
$contaPoupanca->sacar(3500); // Não permitido
$contaPoupanca->sacar(500);
?>