<?php

class MyClass
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

    public function amphurProfile($n)
    {

        $pov = $n;
        // echo '<option value="">' . $n . '</option>';

        include '../config/connect.php';
        $se = $con->prepare(" SELECT* FROM amphur WHERE pid = ? ORDER BY name ASC ");
        $se->execute([$n]);
        while ($amp = $se->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $pov . "/" . $amp["aid"] . '">' . $amp["name"]  . '</option>';
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

    public function districtProfile($n, $n1)
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

    public function showImg($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM image WHERE pd = ? ");
        $se->execute([$n]);
        $row = $se->fetch(PDO::FETCH_ASSOC);
        return $row["a"];
    }

    public function showImgAll($n, $p)
    {

        $link = '../th/img/prop/' . $p;

        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM image WHERE pd = ? ");
        $se->execute([$n]);
        $mm = $se->rowCount();
        while ($r = $se->fetch(PDO::FETCH_ASSOC)) {
            echo '<img src="' . $link . $r["a"] . '">';
        }
    }

    public function name($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM users WHERE uid = ? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return $r["fn"];
    }

    public function nameImage($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM users WHERE uid = ? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        if (!empty($r["pb"])) {
            echo   '../th/img/' . $r["pb"] . '';
        } else {
            echo  '../th/img/user/noimage.jpg';
        }
    }

    public function tel($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM users WHERE uid = ? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return preg_replace('/(.+)([0-9]{4})$/', '$1xxxx', $r["t1"]);
    }

    public function telFull($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM users WHERE uid = ? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return $r["t1"];
    }

    public function lineID($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM users WHERE uid = ? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return $r["li"];
    }

    public function nameFirstDate($n)
    {
        include '../config/connect.php';
        include '../array/thaiMonth.php';
        $se = $con->prepare(" SELECT * FROM users WHERE uid = ? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        $crExDate = explode("-", $r["cr"]);
        $crExtime = explode(" ", $crExDate[2]);
        return $crExtime[0] . ' ' . $months[(int)$crExDate[1]] . " " . ($crExDate[0] + 543);
    }

    public function land_typeName($n)
    {
        include '../config/connect.php';
        $se = $con->prepare(" SELECT * FROM land_type WHERE id =? ");
        $se->execute([$n]);
        $r = $se->fetch(PDO::FETCH_ASSOC);
        return $r["name"];
    }
}