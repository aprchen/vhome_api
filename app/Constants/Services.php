<?php
namespace App\Constants;
/**
 * Created by PhpStorm.
 * User: sl
 * Date: 2017/10/29
 * Time: 下午4:25
 * Hope deferred makes the heart sick,but desire fulfilled is a tree of life.
 */
class Services
{
    const CONFIG = 'config';
    const VIEW = 'view';
    const API_SERVICE = 'api';
    const REDIS_CACHE = 'redis';

    // Phalcon
    const APPLICATION = "application";
    const DISPATCHER = "dispatcher";
    const ROUTER = "router";
    const URL = "url";
    const REQUEST = "request";
    const RESPONSE = "response";
    const COOKIES = "cookies";
    const FILTER = "filter";
    const FLASH = "flash";
    const FLASH_SESSION = "flashSession";
    const SESSION = "session";
    const EVENTS_MANAGER = "eventsManager";
    const DB = "db";
    const SECURITY = "security";
    const CRYPT = "crypt";
    const TAG = "tag";
    const ESCAPER = "escaper";
    const ANNOTATIONS = "annotations";
    const MODELS_MANAGER = "modelsManager";
    const MODELS_METADATA = "modelsMetadata";
    const TRANSACTION_MANAGER = "transactionManager";
    const MODELS_CACHE = "modelsCache";
    const VIEWS_CACHE = "viewsCache";
    const ASSETS = "assets";

    // PhalconApi
    const AUTH_MANAGER = "authManager";
    const ACL = "acl";
    const TOKEN_PARSER = "tokenParser";
    const QUERY = "query";
    const USER_SERVICE = "userService";
    const URL_QUERY_PARSER = "urlQueryParser";
    const ERROR_HELPER = "errorHelper";
    const FORMAT_HELPER = "formatHelper";

    const LAZY_LOAD = true;

    // EndPointManager
    const VALUE = "value";
    const PATH = "path";
    const METHOD = "method";
    const URL_PREFIX = "url_prefix";
    const MAPPING = "Mapping";
    const GET_METHOD = "get";
    const POST_METHOD = "post";

}