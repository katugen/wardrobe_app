# WardrobeApp - アプリ設計書（MVP）

## 🎯 アプリ概要
自分の持っている服を登録・一覧・削除できるミニマルな「服管理アプリ」。
将来的にはタグ・画像・コーディネート機能を追加予定。

## 🧩 開発目的
- Laravel × Vue3 の学習・実践
- API設計とDB設計の連携練習
- Swagger / dbdiagram / Docker の活用

## 🧱 使用技術
| 分類 | 技術 |
|------|------|
| バックエンド | Laravel 10, PHP 8.2 |
| フロント | Vue 3, TypeScript, Vite |
| インフラ | Docker, Nginx, MySQL |
| ドキュメント | Swagger (OpenAPI), dbdiagram.io |

## 🚀 MVP機能一覧
| 機能 | 内容 | 対応API |
|------|------|---------|
| 服一覧表示 | 登録済みの服を取得 | GET /api/clothes |
| 服登録 | 新しい服を登録 | POST /api/clothes |
| 服削除 | 服を削除 | DELETE /api/clothes/{id} |

## 🧠 今後の拡張
- カテゴリ管理（例：シャツ・パンツ）
- 写真アップロード機能
- タグ・検索機能
- コーディネート提案

## 🗂️ データ構成
- ER図: `docs/ERD.dbml`
- API設計: `docs/api_design.md`

## 🧭 作者メモ
WardrobeApp は、シンプルな CRUD + Swagger + DB 設計を通じて、
API・データ・設計の全体を統合的に理解することを目的とする。
