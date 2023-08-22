<?php
class Carrello
{

    private int $item;
    private int $idProduct;
    private string $nome;
    private string $imagine;
    private string $descrizione;
    private $prezzocompra;
    private int $quantita;
    private $subTotal;


    public function __construct(int $item, int $idProduct,string $nome, string $imagine, string $descrizione, $prezzocompra, int $quantita, $subTotal)
    {
        $this->item = $item;
        $this->idProduct = $idProduct;
        $this->nome = $nome;
        $this->imagine = $imagine;
        $this->descrizione = $descrizione;
        $this->prezzocompra = $prezzocompra;
        $this->quantita = $quantita;
        $this->subTotal = $subTotal;
    }
    public function getItem(){
        return $this->item;
    }
    public function setItem(int $item){
        $this->item = $item;
    }
    public function getIdproduct(){
        return $this->idProduct;
    }
    public function setIdproduct(int $idProduct){
        $this->idProduct = $idProduct;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function getImagine(){
        return $this->imagine;
    }
    public function setImagine(string $imagine){
        $this->imagine = $imagine;
    }
    public function getDescrizione(){
        return $this->descrizione;
    }
    public function setDescrizione(string $descrizione){
        $this->descrizione = $descrizione;
    }
    public function getPrezzocompra(){
        return $this->idProduct;
    }
    public function setPrezzocompra( $prezzocompra){
        $this->prezzocompra = $prezzocompra;
    }
    public function getQuantita(){
        return $this->quantita;
    }
    public function setQuantita(int $quantita){
        $this->quantita = $quantita;
    }
    public function getSubTotal(){
        return $this->subTotal;
    }
    public function setSubTotal( $subTotal){
        $this->subTotal = $subTotal;
    }
   
        public function __toString() {
            return"Item: " . $this-> item .",ID: " . $this->idProduct . ", Nome: " . $this->nome.",Imagine: " . $this->imagine . ", Descrizione: " . $this->descrizione. ", Prezzo: " . $this->prezzocompra.",Quantità: " . $this->quantita . ", Subtotal: " . $this->subTotal; // Puedes personalizar esto según tus necesidades.
        }
    

}
?>