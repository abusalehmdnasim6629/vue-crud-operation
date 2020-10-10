<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class MemberController extends Controller
{
    public function index(Request $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->age = $request->age;
        $member->profession = $request->profession;
        $member->save();
        return $member;
    }

    public function getMember(){
        $data = Member::all();
        return $data;
    }

    public function searchMember($name){
        $data = Member::where('name', 'LIKE', '%'.$name.'%')->get();
        return $data;
    }

    public function deleteItem(Request $request)
    {
       $data = Member::find($request->id)->delete();
    }

    public function editItem(Request $request, $id){
		$data =Member::where('id', $id)->first();
		$data->name = $request->get('val_1');
		$data->age = $request->get('val_2');
		$data->profession = $request->get('val_3');
		$data->save();
		return $data;
	}
}
