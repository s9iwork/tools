<?php

namespace Tests\Unit\Repositories;

use App\Repositories\DataGenerateRepository;
use Tests\TestCase;

/**
 * Class DataGenerateRepositoryTest
 *
 * @package Tests\Unit\Repositories
 * @group ddg
 */
class DataGenerateRepositoryTest extends TestCase
{
	/**
	 * データ生成リポジトリのインスタンス
	 *
	 * @var null
	 */
	private $data_generate_repository = null;

	/**
	 * {@inheritDoc}
	 */
	public function setUp(): void
	{
		parent::setUp();
		$this->data_generate_repository = $this->app->make(DataGenerateRepository::class);
	}

	/**
	 * カテゴリー取得：正常系
	 */
	public function test_getCategories_01()
    {
    	// テスト
    	$categories = $this->data_generate_repository->getCategories();

    	// データ確認
    	$this->assertCount(4, $categories);
        $this->assertSame(1, $categories[0]['id']);
        $this->assertSame('個人情報系', $categories[0]['name']);
		$this->assertSame(2, $categories[1]['id']);
		$this->assertSame('Web系', $categories[1]['name']);
		$this->assertSame(3, $categories[2]['id']);
		$this->assertSame('時間系', $categories[2]['name']);
		$this->assertSame(4, $categories[3]['id']);
		$this->assertSame('未分類', $categories[3]['name']);
    }

	/**
	 * データ種別取得：正常系
	 */
	public function test_getDataTypes_01()
	{
		// テスト
		$data_types = $this->data_generate_repository->getDataTypes();

		// データ確認
		$this->assertCount(38, $data_types);
		$this->assertSame(1, $data_types[0]['id']);
		$this->assertSame('国', $data_types[0]['name']);
		$this->assertSame(1, $data_types[0]['category_id']);
		$this->assertSame('イギリス', $data_types[0]['sample']);
		$this->assertSame(2, $data_types[1]['id']);
		$this->assertSame('郵便番号', $data_types[1]['name']);
		$this->assertSame(1, $data_types[1]['category_id']);
		$this->assertSame('6185699', $data_types[1]['sample']);
		$this->assertSame(3, $data_types[2]['id']);
		$this->assertSame('住所', $data_types[2]['name']);
		$this->assertSame(1, $data_types[2]['category_id']);
		$this->assertSame('福島県西之園市宮沢町山本4-2-2', $data_types[2]['sample']);
		$this->assertSame(4, $data_types[3]['id']);
		$this->assertSame('名前', $data_types[3]['name']);
		$this->assertSame(1, $data_types[3]['category_id']);
		$this->assertSame('小林 修平', $data_types[3]['sample']);
		$this->assertSame(5, $data_types[4]['id']);
		$this->assertSame('電話番号', $data_types[4]['name']);
		$this->assertSame(1, $data_types[4]['category_id']);
		$this->assertSame('080-8209-9842', $data_types[4]['sample']);
		$this->assertSame(6, $data_types[5]['id']);
		$this->assertSame('メールアドレス（ダミー）', $data_types[5]['name']);
		$this->assertSame(1, $data_types[5]['category_id']);
		$this->assertSame('shuhei49@example.org', $data_types[5]['sample']);
		$this->assertSame(7, $data_types[6]['id']);
		$this->assertSame('会社名', $data_types[6]['name']);
		$this->assertSame(1, $data_types[6]['category_id']);
		$this->assertSame('株式会社 佐々木', $data_types[6]['sample']);
		$this->assertSame(8, $data_types[7]['id']);
		$this->assertSame('クレジットカード', $data_types[7]['name']);
		$this->assertSame(1, $data_types[7]['category_id']);
		$this->assertSame('Visa,4024007140008755,宮沢 裕太,08/19', $data_types[7]['sample']);
		$this->assertSame(9, $data_types[8]['id']);
		$this->assertSame('ID', $data_types[8]['name']);
		$this->assertSame(2, $data_types[8]['category_id']);
		$this->assertSame('minoru83', $data_types[8]['sample']);
		$this->assertSame(10, $data_types[9]['id']);
		$this->assertSame('パスワード', $data_types[9]['name']);
		$this->assertSame(2, $data_types[9]['category_id']);
		$this->assertSame('1cwZYDEPHp', $data_types[9]['sample']);

		$this->assertSame(11, $data_types[10]['id']);
		$this->assertSame('ドメイン名', $data_types[10]['name']);
		$this->assertSame(2, $data_types[10]['category_id']);
		$this->assertSame('yamagishi.net', $data_types[10]['sample']);
		$this->assertSame(12, $data_types[11]['id']);
		$this->assertSame('トップレベルドメイン', $data_types[11]['name']);
		$this->assertSame(2, $data_types[11]['category_id']);
		$this->assertSame('com', $data_types[11]['sample']);
		$this->assertSame(13, $data_types[12]['id']);
		$this->assertSame('URL', $data_types[12]['name']);
		$this->assertSame(2, $data_types[12]['category_id']);
		$this->assertSame('https://www.takahashi.biz/sint-id-at-provident-et-qui', $data_types[12]['sample']);
		$this->assertSame(14, $data_types[13]['id']);
		$this->assertSame('IPV4アドレス', $data_types[13]['name']);
		$this->assertSame(2, $data_types[13]['category_id']);
		$this->assertSame('113.193.77.56', $data_types[13]['sample']);
		$this->assertSame(15, $data_types[14]['id']);
		$this->assertSame('IPV6アドレス', $data_types[14]['name']);
		$this->assertSame(2, $data_types[14]['category_id']);
		$this->assertSame('2342:6b4c:ef9d:b54f:67d3:e738:6866:aecb', $data_types[14]['sample']);
		$this->assertSame(16, $data_types[15]['id']);
		$this->assertSame('UserAgent', $data_types[15]['name']);
		$this->assertSame(2, $data_types[15]['category_id']);
		$this->assertSame('Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 5.0; Trident/5.0)', $data_types[15]['sample']);
		$this->assertSame(17, $data_types[16]['id']);
		$this->assertSame('UserAgent（Chrome）', $data_types[16]['name']);
		$this->assertSame(2, $data_types[16]['category_id']);
		$this->assertSame('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5331 (KHTML, like Gecko) Chrome/37.0.817.0 Mobile Safari/5331', $data_types[16]['sample']);
		$this->assertSame(18, $data_types[17]['id']);
		$this->assertSame('UserAgent（Firefox）', $data_types[17]['name']);
		$this->assertSame(2, $data_types[17]['category_id']);
		$this->assertSame('Mozilla/5.0 (X11; Linux i686; rv:5.0) Gecko/20160719 Firefox/37.0', $data_types[17]['sample']);
		$this->assertSame(19, $data_types[18]['id']);
		$this->assertSame('UserAgent（Safari）', $data_types[18]['name']);
		$this->assertSame(2, $data_types[18]['category_id']);
		$this->assertSame('Mozilla/5.0 (Windows; U; Windows NT 5.1) AppleWebKit/535.2.4 (KHTML, like Gecko) Version/5.0.5 Safari/535.2.4', $data_types[18]['sample']);
		$this->assertSame(20, $data_types[19]['id']);
		$this->assertSame('UserAgent（Opera）', $data_types[19]['name']);
		$this->assertSame(2, $data_types[19]['category_id']);
		$this->assertSame('Opera/8.22 (Windows NT 6.1; sl-SI) Presto/2.9.170 Version/12.00', $data_types[19]['sample']);

		$this->assertSame(21, $data_types[20]['id']);
		$this->assertSame('UserAgent（IE）', $data_types[20]['name']);
		$this->assertSame(2, $data_types[20]['category_id']);
		$this->assertSame('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 4.0; Trident/5.0)', $data_types[20]['sample']);
		$this->assertSame(22, $data_types[21]['id']);
		$this->assertSame('MIMEタイプ', $data_types[21]['name']);
		$this->assertSame(2, $data_types[21]['category_id']);
		$this->assertSame('application/pkixcmp', $data_types[21]['sample']);
		$this->assertSame(23, $data_types[22]['id']);
		$this->assertSame('拡張子', $data_types[22]['name']);
		$this->assertSame(2, $data_types[22]['category_id']);
		$this->assertSame('bmp', $data_types[22]['sample']);
		$this->assertSame(24, $data_types[23]['id']);
		$this->assertSame('16進数カラーコード', $data_types[23]['name']);
		$this->assertSame(2, $data_types[23]['category_id']);
		$this->assertSame('#b1d513', $data_types[23]['sample']);
		$this->assertSame(25, $data_types[24]['id']);
		$this->assertSame('RGBカラー', $data_types[24]['name']);
		$this->assertSame(2, $data_types[24]['category_id']);
		$this->assertSame('155,200,242', $data_types[24]['sample']);
		$this->assertSame(26, $data_types[25]['id']);
		$this->assertSame('カラー名', $data_types[25]['name']);
		$this->assertSame(2, $data_types[25]['category_id']);
		$this->assertSame('Pink', $data_types[25]['sample']);
		$this->assertSame(27, $data_types[26]['id']);
		$this->assertSame('タイムゾーン', $data_types[26]['name']);
		$this->assertSame(3, $data_types[26]['category_id']);
		$this->assertSame('Asia/Manila', $data_types[26]['sample']);
		$this->assertSame(28, $data_types[27]['id']);
		$this->assertSame('日付（1年以内）', $data_types[27]['name']);
		$this->assertSame(3, $data_types[27]['category_id']);
		$this->assertSame('2018-05-27 12:10:15', $data_types[27]['sample']);
		$this->assertSame(29, $data_types[28]['id']);
		$this->assertSame('日付（1か月以内）', $data_types[28]['name']);
		$this->assertSame(3, $data_types[28]['category_id']);
		$this->assertSame('2019-03-30 01:05:55', $data_types[28]['sample']);
		$this->assertSame(30, $data_types[29]['id']);
		$this->assertSame('日付', $data_types[29]['name']);
		$this->assertSame(3, $data_types[29]['category_id']);
		$this->assertSame('1999-01-15 23:38:32', $data_types[29]['sample']);

		$this->assertSame(31, $data_types[30]['id']);
		$this->assertSame('フリーテキスト', $data_types[30]['name']);
		$this->assertSame(4, $data_types[30]['category_id']);
		$this->assertSame('Architecto nostrum explicabo rerum. Numquam enim qui animi quis nisi.', $data_types[30]['sample']);
		$this->assertSame(32, $data_types[31]['id']);
		$this->assertSame('国コード', $data_types[31]['name']);
		$this->assertSame(4, $data_types[31]['category_id']);
		$this->assertSame('US', $data_types[31]['sample']);
		$this->assertSame(33, $data_types[32]['id']);
		$this->assertSame('国コード（3桁）', $data_types[32]['name']);
		$this->assertSame(4, $data_types[32]['category_id']);
		$this->assertSame('BRA', $data_types[32]['sample']);
		$this->assertSame(34, $data_types[33]['id']);
		$this->assertSame('通貨コード', $data_types[33]['name']);
		$this->assertSame(4, $data_types[33]['category_id']);
		$this->assertSame('JPY', $data_types[33]['sample']);
		$this->assertSame(35, $data_types[34]['id']);
		$this->assertSame('緯度', $data_types[34]['name']);
		$this->assertSame(4, $data_types[34]['category_id']);
		$this->assertSame('67.497947', $data_types[34]['sample']);
		$this->assertSame(36, $data_types[35]['id']);
		$this->assertSame('経度', $data_types[35]['name']);
		$this->assertSame(4, $data_types[35]['category_id']);
		$this->assertSame('74.066367', $data_types[35]['sample']);
		$this->assertSame(37, $data_types[36]['id']);
		$this->assertSame('ISBN-13コード', $data_types[36]['name']);
		$this->assertSame(4, $data_types[36]['category_id']);
		$this->assertSame('9791765867397', $data_types[36]['sample']);
		$this->assertSame(38, $data_types[37]['id']);
		$this->assertSame('ISBN-10コード', $data_types[37]['name']);
		$this->assertSame(4, $data_types[37]['category_id']);
		$this->assertSame('147131121X', $data_types[37]['sample']);
	}
}
