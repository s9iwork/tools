<?php

declare(strict_types=1);

namespace App\Ddg\Constants;

/**
 * Class DatatypeConstant.
 */
class DatatypeConstant
{
    /**
     * @var int 国名
     */
    public const COUNTRY_NAME = 1;

    /**
     * @var int 郵便番号
     */
    public const ZIP_CODE = 2;

    /**
     * @var int 住所
     */
    public const ADDRESS = 3;

    /**
     * @var int 名前
     */
    public const NAME = 4;

    /**
     * @var int 電話番号
     */
    public const TEL = 5;

    /**
     * @var int メールアドレス
     */
    public const EMAIL = 6;

    /**
     * @var int 会社名
     */
    public const COMPANY_NAME = 7;

    /**
     * @var int クレジットカード
     */
    public const CREDIT_CARD = 8;

    /**
     * @var int ID
     */
    public const ID = 9;

    /**
     * @var int パスワード
     */
    public const PASSWORD = 10;

    /**
     * @var int ドメイン
     */
    public const DOMAIN = 11;

    /**
     * @var int トップドメイン
     */
    public const TOP_DOMAIN = 12;

    /**
     * @var int URL
     */
    public const URL = 13;

    /**
     * @var int IPV4アドレス
     */
    public const IPV4 = 14;

    /**
     * @var int IPV6アドレス
     */
    public const IPV6 = 15;

    /**
     * @var int UserAgent
     */
    public const USER_AGENT = 16;

    /**
     * @var int UserAgent(Chrome)
     */
    public const USER_AGENT_CHROME = 17;

    /**
     * @var int UserAgent(FireFox)
     */
    public const USER_AGENT_FIRE_FOX = 18;

    /**
     * @var int UserAgent(Safari)
     */
    public const USER_AGENT_SAFARI = 19;

    /**
     * @var int UserAgent(Opera)
     */
    public const USER_AGENT_OPERA = 20;

    /**
     * @var int UserAgent(IE)
     */
    public const USER_AGENT_IE = 21;

    /**
     * @var int MIMEタイプ
     */
    public const MIME_TYPE = 22;

    /**
     * @var int 拡張子
     */
    public const EXTENSION = 23;

    /**
     * @var int 16進数カラーコード
     */
    public const HEX_COLOR_CODE = 24;

    /**
     * @var int RGBカラーコード
     */
    public const RGB_COLOR_CODE = 25;

    /**
     * @var int 色名
     */
    public const COLOR_NAME = 26;

    /**
     * @var int タイムゾーン
     */
    public const TIME_ZONE = 27;

    /**
     * @var int 日付(直近1年)
     */
    public const DATE_CURRENT_YEAR = 28;

    /**
     * @var int 日付(直近1か月)
     */
    public const DATE_CURRENT_MONTH = 29;

    /**
     * @var int 日付
     */
    public const DATE = 30;

    /**
     * @var int フリーテキスト
     */
    public const TEXT = 31;

    /**
     * @var int 国コード
     */
    public const COUNTRY_CODE = 32;

    /**
     * @var int 国コード(3桁)
     */
    public const COUNTRY_CODE_3DIGIT = 33;

    /**
     * @var int 通貨コード
     */
    public const CURRENCY_CODE = 34;

    /**
     * @var int 緯度
     */
    public const LATITUDE = 35;

    /**
     * @var int 経度
     */
    public const LONGITUDE = 36;

    /**
     * @var int ISBN-13コード
     */
    public const ISBN13 = 37;

    /**
     * @var int ISBN-10コード
     */
    public const ISBN10 = 38;
}
