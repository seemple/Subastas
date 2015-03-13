<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
$route['404_override'] = 'error_404';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'error_404';
$route['backend/item/listar/(:num)'] = 'backend/item/listar/$5';
$route['backend/socios/listar/(:num)'] = 'backend/socios/listar/$4';
$route['backend/galeria/listar/(:num)'] = 'backend/galeria/listar/$5';
// Listados de articulos de acuerdo a la categoria
$route['(novedades|recursos|capacitacion)'] = 'novedades/index/$0';
$route['(novedades|recursos|capacitacion)/(:num)'] = 'novedades/index/$1';
// Detalle de articulo
$route['(novedades|recursos|capacitacion)/(:any)/(:num)'] = 'detalle_novedades/index/$3';


// Listado de clasificado por TIPO
$route['clasificados/(Venta|Alquiler|Remate)'] = 'clasificados/tipo/$1';
$route['clasificados/(Venta|Alquiler|Remate)/(:num)'] = 'clasificados/tipo/$1/$2';

// Listado de clasificados SUBCATEGORIA
$route['clasificados/(:num)~(:any)/(:num)'] = 'clasificados/subcategoria/$1/$3';
$route['clasificados/(:num)~(:any)'] = 'clasificados/subcategoria/$1';

// Listado de clasificado por CATEGORIA
$route['clasificados/(:any)/(:num)/(:num)'] = 'clasificados/categoria/$2/$3';
$route['clasificados/(:any)/(:num)'] = 'clasificados/categoria/$2';


// Detalle de clasificados
$route['(Venta|Alquiler|Remate)/(:any)/(:num)'] = 'detalle_clasificados/index/$3';

//Buscador
$route['buscar/(remates|clasificados)'] = 'buscar/index/$1';

// Listado de socios
$route['socios/(:num)'] = 'socios/index/$1';
// Listado de socios por letra
$route['socios/buscar/(:any)'] = 'socios/index/$1';
$route['socios/buscar/(:any)/(:num)'] = 'socios/index/$1/$2';
//Detalle de socio
$route['socios/(:any)/(:num)'] = 'detalle_socios/index/$2';

//Institucional
$route['institucional/(:any)'] = 'institucional/index/$1';




/* End of file routes.php */
/* Location: ./application/config/routes.php */