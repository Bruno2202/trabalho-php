<?php 
  namespace MODEL; 

  class Bateria{
        private ?int $id; 
        private ?string $descricao; 
        private ?string $modelo; 
        private ?string $marca; 
        private ?int $ano; 
        private ?int $numPecas; 
        private ?string $cor; 
        private ?int $qtdeEstoque; 
        private ?float $vlrVenda; 

        public function __construct() { }

        public function getID() { return $this->id; }
        public function getDescricao() { return $this->descricao; }
        public function getModelo() { return $this->modelo; }
        public function getMarca() { return $this->marca; }
        public function getAno() { return $this->ano; }
        public function getNumPecas() { return $this->numPecas; }
        public function getCor() { return $this->cor; }
        public function getQtdeEstoque() { return $this->qtdeEstoque; }
        public function getVlrVenda() { return $this->vlrVenda; }

        public function setId(int $id) { $this->id = $id; }
        public function setDescricao(string $descricao) { $this->descricao = $descricao; }
        public function setModelo(string $modelo) { $this->modelo = $modelo; }
        public function setMarca(string $marca) { $this->marca = $marca; }
        public function setAno(int $ano) { $this->ano = $ano; }
        public function setNumPecas(int $numPecas) { $this->numPecas = $numPecas; }
        public function setCor(string $cor) { $this->cor = $cor; }
        public function setQtdeEstoque(int $qtdeEstoque) { $this->qtdeEstoque = $qtdeEstoque; }
        public function setVlrVenda(float $vlrVenda) { $this->vlrVenda = $vlrVenda; }
    }
?>