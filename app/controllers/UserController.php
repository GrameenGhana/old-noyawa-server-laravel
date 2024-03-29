<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author liman
 */
class UserController extends BaseController {

    protected $layout = "layouts.main";

    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('getDashboard')));
    }

    public function getRegister() {
        $this->layout->content = View::make('users.register');
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
             $user->role = Input::get('role');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('/noyawa/users/login')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::to('/noyawa/users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function getLogin() {
        $this->layout->content = View::make('users.login');
    }

    public function postSignin() {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            return Redirect::to('/noyawa/users/dashboard')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('/noyawa/users/login')
                            ->with('message', 'Your username/password combination was incorrect')
                            ->withInput();
        }
    }

    public function getDashboard() {
        $this->layout->content = View::make('users.dashboard');
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/noyawa/users/login')->with('message', 'Your are now logged out!');
    }

}

