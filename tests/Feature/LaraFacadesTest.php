<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaraFacadesTest extends TestCase
{
    /**
     * @desc test status success or not
     *
     * @return array
     */
    public function testLaraFacadesStatusSuccess()
    {
        //call route
        $response = $this->get('/larafacade');

        //check whether response have status success or not
        $response->assertSeeText('success',$response['status']);
    }

    /**
     * @desc test status failure or not
     *
     * @return array
     */
    public function testLaraFacadesStatusFailure()
    {
        $response = $this->get('/larafacade');

        //check whether response don't have status failuee or not
        $response->assertDontSeeText('failure',$response['status']);
    }
}
