<?php
namespace Model\ProductModel;
use Model\ConexionModel\Conexion;

class ProductM
{

    public static function ShowProduct($Cat, $SubCat)
    {
        try {
            $conn = Conexion::conectar();

            // Verifica la conexión
            if (!$conn) {
                throw new \Exception("Error en la conexión a la base de datos");
            }

            // Si no hay subcategoría seleccionada
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
                        JOIN 
                            CatProd c ON s.FkCategoria = c.idcatprod
                        WHERE c.Categoria = :Cat
                        ORDER BY p.NombreProd ASC";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":Cat", $Cat, \PDO::PARAM_STR);
            } else {
                // Si hay subcategoría seleccionada
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
                            subcategoria sp ON s.SubCategoriaP = sp.idSubcategoria
                        WHERE 
                            s.Nsubcategoria = :SubCat OR sp.Nsubcategoria = :SubCat
                        ORDER BY 
                            p.NombreProd ASC";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":SubCat", $SubCat, \PDO::PARAM_STR);
            }

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener resultados en formato asociativo (sin índices numéricos)
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Si no se obtienen resultados, devolver un array vacío o lanzar una excepción
            if (empty($result)) {
                throw new \Exception("No existen productos para esta categoría/subcategoría");
            }

            return $result;

        } catch (\Exception $e) {
            // Manejo de errores (opcional: puedes registrar el error en un log)
            echo "Error: " . $e->getMessage();
            return []; // Devolver array vacío si hay un error
        }
    }

    public static function ShowAllProduct()
    {
        try {
            $conn = Conexion::conectar();

            // Verifica la conexión
            if (!$conn) {
                throw new \Exception("Error en la conexión a la base de datos");
            }

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
                    JOIN 
                        CatProd c ON s.FkCategoria = c.idcatprod
                    ORDER BY p.NombreProd ASC";

            // Preparar y ejecutar la consulta
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Obtener resultados en formato asociativo
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            // Si no se obtienen resultados, lanzar una excepción o devolver un array vacío
            if (empty($result)) {
                throw new \Exception("No existen productos en la base de datos.");
            }

            return $result;

        } catch (\Exception $e) {
            // Manejo de errores
            echo "Error: " . $e->getMessage();
            return []; // Devolver array vacío si ocurre un error
        }
    }
}


?>