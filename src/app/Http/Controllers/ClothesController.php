<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Clothes",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="白シャツ"),
 *     @OA\Property(property="category_id", type="integer", example=2, nullable=true),
 *     @OA\Property(property="color", type="string", example="white", nullable=true),
 *     @OA\Property(property="size", type="string", example="M", nullable=true),
 *     @OA\Property(property="brand", type="string", example="UNIQLO", nullable=true),
 *     @OA\Property(
 *         property="category",
 *         type="object",
 *         nullable=true,
 *         @OA\Property(property="id", type="integer", example=2),
 *         @OA\Property(property="name", type="string", example="トップス")
 *     ),
 * )
 */

class ClothesController extends Controller
{
    /**
     * 服一覧を取得する
     *
     * @OA\Get(
     *     path="/api/clothes",
     *     summary="服一覧を取得する",
     *     tags={"Clothes"},
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Clothes")
     *         )
     *     )
     * )
     */
    public function index()
    {
        // カテゴリ情報も一緒に取得（Eager Loading）
        $clothes_list = Clothes::with('category')->get();

        return response()->json($clothes_list);
    }

    /**
     * 服を登録する
     *
     * @OA\Post(
     *     path="/api/clothes",
     *     summary="服を登録する",
     *     tags={"Clothes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="青シャツ"),
     *             @OA\Property(property="category_id", type="integer", example=1, nullable=true),
     *             @OA\Property(property="color", type="string", example="blue", nullable=true),
     *             @OA\Property(property="size", type="string", example="M", nullable=true),
     *             @OA\Property(property="brand", type="string", example="BEAMS", nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="作成成功",
     *         @OA\JsonContent(ref="#/components/schemas/Clothes")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="バリデーションエラー"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'color'       => 'nullable|string|max:50',
            'size'        => 'nullable|string|max:50',
            'brand'       => 'nullable|string|max:100',
        ]);

        $clothes = Clothes::create($validated);

        // 登録後に category をロード
        $clothes->load('category');
        return response()->json($clothes, 201);
    }

    /**
     * 服を削除する
     *
     * @OA\Delete(
     *     path="/api/clothes/{id}",
     *     summary="服を削除する",
     *     tags={"Clothes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="削除対象の服ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="削除成功（No Content）"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="対象が存在しない場合"
     *     )
     * )
     */
    public function destroy($id)
    {
        $clothes = Clothes::findOrFail($id);
        $clothes->delete();
        return response()->noContent();
    }
}
