<?php

namespace App\Helpers;

class SteamID
{
    /**
     * Converts a SteamID to a profile URL
     *
     * @param string $steamId
     * @return string|bool
     */
    public static function convertSteamIdToProfileUrl($steamId) {
        if (!$steamId) {
            return false;
        }

        return sprintf("https://steamcommunity.com/profiles/%s", static::convertSteamIDtoSteamID3($steamId));
    }

    /**
     * Converts a SteamID to a SteamID3
     *
     * @param string $steamID
     * @return string
     */
    public static function convertSteamIDtoSteamID3($steamID)
    {
        $split = explode(':', $steamID);

        return sprintf('[U:1:%d]', ((int) $split[1]) + ((int) $split[2]) * 2);
    }
}