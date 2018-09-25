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
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "app";
$route['404_override'] = '';

/**************************************************************************/
/****Rotas Projetos********************************************************/
/**************************************************************************/

$route['projetos'] = "projetos/listar";

/**************************************************************************/
/****Rotas Empresa*********************************************************/
/**************************************************************************/

$route['empresas'] = "empresas/listar";
$route['empresas/(:num)'] = "empresas/listar/$1";

/**************************************************************************/
/****Rotas Contato*********************************************************/
/**************************************************************************/

$route['contatos'] = "contatos/listar";
$route['contatos/(:num)'] = "contatos/listar/$1";

/**************************************************************************/
/****Rotas Atividade*******************************************************/
/**************************************************************************/

$route['atividades'] = "atividades/listar";
$route['atividades/(:num)'] = "atividades/listar/$1";

/**************************************************************************/
/****Rotas Departamento****************************************************/
/**************************************************************************/

$route['departamentos'] = "departamentos/listar";
$route['departamentos/(:num)'] = "departamentos/listar/$1";

/**************************************************************************/
/****Rotas Funil***********************************************************/
/**************************************************************************/

$route['funil'] = "funil/listar";
$route['funil/(:num)'] = "funil/listar/$1";

/**************************************************************************/
/****Rotas Follow***********************************************************/
/**************************************************************************/

$route['follow'] = "follow/listar";
$route['follow/(:num)'] = "follow/listar/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */