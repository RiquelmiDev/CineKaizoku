<?php 

require_once 'Conexao.php';

class Insercao
{
    private $db;

    public function __construct()
    {
        try {
        // Conexão com o banco de dados
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names 'utf8'");
        } catch (PDOException $e) {
        // Tratamento de erro
        echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
        }
    }

    function inserirFilmes($nomeFilme,$anoFilme,$idCategoria,$sinopse,$nome_img,$dataCadastro
    ){
        try {
            if (!$this->db) {
              throw new Exception("Falha na conexão com o banco de dados.");
            }
      
            $this->db->beginTransaction();
      
            $stmt = $this->db->prepare("INSERT INTO filmes (nomefilme, anofilme, categorias_idcategoria, sinopse, datahoraregistro) VALUES (:nomeFilme, :anoFilme, :categoriaFilme, :sinopse, :datahoraCad)");
            $stmt->bindParam(':nomeFilme', $nomeFilme);
            $stmt->bindParam(':anoFilme', $anoFilme);
            $stmt->bindParam(':categoriaFilme', $idCategoria);
            $stmt->bindParam(':sinopse', $sinopse);
            $stmt->bindParam(':datahoraCad', $dataCadastro);
      
            $stmt->execute();
    
            $idfilme = $this->db->lastInsertId();
    
            $stmt = $this->db->prepare("INSERT INTO imgfilmes (filmes_idfilme, imgnome) VALUES (:filmes_idfilme, :nomeimg)");
            $stmt->bindParam(':filmes_idfilme', $idfilme);
            $stmt->bindParam(':nomeimg', $nome_img);
      
            $stmt->execute();
        
            $this->db->commit();
      
            return "Ok";
      
      } catch (PDOException $erro) {
            $this->db->rollback();
            return "Erro: " . $erro->getMessage();
      }
    }

    function inserirMyList($idfilme
    ){
        try {
            if (!$this->db) {
              throw new Exception("Falha na conexão com o banco de dados.");
            }
      
            $this->db->beginTransaction();
      
            $stmt = $this->db->prepare("INSERT INTO mylist (filmes_idfilme) VALUES (:idfilme)");
            $stmt->bindParam(':idfilme', $idfilme);
      
            $stmt->execute();
    
            $this->db->commit();
      
            return "Ok";
      
      } catch (PDOException $erro) {
            $this->db->rollback();
            return "Erro: " . $erro->getMessage();
      }
    }
}