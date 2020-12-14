<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithoutMiddleware;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCanCreateSocialFacebookClientUser()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('api/users/facebook', 
        [
           'access_token' => 'EAAKbkuSoo2wBAHXWhYgXZBlPmo7ojMvIu8ZCs9Q9ZB6Krif0vuUUOZCuqueu83uhkhGiLw1ZBeDfZCqt8uVBaXHVsUckSWZCjgZCReKIQZAHYd5ZCDKP9EFL04YKEEo1WZCNi1NKBRjnQ7Bl4UA9yA7Bkj1aEIecoVKlG7jUC19NK5IwQZDZD',
           'telephone' => '(55)984182414',
           'cpf' => '000.111.222-33',
           'only_client' => 1   
        ]);

      
       // $response
       //  ->assertStatus(201)
       //  ->assertJsonStructure([
       //          'user',
       //          'token'
       //      ]
       //  );

        dd(json_decode($response->getContent()));
    }
}
