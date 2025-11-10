<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Swagger Test API",
 *     description="L5-Swagger の動作確認用API"
 * )
 */
class SwaggerTestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/hello",
     *     summary="Helloテスト",
     *     description="Swaggerが正しく生成されるか確認するAPI",
     *     @OA\Response(
     *         response=200,
     *         description="成功時レスポンス"
     *     )
     * )
     */
    public function hello()
    {
        return response()->json(['message' => 'Hello Swagger!']);
    }

    /**
 * @OA\Post(
 *     path="/api/users",
 *     summary="ユーザーを登録する",
 *     description="新規ユーザーを作成します。",
 *     tags={"User"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email"},
 *             @OA\Property(property="name", type="string", example="田中太郎"),
 *             @OA\Property(property="email", type="string", example="taro@example.com")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="作成成功",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="田中太郎"),
 *             @OA\Property(property="email", type="string", example="taro@example.com")
 *         )
 *     )
 * )
 */
public function store(Request $request)
{
    return response()->json([
        'id' => 1,
        'name' => $request->name,
        'email' => $request->email,
    ], 201);
}

}


