# WardrobeApp - API設計書

## 📘 概要
WardrobeApp は、自分の持っている服を登録・閲覧・削除できる Web API を提供します。  
MVP 段階では認証機能を持たず、基本的な CRUD（登録・取得・削除）のみを実装しています。

---

## 🧭 ベースURL

http://localhost:8080/api

コードをコピーする

---

## 📗 エンドポイント一覧

| メソッド | エンドポイント | 機能概要 | ステータスコード |
|-----------|----------------|-----------|------------------|
| GET | `/clothes` | 登録済みの服を一覧で取得 | 200 |
| POST | `/clothes` | 新しい服を登録 | 201 |
| DELETE | `/clothes/{id}` | 服を削除 | 204 |

---

## 📘 各API詳細

### ▶ GET `/api/clothes`

**概要**  
登録済みの服の一覧を取得します。

**リクエスト例**
GET /api/clothes

pgsql
コードをコピーする

**レスポンス例**
```json
[
  {
    "id": 1,
    "name": "白シャツ",
    "category_id": 2,
    "color": "white",
    "size": "M",
    "brand": "UNIQLO",
    "created_at": "2025-11-10T09:00:00Z"
  },
  {
    "id": 2,
    "name": "黒パンツ",
    "category_id": 3,
    "color": "black",
    "size": "L",
    "brand": "GU",
    "created_at": "2025-11-10T09:10:00Z"
  }
]
▶ POST /api/clothes
概要
新しい服を登録します。

リクエストボディ

json
コードをコピーする
{
  "name": "青シャツ",
  "category_id": 1,
  "color": "blue",
  "size": "M",
  "brand": "BEAMS"
}
レスポンス例（201 Created）

json
コードをコピーする
{
  "id": 3,
  "name": "青シャツ",
  "category_id": 1,
  "color": "blue",
  "size": "M",
  "brand": "BEAMS",
  "created_at": "2025-11-10T09:20:00Z"
}
▶ DELETE /api/clothes/{id}
概要
指定した ID の服を削除します。

リクエスト例

コードをコピーする
DELETE /api/clothes/3
レスポンス

コードをコピーする
204 No Content
⚙️ 利用方法
1. Swagger UI
URL: http://localhost:8080/api/documentation

ブラウザでGUIからAPIを実行・確認可能。

2. CLI（curl例）
bash
コードをコピーする
curl -X POST http://localhost:8080/api/clothes \
     -H "Content-Type: application/json" \
     -d '{"name":"白シャツ","category_id":1,"color":"white","size":"M"}'

今後の拡張予定
機能	エンドポイント例	備考
服更新	PUT /api/clothes/{id}	更新機能追加予定
カテゴリ一覧	GET /api/categories	マスタ管理
画像アップロード	POST /api/photos	Laravel Storage対応予定

---

## 💾 保存手順

```bash
nano docs/api_design.md
# ↑ この内容をすべて貼り付け（Ctrl+O → Enter → Ctrl+X）
git add docs/api_design.md
git commit -m "update: WardrobeApp API設計書完成版"
git push
