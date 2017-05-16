<?php
class db{

    public function conecta_mysql()
    {
        $con = mysqli_connect('localhost', 'root', '', "spapc");

        if (mysqli_connect_errno()) {
            echo 'Erro ao conectar com o BD' . mysqli_connect_error();
        }
        return $con;
    }
}
?>


