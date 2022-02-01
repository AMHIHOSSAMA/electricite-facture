<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php 
        $ancienInd =  $_POST['ancienindex'];
        $nouvelInd =  $_POST['nouvelindex'];
        $calibre =  $_POST['calibre'];
        $consommation = $nouvelInd - $ancienInd;   
        $montantHT ="";
        $taxe ="";
        $timbre = 0.45;
        $pu = 0.794;
        $tranche1 ="";
        $tranche2 ="";
        $tva = "14%";
        $taxeTva = 0.14;
        $montantHT = $consommation*$pu;
        $calibretx = "";
        $redeence = "";
        $trancheNa = "";
        $timbre = 0.45; 
        $montantTaxe = $taxeTva*$montantHT;
        $arabicTra = "";
    ?>
    <?php if ($consommation <=150) {
             if  ($consommation>=0 && $consommation<=100){
                $montantHT = $consommation*$pu;
                $trancheNa = "Tranche 1";
                $arabicTra = "1 الشطر";
             } elseif ($consommation>=101 && $consommation>=150){
                $pu = 0.883;
                $montantHT = 100*$pu;
                $tranche1 = 100;
                $tranche2 = $consommation-100;
                $montantHT = $tranche2*$pu;
                $trancheNa = "Tranche 1";
                $trancheNa = "Tranche 2";
                $arabicTra = "1 الشطر";
                $arabicTra = "2 الشطر";
                
             }
            }elseif($consommation>150){
                if ($consommation>=151 && $consommation<=210){ 
                    $pu = 0.9451;
                    $montantHT = $consommation*$pu;
                    $trancheNa = "Tranche 3";
                    $arabicTra = "3 الشطر";
                }elseif ($consommation>210 && $consommation<=310){
                    $pu = 1.0489;
                    $montantHT = $consommation*$pu; 
                    $trancheNa = "Tranche 4";
                    $arabicTra = "4 الشطر";
                }elseif ($consommation>310 && $consommation<=510){
                    $pu = 1.2915;
                    $montantHT = $consommation*$pu; 
                    $trancheNa = "Tranche 5";
                    $arabicTra = "5 الشطر";
                }elseif ($consommation>510){
                    $pu = 1.4975;
                    $montantHT = $consommation*$pu; 
                    $trancheNa = "Tranche 6";
                    $arabicTra = "6 الشطر";
                }
            }
        
            if ( $calibre == "5-10") {
                $redeence = 22.65;
                $redevenceTax = $redeence*$taxeTva; 
            } else if($calibre == "15-20"){
                $redeence = 37.05;
                $redevenceTax = $redeence*$taxeTva;
            }else if($calibre == ">30"){
                $redeence = 46.20;
                $redevenceTax = $redeence*$taxeTva;
            }
            $totalTva = $montantTaxe + $redevenceTax;
                   $sousTotal = $montantHT+$redeence;
            ?>
    <table class="table table-bordered" id="tables">
        <thead>
            <tr>
                <th class="textcenter" scope="col"><span class="spn">Ancien index :</span>  <?php echo $ancienInd ?> </th>
                <th class="textcenter" scope="col"><span class="spn">Nouvel index :</span> <?php echo $nouvelInd ?></th>
                <th class="textcenter" scope="col"><span class="spn">Consommation :</span> <?php echo  $consommation." "?>kwh</th>
            </tr>
        </thead>
        <table class="table table-borderless">
            <thead >
                <tr>
                    <th></th>
                    <th class="textcenter">مفوتر <br><span>Facturé</span></th>
                    <th class="textcenter">س.و<br><span>P.U</span></th>
                    <th class="textcenter">مبلغ د.إ.ر <br><span></span>Montant HT</th>
                    <th class="textcenter">ض.ق.م <br><span></span>Taux TVA</th>
                    <th class="textcenter">مبلغ الرسوم <br><span> </span>Montant Taxes</th>
                    <th class="textcenter"><span></span></th>
                </tr>

                <tr>
                    <th>CONSOMMATION ELECTRICITE</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th class="textright">ستھلاك الكھرباء</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo $trancheNa?></td>
                    <td class="textcenter"><?php echo $consommation?> </td>
                    <td class="textcenter"><?php echo $pu?></td>
                    <td class="textcenter"><?php echo $montantHT?></td>
                    <td class="textcenter"><?php echo $tva?></td>
                    <td class="textcenter"><?php echo $montantTaxe?> </td>
                    <td class="textright"><?php echo $arabicTra ?></td>
                </tr>
                <tr>
                    <th>REDEVANCE FIXE ELECTRICITE </th>
                    <td></td>
                    <td></td>
                    <td class="textcenter"><?php echo $redeence?></td>
                    <td class="textcenter"><?php echo $tva?></td>
                    <td class="textcenter"><?php echo $redevenceTax?></td>
                    <th class="textright">إثاوة الكهرباء </th>
                </tr>
                <th>TAXES POUR LE COMPTE DE L’ETAT</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th class="textright">الرسوم المؤداة لفائدة الدولة</th>
                <tr>
                    <td>TOTAL TVA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="textcenter"><?php echo $totalTva ?></td>
                    <td class="textright">مجموع ض.ق.م</td>
                </tr>
                <tr>
                    <td>TIMBRE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="textcenter"><?php echo $timbre?></td>
                    <td class="textright"> الطابع</td>
                </tr>

                <th>SOUS-TOTAL</th>
                <td></td>
                <td></td>
                <th class="textcenter"><?php echo $sousTotal?></th>
                <td></td>
                <th class="textcenter"><?php echo $totalTva+$timbre ?></th>
                <th class="textright"> الجزئي المجموع</th>

            </tbody>
            <tbody>
            <th>TOTAL ÉLECTRICITÉ</th>
                <td></td>
                <td></td>
                <th class="textcenter"><?php echo $sousTotal+$totalTva+$timbre?></th>
                <td></td>
                <th></th>
                <th class="textright">   مجموع الكهرباء</th>
            </tbody>
        </table>

    </table>
    <button id="darkbutton" type="button" class="btn btn-dark btn-lg" onclick="window.print();return false;">Dark</button>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>

</body>

</html>

</html>