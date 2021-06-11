<?php

namespace Tests\Feature;

use Tests\TestCase;

class DdgTest extends TestCase
{
    /**
     * トップページテスト.
     *
     * @return void
     */
    public function testTop()
    {
        $response = $this->get('/');

        $response->assertSuccessful();
    }

    /**
     * Ddgトップページテスト.
     *
     * @return void
     */
    public function testDdgTop()
    {
        $response = $this->get('/ddg');

        $response->assertSuccessful();
    }
}
