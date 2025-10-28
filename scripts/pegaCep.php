

<?php

function pegarEndereco(){
    if(isset($_POST['cep'])) {
        $cep = $_POST['cep'];

        $cep = filterCep($cep);

        if(isCep($cep)){
            $json_data = getDadosViaCep($cep);
            if(property_exists($json_data, 'erro')){
                $json_data = initempty();
                $json_data->cep = "Este cep não foi encontrado.";
            } else {
                $json_data = initempty();
                $json_data->cep = "Cep inválido.";
            }
        }
    } else{
        $json_data = initempty();
    }

    return $json_data;
}

function initempty(){
    return (object) [
        'cep' => '',
        'logradouro' => '',
        'localidade' => '',
        'uf' => '',
    ];
}

function filterCep(String $cep){
    return preg_replace('/[^0-9]/', '', $cep);
}

function isCep(String $cep):bool{
    return preg_match('/^[0-9]{5}-?[0-9]{3}$/', $cep);
}

function getDadosViaCep(String $cep){
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    return json_decode(file_get_contents($url), false);
}

?>