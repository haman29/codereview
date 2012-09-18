<?php
/**
 * 新卒コードレビュー課題
 * 二分木探索
 *
 * @date   2011年 10月 28日 金曜日
 * @author Kyohei Hamada <Kyohei_Hamada@voyagegroup.com>
 * @履歴(2.5h)
 *   2011年 10月 28日 金曜日 21:28:35 JST start
 *                           22:00        end
 *   2011年 10月 28日 金曜日 22:58:11 JST start
 *   2011年 10月 28日 金曜日 23:55:31 JST end   データ構造のみ実装
 *   2011年 10月 31日 月曜日 11:12:15 JST start
 *                           12:00        end   search()の実装
 *
 * @やりたいこと
 * 　二分木探索のデータ構造を作る、追加、削除、参照、探索 <- must
 * 　AVL木
 * 　B木
 *   幅優先探索、深さ優先探索と
 *   配列と比較してどれくらいの速度ができるか検証
 *
 */
class BinarySearchTree
{
    public $value; // 値
    public $left;  // 左部分木
    public $right; // 右部分木

    /**
     * 初期化
     *
     * @param integer ラベル
     * @param BinarySearchTree 左部分木
     * @param BinarySearchTree 右部分木
     */
    public function __construct($value = null, $left = null, $right = null)
    {
        $this->value = $value;
        $this->left  = $left;
        $this->right = $right;
    }

    public function insert($value)
    {
        $p = $this;
        while ($p != null)
        {
            if ($p->value >= $value) {
                $parent = $p;
                $p = $p->left;
            } else if ($p->value < $value) {
                $parent = $p;
                $p = $p->right;
            } else {
                return null;
            }
            if ($p_left === null) {
                $p_left = new BinarySearchTree($value, null, null);
            } else if ($p_right === null) {
                $p_right = new BinarySearchTree($value, null, null);
            } 
        }
    }

    public function delete()
    {
    }
    
    /**
     * 対象の値を探索する(再帰:redundancyを用いた実装)
     * TODO 探索回数 を返す
     *
     * @param  integer ラベル
     * @return integer 探索結果のラベル or null
     */
    public function search($value)
    {
        if ($this->value === $value) {
            return $this->value;
        } else if ($this->value > $value && $this->left !== null) {
            return $this->left->search($value);
        } else if ($this->value < $value && $this->right !== null) {
            return $this->right->search($value);
        } else {
            return null;
        }
    }

    /**
     * 対象の値を探索する(roopを用いた実装)
     * TODO 探索回数 を返す
     *
     * @param  integer ラベル
     * @return integer 探索結果のラベル or null
     */
    public function search2($value)
    {
        $p = $this;
        while ($p != null)
        {
            if ($p->value === $value) {
                return $p->value;
            } else if ($p->value > $value) {
                $p = $p->left;
            } else if ($p->value < $value) {
                $p = $p->right;
            } else {
                return null;
            }
        }
    }
}
