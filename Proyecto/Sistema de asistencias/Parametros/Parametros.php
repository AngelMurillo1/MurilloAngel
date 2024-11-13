<?php
class Parametros{
    public $porcentajeRegular;
    public $porcentajePromocion;
    public $notaPromocion;
    public $notaRegular;

    public function setParametros($database, $porcentajePromocion, $porcentajeRegular, $notaPromocion, $notaRegular){
        if (($porcentajePromocion > $porcentajeRegular) && ($notaPromocion > $notaRegular)) {
            $query= "UPDATE `parametros` SET `porcentajePromocion`=$porcentajePromocion ,`porcentajeRegular`=$porcentajeRegular ,`notaPromocion`=$notaPromocion ,`notaRegular`=$notaRegular  WHERE `id`= 1";

            $database->ejecutarConsulta($query);

            header('Location: index_parametros.php?success=Parametros modificados con exito');
        }else{
            header('Location: index_parametros.php?error=Parametros invalidos');
        }

    }


    public function getParametros($database){
        $query = "SELECT * FROM `parametros` WHERE `id`= 1";

       $datos = $database->ejecutarConsulta($query);

       return $datos;
    }
}
?>