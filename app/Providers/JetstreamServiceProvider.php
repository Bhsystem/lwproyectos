<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->login();

        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    protected function login(){
        
        Fortify::authenticateUsing(function (Request $request) {
            //$user = User::where('email', $request->email)->orwhere('client_ip', $request->getClientIp())->first();
            $user = User::where('email', $request->email)->first();

                if ($user && Hash::check($request->password, $user->password)) 
                {
                    return $user;
                }

                // if($user && $user->client_ip){
                //     return $user;    
                // }   
        });

    }
    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
