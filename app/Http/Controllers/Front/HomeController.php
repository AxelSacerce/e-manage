<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;
use DateTime;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use Lang;
use App\Login;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $redirectTo = '/';
    protected $section = 'home';

    public function index()
    {
        $sold_item = DB::table('sold_item');
        $item_in_warehouse = DB::table('item_in_warehouse');
        $data['recent_items'] = $item_in_warehouse->union($sold_item)
                                    ->orderBy('added_at', 'decs')
                                    ->get();

        return view('front.index', $data);
    }

    public function lang($lang)
    {
        $language = in_array($lang, config('app.available_locales')) ? $lang : config('app.fallback_locale');
        session()->set('locale', $language);

        return back();
    }

    public function doLogin(Request $request)
    {
        // Basic Rules

        $rules = [
          'username'  => 'required|min:5',
          'password'  => 'required|min:5',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return Redirect::to('login')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
        } else {
          $userdata = [
          'username'  => Input::get('username'),
          'password'  => Input::get('password'),
        ];

        $field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('username')]);

        if (Auth::attempt($request->only($field, 'password'))) {
            return Redirect::to('/');
          } else {
            return Redirect::to('login')
            ->with('message', 'Username or Password Incorrect');
          }
        }
    }

    public function doLogout()
    {
        Auth::logout();

        return Redirect::to('/login');
    }

    public static function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'y' => trans("front/site.home.recent.y"),
            'm' => trans("front/site.home.recent.m"),
            'w' => trans("front/site.home.recent.w"),
            'd' => trans("front/site.home.recent.d"),
            'h' => trans("front/site.home.recent.h"),
            'i' => trans("front/site.home.recent.i"),
            's' => trans("front/site.home.recent.s"),
        ];
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k.' '.$v.($diff->$k > 1 ? trans("front/site.home.recent.more_than_one") : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) {
            $string = array_slice($string, 0, 1);
        }

        return $string ? implode(', ', $string). ' ' . trans("front/site.home.recent.ago") : ' ' . trans("front/site.home.recent.just_now");
    }
}
