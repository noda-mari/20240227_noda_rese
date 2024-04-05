<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EmailRequest;
use App\Mail\NotificationEmail;

class AdminController extends Controller
{
    public function showMenu()
    {
        if (Auth::guard('admin')->check()) {

            return view('admin.member-menu');
        } else {

            return view('admin.menu');
        }
    }


    public function index()
    {
        $admin = Auth::guard('admin')->user();

        $areas = Area::select('name')->get();

        $genres = Genre::select('name')->get();

        return view('admin', compact('areas', 'genres', 'admin'));
    }

    public function areaAdd(Request $request)
    {

        $area_name = $request->name;

        if ($area_name) {
            $area = Area::firstOrCreate(['name' => $area_name]);

            if ($area->wasRecentlyCreated) {

                $request->session()->flash('success', $area_name . 'を追加しました');
                return redirect('admin\admin-page')->with(compact('area_name'));
            } else {
                $request->session()->flash('error', $area_name . 'は既に登録されています');
                return redirect('admin\admin-page')->with(compact('area_name'));
            }
        } else {
            $area = 'error';
            session()->flash('error', '入力してください');
            return redirect('admin\admin-page')->with(compact('area'));
        }
    }

    public function genreAdd(Request $request)
    {

        $genre_name = $request->name;

        if ($genre_name) {
            $genre = Genre::firstOrCreate(['name' => $genre_name]);

            if ($genre->wasRecentlyCreated) {
                $request->session()->flash('success', $genre_name . 'を追加しました');
                return redirect('admin\admin-page')->with(compact('genre_name'));
            } else {
                $request->session()->flash('error', $genre_name . 'は既に登録されています');
                return redirect('admin\admin-page')->with(compact('genre_name'));
            }
        } else {
            $genre = 'error';
            session()->flash('error', '入力してください');
            return redirect('admin\admin-page')->with(compact('genre'));
        }
    }

    public function sendMail(EmailRequest $request)
    {

        $users = User::all();
        $subject = $request->subject;
        $content = $request->content;

        foreach ($users as $user) {
            Mail::to($user->email)->send(new NotificationEmail($subject, $content));
        }

        if (count(Mail::failures()) > 0) {
            $mail = 'error';
            session()->flash('error', 'メールの送信に失敗しました。');

            return redirect()->route('admin.page')->with(compact('mail'));
        } else {
            $mail = 'success';
            session()->flash('success', 'メールが送信されました。');

            return redirect()->route('admin.page')->with(compact('mail'));
        }
    }
}
