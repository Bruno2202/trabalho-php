<?php 
  	namespace MODEL; 

  	class Guitarra{
        private ?int $id; 
        private ?string $descricao; 
        private ?string $modelo; 
        private ?string $marca; 
        private ?int $ano; 
        private ?int $numCordas; 
        private ?string $cor; 
        private ?int $qtdeEstoque; 
        private ?float $vlrVenda; 

        ///
        private ?string $imagem; 
        private ?string $tipoImagem; 
        ///

        public function __construct() { }

        public function getID() { return $this->id; }
        public function getDescricao() { return $this->descricao; }
        public function getModelo() { return $this->modelo; }
        public function getMarca() { return $this->marca; }
        public function getAno() { return $this->ano; }
        public function getNumCordas() { return $this->numCordas; }
        public function getCor() { return $this->cor; }
        public function getQtdeEstoque() { return $this->qtdeEstoque; }
        public function getVlrVenda() { return $this->vlrVenda; }

        ///
        public function getImagem() { return $this->imagem; }
        public function getTipoImagem() { return $this->tipoImagem; }
        ///

        public function setId(int $id) { $this->id = $id; }
        public function setDescricao(string $descricao) { $this->descricao = $descricao; }
        public function setModelo(string $modelo) { $this->modelo = $modelo; }
        public function setMarca(string $marca) { $this->marca = $marca; }
        public function setAno(int $ano) { $this->ano = $ano; }
        public function setNumCordas(int $numCordas) { $this->numCordas = $numCordas; }
        public function setCor(string $cor) { $this->cor = $cor; }
        public function setQtdeEstoque(int $qtdeEstoque) { $this->qtdeEstoque = $qtdeEstoque; }
        public function setVlrVenda(float $vlrVenda) { $this->vlrVenda = $vlrVenda; }

        ///
        public function setImagem(string $imagem) { $this->imagem = $imagem; }
        public function setTipoImagem(string $tipoImagem) { $this->tipoImagem = $tipoImagem; }
        ///
  	}
?>