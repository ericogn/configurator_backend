<?php
    class Prices{
        private $conn;
        private $table = "prices";

        public $unit;
        public $t15;
        public $t20;
        public $t25;
        public $t30;
        public $t40;
        public $t50;
        public $t60;
        public $t70;
        public $t80;
        public $t90;

        public $v230;
        public $v460;
        public $v575;
        public $singleleft;
        public $singleright;
        public $doubleleft;
        public $doubleright;
        public $blowerdpd;
        public $blowerecm;
        public $digitalnone;
        public $digitalmix;
        public $scrol;
        public $speed;
        public $in2merv8;
        public $in2merv11;
        public $in2merv13;
        public $in4merv8;
        public $in4merv11;
        public $in4merv13;
        public $in4merv8and13;

        public $heatnone;
        public $kw15;
        public $kw20;
        public $kw25;
        public $kw30;
        public $kw40;
        public $kw45;
        public $kw50;
        public $kw60;
        public $heatsteamcoil;
        public $heathotwatercoil;

        public $evapnone;
        public $evapsingle;
        public $evapdouble;
        public $fluid1; 
        public $evapfiltertype;
        public $airsideecon; 
        public $chilledwatercoil; 
        public $watersideecon; 
        public $heatnreheat; 
        public $fluid2; 
        public $nonfused; 
        public $nonfusedtrue;
        public $phasereversalsens; 
        public $freezestat;
        public $tempavg;
        public $condensatepump;
        public $compressorheater;
        public $remotewaterpump;
        public $waterswitch;
        public $drycontacts;
        public $vavsingle;
        public $vavmulti;
        public $walltemp;
        public $wallhumid;
        public $ducttemp;
        public $ducthumid;
        public $bmsnone;
        public $bmsmstp;
        public $bmsip;
        public $bmsmodbus;
        public $bmstobedet;
        public $marveldisplay;
        public $scr;
        public $smokedetector;
        public $firestat;
        public $shipsplit;
        public $compressorcover;
        public $protectivenone;
        public $electrocoil;
        public $heresite;
        public $unitinsulnone;
        public $elastomeric;
        public $doublewall;
        public $nonstandard;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT * FROM `prices` LIMIT 1' ;

            //prepare statement
            $statement = $this->conn->prepare($query);
            $statement->execute();
    
            return $statement;
        }

        /*
            
        */

        function update(){
            $qry ="UPDATE `prices`
            SET
            unit =:unit,
            t15 =:t15,
            t20 =:t20,
            t25 =:t25,
            t30 =:t30,
            t40 =:t40,
            t50 =:t50,
            t60 =:t60,
            t70 =:t70,
            t80 =:t80,
            t90 =:t90,
            v230 =:v230,
            v460 =:v460,
            v575 =:v575,
            singleleft =:singleleft,
            singleright =:singleright,
            doubleleft =:doubleleft,
            doubleright =:doubleright,
            digitalnone =:digitalnone,
            digitalmix =:digitalmix,
            blowerdpd =:blowerdpd,
            blowerecm =:blowerecm,
            scrol =:scrol,
            speed =:speed,
            in2merv8 =:in2merv8,
            in2merv11 =:in2merv11,
            in2merv13 =:in2merv13,
            in4merv8 =:in4merv8,
            in4merv11 =:in4merv11,
            in4merv13 =:in4merv13,
            in4merv8and13 =:in4merv8and13,
            heatnone =:heatnone,
            kw15 =:kw15,
            kw20 =:kw20,
            kw25 =:kw25,
            kw30 =:kw30,
            kw40 =:kw40,
            kw45 =:kw45,
            kw50 =:kw50,
            kw60 =:kw60,
            heatsteamcoil =:heatsteamcoil,
            heathotwatercoil =:heathotwatercoil,
            fluid1 =:fluid1,
            reheattype =:reheattype,
            airsideecon =:airsideecon,
            chilledwatercoil =:chilledwatercoil,
            watersideecon =:watersideecon,
            heatnreheat =:heatnreheat,
            fluid2 =:fluid2,
            nonfused =:nonfused,
            nonfusedtrue =:nonfusedtrue,
            phasereversalsens =:phasereversalsens,
            freezestat =:freezestat,
            tempavg =:tempavg,
            condensatepump =:condensatepump,
            compressorheater =:compressorheater,
            remotewaterpump =:remotewaterpump,
            waterswitch =:waterswitch,
            drycontacts =:drycontacts,
            vavsingle =:vavsingle,
            vavmulti =:vavmulti,
            walltemp =:walltemp,
            wallhumid =:wallhumid,
            ducttemp =:ducttemp,
            ducthumid =:ducthumid,
            bmsnone =:bmsnone,
            bmsmstp =:bmsmstp,
            bmsip =:bmsip,
            bmsmodbus =:bmsmodbus,
            bmstobedet =:bmstobedet,
            marveldisplay =:marveldisplay,
            scr =:scr,
            smokedetector =:smokedetector,
            firestat =:firestat,
            shipsplit =:shipsplit,
            compressorcover =:compressorcover,
            protectivenone =:protectivenone,
            electrocoil =:electrocoil,
            heresite =:heresite,
            unitinsulnone =:unitinsulnone,
            elastomeric =:elastomeric,
            doublewall =:doublewall,
            nonstandard =:nonstandard 
            ";
           
            $this->unit=htmlspecialchars(strip_tags($this->unit));
            $this->t15=htmlspecialchars(strip_tags($this->t15));
            $this->t20=htmlspecialchars(strip_tags($this->t20));
            $this->t25=htmlspecialchars(strip_tags($this->t25));
            $this->t30=htmlspecialchars(strip_tags($this->t30));
            $this->t40=htmlspecialchars(strip_tags($this->t40));
            $this->t50=htmlspecialchars(strip_tags($this->t50));
            $this->t60=htmlspecialchars(strip_tags($this->t60));
            $this->t70=htmlspecialchars(strip_tags($this->t70));
            $this->t80=htmlspecialchars(strip_tags($this->t80));
            $this->t90=htmlspecialchars(strip_tags($this->t90));
            $this->v230=htmlspecialchars(strip_tags($this->v230));
            $this->v460=htmlspecialchars(strip_tags($this->v460));
            $this->v575=htmlspecialchars(strip_tags($this->v575));
            $this->singleleft=htmlspecialchars(strip_tags($this->singleleft));
            $this->singleright=htmlspecialchars(strip_tags($this->singleright));
            $this->doubleleft=htmlspecialchars(strip_tags($this->doubleright));
            $this->doubleright=htmlspecialchars(strip_tags($this->doubleright));

            $this->blowerdpd=htmlspecialchars(strip_tags($this->blowerdpd));
            $this->blowerecm=htmlspecialchars(strip_tags($this->blowerecm));

            $this->digitalnone=htmlspecialchars(strip_tags($this->digitalnone));
            $this->digitalmix=htmlspecialchars(strip_tags($this->digitalmix));
            $this->scrol=htmlspecialchars(strip_tags($this->scrol));
            $this->speed=htmlspecialchars(strip_tags($this->speed));

            $this->in2merv8=htmlspecialchars(strip_tags($this->in2merv8));
            $this->in2merv11=htmlspecialchars(strip_tags($this->in2merv11));
            $this->in2merv13=htmlspecialchars(strip_tags($this->in2merv13));
            $this->in4merv8=htmlspecialchars(strip_tags($this->in4merv8));
            $this->in4merv11=htmlspecialchars(strip_tags($this->in4merv11));
            $this->in4merv13=htmlspecialchars(strip_tags($this->in4merv13));
            $this->in4merv8and13=htmlspecialchars(strip_tags($this->in4merv8and13));

            $this->heatnone=htmlspecialchars(strip_tags($this->heatnone));
            $this->kw15=htmlspecialchars(strip_tags($this->kw15));
            $this->kw20=htmlspecialchars(strip_tags($this->kw20));
            $this->kw25=htmlspecialchars(strip_tags($this->kw25));
            $this->kw30=htmlspecialchars(strip_tags($this->kw30));
            $this->kw40=htmlspecialchars(strip_tags($this->kw40));
            $this->kw45=htmlspecialchars(strip_tags($this->kw45));
            $this->kw50=htmlspecialchars(strip_tags($this->kw50));
            $this->kw60=htmlspecialchars(strip_tags($this->kw60));
            $this->heatsteamcoil=htmlspecialchars(strip_tags($this->heatsteamcoil));
            $this->heathotwatercoil=htmlspecialchars(strip_tags($this->heathotwatercoil));

            $this->fluid1=htmlspecialchars(strip_tags($this->fluid1));
            $this->reheattype=htmlspecialchars(strip_tags($this->reheattype));
            $this->airsideecon=htmlspecialchars(strip_tags($this->airsideecon));
            $this->chilledwatercoil=htmlspecialchars(strip_tags($this->chilledwatercoil));
            $this->watersideecon=htmlspecialchars(strip_tags($this->watersideecon));
            $this->heatnreheat=htmlspecialchars(strip_tags($this->heatnreheat));
            $this->fluid2=htmlspecialchars(strip_tags($this->fluid2));
            $this->nonfused=htmlspecialchars(strip_tags($this->nonfused));
            $this->nonfusedtrue=htmlspecialchars(strip_tags($this->nonfusedtrue));
            $this->phasereversalsens=htmlspecialchars(strip_tags($this->phasereversalsens));
            $this->freezestat=htmlspecialchars(strip_tags($this->freezestat));
            $this->tempavg=htmlspecialchars(strip_tags($this->tempavg));
            $this->condensatepump=htmlspecialchars(strip_tags($this->condensatepump));
            $this->compressorheater=htmlspecialchars(strip_tags($this->compressorheater));
            $this->remotewaterpump=htmlspecialchars(strip_tags($this->remotewaterpump));
            $this->waterswitch=htmlspecialchars(strip_tags($this->waterswitch));
            $this->drycontacts=htmlspecialchars(strip_tags($this->drycontacts));
            $this->vavsingle=htmlspecialchars(strip_tags($this->vavsingle));
            $this->vavmulti=htmlspecialchars(strip_tags($this->vavmulti));
            $this->walltemp=htmlspecialchars(strip_tags($this->walltemp));
            $this->wallhumid=htmlspecialchars(strip_tags($this->wallhumid));
            $this->ducttemp=htmlspecialchars(strip_tags($this->ducttemp));
            $this->ducthumid=htmlspecialchars(strip_tags($this->ducthumid));
            $this->bmsnone=htmlspecialchars(strip_tags($this->bmsnone));
            $this->bmsmstp=htmlspecialchars(strip_tags($this->bmsmstp));
            $this->bmsip=htmlspecialchars(strip_tags($this->bmsip));
            $this->bmsmodbus=htmlspecialchars(strip_tags($this->bmsmodbus));
            $this->bmstobedet=htmlspecialchars(strip_tags($this->bmstobedet));
            $this->marveldisplay=htmlspecialchars(strip_tags($this->marveldisplay));
            $this->scr=htmlspecialchars(strip_tags($this->scr));
            $this->smokedetector=htmlspecialchars(strip_tags($this->smokedetector));
            $this->firestat=htmlspecialchars(strip_tags($this->firestat));
            $this->shipsplit=htmlspecialchars(strip_tags($this->shipsplit));
            $this->compressorcover=htmlspecialchars(strip_tags($this->compressorcover));
            $this->protectivenone=htmlspecialchars(strip_tags($this->protectivenone));
            $this->electrocoil=htmlspecialchars(strip_tags($this->electrocoil));
            $this->heresite=htmlspecialchars(strip_tags($this->heresite));
            $this->unitinsulnone=htmlspecialchars(strip_tags($this->unitinsulnone));
            $this->elastomeric=htmlspecialchars(strip_tags($this->elastomeric));
            $this->doublewall=htmlspecialchars(strip_tags($this->doublewall));
            $this->nonstandard=htmlspecialchars(strip_tags($this->nonstandard));

            $statement = $this->conn->prepare($qry);
            
            $statement->bindParam(":unit",$this->unit);
            $statement->bindParam(":t15",$this->t15);
            $statement->bindParam(":t20",$this->t20);
            $statement->bindParam(":t25",$this->t25);
            $statement->bindParam(":t30",$this->t30);
            $statement->bindParam(":t40",$this->t40);
            $statement->bindParam(":t50",$this->t50);
            $statement->bindParam(":t60",$this->t60);
            $statement->bindParam(":t70",$this->t70);
            $statement->bindParam(":t80",$this->t80);
            $statement->bindParam(":t90",$this->t90);
            $statement->bindParam(":v230",$this->v230);
            $statement->bindParam(":v460",$this->v460);
            $statement->bindParam(":v575",$this->v575);
            $statement->bindParam(":singleleft",$this->singleleft);
            $statement->bindParam(":singleright",$this->singleright);
            $statement->bindParam(":doubleleft",$this->doubleleft);
            $statement->bindParam(":doubleright",$this->doubleright);

            $statement->bindParam(":blowerdpd",$this->blowerdpd);
            $statement->bindParam(":blowerecm",$this->blowerecm);

            $statement->bindParam(":digitalnone",$this->digitalnone);
            $statement->bindParam(":digitalmix",$this->digitalmix);
            $statement->bindParam(":scrol",$this->scrol);
            $statement->bindParam(":speed",$this->speed);

            $statement->bindParam(":in2merv8",$this->in2merv8);
            $statement->bindParam(":in2merv11",$this->in2merv11);
            $statement->bindParam(":in2merv13",$this->in2merv13);
            $statement->bindParam(":in4merv8",$this->in4merv8);
            $statement->bindParam(":in4merv11",$this->in4merv11);
            $statement->bindParam(":in4merv13",$this->in4merv13);
            $statement->bindParam(":in4merv8and13",$this->in4merv8and13);

            $statement->bindParam(":heatnone",$this->heatnone);
            $statement->bindParam(":kw15",$this->kw15);
            $statement->bindParam(":kw20",$this->kw20);
            $statement->bindParam(":kw25",$this->kw25);
            $statement->bindParam(":kw30",$this->kw30);
            $statement->bindParam(":kw40",$this->kw40);
            $statement->bindParam(":kw45",$this->kw45);
            $statement->bindParam(":kw50",$this->kw50);
            $statement->bindParam(":kw60",$this->kw60);
            $statement->bindParam(":heatsteamcoil",$this->heatsteamcoil);
            $statement->bindParam(":heathotwatercoil",$this->heathotwatercoil);
            
            $statement->bindParam(":fluid1",$this->fluid1);
            $statement->bindParam(":reheattype",$this->reheattype);
            $statement->bindParam(":airsideecon",$this->airsideecon);
            $statement->bindParam(":chilledwatercoil",$this->chilledwatercoil);
            $statement->bindParam(":watersideecon",$this->watersideecon);
            $statement->bindParam(":heatnreheat",$this->heatnreheat);
            $statement->bindParam(":fluid2",$this->fluid2);
            $statement->bindParam(":nonfused",$this->nonfused);
            $statement->bindParam(":nonfusedtrue",$this->nonfusedtrue);
            $statement->bindParam(":phasereversalsens",$this->phasereversalsens);
            $statement->bindParam(":freezestat",$this->freezestat);
            $statement->bindParam(":tempavg",$this->tempavg);
            $statement->bindParam(":condensatepump",$this->condensatepump);
            $statement->bindParam(":compressorheater",$this->compressorheater);
            $statement->bindParam(":remotewaterpump",$this->remotewaterpump);
            $statement->bindParam(":waterswitch",$this->waterswitch);
            $statement->bindParam(":drycontacts",$this->drycontacts);
            $statement->bindParam(":vavsingle",$this->vavsingle);
            $statement->bindParam(":vavmulti",$this->vavmulti);
            $statement->bindParam(":walltemp",$this->walltemp);
            $statement->bindParam(":wallhumid",$this->wallhumid);
            $statement->bindParam(":ducttemp",$this->ducttemp);
            $statement->bindParam(":ducthumid",$this->ducthumid);
            $statement->bindParam(":bmsnone",$this->bmsnone);
            $statement->bindParam(":bmsmstp",$this->bmsmstp);
            $statement->bindParam(":bmsip",$this->bmsip);
            $statement->bindParam(":bmsmodbus",$this->bmsmodbus);
            $statement->bindParam(":bmstobedet",$this->bmstobedet);
            $statement->bindParam(":marveldisplay",$this->marveldisplay);
            $statement->bindParam(":scr",$this->scr);
            $statement->bindParam(":smokedetector",$this->smokedetector);
            $statement->bindParam(":firestat",$this->firestat);
            $statement->bindParam(":shipsplit",$this->shipsplit);
            $statement->bindParam(":compressorcover",$this->compressorcover);
            $statement->bindParam(":protectivenone",$this->protectivenone);
            $statement->bindParam(":electrocoil",$this->electrocoil);
            $statement->bindParam(":heresite",$this->heresite);
            $statement->bindParam(":unitinsulnone",$this->unitinsulnone);
            $statement->bindParam(":elastomeric",$this->elastomeric);
            $statement->bindParam(":doublewall",$this->doublewall);
            $statement->bindParam(":nonstandard",$this->nonstandard);

            if($statement->execute()){
                return true;
            }return false;
        }
    }
?>