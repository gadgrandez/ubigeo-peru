<?php

/**
 * Get states by related Country Code
 * @return JSON Object
 */
function get_states_call()
{
    $country_code = $_POST['country_code'];

    global $wpdb;
    $db = $wpdb->get_results("SELECT idProv, CONCAT(UCASE(LEFT(provincia, 1)), (SUBSTRING(provincia, 2))) as provincia, idDepa FROM ".$wpdb->prefix."ubigeo_provincia WHERE idDepa = '".$country_code."' order by provincia ASC");

    $items = array();
    $items[0]['idDepa'] = "";
    $items[0]['idProv'] = "";
    $items[0]['provincia'] = 'Seleccione';

    $i = 1;
    foreach( $db as $data ) {
        $items[$i]['idDepa'] = $data->idDepa;
        $items[$i]['idProv'] = $data->idProv;
        $items[$i]['provincia'] = ucfirst($data->provincia);
        $i++;
    }
    //return $items;
    ob_clean();
    echo json_encode($items);
    die();
}

/**
 * Get cities by related State Code or Country Code (IF State code == "00" or States == 'N/A')
 * @return JSON Object
 */
function get_cities_call()
{
    if( trim($_POST['row_code']) ) {
        $codes = explode('-', $_POST['row_code']);
        $country_code = $codes[1];
        $city_code = $codes[0];

        global $wpdb;

        $db = $wpdb->get_results("SELECT idDist, CONCAT(UCASE(LEFT(distrito, 1)), (SUBSTRING(distrito, 2))) as distrito, idProv  FROM ".$wpdb->prefix."ubigeo_distrito WHERE idProv = '".$city_code."' order by distrito ASC");
        $items = array();

        $items[0]['id'] = "";
        $items[0]['city_name'] = 'Seleccione';
        $i = 1;
        foreach( $db as $data )
        {
            $items[$i]['id'] = $data->idDist;
            $items[$i]['city_name'] = ucfirst($data->distrito);
            $i++;
        }
        //return $items;
        ob_clean();
        echo json_encode($items);
        die();
    }
}

/**
 * Fill the countries select
 * @return Array
 */
function departamento_select($selectedCountry = null)
{
    global $wpdb;
    $db = $wpdb->get_results("SELECT idDepa, CONCAT(UCASE(LEFT(departamento, 1)), (SUBSTRING(departamento, 2))) as departamento FROM ".$wpdb->prefix."ubigeo_departamento order by departamento ASC");

    $items = array();

    if (null==$selectedCountry)
        $items[]='Seleccione';

    foreach( $db as $data ) {
        $items[$data->idDepa] = ucfirst($data->departamento);
    }
    return $items;
}

//obtener todo los departamento
function getDepartamento()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_departamento";
    $request = "SELECT idDepa, CONCAT(UCASE(LEFT(departamento, 1)), (SUBSTRING(departamento, 2))) as departamento FROM $table_name";
    return $wpdb->get_results($request,ARRAY_A);
}

//obtener el departamento por su idDepa
function getDepartamentoByidDepa($idDepa = 0)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_departamento";
    $request = "SELECT idDepa, CONCAT(UCASE(LEFT(departamento, 1)), (SUBSTRING(departamento, 2))) as departamento FROM $table_name  where idDepa = $idDepa";
    $dto = $wpdb->get_results($request,ARRAY_A);
    return $dto[0]['departamento'];
}

//obtener las provincias por idDepa
function getProvinciaByidDepa($idDepa = 0)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_provincia";
    $request = "SELECT idProv, CONCAT(UCASE(LEFT(provincia, 1)), (SUBSTRING(provincia, 2))) as provincia, idDepa FROM $table_name where idDepa = $idDepa";
    return $wpdb->get_results($request,ARRAY_A);
}

//obtener provincia por idProv
function getProvinciaByidProv($idProv = 0)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_provincia";
    $request = "SELECT idProv, CONCAT(UCASE(LEFT(provincia, 1)), (SUBSTRING(provincia, 2))) as provincia, idDepa FROM $table_name where idProv = $idProv";
    $idProv = $wpdb->get_results($request,ARRAY_A);
    return $idProv[0]['provincia'];
}
//obtener distrito por idProv
function getDistritoByidProv($idProv = 0)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $request = "SELECT idDist, CONCAT(UCASE(LEFT(distrito, 1)), (SUBSTRING(distrito, 2))) as distrito, idProv FROM $table_name where idProv = $idProv";
    return $wpdb->get_results($request,ARRAY_A);

}

//obtener distrito por idDist
function getDistritoByidDist($idDist = 0)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "ubigeo_distrito";
    $request = "SELECT idDist, CONCAT(UCASE(LEFT(distrito, 1)), (SUBSTRING(distrito, 2))) as distrito, idProv FROM $table_name where idDist = $idDist";
    $dist = $wpdb->get_results($request,ARRAY_A);
    return $dist[0]['distrito'];
}
