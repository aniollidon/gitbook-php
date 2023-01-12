<?php

require_once "includes/db.php";

$db = DB::get_instance();

function inline_var_export(mixed $a): string{
    $val = var_export($a, true);
    $val = trim(stripslashes($val));
    $val=str_replace("\r\n","",$val);
    $val=str_replace("\n","\t",$val);
    $val=str_replace(" ","",$val);
    $val=str_replace("<br>","",$val);
    return str_replace("<br />","",$val);
}
function compara_arrays(array $a, array $b) {
    $sa = serialize($a);
    $sb = serialize($b);

    if($sa == $sb)
        echo "correcte";
    else
        echo "incorrecte: <br><pre>".inline_var_export($a). "<br>" . inline_var_export($b). "</pre>";
}

echo "get_demarcacions <br>";
$res = $db->get_demarcacions();
$gt = array (
    0 => 'Barcelona',
    1 => 'Girona',
    2 => 'Lleida',
    3 => 'Tarragona',
);
compara_arrays($gt, $res);
echo "<br><br>";

echo "get_all_partits <br>";
$res = $db->get_all_partits();
$gt = array (
    0 =>
        array (
            'nom' => 'Alianza Por El Comercio y la Vivienda',
            'color' => '#304FFE',
            'curt' => 'ALIANZA C V',
        ),
    1 =>
        array (
            'nom' => 'Ciutadans - Partido de la Ciudadanía',
            'color' => '#FF7200',
            'curt' => 'Cs',
        ),
    2 =>
        array (
            'nom' => 'Candidatura D’unitat Popular - un nou cicle per Guanyar',
            'color' => '#FFFB00',
            'curt' => 'CUP-G',
        ),
    3 =>
        array (
            'nom' => 'Escons en Blanc',
            'color' => '#595959FF',
            'curt' => 'EB',
        ),
    4 =>
        array (
            'nom' => 'En Comú Podem - Podem en Comú',
            'color' => '#9A00FF',
            'curt' => 'ECP-PEC',
        ),
    5 =>
        array (
            'nom' => 'Esquerra Republicana de Catalunya',
            'color' => '#FFC500',
            'curt' => 'ERC',
        ),
    6 =>
        array (
            'nom' => 'Front Nacional de Catalunya',
            'color' => '#3949AB',
            'curt' => 'FNC',
        ),
    7 =>
        array (
            'nom' => 'Izquierda en Positivo',
            'color' => '#00BFA5',
            'curt' => 'IZQP',
        ),
    8 =>
        array (
            'nom' => 'Junts per Catalunya',
            'color' => '#00FFA9',
            'curt' => 'JxCat',
        ),
    9 =>
        array (
            'nom' => 'Agrupació d\'Electors Lleida en Marxa',
            'color' => '#00ACC1',
            'curt' => 'LLEM',
        ),
    10 =>
        array (
            'nom' => 'Per un Món Més Just',
            'color' => '#00C853',
            'curt' => 'M+J',
        ),
    11 =>
        array (
            'nom' => 'Moviment Corrent Roig',
            'color' => '#F55828FF',
            'curt' => 'M.C.R.',
        ),
    12 =>
        array (
            'nom' => 'Moviment Primaries per la Independencia de Catalunya',
            'color' => '#FDD835',
            'curt' => 'MPIC',
        ),
    13 =>
        array (
            'nom' => 'Partit Animalista Contra El Maltractament Animal',
            'color' => '#A8B521FF',
            'curt' => 'PACMA',
        ),
    14 =>
        array (
            'nom' => 'Partit Comunista del Poble de Catalunya',
            'color' => '#1A237E',
            'curt' => 'PCPC',
        ),
    15 =>
        array (
            'nom' => 'Partit Comunista dels Treballadors de Catalunya',
            'color' => '#8A1111FF',
            'curt' => 'PCTC',
        ),
    16 =>
        array (
            'nom' => 'Partit democrata Europeu Català',
            'color' => '#0013FF',
            'curt' => 'PdeCAT',
        ),
    17 =>
        array (
            'nom' => 'Partido Familia i Vida',
            'color' => '#9C27B0',
            'curt' => 'PFiV',
        ),
    18 =>
        array (
            'nom' => 'Partit Nacionalista de Catalunya',
            'color' => '#E53935',
            'curt' => 'PNC',
        ),
    19 =>
        array (
            'nom' => 'Partit Popular',
            'color' => '#3399FF',
            'curt' => 'PP',
        ),
    20 =>
        array (
            'nom' => 'Partit dels Socialistes de Catalunya',
            'color' => '#FF0000',
            'curt' => 'PSC',
        ),
    21 =>
        array (
            'nom' => 'Recortes Cero - Grup Verd - Municipalistes',
            'color' => '#64DD17',
            'curt' => 'RECORTES CERO-GV-M',
        ),
    22 =>
        array (
            'nom' => 'Suport Civil Català',
            'color' => '#1DE9B6',
            'curt' => 'SCAT',
        ),
    23 =>
        array (
            'nom' => 'Som Terres de L\'Ebre',
            'color' => '#FFD900FF',
            'curt' => 'SOM TERRES DE L\'EBRE',
        ),
    24 =>
        array (
            'nom' => 'Unión Europea de Pensionistas',
            'color' => '#FFC400',
            'curt' => 'UEP',
        ),
    25 =>
        array (
            'nom' => 'Unidos por la democracia + jubilados',
            'color' => '#FF6F00',
            'curt' => 'UNIDOS-def-PDSJE-Som',
        ),
    26 =>
        array (
            'nom' => 'Volt Europa',
            'color' => '#00B8D4',
            'curt' => 'VOLT',
        ),
    27 =>
        array (
            'nom' => 'Vox',
            'color' => '#2EFF00',
            'curt' => 'VOX',
        ),
);
compara_arrays($gt, $res);

echo "<br><br>";

echo "get_partits <br>";
$res = $db->get_partits("Girona");
$gt = array (
    0 =>
        array (
            'nom' => 'Ciutadans - Partido de la Ciudadanía',
            'color' => '#FF7200',
            'curt' => 'Cs',
        ),
    1 =>
        array (
            'nom' => 'Candidatura D’unitat Popular - un nou cicle per Guanyar',
            'color' => '#FFFB00',
            'curt' => 'CUP-G',
        ),
    2 =>
        array (
            'nom' => 'En Comú Podem - Podem en Comú',
            'color' => '#9A00FF',
            'curt' => 'ECP-PEC',
        ),
    3 =>
        array (
            'nom' => 'Esquerra Republicana de Catalunya',
            'color' => '#FFC500',
            'curt' => 'ERC',
        ),
    4 =>
        array (
            'nom' => 'Front Nacional de Catalunya',
            'color' => '#3949AB',
            'curt' => 'FNC',
        ),
    5 =>
        array (
            'nom' => 'Izquierda en Positivo',
            'color' => '#00BFA5',
            'curt' => 'IZQP',
        ),
    6 =>
        array (
            'nom' => 'Junts per Catalunya',
            'color' => '#00FFA9',
            'curt' => 'JxCat',
        ),
    7 =>
        array (
            'nom' => 'Per un Món Més Just',
            'color' => '#00C853',
            'curt' => 'M+J',
        ),
    8 =>
        array (
            'nom' => 'Moviment Primaries per la Independencia de Catalunya',
            'color' => '#FDD835',
            'curt' => 'MPIC',
        ),
    9 =>
        array (
            'nom' => 'Partit Animalista Contra El Maltractament Animal',
            'color' => '#A8B521FF',
            'curt' => 'PACMA',
        ),
    10 =>
        array (
            'nom' => 'Partit Comunista del Poble de Catalunya',
            'color' => '#1A237E',
            'curt' => 'PCPC',
        ),
    11 =>
        array (
            'nom' => 'Partit Comunista dels Treballadors de Catalunya',
            'color' => '#8A1111FF',
            'curt' => 'PCTC',
        ),
    12 =>
        array (
            'nom' => 'Partit democrata Europeu Català',
            'color' => '#0013FF',
            'curt' => 'PdeCAT',
        ),
    13 =>
        array (
            'nom' => 'Partit Nacionalista de Catalunya',
            'color' => '#E53935',
            'curt' => 'PNC',
        ),
    14 =>
        array (
            'nom' => 'Partit Popular',
            'color' => '#3399FF',
            'curt' => 'PP',
        ),
    15 =>
        array (
            'nom' => 'Partit dels Socialistes de Catalunya',
            'color' => '#FF0000',
            'curt' => 'PSC',
        ),
    16 =>
        array (
            'nom' => 'Recortes Cero - Grup Verd - Municipalistes',
            'color' => '#64DD17',
            'curt' => 'RECORTES CERO-GV-M',
        ),
    17 =>
        array (
            'nom' => 'Vox',
            'color' => '#2EFF00',
            'curt' => 'VOX',
        ),
);
compara_arrays($gt, $res);
echo "<br><br>";

echo "find_demarcacio <br>";
var_export($db->find_demarcacio("Girona"));
echo "-";
var_export($db->find_demarcacio("Gorona") == false);
echo "<br><br>";

echo "get_num_escons <br>";
var_export($db->get_num_escons("Girona") == 17);
echo "-";
var_export($db->get_num_escons("Barcelona") == 85);
echo "<br><br>";

echo "set_vots <br>";
$vots = array (
    'Cs' => '8935',
    'CUP-G' => '24837',
    'EB' => '5',
    'ECP-PEC' => '11101',
    'ERC' => '59893',
    'FNC' => '873',
    'IZQP' => '2',
    'JxCat' => '89770',
    'M+J' => '167',
    'MPIC' => '3',
    'PACMA' => '109',
    'PCPC' => '483',
    'PCTC' => '357',
    'PdeCAT' => '8755',
    'PFiV' => '668',
    'PNC' => '886',
    'PP' => '5470',
    'PSC' => '41678',
    'RECORTES CERO-GV-M' => '615',
    'UNIDOS-def-PDSJE-Som' => '0',
    'VOLT' => '105',
    'VOX' => '16917',
);
$db -> set_vots("Girona", $vots);

echo "get_vots <br>";
$var = $db->get_vots("Girona");
compara_arrays($var, $vots);
echo "<br><br>";

echo "set_escons <br>";
$esconsg = array (
    'Cs' => '0',
    'CUP-G' => '2',
    'EB' => '0',
    'ECP-PEC' => '0',
    'ERC' => '4',
    'JxCat' => '7',
    'PdeCAT' => '0',
    'PSC' => '3',
    'VOX' => '1',
);
$db -> set_escons("Girona", $esconsg);

echo "get_escons <br>";
$var = $db->get_escons("Girona");
compara_arrays($var, $esconsg);
echo "<br><br>";

echo "set_escons <br>";
$esconsl = array (
    'Cs' => '1',
    'CUP-G' => '1',
    'EB' => '1',
    'ECP-PEC' => '1',
    'ERC' => '1',
    'JxCat' => '1',
    'PdeCAT' => '1',
    'PSC' => '1',
    'VOX' => '1',
);
$db -> set_escons("Lleida", $esconsl);

echo "get_all_escons <br>";
$esconst = [];
foreach ($esconsg as $k => $v){
    $esconst[$k] = strval(intval($v) + intval(($esconsl[$k]) ?? 0));
}
$res = $db->get_all_escons();
compara_arrays($res, $esconst);
echo "<br><br>";

//echo "set_escons <br>";
//var_export($db->set_escons());
//echo "<br><br>";

echo "count_demarcacio_with_escons <br>";
var_export($db->count_demarcacio_with_escons() == 2);
echo "<br><br>";
