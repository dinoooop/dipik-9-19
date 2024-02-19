<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'val',
    ];

    public static function get($optionKey)
    {
        $option = self::where('key', $optionKey)->first();
        $value = isset($option->val) ? $option->val : null;

        if (is_null($value)) {
            return $value;
        }

        $data = @unserialize($value);
        return ($data !== false) ? $data : $value;
    }

    public static function set($optionKey, $optionValue)
    {

        if (is_array($optionValue)) {
            $optionValue = serialize($optionValue);
        }

        $option = self::where('key', $optionKey)->first();

        if (!isset($option->val)) {
            self::create([
                'key' => $optionKey,
                'val' => $optionValue
            ]);
        } else {
            $option->val = $optionValue;
            $option->save();
        }
    }
    
}
