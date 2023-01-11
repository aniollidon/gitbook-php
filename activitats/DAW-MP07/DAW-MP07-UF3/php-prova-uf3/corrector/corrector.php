<?php

require_once "includes/db.php";

$db = DB::get_instance();

echo "get_demarcacions \n";
var_export($db->get_demarcacions());
echo "\n\n";

echo "get_all_partits \n";
var_export($db->get_all_partits());
echo "\n\n";

echo "get_partits \n";
var_export($db->get_partits("Girona"));
echo "\n\n";

echo "find_demarcacio \n";
var_export($db->find_demarcacio("Girona"));
echo "\n\n";

echo "set_vots \n";
//var_export($db->set_vots());
echo "\n\n";

echo "get_num_escons \n";
var_export($db->get_num_escons("Girona"));
echo "\n\n";

echo "get_vots \n";
var_export($db->get_vots("Girona"));
echo "\n\n";

echo "get_all_escons \n";
var_export($db->get_all_escons());
echo "\n\n";

echo "set_escons \n";
//var_export($db->set_escons());
echo "\n\n";

echo "count_demarcacio_with_escons \n";
var_export($db->count_demarcacio_with_escons());
echo "\n\n";