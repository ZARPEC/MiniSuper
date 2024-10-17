<?php
namespace Model\CategoryModel;
use Model\ConexionModel\Conexion;

class CategoryM
{

    public static function showCategory()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM catProd ORDER BY CATEGORIA ASC");
        $stmt->execute();
        return $stmt->fetchAll(); //devolviendo la respuesta
    }

    public static function ShowSubCategory($CategoryGet, $SubCat)
    {
        $conn = Conexion::conectar();

        // Verifica la conexión
        if (!$conn) {
            echo "Error en la conexión a la base de datos";
            return [];
        }
        if (empty($SubCat)) {
            $sql = "SELECT s.idSubcategoria, s.Nsubcategoria, c.Categoria
            FROM Subcategoria s
            JOIN CatProd c ON s.fkCategoria = c.idCatProd
            WHERE c.Categoria = :CategoryGet
            AND (s.SubCategoriaP IS NULL OR s.SubCategoriaP = 0)
            "
            ;
            $conn = Conexion::conectar()->prepare($sql);
            $conn->bindParam(":CategoryGet", $CategoryGet, \PDO::PARAM_STR);
            $conn->execute();
            $result = $conn->fetchall();
        } else {
            $sql = "SELECT s.idSubcategoria, s.Nsubcategoria, c.Categoria
            FROM Subcategoria s
            JOIN CatProd c ON s.fkCategoria = c.idCatProd
            WHERE s.SubCategoriaP IN (
            SELECT idSubcategoria 
            FROM Subcategoria 
            WHERE Nsubcategoria = :SubCat)
            ";
            $conn = Conexion::conectar()->prepare($sql);
            $conn->bindParam(":SubCat", $SubCat, \PDO::PARAM_STR);
            $conn->execute();
            $result = $conn->fetchall();
        }


        $SubCategories = $result;

        return $SubCategories;
    }
}

?>