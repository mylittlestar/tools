<?php
$function_name = $argv[1];
$modules = get_loaded_extensions();
foreach($modules as $m){
    $funcs = get_extension_funcs($m);
    if(in_array($function_name, $funcs)){
        printf("%s was defined in Module: %s\n", $function_name, $m);;
        exit;
    }
}
 
print $function_name ." Must be defined in user defined PHP script files\n";
?>