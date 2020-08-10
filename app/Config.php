<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Config
 * @package App
 */
class Config extends Model
{
    /**
     *
     */
    const CONFIG_ANNOUNCEMENT = 'announcement';
    /**
     * @var string
     */
    protected $table = 'config';
    /**
     * @var string[]
     */
    protected $fillable = ['key', 'value'];

    /**
     * @var null
     */
    protected static $announcement;

    /**
     * @return bool
     */
    public static function isSetAnnouncement(): bool
    {
        if (!isset(self::$announcement)) {
            $announcement = Config::where('key', self::CONFIG_ANNOUNCEMENT)->first();
            if ($announcement instanceof Config)
                self::$announcement = $announcement->value;
        }
        return !empty(self::$announcement);
    }

    /**
     * @return string|null
     */
    public static function getAnnouncement(): ?string
    {
        return self::$announcement;
    }
}
