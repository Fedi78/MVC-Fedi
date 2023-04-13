<?php 

class Continent 
    {

        private $num;

        private $libelle;

        public function getNum() : int
        {
                return $this->num;
        }

        public function setNum(int $num): self
        {
                $this->num = $num;

                return $this;
        }

       /**
        * Lit le libellé
        *
        * @return string
        */
        public function getLibelle() : string
        {
                return $this->libelle;
        }  

        public function setLibelle(string $libelle) : self
        {
                $this->libelle = $libelle;

                return $this;
        }

        public static function findAll() : array
        {
            $req=MonPdo::getInstance()->prepare("select * from continent");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Continent");
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }
        public static function findById(int $id) :Continent
        {
            $req=MonPdo::getInstance()->prepare("select * from continent where num = :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Continent");
            $req->bindParam(':id',$id);
            $req->execute();
            $leResultat=$req->fetch();
            return $leResultat;
            
        }

        public static function Add(Continent $continent) :int
        {
            $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle)");
            $libelle=$continent->getLibelle();
            $req->bindParam(':libelle',$libelle);
            $nb=$req->execute();
            return $nb;
             
        }

        public static function Update(Continent $continent) : int
        {
            $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
            $num=$continent->getNum();
            $libelle=$continent->getLibelle();
            $req->bindParam(':libelle', $libelle);
            $req->bindParam(':id',$num);
            $nb=$req->execute();
            return $nb; 
        }

        public static function Delete(Continent $continent) : int
        {
            $req=MonPdo::getInstance()->prepare("delete from continent where num = :id");
            $num=$continent->getNum();
            $req->bindParam(':id',$num);
            $nb=$req->execute();
            return $nb; 
        }
    }
?>