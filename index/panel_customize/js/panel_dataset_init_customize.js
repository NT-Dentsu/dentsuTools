/**
 * 制作者：bot810
 * 制作日：2020/07/22
 * パネル関連の並びを定義
 * home画面とcoutomize画面で一部違いがあるため別ファイルとする
 */


// 初期値定義
// home画面ではそのまま定義
// costomize画面ではhome画面の値を利用
// セッションストレージを利用
// 参考サイト；https://qiita.com/uralogical/items/ade858ccfa164d164a3b

//ストレージから読み込んだJSON文字列を配列に戻す(暫定)
let panelInfo = JSON.parse(sessionStorage.getItem("panelInfo"));

// ここでデータベースから読み込む
//let panelInfo = DBread();
