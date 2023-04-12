<?php

class Nationalite {

    /** 
     * numéro du nationalite
     * @var int
     */
    private $num;
    
    /**
     * libelle du Nationalite
     * @var string
     */
    private $libelle;

    /**
     * num continent (clé étrangère) relié à num de Continent
     * @var int
     */
    private $numContinent;

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set the value of num
     *
     * @return  self
     */ 
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the continent object for this nationalité
     *
     * @return Continent
     */
    public function getContinent()
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Set the continent object for this nationalité
     *
     * @return  self
     */ 
    public function setContinent(Continent $continent)
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

    /**
     * Get all nationalités filtered by libelle and continent
     *
     * @param string $libelle
     * @param string $continent
     * @return Nationalite[]
     */ 
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

    /**
     * Find a nationalité by its num
     *
     * @param integer $id
     * @return Nationalite
     */ 
    public static function findById($id)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM nationalite WHERE num = :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Nationalite');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
    }
    /**
 * Undocumented function
 * AJouter
 * @param Nationalite $nationalite continent à ajouter
 * @return integer resultat (1 si l'opération à réussi);
 * 
 */
public static function add(Nationalite $nationalite) :int   
{
    $req = MonPdo::getInstance()->prepare("INSERT INTO nationalite (libelle, numContinent) VALUES (:libelle, :numContinent)");
    $req->bindParam(':libelle', $nationalite->getLibelle());
    $req->bindParam(':numContinent', $nationalite->getNumContinent());
    $nb = $req->execute();
    return $nb;
}

/**
 * Undocumented function
 * Modifier
 * @param Nationalite $nationalite continent à modifier
 * @return integer resultat (1 si l'opération à réussi, 0 sinon);
 * 
 */
public static function update(Nationalite $nationalite) :int  
{
    $req = MonPdo::getInstance()->prepare("UPDATE nationalite SET libelle = :libelle, numContinent = :numContinent WHERE num = :id");
    $req->bindParam(':numContinent', $nationalite->getNumContinent());
    $req->bindParam(':id', $nationalite->getNum());
    $req->bindParam(':libelle', $nationalite->getLibelle());
    $nb = $req->execute();
    return $nb;
}

/**
 * Undocumented function
 * Suppprimer
 * @param Nationalite $nationalite
 * @return integer resultat 
 * 
 */
public static function Delete(Nationalite $nationalite) : int
{
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num = :id");
        $num=$nationalite->getNum();
        $req->bindParam(':id',$num);
        $nb=$req->execute();
        return $nb; 
}





    /**
     * Get num continent (clé étrangère) relié à num de Continent
     */
    public function getNumContinent(): int
    {
        return $this->numContinent;
    }
}



?>