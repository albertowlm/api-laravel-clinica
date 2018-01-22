<?php

/**
 * Created by PhpStorm.
 * User: alber
 * Date: 20/01/2018
 * Time: 00:06
 */


namespace Clin\Http\Controllers\Api;
use Illuminate\Http\Request;
use Clin\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    /**
     * @SWG\Info(title="API Controle de Plano da Saúde por Clínica", version="0.0.1")
     */


    /**
     * Requisitar token JWT
     *
     * @SWG\POST(
     *     path="/api/login",
     *     @SWG\Parameter(
     *          name="body", in="body", required=true,
     *          @SWG\Schema(
     *              @SWG\Property(property="email", type="string"),
     *              @SWG\Property(property="password", type="string"),
     *          )
     *     ),
     *     @SWG\Response(
     *      response="200", description="Token JWT"
     *     )
     * )
     */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            $token = \JWTAuth::attempt($credentials);
        } catch (JWTException $ex) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        if (!$token) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return response()->json(compact('token'));
    }

    

    public function logout()
    {
        try {
            \JWTAuth::invalidate();
        } catch (JWTException $ex) {
            return response()->json(['error' => 'could_not_invalidate_token'], 500);
        }
        return response()->json([], 204);
    }

    public function refreshToken(Request $request)
    {
        try {
            $bearerToken = \JWTAuth::setRequest($request)->getToken();
            $token = \JWTAuth::refresh($bearerToken);
        } catch (JWTException $exception) {
            return response()->json(['error' => 'could_not_refresh_token'], 500);
        }
        return response()->json(compact('token'));
    }
}