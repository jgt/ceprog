<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditCordinador extends Request {



	private $route;

	public function __construct(Route $route)
	{

		$this->route = $route;

	}
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			
			'name' => 'required',

			'cuenta' => 'required|unique:users,cuenta,' . $this->route->getParameter('cordinador'),

			'materia_list' => 'required'
		];
	}

}
