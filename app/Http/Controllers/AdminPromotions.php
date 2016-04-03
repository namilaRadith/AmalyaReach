<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use PhpParser\Node\Expr\Array_;
use Request;
use App\Room;
use App\special_offer_content;
use App\special_offers;

class AdminPromotions extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('pages.admin.Promotions.add_promotions');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}
	public function display_add_discount_page(){

		$rooms = DB::table('tbl_rooms')
			->join('tbl_roomtypes', 'tbl_roomtypes.id', '=', 'tbl_rooms.type')
			->select('tbl_rooms.*', 'tbl_roomtypes.value')
			->get();


		return view('pages.admin.Promotions.add_discounts')
			->with('rooms_dump',$rooms);
	}
	public function get_room_Details(){



		$room_id = Request::get('id');
		$offer_code = Request::get('code');




		$tabel_id = DB::table('special_offer_contents')
			->insertGetId(['offer_id' => $offer_code, 'ref_table_name' => 'tbl_rooms','ref_table_id' => $room_id,'flag'=> 1]
		);


		$rooms = DB::table('tbl_rooms')
			->join('tbl_roomtypes', 'tbl_roomtypes.id', '=', 'tbl_rooms.type')
			->select('tbl_rooms.*', 'tbl_roomtypes.value')
			->where('tbl_rooms.id',$room_id)
			->get();

		$rooms['temp'] = $tabel_id;

			return $rooms;
	}

	public function get_dinning_Details(){



		$dinning_id = Request::get('id');
		$offer_code = Request::get('code');




		$tabel_id = DB::table('special_offer_contents')
			->insertGetId(['offer_id' => $offer_code, 'ref_table_name' => 'dinning_menu_items','ref_table_id' => $dinning_id,'flag'=> 1]
			);


		$dinning = DB::table('dinning_menu_items')
			->select('dinning_menu_items.*')
			->where('dinning_menu_items.id',$dinning_id)
			->get();

		$dinning['temp'] = $tabel_id;

		return $dinning;
	}
	public function display_special_offers_page(){

		$rooms = DB::table('tbl_rooms')
			->join('tbl_roomtypes', 'tbl_roomtypes.id', '=', 'tbl_rooms.type')
			->select('tbl_rooms.*', 'tbl_roomtypes.value')
			->get();

			$dinning = DB::table('dinning_menu_items')
			->select('dinning_menu_items.*')
			->get();


		$offer_code = $this->get_nonExisting_Offer_code();
		while($this->get_nonExisting_Offer_code() == '1'){
			$offer_code = $this->get_nonExisting_Offer_code();
		}

		return view('pages.admin.Promotions.special_offers')
			->with('rooms_dump',$rooms)
			->with('dinning_dump',$dinning)
			->with('offerCode',$offer_code);
	}
	public function add_special_promotions(){

		$all = Request::all();

		special_offers::create($all);

		return redirect('ad-veiw_special_offers');
	}
	public function display_special_offers_list(){


		$offers = DB::table('special_offers')
			->select('special_offers.*')
			->get();


		return view('pages.admin.Promotions.veiw_special_offers')
		->with('special_offers_table',$offers);
	}
	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function get_nonExisting_Offer_code(){

		$random_Offer_code = $this->generateRandomString();
		if (special_offers::where('offer_code', '=', $random_Offer_code)->count() > 0) {
			return '1';
		}
		else{
			return $random_Offer_code;
		}
	}
	/**
	 * $request is an array of data
	 */
	public function get_offer_Details($id){

		$offers_details = special_offers::where('id', $id)
			->get();

		return $offers_details;
	}
	public function update_special_promotions(){



		$row_id = Request::get('id');
		$name = Request::get('name');
		$description = Request::get('description');
		$status = Request::get('optionsRadios');

		special_offers::where('id', $row_id)
			->update(['name' => $name,'description' => $description,'flag' => $status]);

		return redirect('ad-veiw_special_offers');
	}
	public function update_offer_table_content($id){

		DB::table('special_offer_contents')
			->where('id', $id)
			->update(array('flag' => 0));

		return 1;
	}

}
