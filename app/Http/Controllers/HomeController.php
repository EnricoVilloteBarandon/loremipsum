<?php

namespace App\Http\Controllers;

use App\Bar;
use App\Image;
use App\Profile;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Theme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Foo;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $direct = User::checkusertype($user->id);
            return Redirect::to($direct);
        }else{
            $theme = Theme::uses('home')->layout('default')->setTitle('Login');
            return $theme->of('login/login')->render();
        }
    }
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $data = [
            'email' => $username,
            'password' => $password
        ];
        $rules = [
            'email' => 'required|min:2',
            'password' => 'required|min:2'
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return Redirect::to('/');
        }else{
            if(Auth::attempt(['email' => $username, 'password' => $password])){
                return Redirect::to('/');
            }else{
                return Redirect::to('/')
                    ->withErrors([
                        'validate' => 'Invalid'
                    ]);
            }
        }
    }
    public function register(){
        $theme = Theme::uses('home')->layout('default')->setTitle('Test');
        return $theme->of('login/register')->render();
    }
    public function insertuser(Request $request){
        $dataarray = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'user_type' => $request->input('type')
        ];
        $users = new User();
        $users->insert($dataarray);
        return Redirect::to('/');
    }
    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
    public function testinsert(){
        $theme = Theme::uses('home')->layout('default')->setTitle('Test');
        return $theme->of('home/testinsert')->render();
    }
    public function json(Request $request){
        $formdata = $request->input('data');
        $array = [];
        foreach($formdata as $key => $value){
            $array[$value['name']] = $value['value'];
        }
        $array = [
            'data' => json_encode($array),
            'user_id' => 1
        ];
        $profile = new Profile();
        $profile->insert($array);
        return '0';
    }
    public function back(){
        return Redirect::to('/');
    }
    public function dashboard(){
        $profile = new Profile();
        $profile_data = $profile->getallprofile();
        $data = [
            'profile' => $profile_data
        ];
        $theme = Theme::uses('home')->layout('default')->setTitle('Test');
        return $theme->of('home/index',$data)->render();
    }
    public function seconddashboard(){
        $theme = Theme::uses('home')->layout('default')->setTitle('Test');
        return $theme->of('home/second')->render();
    }
    public function thirddashboard(){
        $imagemodel = new Image();
        $data = [
            'image' => $imagemodel->getalldata()
        ];
        $theme = Theme::uses('home')->layout('default')->setTitle('Test');
        return $theme->of('home/third',$data)->render();
    }
    public function search(Request $request){
        $user = new User();
        $data = $user->searchkeyword($request->input('keyword'));
        $html = '';
        foreach($data as $key => $value){
            $html .= '<li class="searchitems">' . $value->firstname .' '. $value->lastname .'</li>';
        }
        return $html;
    }
    public function feeds(){
        $feed = Feeds::make('http://blog.case.edu/news/feed.atom');
        $data = array(
            'items' => $feed->get_items()
        );
        return View::make('home/feeds',$data);
    }
    public function submitform(Request $request){
        $title = $request->input('title');
        $file = $request->file('image');
        $hiddenSpanImage = $request->input('hiddenSpanImage');
        if(isset($file)){
            $destinationpath = public_path() . '/img/';
            $filename = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $newfilename = $filename.'.'.$extension;
            $upload_success = $request->file('image')->move($destinationpath,$newfilename);
        }else{
            $newfilename = $hiddenSpanImage;
        }
        $dataArray = [
            'title' => $title,
            'image' => $newfilename
        ];
        $imagemodel = new Image();
        $imagemodel->saveimage($dataArray);
        return 'saved';
    }
    public function checkit(){
        return 'wqewqe';
    }
}
