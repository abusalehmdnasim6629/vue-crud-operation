<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Member;
class MemberController extends Controller
{
    public function index(Request $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->age = $request->age;
        $member->birth = $request->birth;
        $member->rankingOfODI = $request->odi;
        $member->rankingOfT20 = $request->t20;
        $member->rankingOfTest = $request->test;
        $member->save();
        return $member;
    }

    public function getMember(){
        $data = Member::all();
        return $data;
    
    }public function search(Request $request){
        $search = $request->item;
        $data = Member::where('name','like','%'.$search.'%')->get();
        return $data;
    }
    public function getEmployee(){
        $data = Member::orderBy('name', 'ASC')->get();
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
    
    public function nextPage(){
        return view('sec');
    }

    public function saveMember(Request $request){
        // $data['name'] = $request->name;
        // $data['age'] = $request->age;
        // $data['profession'] = $request->profession;

        // Member::insert($data);
        $member = new Member();
        $member->name = $request->name;
        $member->age = $request->age;
        $member->birth = $request->birth;
        $member->rankingOfODI = $request->odi;
        $member->rankingOfT20 = $request->t20;
        $member->rankingOfTest = $request->test;
        $member->save();
        return 0;
        
    }

    public function updateMember(Request $request){
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $data['profession'] = $request->profession;
        Member::where('id',$request->id)->update($data);
        return 0;
    }
    
    public function updatePlayer(Request $request){
        $data = $request->all();
        unset($data['_token'],$data['hdn']);
        Member::where('id',$request->hdn)->update($data);
        return redirect()->back();
        return $data;

    }

    public function deleteMember(Request $request){
        Member::where('id',$request->id)->delete();
        return 0;
    }

    public function editPlayer(Request $request){
        $data = Member::where('id',$request->id)->first();
        return $data;
    }

    public function sazib(){
       $a = DB::table('feedback')
                ->join('offer_useds','feedback.offer_used_id','=','offer_useds.id')
                ->join('offers','offers.id','=','offer_useds.offer_id')
                ->join('users','feedback.user_id','=','users.id')
                ->get()
                ->toArray();
       return $a;
    }
}
