<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_user1()
    {
        $response = $this->get('api/users/1');
 
        $response->assertStatus(200)
            ->assertJson([
                "id"=> 1,
                "name"=> "Juan Manuel",
                "email"=> "juan@gmail.com",
                "email_verified_at"=> null,
                "created_at"=> "2022-12-10T03:30:19.000000Z",
                "updated_at"=> "2022-12-10T03:30:19.000000Z",
                "role_id"=> 1
            ]);
    }
    public function test_index()
    {
        $response = $this->get('api/users');
 
        $response->assertStatus(200)
            ->assertJson([
                [
                    "id"=> 1,
                    "name"=> "Juan Manuel",
                    "email"=> "juan@gmail.com",
                    "email_verified_at"=> null,
                    "created_at"=> "2022-12-10T03:30:19.000000Z",
                    "updated_at"=> "2022-12-10T03:30:19.000000Z",
                    "role_id"=> 1
               ],

            //     [
            //         "id"=> 2,
            //         "name"=> "Brayan",
            //         "email"=> "brayan@gmail.com",
            //         "email_verified_at"=> null,
            //         "created_at"=> "2022-12-10T03:30:19.000000Z",
            //         "updated_at"=> "2022-12-10T03:30:19.000000Z",
            //         "role_id"=> 1
               
            // ]
        ]);
    }

    public function test_storeUser(){
      $response= $this->post('api/users', ['name' => 'Francisco', 'email'=>'francisco@gmail.com']);
    $response->assertStatus(400)->assertJson(["data"=> "Error in user creation"]);
    }

    public function test_updateUserInvalid(){
        $response= $this->put('api/users/7', ['name' => 'Francisco', 'email'=>'francisco@gmail.com']);
      $response->assertStatus(404)->assertJson(["message"=> "Not found"]);
      }

    public function test_updateUser(){
        $response= $this->put('api/users/2', ['name' => 'Brayan Stiven']);
      $response->assertStatus(404)->assertJson([
        "message"=> "Not found"
    ]);
      }


      public function test_deleteUserInvalid(){
        $response= $this->delete('api/users/5');
      $response->assertStatus(404)->assertJson(["message"=> "Not found"]);
      }
    //   public function test_deleteUser(){
    //     $response= $this->delete('api/users/2');
    //   $response->assertStatus(204);
    //   }

}
