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
    ?>
    <?php if ($consommation <=150) {
             if  ($consommation>=0 && $consommation<=100){
                $montantHT = $consommation*$pu;
                $trancheNa = "Tranche 1";
             } elseif ($consommation>=101 && $consommation>=150){
                $pu = 0.883;
                $montantHT = 100*$pu;
                $tranche1 = 100;
                $tranche2 = $consommation-100;
                $montantHT = $tranche2*$pu;
                $trancheNa = "Tranche 1";
                $trancheNa = "Tranche 2";
                
             }
            }elseif($consommation>150){
                if ($consommation>=151 && $consommation<=210){ 
                    $pu = 0.9451;
                    $montantHT = $consommation*$pu;
                    $trancheNa = "Tranche 3";
                }elseif ($consommation>210 && $consommation<=310){
                    $pu = 1.0489;
                    $montantHT = $consommation*$pu; 
                    $trancheNa = "Tranche 4";
                }elseif ($consommation>310 && $consommation<=510){
                    $pu = 1.2915;
                    $montantHT = $consommation*$pu; 
                    $trancheNa = "Tranche 5";
                }elseif ($consommation>510){
                    $pu = 1.4975;
                    $montantHT = $consommation*$pu; 
                    $trancheNa = "Tranche 6";
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
            ?>
    <table class=" table table-bordered">
        <thead>
            <tr>
                <th scope="col">Ancien index : <?php echo $ancienInd ?></th>
                <th scope="col">Nouvel index : <?php echo $nouvelInd ?></th>
                <th scope="col">Consommation : <?php echo  $consommation?></th>
            </tr>
        </thead>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th></th>
                    <th>مفوتر <br><span>Facturé</span></th>
                    <th>س.و<br><span>P.U</span></th>
                    <th>مبلغ د.إ.ر <br><span></span>Montant HT</th>
                    <th>ض.ق.م <br><span></span>Taux TVA</th>
                    <th>مبلغ الرسوم <br><span> </span>Montant Taxes</th>
                    <th><span></span></th>
                </tr>

                <tr>
                    <th>CONSOMMATION ELECTRICITE</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>ستھلاك الكھرباء</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo $trancheNa?></td>
                    <td><?php echo $consommation?> </td>
                    <td><?php echo $pu?></td>
                    <td><?php echo $montantHT?></td>
                    <td><?php echo $tva?></td>
                    <td><?php echo $montantTaxe?> </td>
                    <td>1 الشطر </td>
                </tr>
                <tr>
                    <th>REDEVANCE FIXE ELECTRICITE </th>
                    <td></td>
                    <td></td>
                    <td><?php echo $redeence?></td>
                    <td><?php echo $tva?></td>
                    <td><?php echo $redevenceTax?></td>
                    <th>إثاوة الكهرباء </th>
                </tr>
                <th>TAXES POUR LE COMPTE DE L’ETAT</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th>الرسوم المؤداة لفائدة الدولة</th>
                <tr>
                    <td>TOTAL TVA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> $totalTva</td>
                    <td>مجموع ض.ق.م</td>
                </tr>
                <tr>
                    <td>TIMBRE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>$timbre </td>
                    <td> الطابع</td>
                </tr>

                <th>SOUS-TOTAL</th>
                <td></td>
                <td></td>
                <th>$sousTot</th>
                <td></td>
                <th>$sousTtva</th>
                <th> الجزئي المجموع</th>

            </tbody>
        </table>

    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>

</body>

</html>

</html>