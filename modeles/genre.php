        <?php 
        class Genre{
            
            private $num;
            private $libelle;
            /** numéro genre
             * @var int
             */
            public function getNum(): int
            {
                return intval($this->num);
            }
            public function setNum($num): self
            {
                $this->num = $num;
                return $this;
            }
            
            /**
             * Lit le libelle
             * Get the value of libelle
             * * @var libelle
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

            public static function findAll() :array
            {
                $req = MonPdo::getInstance() -> prepare("Select * from genre");
                $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
                $req->execute();
                $lesResultats=$req->fetchAll();
                return $lesResultats;

            }
            public static function findById(int $id) :Genre
            {

                $req = MonPdo::getInstance()-> prepare("Select * from genre where num = :id");
                $req -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
                $req -> bindParam(':id',$id);
                $req -> execute();
                $leResultats=$req->fetch();
                return $leResultats;

            }
            public static function add(Genre $genre) :int   
            {
                $req = MonPdo::getInstance()-> prepare("insert into genre(libelle) values(:libelle)");
                $libelle=$genre->getLibelle();
                $req->bindParam(':libelle',$libelle);
                $nb=$req->execute();
                return $nb;
            }
                /**
             * Undocumented function
             *Modifier
                * @param Genre $genre genre à modifier
                * @return integer resultat (1 si l'opération à réussi, 0 sinon);
                *
                */

            public static function update(Genre $genre) :int  
            {

                $req = MonPdo::getInstance()->prepare("update genre set libelle= :libelle where num= :id");
                $num=$genre->getNum();
                $libelle=$genre->getLibelle();
                $req->bindParam(':id', $num);
                $req->bindParam(':libelle',$libelle);
                $nb=$req->execute();
                return $nb;
            }

                /**
             * Suppr  genre
             * @param Genre $genre 
             * @return integer resultat 
             */
                public static function delete(Genre $genre) :int
            {
                $req = MonPdo::getInstance()-> prepare("delete from genre where num= :id");
                $num = $genre->getNum();
                $req->bindParam(':id',$num);
                $nb=$req->execute();
                return $nb;
            }
            }
            ?>