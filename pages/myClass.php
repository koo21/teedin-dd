<?php

class MyClass
{

    public function province()
    {

        include '../config/connect.php';
        $se = $con->prepare(" SELECT* FROM province ORDER BY name ASC ");
        $se->execute();
        while ($pov = $se->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $pov["id"] . '">' . $pov["name"] . '</option>';
        }
    }
}
