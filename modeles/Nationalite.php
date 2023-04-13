<?php

class Nationalite {


    private $num; 

    private $libelle;

    private $numContinent;

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }


    public function getLibelle()
    {
        return $this->libelle;
    }


    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getContinent()
    {
        return Continent::findById($this->numContinent);
    }

    public function setContinent(Continent $continent)
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }


    public static function findAll($libelle = "", $continent = "Tous")
    {
        $texteReq = "SELECT n.num AS numero, n.libelle AS 'libNation', c.libelle AS 'libContinent' FROM nationalite n, continent c WHERE n.numContinent=c.num";
        if (!empty($libelle)) {
            $texteReq .= " AND n.libelle LIKE '%" . $libelle . "%'";
        }
        if ($continent != "Tous") {
            $texteReq .= " AND c.num =" . $continent;
        }
        $texteReq .= " ORDER BY n.libelle";
        $req = MonPdo::getInstance()->prepare($texteReq);
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Nationalite');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }
    public static function findAll2() :array
    {
        $req = MonPdo::getInstance() -> prepare("Select * from genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;

    }

    public static function findById($id)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM nationalite WHERE num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Nationalite');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
    }

public static function add(Nationalite $nationalite) :int   
{
    $req = MonPdo::getInstance()->prepare("INSERT INTO nationalite (libelle, numContinent) VALUES (:libelle, :numContinent)");
    $req->bindParam(':libelle', $nationalite->getLibelle());
    $req->bindParam(':numContinent', $nationalite->getNumContinent());
    $nb = $req->execute();
    return $nb;
}


public static function update(Nationalite $nationalite) :int  
{
    $req = MonPdo::getInstance()->prepare("UPDATE nationalite set libelle = :libelle, numContinent = :numContinent WHERE num = :id");
    $req->bindParam(':numContinent', $nationalite->getNumContinent());
    $req->bindParam(':id', $nationalite->getNum());
    $req->bindParam(':libelle', $nationalite->getLibelle());
    $nb = $req->execute();
    return $nb;
}


public static function Delete(Nationalite $nationalite) : int
{
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num = :id");
        $num=$nationalite->getNum();
        $req->bindParam(':id',$num);
        $nb=$req->execute();
        return $nb; 
}
    public function getNumContinent(): int
    {
        return $this->numContinent;
    }
}
?>