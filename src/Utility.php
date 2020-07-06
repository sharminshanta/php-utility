<?php


namespace Sharminshanta\Web\PHPUtilities;

use Illuminate\Support\Facades\DB;

/**
 * Class Utility
 * @package Sharminshanta\Web\PHPUtilities
 */
class Utility
{
    /**
     * @param $text
     * @return bool|false|string|string[]|null
     */
    public static function generateSlugify($text)
    {
        return strtolower(str_replace(' ', '-', preg_replace('/\s+/u', '_', trim($text))));
    }

    /**
     * @param $text
     * @return string|string[]|null
     */
    public static function generateBanSlugify($text)
    {
        return preg_replace('/\s+/u', '_', trim($text));
    }

    /**
     * @return string
     */
    public static function generateUUID()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    /**
     * @param $slug
     * @return string
     */
    public static function generateSlugText($slug)
    {
        /*
         | Check text from database table
         | Check text for unique
         | If database table field is unique, then check text
         | Put on database table name
         */
        $connection = DB::table('DATABASE_TABLE_NAME');

        //put on table column name which want to check
        $text = $connection->where('TABLE_COLUMN_NAME', $slug)
            ->get();

        $countName = count($text);

        if($countName === 0){
         return strtolower(str_replace(' ', '-', trim($slug)));
        }

        $countName++;
        $result = $slug . ' ' . $countName;

        return strtolower(str_replace(' ', '-', trim($result)));
    }
}
