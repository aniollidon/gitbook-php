<?php

require_once "includes/db.php";

/*
DELETE FROM `vots` WHERE 1;
DELETE FROM `escons` WHERE 1;
*/

$db = DB::get_instance();

function inline_var_export(mixed $a): string
{
    $val = var_export($a, true) . "#";
    $val = str_replace("'", "", $val);
    $val = trim(stripslashes($val));
    $val = str_replace("\r\n", "", $val);
    $val = str_replace("\n", " ", $val);
    //$val=str_replace(" ","",$val);
    $val = str_replace("<br>", "", $val);
    $val = str_replace("<br />", "", $val);
    $val = str_replace("array (", "[", $val);
    $val = str_replace("),", "],", $val);
    $val = str_replace(")#", "]", $val);

    return $val;
}

function pinta_diff($s1, $s2)
{
    $out1 = "";
    $out2 = "";
    $out3 = "";
    $out4 = "";
    $ss1 = explode(",", inline_var_export($s1));
    $ss2 = explode(",", inline_var_export($s2));

    foreach ($ss1 as $k => $v) {
        $v2 = $ss2[$k] ?? null;
        echo $v == $v2 . " $v == $v2";
        if ($v == $v2) {
            $out1 .= $v . ',';
            if($v2) $out2 .= $v2 . ',';
        } else {
            $out1 .= "<span style='color:red'>$v,</span>";
            if($v2) $out2 .= "<span style='color:red'>$v2,</span>";
            $out3 .= "<span style='color:red'>$v,</span>";
            if($v2) $out4 .= "<span style='color:red'>$v2,</span>";
        }
    }
    return [$out1, $out2, $out3, $out4];
}

function compara_arrays(array $a, array $b)
{
    $sa = inline_var_export($a);
    $sb = inline_var_export($b);

    if ($sa == $sb) {
        echo "correcte";
    } else {
        echo "incorrecte: <br><pre>" . inline_var_export($a) . "<br>" . inline_var_export($b) . "</pre>";
        list($l1, $l2, $l3, $l4) = pinta_diff($a, $b);
        echo "<br><pre>GT: $l1<br>RES: $l2<br>GT: $l3<br>RES: $l4</pre>";
    }
}

echo "get_municipis <br>";
$res = $db->get_municipis();
$gt = array(
    0 =>
        array(
            'poblacio' => 'Abella de la Conca',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    1 =>
        array(
            'poblacio' => 'Abrera',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    2 =>
        array(
            'poblacio' => 'Àger',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    3 =>
        array(
            'poblacio' => 'Agramunt',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    4 =>
        array(
            'poblacio' => 'Aguilar de Segarra',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    5 =>
        array(
            'poblacio' => 'Agullana',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    6 =>
        array(
            'poblacio' => 'Aiguafreda',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    7 =>
        array(
            'poblacio' => 'Aiguamúrcia',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    8 =>
        array(
            'poblacio' => 'Aiguaviva',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    9 =>
        array(
            'poblacio' => 'Aitona',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    10 =>
        array(
            'poblacio' => 'Alamús, els',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    11 =>
        array(
            'poblacio' => 'Alàs i Cerc',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    12 =>
        array(
            'poblacio' => 'Albagés, l\'',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    13 =>
        array(
            'poblacio' => 'Albanyà',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    14 =>
        array(
            'poblacio' => 'Albatàrrec',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    15 =>
        array(
            'poblacio' => 'Albesa',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    16 =>
        array(
            'poblacio' => 'Albi, l\'',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    17 =>
        array(
            'poblacio' => 'Albinyana',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    18 =>
        array(
            'poblacio' => 'Albiol, l\'',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    19 =>
        array(
            'poblacio' => 'Albons',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    20 =>
        array(
            'poblacio' => 'Alcanar',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    21 =>
        array(
            'poblacio' => 'Alcanó',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    22 =>
        array(
            'poblacio' => 'Alcarràs',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    23 =>
        array(
            'poblacio' => 'Alcoletge',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    24 =>
        array(
            'poblacio' => 'Alcover',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    25 =>
        array(
            'poblacio' => 'Aldea, l\'',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    26 =>
        array(
            'poblacio' => 'Aldover',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    27 =>
        array(
            'poblacio' => 'Aleixar, l\'',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    28 =>
        array(
            'poblacio' => 'Alella',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    29 =>
        array(
            'poblacio' => 'Alfara de Carles',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    30 =>
        array(
            'poblacio' => 'Alfarràs',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    31 =>
        array(
            'poblacio' => 'Alfés',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    32 =>
        array(
            'poblacio' => 'Alforja',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    33 =>
        array(
            'poblacio' => 'Algerri',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    34 =>
        array(
            'poblacio' => 'Alguaire',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    35 =>
        array(
            'poblacio' => 'Alins',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    36 =>
        array(
            'poblacio' => 'Alió',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    37 =>
        array(
            'poblacio' => 'Almacelles',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    38 =>
        array(
            'poblacio' => 'Almatret',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    39 =>
        array(
            'poblacio' => 'Almenar',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    40 =>
        array(
            'poblacio' => 'Almoster',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    41 =>
        array(
            'poblacio' => 'Alòs de Balaguer',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    42 =>
        array(
            'poblacio' => 'Alp',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    43 =>
        array(
            'poblacio' => 'Alpens',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    44 =>
        array(
            'poblacio' => 'Alpicat',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    45 =>
        array(
            'poblacio' => 'Alt Àneu',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    46 =>
        array(
            'poblacio' => 'Altafulla',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    47 =>
        array(
            'poblacio' => 'Amer',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    48 =>
        array(
            'poblacio' => 'Ametlla de Mar, l\'',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    49 =>
        array(
            'poblacio' => 'Ametlla del Vallès, l\'',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    50 =>
        array(
            'poblacio' => 'Ampolla, l\'',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    51 =>
        array(
            'poblacio' => 'Amposta',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    52 =>
        array(
            'poblacio' => 'Anglès',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    53 =>
        array(
            'poblacio' => 'Anglesola',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    54 =>
        array(
            'poblacio' => 'Arbeca',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    55 =>
        array(
            'poblacio' => 'Arboç, l\'',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    56 =>
        array(
            'poblacio' => 'Arbolí',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    57 =>
        array(
            'poblacio' => 'Arbúcies',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    58 =>
        array(
            'poblacio' => 'Arenys de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    59 =>
        array(
            'poblacio' => 'Arenys de Munt',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    60 =>
        array(
            'poblacio' => 'Argelaguer',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    61 =>
        array(
            'poblacio' => 'Argençola',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    62 =>
        array(
            'poblacio' => 'Argentera, l\'',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    63 =>
        array(
            'poblacio' => 'Argentona',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    64 =>
        array(
            'poblacio' => 'Armentera, l\'',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    65 =>
        array(
            'poblacio' => 'Arnes',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    66 =>
        array(
            'poblacio' => 'Arres',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    67 =>
        array(
            'poblacio' => 'Arsèguel',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    68 =>
        array(
            'poblacio' => 'Artés',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    69 =>
        array(
            'poblacio' => 'Artesa de Lleida',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    70 =>
        array(
            'poblacio' => 'Artesa de Segre',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    71 =>
        array(
            'poblacio' => 'Ascó',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    72 =>
        array(
            'poblacio' => 'Aspa',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    73 =>
        array(
            'poblacio' => 'Avellanes i Santa Linya, les',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    74 =>
        array(
            'poblacio' => 'Avià',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    75 =>
        array(
            'poblacio' => 'Avinyó',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    76 =>
        array(
            'poblacio' => 'Avinyonet de Puigventós',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    77 =>
        array(
            'poblacio' => 'Avinyonet del Penedès',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    78 =>
        array(
            'poblacio' => 'Badalona',
            'comarca' => 'Barcelonès',
            'demarcacio' => 'Barcelona',
        ),
    79 =>
        array(
            'poblacio' => 'Badia del Vallès',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    80 =>
        array(
            'poblacio' => 'Bagà',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    81 =>
        array(
            'poblacio' => 'Baix Pallars',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    82 =>
        array(
            'poblacio' => 'Balaguer',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    83 =>
        array(
            'poblacio' => 'Balenyà',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    84 =>
        array(
            'poblacio' => 'Balsareny',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    85 =>
        array(
            'poblacio' => 'Banyeres del Penedès',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    86 =>
        array(
            'poblacio' => 'Banyoles',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    87 =>
        array(
            'poblacio' => 'Barbens',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    88 =>
        array(
            'poblacio' => 'Barberà de la Conca',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    89 =>
        array(
            'poblacio' => 'Barberà del Vallès',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    90 =>
        array(
            'poblacio' => 'Barcelona',
            'comarca' => 'Barcelonès',
            'demarcacio' => 'Barcelona',
        ),
    91 =>
        array(
            'poblacio' => 'Baronia de Rialb, la',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    92 =>
        array(
            'poblacio' => 'Bàscara',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    93 =>
        array(
            'poblacio' => 'Bassella',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    94 =>
        array(
            'poblacio' => 'Batea',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    95 =>
        array(
            'poblacio' => 'Bausen',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    96 =>
        array(
            'poblacio' => 'Begues',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    97 =>
        array(
            'poblacio' => 'Begur',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    98 =>
        array(
            'poblacio' => 'Belianes',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    99 =>
        array(
            'poblacio' => 'Bell-lloc d\'Urgell',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    100 =>
        array(
            'poblacio' => 'Bellaguarda',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    101 =>
        array(
            'poblacio' => 'Bellcaire d\'Empordà',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    102 =>
        array(
            'poblacio' => 'Bellcaire d\'Urgell',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    103 =>
        array(
            'poblacio' => 'Bellmunt d\'Urgell',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    104 =>
        array(
            'poblacio' => 'Bellmunt del Priorat',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    105 =>
        array(
            'poblacio' => 'Bellprat',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    106 =>
        array(
            'poblacio' => 'Bellpuig',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    107 =>
        array(
            'poblacio' => 'Bellvei',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    108 =>
        array(
            'poblacio' => 'Bellver de Cerdanya',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Lleida',
        ),
    109 =>
        array(
            'poblacio' => 'Bellvís',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    110 =>
        array(
            'poblacio' => 'Benavent de Segrià',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    111 =>
        array(
            'poblacio' => 'Benifallet',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    112 =>
        array(
            'poblacio' => 'Benissanet',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    113 =>
        array(
            'poblacio' => 'Berga',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    114 =>
        array(
            'poblacio' => 'Besalú',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    115 =>
        array(
            'poblacio' => 'Bescanó',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    116 =>
        array(
            'poblacio' => 'Beuda',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    117 =>
        array(
            'poblacio' => 'Bigues i Riells del Fai',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    118 =>
        array(
            'poblacio' => 'Biosca',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    119 =>
        array(
            'poblacio' => 'Bisbal d\'Empordà, la',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    120 =>
        array(
            'poblacio' => 'Bisbal de Falset, la',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    121 =>
        array(
            'poblacio' => 'Bisbal del Penedès, la',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    122 =>
        array(
            'poblacio' => 'Biure',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    123 =>
        array(
            'poblacio' => 'Blancafort',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    124 =>
        array(
            'poblacio' => 'Blanes',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    125 =>
        array(
            'poblacio' => 'Boadella i les Escaules',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    126 =>
        array(
            'poblacio' => 'Bolvir',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    127 =>
        array(
            'poblacio' => 'Bonastre',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    128 =>
        array(
            'poblacio' => 'Bòrdes, Es',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    129 =>
        array(
            'poblacio' => 'Bordils',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    130 =>
        array(
            'poblacio' => 'Borges Blanques, les',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    131 =>
        array(
            'poblacio' => 'Borges del Camp, les',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    132 =>
        array(
            'poblacio' => 'Borrassà',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    133 =>
        array(
            'poblacio' => 'Borredà',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    134 =>
        array(
            'poblacio' => 'Bossòst',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    135 =>
        array(
            'poblacio' => 'Bot',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    136 =>
        array(
            'poblacio' => 'Botarell',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    137 =>
        array(
            'poblacio' => 'Bovera',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    138 =>
        array(
            'poblacio' => 'Bràfim',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    139 =>
        array(
            'poblacio' => 'Breda',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    140 =>
        array(
            'poblacio' => 'Bruc, el',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    141 =>
        array(
            'poblacio' => 'Brull, el',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    142 =>
        array(
            'poblacio' => 'Brunyola i Sant Martí Sapresa',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    143 =>
        array(
            'poblacio' => 'Cabacés',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    144 =>
        array(
            'poblacio' => 'Cabanabona',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    145 =>
        array(
            'poblacio' => 'Cabanelles',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    146 =>
        array(
            'poblacio' => 'Cabanes',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    147 =>
        array(
            'poblacio' => 'Cabanyes, les',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    148 =>
        array(
            'poblacio' => 'Cabó',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    149 =>
        array(
            'poblacio' => 'Cabra del Camp',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    150 =>
        array(
            'poblacio' => 'Cabrera d\'Anoia',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    151 =>
        array(
            'poblacio' => 'Cabrera de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    152 =>
        array(
            'poblacio' => 'Cabrils',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    153 =>
        array(
            'poblacio' => 'Cadaqués',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    154 =>
        array(
            'poblacio' => 'Calaf',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    155 =>
        array(
            'poblacio' => 'Calafell',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    156 =>
        array(
            'poblacio' => 'Calders',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    157 =>
        array(
            'poblacio' => 'Caldes d\'Estrac',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    158 =>
        array(
            'poblacio' => 'Caldes de Malavella',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    159 =>
        array(
            'poblacio' => 'Caldes de Montbui',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    160 =>
        array(
            'poblacio' => 'Calella',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    161 =>
        array(
            'poblacio' => 'Calldetenes',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    162 =>
        array(
            'poblacio' => 'Callús',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    163 =>
        array(
            'poblacio' => 'Calonge de Segarra',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    164 =>
        array(
            'poblacio' => 'Calonge i Sant Antoni',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    165 =>
        array(
            'poblacio' => 'Camarasa',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    166 =>
        array(
            'poblacio' => 'Camarles',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    167 =>
        array(
            'poblacio' => 'Cambrils',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    168 =>
        array(
            'poblacio' => 'Camós',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    169 =>
        array(
            'poblacio' => 'Campdevànol',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    170 =>
        array(
            'poblacio' => 'Campelles',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    171 =>
        array(
            'poblacio' => 'Campins',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    172 =>
        array(
            'poblacio' => 'Campllong',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    173 =>
        array(
            'poblacio' => 'Camprodon',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    174 =>
        array(
            'poblacio' => 'Canejan',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    175 =>
        array(
            'poblacio' => 'Canet d\'Adri',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    176 =>
        array(
            'poblacio' => 'Canet de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    177 =>
        array(
            'poblacio' => 'Canonja, la',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    178 =>
        array(
            'poblacio' => 'Canovelles',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    179 =>
        array(
            'poblacio' => 'Cànoves i Samalús',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    180 =>
        array(
            'poblacio' => 'Cantallops',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    181 =>
        array(
            'poblacio' => 'Canyelles',
            'comarca' => 'Garraf',
            'demarcacio' => 'Barcelona',
        ),
    182 =>
        array(
            'poblacio' => 'Capafonts',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    183 =>
        array(
            'poblacio' => 'Capçanes',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    184 =>
        array(
            'poblacio' => 'Capellades',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    185 =>
        array(
            'poblacio' => 'Capmany',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    186 =>
        array(
            'poblacio' => 'Capolat',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    187 =>
        array(
            'poblacio' => 'Cardedeu',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    188 =>
        array(
            'poblacio' => 'Cardona',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    189 =>
        array(
            'poblacio' => 'Carme',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    190 =>
        array(
            'poblacio' => 'Caseres',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    191 =>
        array(
            'poblacio' => 'Cassà de la Selva',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    192 =>
        array(
            'poblacio' => 'Casserres',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    193 =>
        array(
            'poblacio' => 'Castell de l\'Areny',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    194 =>
        array(
            'poblacio' => 'Castell de Mur',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    195 =>
        array(
            'poblacio' => 'Castell-Platja d\'Aro',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    196 =>
        array(
            'poblacio' => 'Castellar de la Ribera',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    197 =>
        array(
            'poblacio' => 'Castellar de n\'Hug',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    198 =>
        array(
            'poblacio' => 'Castellar del Riu',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    199 =>
        array(
            'poblacio' => 'Castellar del Vallès',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    200 =>
        array(
            'poblacio' => 'Castellbell i el Vilar',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    201 =>
        array(
            'poblacio' => 'Castellbisbal',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    202 =>
        array(
            'poblacio' => 'Castellcir',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    203 =>
        array(
            'poblacio' => 'Castelldans',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    204 =>
        array(
            'poblacio' => 'Castelldefels',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    205 =>
        array(
            'poblacio' => 'Castellet i la Gornal',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    206 =>
        array(
            'poblacio' => 'Castellfollit de la Roca',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    207 =>
        array(
            'poblacio' => 'Castellfollit de Riubregós',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    208 =>
        array(
            'poblacio' => 'Castellfollit del Boix',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    209 =>
        array(
            'poblacio' => 'Castellgalí',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    210 =>
        array(
            'poblacio' => 'Castellnou de Bages',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    211 =>
        array(
            'poblacio' => 'Castellnou de Seana',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    212 =>
        array(
            'poblacio' => 'Castelló d\'Empúries',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    213 =>
        array(
            'poblacio' => 'Castelló de Farfanya',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    214 =>
        array(
            'poblacio' => 'Castellolí',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    215 =>
        array(
            'poblacio' => 'Castellserà',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    216 =>
        array(
            'poblacio' => 'Castellterçol',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    217 =>
        array(
            'poblacio' => 'Castellvell del Camp',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    218 =>
        array(
            'poblacio' => 'Castellví de la Marca',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    219 =>
        array(
            'poblacio' => 'Castellví de Rosanes',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    220 =>
        array(
            'poblacio' => 'Catllar, el',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    221 =>
        array(
            'poblacio' => 'Cava',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    222 =>
        array(
            'poblacio' => 'Cellera de Ter, la',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    223 =>
        array(
            'poblacio' => 'Celrà',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    224 =>
        array(
            'poblacio' => 'Centelles',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    225 =>
        array(
            'poblacio' => 'Cercs',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    226 =>
        array(
            'poblacio' => 'Cerdanyola del Vallès',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    227 =>
        array(
            'poblacio' => 'Cervelló',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    228 =>
        array(
            'poblacio' => 'Cervera',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    229 =>
        array(
            'poblacio' => 'Cervià de les Garrigues',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    230 =>
        array(
            'poblacio' => 'Cervià de Ter',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    231 =>
        array(
            'poblacio' => 'Cistella',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    232 =>
        array(
            'poblacio' => 'Ciutadilla',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    233 =>
        array(
            'poblacio' => 'Clariana de Cardener',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    234 =>
        array(
            'poblacio' => 'Cogul, el',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    235 =>
        array(
            'poblacio' => 'Colera',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    236 =>
        array(
            'poblacio' => 'Coll de Nargó',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    237 =>
        array(
            'poblacio' => 'Collbató',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    238 =>
        array(
            'poblacio' => 'Colldejou',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    239 =>
        array(
            'poblacio' => 'Collsuspina',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    240 =>
        array(
            'poblacio' => 'Colomers',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    241 =>
        array(
            'poblacio' => 'Coma i la Pedra, la',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    242 =>
        array(
            'poblacio' => 'Conca de Dalt',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    243 =>
        array(
            'poblacio' => 'Conesa',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    244 =>
        array(
            'poblacio' => 'Constantí',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    245 =>
        array(
            'poblacio' => 'Copons',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    246 =>
        array(
            'poblacio' => 'Corbera d\'Ebre',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    247 =>
        array(
            'poblacio' => 'Corbera de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    248 =>
        array(
            'poblacio' => 'Corbins',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    249 =>
        array(
            'poblacio' => 'Corçà',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    250 =>
        array(
            'poblacio' => 'Cornellà de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    251 =>
        array(
            'poblacio' => 'Cornellà del Terri',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    252 =>
        array(
            'poblacio' => 'Cornudella de Montsant',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    253 =>
        array(
            'poblacio' => 'Creixell',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    254 =>
        array(
            'poblacio' => 'Crespià',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    255 =>
        array(
            'poblacio' => 'Cruïlles, Monells i Sant Sadurní de l\'Heura',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    256 =>
        array(
            'poblacio' => 'Cubelles',
            'comarca' => 'Garraf',
            'demarcacio' => 'Barcelona',
        ),
    257 =>
        array(
            'poblacio' => 'Cubells',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    258 =>
        array(
            'poblacio' => 'Cunit',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    259 =>
        array(
            'poblacio' => 'Darnius',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    260 =>
        array(
            'poblacio' => 'Das',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    261 =>
        array(
            'poblacio' => 'Deltebre',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    262 =>
        array(
            'poblacio' => 'Dosrius',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    263 =>
        array(
            'poblacio' => 'Duesaigües',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    264 =>
        array(
            'poblacio' => 'Escala, l\'',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    265 =>
        array(
            'poblacio' => 'Esparreguera',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    266 =>
        array(
            'poblacio' => 'Espinelves',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    267 =>
        array(
            'poblacio' => 'Espluga Calba, l\'',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    268 =>
        array(
            'poblacio' => 'Espluga de Francolí, l\'',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    269 =>
        array(
            'poblacio' => 'Esplugues de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    270 =>
        array(
            'poblacio' => 'Espolla',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    271 =>
        array(
            'poblacio' => 'Esponellà',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    272 =>
        array(
            'poblacio' => 'Espot',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    273 =>
        array(
            'poblacio' => 'Espunyola, l\'',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    274 =>
        array(
            'poblacio' => 'Esquirol, l\'',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    275 =>
        array(
            'poblacio' => 'Estamariu',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    276 =>
        array(
            'poblacio' => 'Estany, l\'',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    277 =>
        array(
            'poblacio' => 'Estaràs',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    278 =>
        array(
            'poblacio' => 'Esterri d\'Àneu',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    279 =>
        array(
            'poblacio' => 'Esterri de Cardós',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    280 =>
        array(
            'poblacio' => 'Falset',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    281 =>
        array(
            'poblacio' => 'Far d\'Empordà, el',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    282 =>
        array(
            'poblacio' => 'Farrera',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    283 =>
        array(
            'poblacio' => 'Fatarella, la',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    284 =>
        array(
            'poblacio' => 'Febró, la',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    285 =>
        array(
            'poblacio' => 'Figaró-Montmany',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    286 =>
        array(
            'poblacio' => 'Fígols',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    287 =>
        array(
            'poblacio' => 'Fígols i Alinyà',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    288 =>
        array(
            'poblacio' => 'Figuera, la',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    289 =>
        array(
            'poblacio' => 'Figueres',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    290 =>
        array(
            'poblacio' => 'Figuerola del Camp',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    291 =>
        array(
            'poblacio' => 'Flaçà',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    292 =>
        array(
            'poblacio' => 'Flix',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    293 =>
        array(
            'poblacio' => 'Floresta, la',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    294 =>
        array(
            'poblacio' => 'Fogars de la Selva',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    295 =>
        array(
            'poblacio' => 'Fogars de Montclús',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    296 =>
        array(
            'poblacio' => 'Foixà',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    297 =>
        array(
            'poblacio' => 'Folgueroles',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    298 =>
        array(
            'poblacio' => 'Fondarella',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    299 =>
        array(
            'poblacio' => 'Fonollosa',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    300 =>
        array(
            'poblacio' => 'Font-rubí',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    301 =>
        array(
            'poblacio' => 'Fontanals de Cerdanya',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    302 =>
        array(
            'poblacio' => 'Fontanilles',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    303 =>
        array(
            'poblacio' => 'Fontcoberta',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    304 =>
        array(
            'poblacio' => 'Foradada',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    305 =>
        array(
            'poblacio' => 'Forallac',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    306 =>
        array(
            'poblacio' => 'Forès',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    307 =>
        array(
            'poblacio' => 'Fornells de la Selva',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    308 =>
        array(
            'poblacio' => 'Fortià',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    309 =>
        array(
            'poblacio' => 'Franqueses del Vallès, les',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    310 =>
        array(
            'poblacio' => 'Freginals',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    311 =>
        array(
            'poblacio' => 'Fuliola, la',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    312 =>
        array(
            'poblacio' => 'Fulleda',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    313 =>
        array(
            'poblacio' => 'Gaià',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    314 =>
        array(
            'poblacio' => 'Galera, la',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    315 =>
        array(
            'poblacio' => 'Gallifa',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    316 =>
        array(
            'poblacio' => 'Gandesa',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    317 =>
        array(
            'poblacio' => 'Garcia',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    318 =>
        array(
            'poblacio' => 'Garidells, els',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    319 =>
        array(
            'poblacio' => 'Garriga, la',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    320 =>
        array(
            'poblacio' => 'Garrigàs',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    321 =>
        array(
            'poblacio' => 'Garrigoles',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    322 =>
        array(
            'poblacio' => 'Garriguella',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    323 =>
        array(
            'poblacio' => 'Gavà',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    324 =>
        array(
            'poblacio' => 'Gavet de la Conca',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    325 =>
        array(
            'poblacio' => 'Gelida',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    326 =>
        array(
            'poblacio' => 'Ger',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    327 =>
        array(
            'poblacio' => 'Gimenells i el Pla de la Font',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    328 =>
        array(
            'poblacio' => 'Ginestar',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    329 =>
        array(
            'poblacio' => 'Girona',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    330 =>
        array(
            'poblacio' => 'Gironella',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    331 =>
        array(
            'poblacio' => 'Gisclareny',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    332 =>
        array(
            'poblacio' => 'Godall',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    333 =>
        array(
            'poblacio' => 'Golmés',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    334 =>
        array(
            'poblacio' => 'Gombrèn',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    335 =>
        array(
            'poblacio' => 'Gósol',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    336 =>
        array(
            'poblacio' => 'Granada, la',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    337 =>
        array(
            'poblacio' => 'Granadella, la',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    338 =>
        array(
            'poblacio' => 'Granera',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    339 =>
        array(
            'poblacio' => 'Granja d\'Escarp, la',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    340 =>
        array(
            'poblacio' => 'Granollers',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    341 =>
        array(
            'poblacio' => 'Granyanella',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    342 =>
        array(
            'poblacio' => 'Granyena de les Garrigues',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    343 =>
        array(
            'poblacio' => 'Granyena de Segarra',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    344 =>
        array(
            'poblacio' => 'Gratallops',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    345 =>
        array(
            'poblacio' => 'Gualba',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    346 =>
        array(
            'poblacio' => 'Gualta',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    347 =>
        array(
            'poblacio' => 'Guardiola de Berguedà',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    348 =>
        array(
            'poblacio' => 'Guiamets, els',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    349 =>
        array(
            'poblacio' => 'Guils de Cerdanya',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    350 =>
        array(
            'poblacio' => 'Guimerà',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    351 =>
        array(
            'poblacio' => 'Guingueta d\'Àneu, la',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    352 =>
        array(
            'poblacio' => 'Guissona',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    353 =>
        array(
            'poblacio' => 'Guixers',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    354 =>
        array(
            'poblacio' => 'Gurb',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    355 =>
        array(
            'poblacio' => 'Horta de Sant Joan',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    356 =>
        array(
            'poblacio' => 'Hospitalet de Llobregat, l\'',
            'comarca' => 'Barcelonès',
            'demarcacio' => 'Barcelona',
        ),
    357 =>
        array(
            'poblacio' => 'Hostalets de Pierola, els',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    358 =>
        array(
            'poblacio' => 'Hostalric',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    359 =>
        array(
            'poblacio' => 'Igualada',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    360 =>
        array(
            'poblacio' => 'Isona i Conca Dellà',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    361 =>
        array(
            'poblacio' => 'Isòvol',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    362 =>
        array(
            'poblacio' => 'Ivars d\'Urgell',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    363 =>
        array(
            'poblacio' => 'Ivars de Noguera',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    364 =>
        array(
            'poblacio' => 'Ivorra',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    365 =>
        array(
            'poblacio' => 'Jafre',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    366 =>
        array(
            'poblacio' => 'Jonquera, la',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    367 =>
        array(
            'poblacio' => 'Jorba',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    368 =>
        array(
            'poblacio' => 'Josa i Tuixén',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    369 =>
        array(
            'poblacio' => 'Juià',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    370 =>
        array(
            'poblacio' => 'Juncosa',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    371 =>
        array(
            'poblacio' => 'Juneda',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    372 =>
        array(
            'poblacio' => 'Les',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    373 =>
        array(
            'poblacio' => 'Linyola',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    374 =>
        array(
            'poblacio' => 'Llacuna, la',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    375 =>
        array(
            'poblacio' => 'Lladó',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    376 =>
        array(
            'poblacio' => 'Lladorre',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    377 =>
        array(
            'poblacio' => 'Lladurs',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    378 =>
        array(
            'poblacio' => 'Llagosta, la',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    379 =>
        array(
            'poblacio' => 'Llagostera',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    380 =>
        array(
            'poblacio' => 'Llambilles',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    381 =>
        array(
            'poblacio' => 'Llanars',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    382 =>
        array(
            'poblacio' => 'Llançà',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    383 =>
        array(
            'poblacio' => 'Llardecans',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    384 =>
        array(
            'poblacio' => 'Llavorsí',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    385 =>
        array(
            'poblacio' => 'Lleida',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    386 =>
        array(
            'poblacio' => 'Llers',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    387 =>
        array(
            'poblacio' => 'Lles de Cerdanya',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Lleida',
        ),
    388 =>
        array(
            'poblacio' => 'Lliçà d\'Amunt',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    389 =>
        array(
            'poblacio' => 'Lliçà de Vall',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    390 =>
        array(
            'poblacio' => 'Llimiana',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    391 =>
        array(
            'poblacio' => 'Llinars del Vallès',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    392 =>
        array(
            'poblacio' => 'Llívia',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    393 =>
        array(
            'poblacio' => 'Lloar, el',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    394 =>
        array(
            'poblacio' => 'Llobera',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    395 =>
        array(
            'poblacio' => 'Llorac',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    396 =>
        array(
            'poblacio' => 'Llorenç del Penedès',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    397 =>
        array(
            'poblacio' => 'Lloret de Mar',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    398 =>
        array(
            'poblacio' => 'Llosses, les',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    399 =>
        array(
            'poblacio' => 'Lluçà',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    400 =>
        array(
            'poblacio' => 'Maçanet de Cabrenys',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    401 =>
        array(
            'poblacio' => 'Maçanet de la Selva',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    402 =>
        array(
            'poblacio' => 'Madremanya',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    403 =>
        array(
            'poblacio' => 'Maià de Montcal',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    404 =>
        array(
            'poblacio' => 'Maials',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    405 =>
        array(
            'poblacio' => 'Maldà',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    406 =>
        array(
            'poblacio' => 'Malgrat de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    407 =>
        array(
            'poblacio' => 'Malla',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    408 =>
        array(
            'poblacio' => 'Manlleu',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    409 =>
        array(
            'poblacio' => 'Manresa',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    410 =>
        array(
            'poblacio' => 'Marçà',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    411 =>
        array(
            'poblacio' => 'Margalef',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    412 =>
        array(
            'poblacio' => 'Marganell',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    413 =>
        array(
            'poblacio' => 'Martorell',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    414 =>
        array(
            'poblacio' => 'Martorelles',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    415 =>
        array(
            'poblacio' => 'Mas de Barberans',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    416 =>
        array(
            'poblacio' => 'Masarac',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    417 =>
        array(
            'poblacio' => 'Masdenverge',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    418 =>
        array(
            'poblacio' => 'Masies de Roda, les',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    419 =>
        array(
            'poblacio' => 'Masies de Voltregà, les',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    420 =>
        array(
            'poblacio' => 'Masllorenç',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    421 =>
        array(
            'poblacio' => 'Masnou, el',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    422 =>
        array(
            'poblacio' => 'Masó, la',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    423 =>
        array(
            'poblacio' => 'Maspujols',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    424 =>
        array(
            'poblacio' => 'Masquefa',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    425 =>
        array(
            'poblacio' => 'Masroig, el',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    426 =>
        array(
            'poblacio' => 'Massalcoreig',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    427 =>
        array(
            'poblacio' => 'Massanes',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    428 =>
        array(
            'poblacio' => 'Massoteres',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    429 =>
        array(
            'poblacio' => 'Matadepera',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    430 =>
        array(
            'poblacio' => 'Mataró',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    431 =>
        array(
            'poblacio' => 'Mediona',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    432 =>
        array(
            'poblacio' => 'Menàrguens',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    433 =>
        array(
            'poblacio' => 'Meranges',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    434 =>
        array(
            'poblacio' => 'Mieres',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    435 =>
        array(
            'poblacio' => 'Milà, el',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    436 =>
        array(
            'poblacio' => 'Miralcamp',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    437 =>
        array(
            'poblacio' => 'Miravet',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    438 =>
        array(
            'poblacio' => 'Moià',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    439 =>
        array(
            'poblacio' => 'Molar, el',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    440 =>
        array(
            'poblacio' => 'Molins de Rei',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    441 =>
        array(
            'poblacio' => 'Mollerussa',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    442 =>
        array(
            'poblacio' => 'Mollet de Peralada',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    443 =>
        array(
            'poblacio' => 'Mollet del Vallès',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    444 =>
        array(
            'poblacio' => 'Molló',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    445 =>
        array(
            'poblacio' => 'Molsosa, la',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    446 =>
        array(
            'poblacio' => 'Monistrol de Calders',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    447 =>
        array(
            'poblacio' => 'Monistrol de Montserrat',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    448 =>
        array(
            'poblacio' => 'Mont-ral',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    449 =>
        array(
            'poblacio' => 'Mont-ras',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    450 =>
        array(
            'poblacio' => 'Mont-roig del Camp',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    451 =>
        array(
            'poblacio' => 'Montagut i Oix',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    452 =>
        array(
            'poblacio' => 'Montblanc',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    453 =>
        array(
            'poblacio' => 'Montbrió del Camp',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    454 =>
        array(
            'poblacio' => 'Montcada i Reixac',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    455 =>
        array(
            'poblacio' => 'Montclar',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    456 =>
        array(
            'poblacio' => 'Montellà i Martinet',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Lleida',
        ),
    457 =>
        array(
            'poblacio' => 'Montesquiu',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    458 =>
        array(
            'poblacio' => 'Montferrer i Castellbò',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    459 =>
        array(
            'poblacio' => 'Montferri',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    460 =>
        array(
            'poblacio' => 'Montgai',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    461 =>
        array(
            'poblacio' => 'Montgat',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    462 =>
        array(
            'poblacio' => 'Montmajor',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    463 =>
        array(
            'poblacio' => 'Montmaneu',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    464 =>
        array(
            'poblacio' => 'Montmell, el',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    465 =>
        array(
            'poblacio' => 'Montmeló',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    466 =>
        array(
            'poblacio' => 'Montoliu de Lleida',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    467 =>
        array(
            'poblacio' => 'Montoliu de Segarra',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    468 =>
        array(
            'poblacio' => 'Montornès de Segarra',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    469 =>
        array(
            'poblacio' => 'Montornès del Vallès',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    470 =>
        array(
            'poblacio' => 'Montseny',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    471 =>
        array(
            'poblacio' => 'Móra d\'Ebre',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    472 =>
        array(
            'poblacio' => 'Móra la Nova',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    473 =>
        array(
            'poblacio' => 'Morell, el',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    474 =>
        array(
            'poblacio' => 'Morera de Montsant, la',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    475 =>
        array(
            'poblacio' => 'Muntanyola',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    476 =>
        array(
            'poblacio' => 'Mura',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    477 =>
        array(
            'poblacio' => 'Nalec',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    478 =>
        array(
            'poblacio' => 'Naut Aran',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    479 =>
        array(
            'poblacio' => 'Navarcles',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    480 =>
        array(
            'poblacio' => 'Navàs',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    481 =>
        array(
            'poblacio' => 'Navata',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    482 =>
        array(
            'poblacio' => 'Navès',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    483 =>
        array(
            'poblacio' => 'Nou de Berguedà, la',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    484 =>
        array(
            'poblacio' => 'Nou de Gaià, la',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    485 =>
        array(
            'poblacio' => 'Nulles',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    486 =>
        array(
            'poblacio' => 'Odèn',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    487 =>
        array(
            'poblacio' => 'Òdena',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    488 =>
        array(
            'poblacio' => 'Ogassa',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    489 =>
        array(
            'poblacio' => 'Olèrdola',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    490 =>
        array(
            'poblacio' => 'Olesa de Bonesvalls',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    491 =>
        array(
            'poblacio' => 'Olesa de Montserrat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    492 =>
        array(
            'poblacio' => 'Oliana',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    493 =>
        array(
            'poblacio' => 'Oliola',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    494 =>
        array(
            'poblacio' => 'Olius',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    495 =>
        array(
            'poblacio' => 'Olivella',
            'comarca' => 'Garraf',
            'demarcacio' => 'Barcelona',
        ),
    496 =>
        array(
            'poblacio' => 'Olost',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    497 =>
        array(
            'poblacio' => 'Olot',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    498 =>
        array(
            'poblacio' => 'Oluges, les',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    499 =>
        array(
            'poblacio' => 'Olvan',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    500 =>
        array(
            'poblacio' => 'Omellons, els',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    501 =>
        array(
            'poblacio' => 'Omells de na Gaia, els',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    502 =>
        array(
            'poblacio' => 'Ordis',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    503 =>
        array(
            'poblacio' => 'Organyà',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    504 =>
        array(
            'poblacio' => 'Orís',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    505 =>
        array(
            'poblacio' => 'Oristà',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    506 =>
        array(
            'poblacio' => 'Orpí',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    507 =>
        array(
            'poblacio' => 'Òrrius',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    508 =>
        array(
            'poblacio' => 'Os de Balaguer',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    509 =>
        array(
            'poblacio' => 'Osor',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    510 =>
        array(
            'poblacio' => 'Ossó de Sió',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    511 =>
        array(
            'poblacio' => 'Pacs del Penedès',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    512 =>
        array(
            'poblacio' => 'Palafolls',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    513 =>
        array(
            'poblacio' => 'Palafrugell',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    514 =>
        array(
            'poblacio' => 'Palamós',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    515 =>
        array(
            'poblacio' => 'Palau d\'Anglesola, el',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    516 =>
        array(
            'poblacio' => 'Palau de Santa Eulàlia',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    517 =>
        array(
            'poblacio' => 'Palau-sator',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    518 =>
        array(
            'poblacio' => 'Palau-saverdera',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    519 =>
        array(
            'poblacio' => 'Palau-solità i Plegamans',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    520 =>
        array(
            'poblacio' => 'Pallaresos, els',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    521 =>
        array(
            'poblacio' => 'Pallejà',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    522 =>
        array(
            'poblacio' => 'Palma d\'Ebre, la',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    523 =>
        array(
            'poblacio' => 'Palma de Cervelló, la',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    524 =>
        array(
            'poblacio' => 'Palol de Revardit',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    525 =>
        array(
            'poblacio' => 'Pals',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    526 =>
        array(
            'poblacio' => 'Papiol, el',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    527 =>
        array(
            'poblacio' => 'Pardines',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    528 =>
        array(
            'poblacio' => 'Parets del Vallès',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    529 =>
        array(
            'poblacio' => 'Parlavà',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    530 =>
        array(
            'poblacio' => 'Passanant i Belltall',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    531 =>
        array(
            'poblacio' => 'Pau',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    532 =>
        array(
            'poblacio' => 'Paüls',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    533 =>
        array(
            'poblacio' => 'Pedret i Marzà',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    534 =>
        array(
            'poblacio' => 'Penelles',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    535 =>
        array(
            'poblacio' => 'Pera, la',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    536 =>
        array(
            'poblacio' => 'Perafita',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    537 =>
        array(
            'poblacio' => 'Perafort',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    538 =>
        array(
            'poblacio' => 'Peralada',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    539 =>
        array(
            'poblacio' => 'Peramola',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    540 =>
        array(
            'poblacio' => 'Perelló, el',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    541 =>
        array(
            'poblacio' => 'Piera',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    542 =>
        array(
            'poblacio' => 'Piles, les',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    543 =>
        array(
            'poblacio' => 'Pineda de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    544 =>
        array(
            'poblacio' => 'Pinell de Brai, el',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    545 =>
        array(
            'poblacio' => 'Pinell de Solsonès',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    546 =>
        array(
            'poblacio' => 'Pinós',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    547 =>
        array(
            'poblacio' => 'Pira',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    548 =>
        array(
            'poblacio' => 'Pla de Santa Maria, el',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    549 =>
        array(
            'poblacio' => 'Pla del Penedès, el',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    550 =>
        array(
            'poblacio' => 'Planes d\'Hostoles, les',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    551 =>
        array(
            'poblacio' => 'Planoles',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    552 =>
        array(
            'poblacio' => 'Plans de Sió, els',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    553 =>
        array(
            'poblacio' => 'Poal, el',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    554 =>
        array(
            'poblacio' => 'Pobla de Cérvoles, la',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    555 =>
        array(
            'poblacio' => 'Pobla de Claramunt, la',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    556 =>
        array(
            'poblacio' => 'Pobla de Lillet, la',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    557 =>
        array(
            'poblacio' => 'Pobla de Mafumet, la',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    558 =>
        array(
            'poblacio' => 'Pobla de Massaluca, la',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    559 =>
        array(
            'poblacio' => 'Pobla de Montornès, la',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    560 =>
        array(
            'poblacio' => 'Pobla de Segur, la',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    561 =>
        array(
            'poblacio' => 'Poboleda',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    562 =>
        array(
            'poblacio' => 'Polinyà',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    563 =>
        array(
            'poblacio' => 'Pont d\'Armentera, el',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    564 =>
        array(
            'poblacio' => 'Pont de Bar, el',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    565 =>
        array(
            'poblacio' => 'Pont de Molins',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    566 =>
        array(
            'poblacio' => 'Pont de Suert, el',
            'comarca' => 'Alta Ribagorça',
            'demarcacio' => 'Lleida',
        ),
    567 =>
        array(
            'poblacio' => 'Pont de Vilomara i Rocafort, el',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    568 =>
        array(
            'poblacio' => 'Pontils',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    569 =>
        array(
            'poblacio' => 'Pontons',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    570 =>
        array(
            'poblacio' => 'Pontós',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    571 =>
        array(
            'poblacio' => 'Ponts',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    572 =>
        array(
            'poblacio' => 'Porqueres',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    573 =>
        array(
            'poblacio' => 'Porrera',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    574 =>
        array(
            'poblacio' => 'Port de la Selva, el',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    575 =>
        array(
            'poblacio' => 'Portbou',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    576 =>
        array(
            'poblacio' => 'Portella, la',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    577 =>
        array(
            'poblacio' => 'Pradell de la Teixeta',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    578 =>
        array(
            'poblacio' => 'Prades',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    579 =>
        array(
            'poblacio' => 'Prat de Comte',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    580 =>
        array(
            'poblacio' => 'Prat de Llobregat, el',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    581 =>
        array(
            'poblacio' => 'Pratdip',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    582 =>
        array(
            'poblacio' => 'Prats de Lluçanès',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    583 =>
        array(
            'poblacio' => 'Prats de Rei, els',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    584 =>
        array(
            'poblacio' => 'Prats i Sansor',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Lleida',
        ),
    585 =>
        array(
            'poblacio' => 'Preixana',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    586 =>
        array(
            'poblacio' => 'Preixens',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    587 =>
        array(
            'poblacio' => 'Premià de Dalt',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    588 =>
        array(
            'poblacio' => 'Premià de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    589 =>
        array(
            'poblacio' => 'Preses, les',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    590 =>
        array(
            'poblacio' => 'Prullans',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Lleida',
        ),
    591 =>
        array(
            'poblacio' => 'Puig-reig',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    592 =>
        array(
            'poblacio' => 'Puigcerdà',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    593 =>
        array(
            'poblacio' => 'Puigdàlber',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    594 =>
        array(
            'poblacio' => 'Puiggròs',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    595 =>
        array(
            'poblacio' => 'Puigpelat',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    596 =>
        array(
            'poblacio' => 'Puigverd d\'Agramunt',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    597 =>
        array(
            'poblacio' => 'Puigverd de Lleida',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    598 =>
        array(
            'poblacio' => 'Pujalt',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    599 =>
        array(
            'poblacio' => 'Quar, la',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    600 =>
        array(
            'poblacio' => 'Quart',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    601 =>
        array(
            'poblacio' => 'Queralbs',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    602 =>
        array(
            'poblacio' => 'Querol',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    603 =>
        array(
            'poblacio' => 'Rabós',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    604 =>
        array(
            'poblacio' => 'Rajadell',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    605 =>
        array(
            'poblacio' => 'Ràpita, la',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    606 =>
        array(
            'poblacio' => 'Rasquera',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    607 =>
        array(
            'poblacio' => 'Regencós',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    608 =>
        array(
            'poblacio' => 'Rellinars',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    609 =>
        array(
            'poblacio' => 'Renau',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    610 =>
        array(
            'poblacio' => 'Reus',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    611 =>
        array(
            'poblacio' => 'Rialp',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    612 =>
        array(
            'poblacio' => 'Riba-roja d\'Ebre',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    613 =>
        array(
            'poblacio' => 'Riba, la',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    614 =>
        array(
            'poblacio' => 'Ribera d\'Ondara',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    615 =>
        array(
            'poblacio' => 'Ribera d\'Urgellet',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    616 =>
        array(
            'poblacio' => 'Ribes de Freser',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    617 =>
        array(
            'poblacio' => 'Riells i Viabrea',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    618 =>
        array(
            'poblacio' => 'Riera de Gaià, la',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    619 =>
        array(
            'poblacio' => 'Riner',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    620 =>
        array(
            'poblacio' => 'Ripoll',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    621 =>
        array(
            'poblacio' => 'Ripollet',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    622 =>
        array(
            'poblacio' => 'Riu de Cerdanya',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Lleida',
        ),
    623 =>
        array(
            'poblacio' => 'Riudarenes',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    624 =>
        array(
            'poblacio' => 'Riudaura',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    625 =>
        array(
            'poblacio' => 'Riudecanyes',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    626 =>
        array(
            'poblacio' => 'Riudecols',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    627 =>
        array(
            'poblacio' => 'Riudellots de la Selva',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    628 =>
        array(
            'poblacio' => 'Riudoms',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    629 =>
        array(
            'poblacio' => 'Riumors',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    630 =>
        array(
            'poblacio' => 'Roca del Vallès, la',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    631 =>
        array(
            'poblacio' => 'Rocafort de Queralt',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    632 =>
        array(
            'poblacio' => 'Roda de Berà',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    633 =>
        array(
            'poblacio' => 'Roda de Ter',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    634 =>
        array(
            'poblacio' => 'Rodonyà',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    635 =>
        array(
            'poblacio' => 'Roquetes',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    636 =>
        array(
            'poblacio' => 'Roses',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    637 =>
        array(
            'poblacio' => 'Rosselló',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    638 =>
        array(
            'poblacio' => 'Rourell, el',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    639 =>
        array(
            'poblacio' => 'Rubí',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    640 =>
        array(
            'poblacio' => 'Rubió',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    641 =>
        array(
            'poblacio' => 'Rupià',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    642 =>
        array(
            'poblacio' => 'Rupit i Pruit',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    643 =>
        array(
            'poblacio' => 'Sabadell',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    644 =>
        array(
            'poblacio' => 'Sagàs',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    645 =>
        array(
            'poblacio' => 'Salàs de Pallars',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    646 =>
        array(
            'poblacio' => 'Saldes',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    647 =>
        array(
            'poblacio' => 'Sales de Llierca',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    648 =>
        array(
            'poblacio' => 'Sallent',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    649 =>
        array(
            'poblacio' => 'Salomó',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    650 =>
        array(
            'poblacio' => 'Salou',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    651 =>
        array(
            'poblacio' => 'Salt',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    652 =>
        array(
            'poblacio' => 'Sanaüja',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    653 =>
        array(
            'poblacio' => 'Sant Adrià de Besòs',
            'comarca' => 'Barcelonès',
            'demarcacio' => 'Barcelona',
        ),
    654 =>
        array(
            'poblacio' => 'Sant Agustí de Lluçanès',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    655 =>
        array(
            'poblacio' => 'Sant Andreu de la Barca',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    656 =>
        array(
            'poblacio' => 'Sant Andreu de Llavaneres',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    657 =>
        array(
            'poblacio' => 'Sant Andreu Salou',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    658 =>
        array(
            'poblacio' => 'Sant Aniol de Finestres',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    659 =>
        array(
            'poblacio' => 'Sant Antoni de Vilamajor',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    660 =>
        array(
            'poblacio' => 'Sant Bartomeu del Grau',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    661 =>
        array(
            'poblacio' => 'Sant Boi de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    662 =>
        array(
            'poblacio' => 'Sant Boi de Lluçanès',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    663 =>
        array(
            'poblacio' => 'Sant Cebrià de Vallalta',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    664 =>
        array(
            'poblacio' => 'Sant Celoni',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    665 =>
        array(
            'poblacio' => 'Sant Climent de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    666 =>
        array(
            'poblacio' => 'Sant Climent Sescebes',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    667 =>
        array(
            'poblacio' => 'Sant Cugat del Vallès',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    668 =>
        array(
            'poblacio' => 'Sant Cugat Sesgarrigues',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    669 =>
        array(
            'poblacio' => 'Sant Esteve de la Sarga',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    670 =>
        array(
            'poblacio' => 'Sant Esteve de Palautordera',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    671 =>
        array(
            'poblacio' => 'Sant Esteve Sesrovires',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    672 =>
        array(
            'poblacio' => 'Sant Feliu de Buixalleu',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    673 =>
        array(
            'poblacio' => 'Sant Feliu de Codines',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    674 =>
        array(
            'poblacio' => 'Sant Feliu de Guíxols',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    675 =>
        array(
            'poblacio' => 'Sant Feliu de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    676 =>
        array(
            'poblacio' => 'Sant Feliu de Pallerols',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    677 =>
        array(
            'poblacio' => 'Sant Feliu Sasserra',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    678 =>
        array(
            'poblacio' => 'Sant Ferriol',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    679 =>
        array(
            'poblacio' => 'Sant Fost de Campsentelles',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    680 =>
        array(
            'poblacio' => 'Sant Fruitós de Bages',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    681 =>
        array(
            'poblacio' => 'Sant Gregori',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    682 =>
        array(
            'poblacio' => 'Sant Guim de Freixenet',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    683 =>
        array(
            'poblacio' => 'Sant Guim de la Plana',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    684 =>
        array(
            'poblacio' => 'Sant Hilari Sacalm',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    685 =>
        array(
            'poblacio' => 'Sant Hipòlit de Voltregà',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    686 =>
        array(
            'poblacio' => 'Sant Iscle de Vallalta',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    687 =>
        array(
            'poblacio' => 'Sant Jaume d\'Enveja',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    688 =>
        array(
            'poblacio' => 'Sant Jaume de Frontanyà',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    689 =>
        array(
            'poblacio' => 'Sant Jaume de Llierca',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    690 =>
        array(
            'poblacio' => 'Sant Jaume dels Domenys',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    691 =>
        array(
            'poblacio' => 'Sant Joan de les Abadesses',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    692 =>
        array(
            'poblacio' => 'Sant Joan de Mollet',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    693 =>
        array(
            'poblacio' => 'Sant Joan de Vilatorrada',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    694 =>
        array(
            'poblacio' => 'Sant Joan Despí',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    695 =>
        array(
            'poblacio' => 'Sant Joan les Fonts',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    696 =>
        array(
            'poblacio' => 'Sant Jordi Desvalls',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    697 =>
        array(
            'poblacio' => 'Sant Julià de Cerdanyola',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    698 =>
        array(
            'poblacio' => 'Sant Julià de Ramis',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    699 =>
        array(
            'poblacio' => 'Sant Julià de Vilatorta',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    700 =>
        array(
            'poblacio' => 'Sant Julià del Llor i Bonmatí',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    701 =>
        array(
            'poblacio' => 'Sant Just Desvern',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    702 =>
        array(
            'poblacio' => 'Sant Llorenç d\'Hortons',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    703 =>
        array(
            'poblacio' => 'Sant Llorenç de la Muga',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    704 =>
        array(
            'poblacio' => 'Sant Llorenç de Morunys',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    705 =>
        array(
            'poblacio' => 'Sant Llorenç Savall',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    706 =>
        array(
            'poblacio' => 'Sant Martí d\'Albars',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    707 =>
        array(
            'poblacio' => 'Sant Martí de Centelles',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    708 =>
        array(
            'poblacio' => 'Sant Martí de Llémena',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    709 =>
        array(
            'poblacio' => 'Sant Martí de Riucorb',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    710 =>
        array(
            'poblacio' => 'Sant Martí de Tous',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    711 =>
        array(
            'poblacio' => 'Sant Martí Sarroca',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    712 =>
        array(
            'poblacio' => 'Sant Martí Sesgueioles',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    713 =>
        array(
            'poblacio' => 'Sant Martí Vell',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    714 =>
        array(
            'poblacio' => 'Sant Mateu de Bages',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    715 =>
        array(
            'poblacio' => 'Sant Miquel de Campmajor',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    716 =>
        array(
            'poblacio' => 'Sant Miquel de Fluvià',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    717 =>
        array(
            'poblacio' => 'Sant Mori',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    718 =>
        array(
            'poblacio' => 'Sant Pau de Segúries',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    719 =>
        array(
            'poblacio' => 'Sant Pere de Ribes',
            'comarca' => 'Garraf',
            'demarcacio' => 'Barcelona',
        ),
    720 =>
        array(
            'poblacio' => 'Sant Pere de Riudebitlles',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    721 =>
        array(
            'poblacio' => 'Sant Pere de Torelló',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    722 =>
        array(
            'poblacio' => 'Sant Pere de Vilamajor',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    723 =>
        array(
            'poblacio' => 'Sant Pere Pescador',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    724 =>
        array(
            'poblacio' => 'Sant Pere Sallavinera',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    725 =>
        array(
            'poblacio' => 'Sant Pol de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    726 =>
        array(
            'poblacio' => 'Sant Quintí de Mediona',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    727 =>
        array(
            'poblacio' => 'Sant Quirze de Besora',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    728 =>
        array(
            'poblacio' => 'Sant Quirze del Vallès',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    729 =>
        array(
            'poblacio' => 'Sant Quirze Safaja',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    730 =>
        array(
            'poblacio' => 'Sant Ramon',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    731 =>
        array(
            'poblacio' => 'Sant Sadurní d\'Anoia',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    732 =>
        array(
            'poblacio' => 'Sant Sadurní d\'Osormort',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    733 =>
        array(
            'poblacio' => 'Sant Salvador de Guardiola',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    734 =>
        array(
            'poblacio' => 'Sant Vicenç de Castellet',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    735 =>
        array(
            'poblacio' => 'Sant Vicenç de Montalt',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    736 =>
        array(
            'poblacio' => 'Sant Vicenç de Torelló',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    737 =>
        array(
            'poblacio' => 'Sant Vicenç dels Horts',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    738 =>
        array(
            'poblacio' => 'Santa Bàrbara',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    739 =>
        array(
            'poblacio' => 'Santa Cecília de Voltregà',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    740 =>
        array(
            'poblacio' => 'Santa Coloma de Cervelló',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    741 =>
        array(
            'poblacio' => 'Santa Coloma de Farners',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    742 =>
        array(
            'poblacio' => 'Santa Coloma de Gramenet',
            'comarca' => 'Barcelonès',
            'demarcacio' => 'Barcelona',
        ),
    743 =>
        array(
            'poblacio' => 'Santa Coloma de Queralt',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    744 =>
        array(
            'poblacio' => 'Santa Cristina d\'Aro',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    745 =>
        array(
            'poblacio' => 'Santa Eugènia de Berga',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    746 =>
        array(
            'poblacio' => 'Santa Eulàlia de Riuprimer',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    747 =>
        array(
            'poblacio' => 'Santa Eulàlia de Ronçana',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    748 =>
        array(
            'poblacio' => 'Santa Fe del Penedès',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    749 =>
        array(
            'poblacio' => 'Santa Llogaia d\'Àlguema',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    750 =>
        array(
            'poblacio' => 'Santa Margarida de Montbui',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    751 =>
        array(
            'poblacio' => 'Santa Margarida i els Monjos',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    752 =>
        array(
            'poblacio' => 'Santa Maria d\'Oló',
            'comarca' => 'Moianès',
            'demarcacio' => 'Barcelona',
        ),
    753 =>
        array(
            'poblacio' => 'Santa Maria de Besora',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    754 =>
        array(
            'poblacio' => 'Santa Maria de Martorelles',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    755 =>
        array(
            'poblacio' => 'Santa Maria de Merlès',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    756 =>
        array(
            'poblacio' => 'Santa Maria de Miralles',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    757 =>
        array(
            'poblacio' => 'Santa Maria de Palautordera',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    758 =>
        array(
            'poblacio' => 'Santa Oliva',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    759 =>
        array(
            'poblacio' => 'Santa Pau',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    760 =>
        array(
            'poblacio' => 'Santa Perpètua de Mogoda',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    761 =>
        array(
            'poblacio' => 'Santa Susanna',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    762 =>
        array(
            'poblacio' => 'Santpedor',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    763 =>
        array(
            'poblacio' => 'Sarral',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    764 =>
        array(
            'poblacio' => 'Sarrià de Ter',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    765 =>
        array(
            'poblacio' => 'Sarroca de Bellera',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    766 =>
        array(
            'poblacio' => 'Sarroca de Lleida',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    767 =>
        array(
            'poblacio' => 'Saus, Camallera i Llampaies',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    768 =>
        array(
            'poblacio' => 'Savallà del Comtat',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    769 =>
        array(
            'poblacio' => 'Secuita, la',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    770 =>
        array(
            'poblacio' => 'Selva de Mar, la',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    771 =>
        array(
            'poblacio' => 'Selva del Camp, la',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    772 =>
        array(
            'poblacio' => 'Senan',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    773 =>
        array(
            'poblacio' => 'Sénia, la',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    774 =>
        array(
            'poblacio' => 'Senterada',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    775 =>
        array(
            'poblacio' => 'Sentiu de Sió, la',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    776 =>
        array(
            'poblacio' => 'Sentmenat',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    777 =>
        array(
            'poblacio' => 'Serinyà',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    778 =>
        array(
            'poblacio' => 'Seròs',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    779 =>
        array(
            'poblacio' => 'Serra de Daró',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    780 =>
        array(
            'poblacio' => 'Setcases',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    781 =>
        array(
            'poblacio' => 'Seu d\'Urgell, la',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    782 =>
        array(
            'poblacio' => 'Seva',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    783 =>
        array(
            'poblacio' => 'Sidamon',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    784 =>
        array(
            'poblacio' => 'Sils',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    785 =>
        array(
            'poblacio' => 'Sitges',
            'comarca' => 'Garraf',
            'demarcacio' => 'Barcelona',
        ),
    786 =>
        array(
            'poblacio' => 'Siurana',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    787 =>
        array(
            'poblacio' => 'Sobremunt',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    788 =>
        array(
            'poblacio' => 'Soleràs, el',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    789 =>
        array(
            'poblacio' => 'Solivella',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    790 =>
        array(
            'poblacio' => 'Solsona',
            'comarca' => 'Solsonès',
            'demarcacio' => 'Lleida',
        ),
    791 =>
        array(
            'poblacio' => 'Sora',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    792 =>
        array(
            'poblacio' => 'Soriguera',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    793 =>
        array(
            'poblacio' => 'Sort',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    794 =>
        array(
            'poblacio' => 'Soses',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    795 =>
        array(
            'poblacio' => 'Subirats',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    796 =>
        array(
            'poblacio' => 'Sudanell',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    797 =>
        array(
            'poblacio' => 'Sunyer',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    798 =>
        array(
            'poblacio' => 'Súria',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    799 =>
        array(
            'poblacio' => 'Susqueda',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    800 =>
        array(
            'poblacio' => 'Tagamanent',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    801 =>
        array(
            'poblacio' => 'Talamanca',
            'comarca' => 'Bages',
            'demarcacio' => 'Barcelona',
        ),
    802 =>
        array(
            'poblacio' => 'Talarn',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    803 =>
        array(
            'poblacio' => 'Talavera',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    804 =>
        array(
            'poblacio' => 'Tallada d\'Empordà, la',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    805 =>
        array(
            'poblacio' => 'Taradell',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    806 =>
        array(
            'poblacio' => 'Tarragona',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    807 =>
        array(
            'poblacio' => 'Tàrrega',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    808 =>
        array(
            'poblacio' => 'Tarrés',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    809 =>
        array(
            'poblacio' => 'Tarroja de Segarra',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    810 =>
        array(
            'poblacio' => 'Tavèrnoles',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    811 =>
        array(
            'poblacio' => 'Tavertet',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    812 =>
        array(
            'poblacio' => 'Teià',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    813 =>
        array(
            'poblacio' => 'Térmens',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    814 =>
        array(
            'poblacio' => 'Terrades',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    815 =>
        array(
            'poblacio' => 'Terrassa',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    816 =>
        array(
            'poblacio' => 'Tiana',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    817 =>
        array(
            'poblacio' => 'Tírvia',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    818 =>
        array(
            'poblacio' => 'Tiurana',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    819 =>
        array(
            'poblacio' => 'Tivenys',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    820 =>
        array(
            'poblacio' => 'Tivissa',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    821 =>
        array(
            'poblacio' => 'Tona',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    822 =>
        array(
            'poblacio' => 'Torà',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    823 =>
        array(
            'poblacio' => 'Tordera',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    824 =>
        array(
            'poblacio' => 'Torelló',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    825 =>
        array(
            'poblacio' => 'Torms, els',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    826 =>
        array(
            'poblacio' => 'Tornabous',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    827 =>
        array(
            'poblacio' => 'Torre de Cabdella, la',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    828 =>
        array(
            'poblacio' => 'Torre de Claramunt, la',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    829 =>
        array(
            'poblacio' => 'Torre de Fontaubella, la',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    830 =>
        array(
            'poblacio' => 'Torre de l\'Espanyol, la',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    831 =>
        array(
            'poblacio' => 'Torre-serona',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    832 =>
        array(
            'poblacio' => 'Torrebesses',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    833 =>
        array(
            'poblacio' => 'Torredembarra',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    834 =>
        array(
            'poblacio' => 'Torrefarrera',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    835 =>
        array(
            'poblacio' => 'Torrefeta i Florejacs',
            'comarca' => 'Segarra',
            'demarcacio' => 'Lleida',
        ),
    836 =>
        array(
            'poblacio' => 'Torregrossa',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    837 =>
        array(
            'poblacio' => 'Torrelameu',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    838 =>
        array(
            'poblacio' => 'Torrelavit',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    839 =>
        array(
            'poblacio' => 'Torrelles de Foix',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    840 =>
        array(
            'poblacio' => 'Torrelles de Llobregat',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    841 =>
        array(
            'poblacio' => 'Torrent',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    842 =>
        array(
            'poblacio' => 'Torres de Segre',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    843 =>
        array(
            'poblacio' => 'Torroella de Fluvià',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    844 =>
        array(
            'poblacio' => 'Torroella de Montgrí',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    845 =>
        array(
            'poblacio' => 'Torroja del Priorat',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    846 =>
        array(
            'poblacio' => 'Tortellà',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    847 =>
        array(
            'poblacio' => 'Tortosa',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
    848 =>
        array(
            'poblacio' => 'Toses',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    849 =>
        array(
            'poblacio' => 'Tossa de Mar',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    850 =>
        array(
            'poblacio' => 'Tremp',
            'comarca' => 'Pallars Jussà',
            'demarcacio' => 'Lleida',
        ),
    851 =>
        array(
            'poblacio' => 'Ullà',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    852 =>
        array(
            'poblacio' => 'Ullastrell',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    853 =>
        array(
            'poblacio' => 'Ullastret',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    854 =>
        array(
            'poblacio' => 'Ulldecona',
            'comarca' => 'Montsià',
            'demarcacio' => 'Tarragona',
        ),
    855 =>
        array(
            'poblacio' => 'Ulldemolins',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    856 =>
        array(
            'poblacio' => 'Ultramort',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    857 =>
        array(
            'poblacio' => 'Urús',
            'comarca' => 'Cerdanya',
            'demarcacio' => 'Girona',
        ),
    858 =>
        array(
            'poblacio' => 'Vacarisses',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    859 =>
        array(
            'poblacio' => 'Vajol, la',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    860 =>
        array(
            'poblacio' => 'Vall d\'en Bas, la',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    861 =>
        array(
            'poblacio' => 'Vall de Bianya, la',
            'comarca' => 'Garrotxa',
            'demarcacio' => 'Girona',
        ),
    862 =>
        array(
            'poblacio' => 'Vall de Boí, la',
            'comarca' => 'Alta Ribagorça',
            'demarcacio' => 'Lleida',
        ),
    863 =>
        array(
            'poblacio' => 'Vall de Cardós',
            'comarca' => 'Pallars Sobirà',
            'demarcacio' => 'Lleida',
        ),
    864 =>
        array(
            'poblacio' => 'Vall-llobrega',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    865 =>
        array(
            'poblacio' => 'Vallbona d\'Anoia',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    866 =>
        array(
            'poblacio' => 'Vallbona de les Monges',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    867 =>
        array(
            'poblacio' => 'Vallcebre',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    868 =>
        array(
            'poblacio' => 'Vallclara',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    869 =>
        array(
            'poblacio' => 'Vallfogona de Balaguer',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    870 =>
        array(
            'poblacio' => 'Vallfogona de Ripollès',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    871 =>
        array(
            'poblacio' => 'Vallfogona de Riucorb',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    872 =>
        array(
            'poblacio' => 'Vallgorguina',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    873 =>
        array(
            'poblacio' => 'Vallirana',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    874 =>
        array(
            'poblacio' => 'Vallmoll',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    875 =>
        array(
            'poblacio' => 'Vallromanes',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    876 =>
        array(
            'poblacio' => 'Valls',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    877 =>
        array(
            'poblacio' => 'Valls d\'Aguilar, les',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    878 =>
        array(
            'poblacio' => 'Valls de Valira, les',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    879 =>
        array(
            'poblacio' => 'Vandellòs i l\'Hospitalet de l\'Infant',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    880 =>
        array(
            'poblacio' => 'Vansa i Fórnols, la',
            'comarca' => 'Alt Urgell',
            'demarcacio' => 'Lleida',
        ),
    881 =>
        array(
            'poblacio' => 'Veciana',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    882 =>
        array(
            'poblacio' => 'Vendrell, el',
            'comarca' => 'Baix Penedès',
            'demarcacio' => 'Tarragona',
        ),
    883 =>
        array(
            'poblacio' => 'Ventalló',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    884 =>
        array(
            'poblacio' => 'Verdú',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    885 =>
        array(
            'poblacio' => 'Verges',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    886 =>
        array(
            'poblacio' => 'Vespella de Gaià',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    887 =>
        array(
            'poblacio' => 'Vic',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    888 =>
        array(
            'poblacio' => 'Vidrà',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    889 =>
        array(
            'poblacio' => 'Vidreres',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    890 =>
        array(
            'poblacio' => 'Vielha e Mijaran',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    891 =>
        array(
            'poblacio' => 'Vila-rodona',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    892 =>
        array(
            'poblacio' => 'Vila-sacra',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    893 =>
        array(
            'poblacio' => 'Vila-sana',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    894 =>
        array(
            'poblacio' => 'Vila-seca',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    895 =>
        array(
            'poblacio' => 'Vilabella',
            'comarca' => 'Alt Camp',
            'demarcacio' => 'Tarragona',
        ),
    896 =>
        array(
            'poblacio' => 'Vilabertran',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    897 =>
        array(
            'poblacio' => 'Vilablareix',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    898 =>
        array(
            'poblacio' => 'Vilada',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    899 =>
        array(
            'poblacio' => 'Viladamat',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    900 =>
        array(
            'poblacio' => 'Viladasens',
            'comarca' => 'Gironès',
            'demarcacio' => 'Girona',
        ),
    901 =>
        array(
            'poblacio' => 'Viladecans',
            'comarca' => 'Baix Llobregat',
            'demarcacio' => 'Barcelona',
        ),
    902 =>
        array(
            'poblacio' => 'Viladecavalls',
            'comarca' => 'Vallès Occidental',
            'demarcacio' => 'Barcelona',
        ),
    903 =>
        array(
            'poblacio' => 'Vilademuls',
            'comarca' => 'Pla de l\'Estany',
            'demarcacio' => 'Girona',
        ),
    904 =>
        array(
            'poblacio' => 'Viladrau',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    905 =>
        array(
            'poblacio' => 'Vilafant',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    906 =>
        array(
            'poblacio' => 'Vilafranca del Penedès',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    907 =>
        array(
            'poblacio' => 'Vilagrassa',
            'comarca' => 'Urgell',
            'demarcacio' => 'Lleida',
        ),
    908 =>
        array(
            'poblacio' => 'Vilajuïga',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    909 =>
        array(
            'poblacio' => 'Vilalba dels Arcs',
            'comarca' => 'Terra Alta',
            'demarcacio' => 'Tarragona',
        ),
    910 =>
        array(
            'poblacio' => 'Vilalba Sasserra',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    911 =>
        array(
            'poblacio' => 'Vilaller',
            'comarca' => 'Alta Ribagorça',
            'demarcacio' => 'Lleida',
        ),
    912 =>
        array(
            'poblacio' => 'Vilallonga de Ter',
            'comarca' => 'Ripollès',
            'demarcacio' => 'Girona',
        ),
    913 =>
        array(
            'poblacio' => 'Vilallonga del Camp',
            'comarca' => 'Tarragonès',
            'demarcacio' => 'Tarragona',
        ),
    914 =>
        array(
            'poblacio' => 'Vilamacolum',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    915 =>
        array(
            'poblacio' => 'Vilamalla',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    916 =>
        array(
            'poblacio' => 'Vilamaniscle',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    917 =>
        array(
            'poblacio' => 'Vilamòs',
            'comarca' => 'Aran',
            'demarcacio' => 'Lleida',
        ),
    918 =>
        array(
            'poblacio' => 'Vilanant',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    919 =>
        array(
            'poblacio' => 'Vilanova d\'Escornalbou',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    920 =>
        array(
            'poblacio' => 'Vilanova de Bellpuig',
            'comarca' => 'Pla d\'Urgell',
            'demarcacio' => 'Lleida',
        ),
    921 =>
        array(
            'poblacio' => 'Vilanova de l\'Aguda',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    922 =>
        array(
            'poblacio' => 'Vilanova de la Barca',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    923 =>
        array(
            'poblacio' => 'Vilanova de Meià',
            'comarca' => 'Noguera',
            'demarcacio' => 'Lleida',
        ),
    924 =>
        array(
            'poblacio' => 'Vilanova de Prades',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    925 =>
        array(
            'poblacio' => 'Vilanova de Sau',
            'comarca' => 'Osona',
            'demarcacio' => 'Barcelona',
        ),
    926 =>
        array(
            'poblacio' => 'Vilanova de Segrià',
            'comarca' => 'Segrià',
            'demarcacio' => 'Lleida',
        ),
    927 =>
        array(
            'poblacio' => 'Vilanova del Camí',
            'comarca' => 'Anoia',
            'demarcacio' => 'Barcelona',
        ),
    928 =>
        array(
            'poblacio' => 'Vilanova del Vallès',
            'comarca' => 'Vallès Oriental',
            'demarcacio' => 'Barcelona',
        ),
    929 =>
        array(
            'poblacio' => 'Vilanova i la Geltrú',
            'comarca' => 'Garraf',
            'demarcacio' => 'Barcelona',
        ),
    930 =>
        array(
            'poblacio' => 'Vilaplana',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    931 =>
        array(
            'poblacio' => 'Vilassar de Dalt',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    932 =>
        array(
            'poblacio' => 'Vilassar de Mar',
            'comarca' => 'Maresme',
            'demarcacio' => 'Barcelona',
        ),
    933 =>
        array(
            'poblacio' => 'Vilaür',
            'comarca' => 'Alt Empordà',
            'demarcacio' => 'Girona',
        ),
    934 =>
        array(
            'poblacio' => 'Vilaverd',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    935 =>
        array(
            'poblacio' => 'Vilella Alta, la',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    936 =>
        array(
            'poblacio' => 'Vilella Baixa, la',
            'comarca' => 'Priorat',
            'demarcacio' => 'Tarragona',
        ),
    937 =>
        array(
            'poblacio' => 'Vilobí d\'Onyar',
            'comarca' => 'Selva',
            'demarcacio' => 'Girona',
        ),
    938 =>
        array(
            'poblacio' => 'Vilobí del Penedès',
            'comarca' => 'Alt Penedès',
            'demarcacio' => 'Barcelona',
        ),
    939 =>
        array(
            'poblacio' => 'Vilopriu',
            'comarca' => 'Baix Empordà',
            'demarcacio' => 'Girona',
        ),
    940 =>
        array(
            'poblacio' => 'Vilosell, el',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    941 =>
        array(
            'poblacio' => 'Vimbodí i Poblet',
            'comarca' => 'Conca de Barberà',
            'demarcacio' => 'Tarragona',
        ),
    942 =>
        array(
            'poblacio' => 'Vinaixa',
            'comarca' => 'Garrigues',
            'demarcacio' => 'Lleida',
        ),
    943 =>
        array(
            'poblacio' => 'Vinebre',
            'comarca' => 'Ribera d\'Ebre',
            'demarcacio' => 'Tarragona',
        ),
    944 =>
        array(
            'poblacio' => 'Vinyols i els Arcs',
            'comarca' => 'Baix Camp',
            'demarcacio' => 'Tarragona',
        ),
    945 =>
        array(
            'poblacio' => 'Viver i Serrateix',
            'comarca' => 'Berguedà',
            'demarcacio' => 'Barcelona',
        ),
    946 =>
        array(
            'poblacio' => 'Xerta',
            'comarca' => 'Baix Ebre',
            'demarcacio' => 'Tarragona',
        ),
);
compara_arrays($gt, $res);
echo "<br><br>";

echo "get_demarcacions <br>";
$res = $db->get_demarcacions();
$gt = array(
    0 => 'Barcelona',
    1 => 'Girona',
    2 => 'Lleida',
    3 => 'Tarragona',
);
compara_arrays($gt, $res);
echo "<br><br>";

echo "get_all_partits <br>";
$res = $db->get_all_partits();
$gt = array(
    0 =>
        array(
            'nom' => 'Alianza Por El Comercio y la Vivienda',
            'color' => '#304FFE',
            'curt' => 'ALIANZA C V',
        ),
    1 =>
        array(
            'nom' => 'Ciutadans - Partido de la Ciudadanía',
            'color' => '#FF7200',
            'curt' => 'Cs',
        ),
    2 =>
        array(
            'nom' => 'Candidatura D’unitat Popular - un nou cicle per Guanyar',
            'color' => '#FFFB00',
            'curt' => 'CUP-G',
        ),
    3 =>
        array(
            'nom' => 'Escons en Blanc',
            'color' => '#595959FF',
            'curt' => 'EB',
        ),
    4 =>
        array(
            'nom' => 'En Comú Podem - Podem en Comú',
            'color' => '#9A00FF',
            'curt' => 'ECP-PEC',
        ),
    5 =>
        array(
            'nom' => 'Esquerra Republicana de Catalunya',
            'color' => '#FFC500',
            'curt' => 'ERC',
        ),
    6 =>
        array(
            'nom' => 'Front Nacional de Catalunya',
            'color' => '#3949AB',
            'curt' => 'FNC',
        ),
    7 =>
        array(
            'nom' => 'Izquierda en Positivo',
            'color' => '#00BFA5',
            'curt' => 'IZQP',
        ),
    8 =>
        array(
            'nom' => 'Junts per Catalunya',
            'color' => '#00FFA9',
            'curt' => 'JxCat',
        ),
    9 =>
        array(
            'nom' => 'Agrupació d\'Electors Lleida en Marxa',
            'color' => '#00ACC1',
            'curt' => 'LLEM',
        ),
    10 =>
        array(
            'nom' => 'Per un Món Més Just',
            'color' => '#00C853',
            'curt' => 'M+J',
        ),
    11 =>
        array(
            'nom' => 'Moviment Corrent Roig',
            'color' => '#F55828FF',
            'curt' => 'M.C.R.',
        ),
    12 =>
        array(
            'nom' => 'Moviment Primaries per la Independencia de Catalunya',
            'color' => '#FDD835',
            'curt' => 'MPIC',
        ),
    13 =>
        array(
            'nom' => 'Partit Animalista Contra El Maltractament Animal',
            'color' => '#A8B521FF',
            'curt' => 'PACMA',
        ),
    14 =>
        array(
            'nom' => 'Partit Comunista del Poble de Catalunya',
            'color' => '#1A237E',
            'curt' => 'PCPC',
        ),
    15 =>
        array(
            'nom' => 'Partit Comunista dels Treballadors de Catalunya',
            'color' => '#8A1111FF',
            'curt' => 'PCTC',
        ),
    16 =>
        array(
            'nom' => 'Partit democrata Europeu Català',
            'color' => '#0013FF',
            'curt' => 'PdeCAT',
        ),
    17 =>
        array(
            'nom' => 'Partido Familia i Vida',
            'color' => '#9C27B0',
            'curt' => 'PFiV',
        ),
    18 =>
        array(
            'nom' => 'Partit Nacionalista de Catalunya',
            'color' => '#E53935',
            'curt' => 'PNC',
        ),
    19 =>
        array(
            'nom' => 'Partit Popular',
            'color' => '#3399FF',
            'curt' => 'PP',
        ),
    20 =>
        array(
            'nom' => 'Partit dels Socialistes de Catalunya',
            'color' => '#FF0000',
            'curt' => 'PSC',
        ),
    21 =>
        array(
            'nom' => 'Recortes Cero - Grup Verd - Municipalistes',
            'color' => '#64DD17',
            'curt' => 'RECORTES CERO-GV-M',
        ),
    22 =>
        array(
            'nom' => 'Suport Civil Català',
            'color' => '#1DE9B6',
            'curt' => 'SCAT',
        ),
    23 =>
        array(
            'nom' => 'Som Terres de L\'Ebre',
            'color' => '#FFD900FF',
            'curt' => 'SOM TERRES DE L\'EBRE',
        ),
    24 =>
        array(
            'nom' => 'Unión Europea de Pensionistas',
            'color' => '#FFC400',
            'curt' => 'UEP',
        ),
    25 =>
        array(
            'nom' => 'Unidos por la democracia + jubilados',
            'color' => '#FF6F00',
            'curt' => 'UNIDOS-def-PDSJE-Som',
        ),
    26 =>
        array(
            'nom' => 'Volt Europa',
            'color' => '#00B8D4',
            'curt' => 'VOLT',
        ),
    27 =>
        array(
            'nom' => 'Vox',
            'color' => '#2EFF00',
            'curt' => 'VOX',
        ),
);
compara_arrays($gt, $res);

echo "<br><br>";

echo "get_partits <br>";
$res = $db->get_partits("Girona");
$gt = array(
    0 =>
        array(
            'nom' => 'Ciutadans - Partido de la Ciudadanía',
            'color' => '#FF7200',
            'curt' => 'Cs',
        ),
    1 =>
        array(
            'nom' => 'Candidatura D’unitat Popular - un nou cicle per Guanyar',
            'color' => '#FFFB00',
            'curt' => 'CUP-G',
        ),
    2 =>
        array(
            'nom' => 'En Comú Podem - Podem en Comú',
            'color' => '#9A00FF',
            'curt' => 'ECP-PEC',
        ),
    3 =>
        array(
            'nom' => 'Esquerra Republicana de Catalunya',
            'color' => '#FFC500',
            'curt' => 'ERC',
        ),
    4 =>
        array(
            'nom' => 'Front Nacional de Catalunya',
            'color' => '#3949AB',
            'curt' => 'FNC',
        ),
    5 =>
        array(
            'nom' => 'Izquierda en Positivo',
            'color' => '#00BFA5',
            'curt' => 'IZQP',
        ),
    6 =>
        array(
            'nom' => 'Junts per Catalunya',
            'color' => '#00FFA9',
            'curt' => 'JxCat',
        ),
    7 =>
        array(
            'nom' => 'Per un Món Més Just',
            'color' => '#00C853',
            'curt' => 'M+J',
        ),
    8 =>
        array(
            'nom' => 'Moviment Primaries per la Independencia de Catalunya',
            'color' => '#FDD835',
            'curt' => 'MPIC',
        ),
    9 =>
        array(
            'nom' => 'Partit Animalista Contra El Maltractament Animal',
            'color' => '#A8B521FF',
            'curt' => 'PACMA',
        ),
    10 =>
        array(
            'nom' => 'Partit Comunista del Poble de Catalunya',
            'color' => '#1A237E',
            'curt' => 'PCPC',
        ),
    11 =>
        array(
            'nom' => 'Partit Comunista dels Treballadors de Catalunya',
            'color' => '#8A1111FF',
            'curt' => 'PCTC',
        ),
    12 =>
        array(
            'nom' => 'Partit democrata Europeu Català',
            'color' => '#0013FF',
            'curt' => 'PdeCAT',
        ),
    13 =>
        array(
            'nom' => 'Partit Nacionalista de Catalunya',
            'color' => '#E53935',
            'curt' => 'PNC',
        ),
    14 =>
        array(
            'nom' => 'Partit Popular',
            'color' => '#3399FF',
            'curt' => 'PP',
        ),
    15 =>
        array(
            'nom' => 'Partit dels Socialistes de Catalunya',
            'color' => '#FF0000',
            'curt' => 'PSC',
        ),
    16 =>
        array(
            'nom' => 'Recortes Cero - Grup Verd - Municipalistes',
            'color' => '#64DD17',
            'curt' => 'RECORTES CERO-GV-M',
        ),
    17 =>
        array(
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

try {
    echo "set_vots <br>";
    $vots = array(
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
    $db->set_vots("Girona", $vots);
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    echo "get_vots <br>";
    $var = $db->get_vots("Girona");
    compara_arrays($vots, $var);
    echo "<br><br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    echo "set_escons <br>";
    $esconsg = array(
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
    $db->set_escons("Girona", $esconsg);
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    echo "get_escons <br>";
    $var = $db->get_escons("Girona");
    compara_arrays($esconsg, $var);
    echo "<br><br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    echo "set_escons <br>";
    $esconsl = array(
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
    $db->set_escons("Lleida", $esconsl);
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    echo "get_all_escons <br>";
    $esconst = [];
    foreach ($esconsg as $k => $v) {
        $esconst[$k] = strval(intval($v) + intval(($esconsl[$k]) ?? 0));
    }
    $res = $db->get_all_escons();
    compara_arrays($esconst, $res);
    echo "<br><br>";
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    echo "count_demarcacio_with_escons <br>";
    var_export($db->count_demarcacio_with_escons() == 2);
    echo "<br><br>";
} catch (Exception $e) {
    echo $e->getMessage();
}
