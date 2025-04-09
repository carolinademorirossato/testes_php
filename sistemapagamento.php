<?php
// Interface comum para todos os tipos de pagamento
interface MetodoPagamento {
    public function processarPagamento($valor);
}

// Implementações concretas de métodos de pagamento
class CartaoCredito implements MetodoPagamento {
    private $numeroCartao;
    private $nomeTitular;
    private $dataValidade;
    private $cvv;

    public function __construct($numeroCartao, $nomeTitular, $dataValidade, $cvv) {
        $this->numeroCartao = $numeroCartao;
        $this->nomeTitular = $nomeTitular;
        $this->dataValidade = $dataValidade;
        $this->cvv = $cvv;
    }

    public function processarPagamento($valor) {
        // Simula processamento do cartão de crédito
        echo "Processando pagamento de R$ {$valor} via Cartão de Crédito(final {$this->getUltimosDigitos()})\n";
        echo "Pagamento aprovado!\n";
        return true;
    }

    private function getUltimosDigitos() {
        return substr($this->numeroCartao, -4);
    }

}

class Pix implements MetodoPagamento {
    private $chavePix;

    public function __construct($chavePix) {
        $this->chavePix = $chavePix;
    }

    public function processarPagamento($valor) {
        // Simula processamento do PIX
        echo "Processando pagamento de R$ {$valor} via PIX (chave: {$this->chavePix})\n";
        echo "Pagamento instantâneo concluído\n";
        return true;
    }

}

class Boleto implements MetodoPagamento {
    private $codigoBarras;

    public function __construct() {
        $this->codigoBarras = $this->gerarCodigoBarras();
    }

    public function processarPagamento($valor) {
        // Simula emissão de boleto
        echo "Gerando boleto no valor de R$ {$valor}\n";
        echo "Código de barras: {$this->codigoBarras}\n";
        echo "Boleto gerado com sucesso. Vencimento em 3 dias.\n";
        return true;
    }

    private function gerarCodigoBarras() {
        return '34191.79001 01043.510047 91020.150008 8 84410000035000';
    }
}

// Classe que usa polimorfismo para processar pagamentos
class ProcessadorPagamentos {
    public function executarPagamento(MetodoPagamento $metodo, $valor) {
        return $metodo->processarPagamento($valor);
    }
}

// Testando o polimorfismo
$processador = new ProcessadorPagamentos();

echo "=== Testando Polimorfismo ===\n\n";

// Cartão de Crédito
$cartao = new CartaoCredito('1234567812345678', 'Fulano da Silva', '12/25', '123');
$processador->executarPagamento($cartao, 250.50);

echo "\n";

// PIX
$pix = new Pix('fulano@email.com');
$processador->executarPagamento($pix, 150.75);

echo "\n";

// Boleto
$boleto = new Boleto();
$processador->executarPagamento($boleto, 320.00);
?>