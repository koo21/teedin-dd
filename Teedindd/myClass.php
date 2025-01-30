<?php

class MyClassAdmin
{

    public function province()
    {

        include '../config/connect.php';
        $se = $con->prepare(" SELECT* FROM province ORDER BY name ASC ");
        $se->execute();
        while ($pov = $se->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $pov["pid"] . '">' . $pov["name"] . '</option>';
        }
    }

    public function amphur($n)
    {

        $pov = $n;

        include '../config/connect.php';
        $se = $con->prepare(" SELECT* FROM amphur WHERE pid = ? ORDER BY name ASC ");
        $se->execute([$n]);
        while ($amp = $se->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $pov . "/" . $amp["aid"] . '">' . $amp["name"] . '</option>';
        }
    }

    public function district($n, $n1)
    {

        $povSearch = $n;
        $ampSearch = $n1;
        $povSearch . " = " . $ampSearch;

        include '../config/connect.php';
        $se = $con->prepare(" SELECT* FROM district WHERE aid = ? AND pid = ? ORDER BY name ASC ");
        $se->execute([$ampSearch, $povSearch]);
        while ($dist = $se->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $povSearch . "/" . $ampSearch . "/" . $dist["did"] . '">' . $dist["name"] . '</option>';
        }
    }

    public function fname($n)
    {
        include '../config/connect.php';
        $se = $con->prepare("SELECT * FROM users WHERE uid = ?");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return $r["fn"] . " " . $r["ln"];
    }

    public function mail($n)
    {
        include '../config/connect.php';
        $se = $con->prepare("SELECT * FROM users WHERE uid = ?");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return $r["em"];
    }
}
