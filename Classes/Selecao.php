<?php
require_once 'Conexao.php';

class Selecao
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

  function selecionarFilmes()
  {
    try {

      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare(
        "SELECT 
          f.idfilme,
          f.nomefilme,
          f.anofilme,
          f.categorias_idcategoria,
          f.sinopse,
          f.datahoraregistro,
          i.imgnome
          FROM filmes f
          LEFT JOIN imgfilmes i ON f.idfilme = i.filmes_idfilme
          ORDER BY idfilme desc"
      );

      if ($stmt->execute()) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql da funcao selecionarFilmesAleatorios");
      }
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }

  function selecionarFilmesAleatorios()
  {
    try {

      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare(
        "SELECT 
          f.idfilme,
          f.nomefilme,
          f.anofilme,
          f.categorias_idcategoria,
          f.sinopse,
          f.datahoraregistro,
          i.imgnome
          FROM filmes f
          LEFT JOIN imgfilmes i ON f.idfilme = i.filmes_idfilme
          ORDER BY rand()"
      );

      if ($stmt->execute()) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql da funcao selecionarFilmesAleatorios");
      }
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }

  function selecionarFilmesRecentes()
  {
    try {

      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare(
        "SELECT 
          f.idfilme,
          f.nomefilme,
          f.anofilme,
          f.categorias_idcategoria,
          f.sinopse,
          f.datahoraregistro,
          i.imgnome
          FROM filmes f
          LEFT JOIN imgfilmes i ON f.idfilme = i.filmes_idfilme
          ORDER BY idfilme desc"
      );

      if ($stmt->execute()) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql da funcao selecionarFilmesRecentes");
      }
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }

  function selecionarFilmeUnicoPorPesquisa($search_term){
    try {

      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare(
        "SELECT 
          f.idfilme,
          f.nomefilme,
          f.anofilme,
          f.categorias_idcategoria,
          f.sinopse,
          f.datahoraregistro,
          i.imgnome
          FROM filmes f
          LEFT JOIN imgfilmes i ON f.idfilme = i.filmes_idfilme
          WHERE f.nomefilme LIKE :nomefilme"
      );

      $search_param = "%" . $search_term . "%";
      $stmt->bindParam(':nomefilme', $search_param);

      if ($stmt->execute()) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql da funcao selecionarFilmeUnico");
      }
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }

  function selecionarCategorias()
  {
    try {

      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare(
        "SELECT 
            c.idcategoria,
            c.categoria,
            c.datahoraregistro
            FROM categorias c
            ORDER BY idcategoria asc"
      );

      if ($stmt->execute()) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql da funcao selecionarCategorias");
      }
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }

  function selecionarMyList()
  {
    try {

      if (!$this->db) {
        throw new Exception("Falha na conexão com o banco de dados.");
      }

      $stmt = $this->db->prepare(
        "SELECT 
            m.idlistafilmes,
            m.filmes_idfilme
            FROM mylist m
            ORDER BY idlistafilmes desc"
      );

      if ($stmt->execute()) {
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql da funcao selecionarCategorias");
      }
    } catch (PDOException $erro) {
      echo "Erro: " . $erro->getMessage();
    }
  }
}
