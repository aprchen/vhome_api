<?php

namespace App\Models\Base;

use App\Constants\Services;
use Phalcon\Cache\Backend\Redis;

/**
 * Class ModelBase
 * @package App\Models
 *
 * 数据经常变动的表不要缓存
 *
 */
class CacheBase extends ModelBase
{
    /**
     * @param $parameters
     * @return string
     */
    protected static function _createKey($parameters)
    {
        $uniqueKey = [];
        foreach ($parameters as $key => $value) {
            if (is_scalar($value)) { //判断是否为标量
                $uniqueKey[] = $key . ':' . $value;
            } elseif (is_array($value)) {
                $uniqueKey[] = $key . ':[' . self::_createKey($value) . ']';
            }
        }
        return join(',', $uniqueKey);
    }

    public static function find($parameters = null)
    {
        return parent::find(self::_setCache($parameters));
    }

    /**
     * @param $parameters
     * @return array
     * 设置缓存
     */
    protected static function _setCache($parameters)
    {
        if (!is_array($parameters)) {
            $parameters = [$parameters];
        }
        if (!isset($key['cache'])) {
            $parameters['cache'] = [
                'key' => self::class . self::_createKey($parameters),
                'lifetime' => 600,//1m
                'service' => Services::REDIS_CACHE
            ];
        }
        return $parameters;
    }

    public static function findFirst($parameters = null)
    {
        return parent::findFirst(self::_setCache($parameters));
    }

    /**
     * 清除缓存
     */
    public function delCache()
    {
        /** @var Redis $cache */
        $cache = $this->getDI()->get(Services::REDIS_CACHE);
        $keys = $cache->queryKeys(self::class);
        foreach ($keys as $key) {
            $cache->delete($key);
        }
    }

    public function save($data = null, $whiteList = null)
    {
        $this->delCache();
        parent::save($data, $whiteList); // TODO: Change the autogenerated stub
    }

    public function update($data = null, $whiteList = null)
    {
        $this->delCache();
        parent::update($data, $whiteList); // TODO: Change the autogenerated stub
    }

    public function delete()
    {
        $this->delCache();
        parent::delete(); // TODO: Change the autogenerated stub
    }
}