<?php
namespace Model\ProductModel;
use Model\ConexionModel\Conexion;

class ProductM
{

    public static function ShowProduct($Cat, $SubCat)
    {
        $conn = Conexion::conectar();

        // Verifica la conexión
        if (!$conn) {
            echo "Error en la conexión a la base de datos";
            return [];
        }
        if (empty($SubCat)) {
            $sql = "SELECT 
                    p.idProducto,
                    p.NombreProd,
                    u.UNIDADMEDIDA,
                    p.CantMedida,
                    c.categoria,
                    s.Nsubcategoria,
                    p.precio,
                    p.Existencias
                FROM 
                    Producto p
                JOIN 
                    Subcategoria s ON p.FkSubCat = s.idSubcategoria
                JOIN 
                    UnidadMedida u ON p.FkUnidadMedida = u.IDUNIDADMEDIDA
                join CatProd c ON s.fkcategoria = c.idcatprod
                WHERE c.Categoria = :Cat
                ORDER BY p.NombreProd ASC";  // Se usa :subCat sin comillas para bind

            $conn = Conexion::conectar()->prepare($sql);
            $conn->bindParam(":Cat", $Cat, \PDO::PARAM_STR);
            $conn->execute();
            $result = $conn->fetchall();
        } else {
            $sql = "SELECT 
                        p.idProducto,
                        p.NombreProd,
                        u.UNIDADMEDIDA,
                        p.CantMedida,
                        c.categoria,
                        s.Nsubcategoria,
                        sp.Nsubcategoria AS categoriaPadre,  -- Subcategoría padre
                        p.precio,
                        p.Existencias
                    FROM 
                        Producto p
                    JOIN 
                        Subcategoria s ON p.FkSubCat = s.idSubcategoria
                    JOIN 
                        UnidadMedida u ON p.FkUnidadMedida = u.IDUNIDADMEDIDA
                    JOIN 
                        CatProd c ON s.FkCategoria = c.idcatprod
                    LEFT JOIN 
                        subcategoria sp ON s.SubCategoriaP = sp.idSubcategoria  -- Unir para obtener la subcategoría padre
                    WHERE 
                        s.Nsubcategoria = :SubCat or sp.Nsubcategoria = :SubCat 
                    ORDER BY 
                        p.NombreProd ASC";

            $conn = Conexion::conectar()->prepare($sql);
            $conn->bindParam(":SubCat", $SubCat, \PDO::PARAM_STR);
            $conn->execute();
            $result = $conn->fetchall();
        }
       
        // Si no se obtienen resultados
        if (empty($result)) {
            echo "No Existe categoria";
        }

        return $result;
    }

}

?>