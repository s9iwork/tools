<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\DdgDataType;
use App\Constants\DatatypeConstant;
use App\Constants\CategoryConstant;

class DdgDataTypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// 個人情報系
		DdgDataType::create([
			'id' => DatatypeConstant::COUNTRY_NAME,
			'name' => '国',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => 'イギリス',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::ZIP_CODE,
			'name' => '郵便番号',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => '6185699',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::ADDRESS,
			'name' => '住所',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => '福島県西之園市宮沢町山本4-2-2',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::NAME,
			'name' => '名前',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => '小林 修平',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::TEL,
			'name' => '電話番号',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => '080-8209-9842',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::EMAIL,
			'name' => 'メールアドレス（ダミー）',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => 'shuhei49@example.org',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::COMPANY_NAME,
			'name' => '会社名',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => '株式会社 佐々木',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::CREDIT_CARD,
			'name' => 'クレジットカード',
			'category_id' => CategoryConstant::CATEGORY_INDIVIDUAL,
			'sample' => 'Visa,4024007140008755,宮沢 裕太,08/19',
		]);

		// Web系
		DdgDataType::create([
			'id' => DatatypeConstant::ID,
			'name' => 'ID',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'minoru83',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::PASSWORD,
			'name' => 'パスワード',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => '1cwZYDEPHp',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::DOMAIN,
			'name' => 'ドメイン名',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'yamagishi.net',
		]);


		DdgDataType::create([
			'id' => DatatypeConstant::TOP_DOMAIN,
			'name' => 'トップレベルドメイン',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'com',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::URL,
			'name' => 'URL',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'https://www.takahashi.biz/sint-id-at-provident-et-qui',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::IPV4,
			'name' => 'IPV4アドレス',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => '113.193.77.56',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::IPV6,
			'name' => 'IPV6アドレス',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => '2342:6b4c:ef9d:b54f:67d3:e738:6866:aecb',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::USER_AGENT,
			'name' => 'UserAgent',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 5.0; Trident/5.0)',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::USER_AGENT_CHROME,
			'name' => 'UserAgent(Chrome)',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5331 (KHTML, like Gecko) Chrome/37.0.817.0 Mobile Safari/5331',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::USER_AGENT_FIRE_FOX,
			'name' => 'UserAgent(FireFox)',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Mozilla/5.0 (X11; Linux i686; rv:5.0) Gecko/20160719 Firefox/37.0',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::USER_AGENT_SAFARI,
			'name' => 'UserAgent(Safari)',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1) AppleWebKit/535.2.4 (KHTML, like Gecko) Version/5.0.5 Safari/535.2.4',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::USER_AGENT_OPERA,
			'name' => 'UserAgent(Opera)',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Opera/8.22 (Windows NT 6.1; sl-SI) Presto/2.9.170 Version/12.00',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::USER_AGENT_IE,
			'name' => 'UserAgent(IE)',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 4.0; Trident/5.0)',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::MIME_TYPE,
			'name' => 'MIMEタイプ',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'application/pkixcmp',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::EXTENSION,
			'name' => '拡張子',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'bmp',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::HEX_COLOR_CODE,
			'name' => '16進数カラーコード',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => '#b1d513',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::RGB_COLOR_CODE,
			'name' => 'RGBカラー',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => '155,200,242',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::COLOR_NAME,
			'name' => 'カラー名',
			'category_id' => CategoryConstant::CATEGORY_WEB,
			'sample' => 'Pink',
		]);

		// 時間系
		DdgDataType::create([
			'id' => DatatypeConstant::TIME_ZONE,
			'name' => 'タイムゾーン',
			'category_id' => CategoryConstant::CATEGORY_TIME,
			'sample' => 'Asia/Manila',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::DATE_CURRENT_YEAR,
			'name' => '日付(今年)',
			'category_id' => CategoryConstant::CATEGORY_TIME,
			'sample' => '2018-05-27 12:10:15',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::DATE_CURRENT_MONTH,
			'name' => '日付(今月)',
			'category_id' => CategoryConstant::CATEGORY_TIME,
			'sample' => '2019-03-30 01:05:55',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::DATE,
			'name' => '日付',
			'category_id' => CategoryConstant::CATEGORY_TIME,
			'sample' => '1999-01-15 23:38:32',
		]);

		// 未分類
		DdgDataType::create([
			'id' => DatatypeConstant::TEXT,
			'name' => 'フリーテキスト',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => 'Architecto nostrum explicabo rerum. Numquam enim qui animi quis nisi.',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::COUNTRY_CODE,
			'name' => '国コード',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => 'US',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::COUNTRY_CODE_3DIGIT,
			'name' => '国コード(3桁)',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => 'BRA',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::CURRENCY_CODE,
			'name' => '通貨コード',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => 'JPY',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::LATITUDE,
			'name' => '緯度',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => '67.497947',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::LONGITUDE,
			'name' => '経度',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => '74.066367',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::ISBN13,
			'name' => 'ISBN-13コード',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => '9791765867397',
		]);

		DdgDataType::create([
			'id' => DatatypeConstant::ISBN10,
			'name' => 'ISBN-10コード',
			'category_id' => CategoryConstant::CATEGORY_OTHER,
			'sample' => '147131121X',
		]);
	}
}
