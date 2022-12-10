<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_Permissions()
    {
        $response = $this->get('api/permissions');
 
        $response->assertStatus(200)
            ->assertJson([[
                "id"=> 1,
        "url"=> "users",
        "method"=> "GET",
        "created_at"=> "2022-12-10T03:30:19.000000Z",
        "updated_at"=> "2022-12-10T03:30:19.000000Z"
            ],
        [
            "id"=> 2,
        "url"=> "users/?",
        "method"=> "GET",
        "created_at"=> "2022-12-10T03:30:19.000000Z",
        "updated_at"=> "2022-12-10T03:30:19.000000Z"
        ]]);
    }
    public function test_index()
    {
        $response = $this->get('api/permissions/1');
 
        $response->assertStatus(200)
            ->assertJson([
                "id"=> 1,
                "url"=> "users",
                "method"=> "GET",
                "created_at"=> "2022-12-10T03:30:19.000000Z",
                "updated_at"=> "2022-12-10T03:30:19.000000Z"
               ]);
    }

    public function test_storePermission(){
      $response= $this->post('api/permissions', ['url' => 'URL']);
    $response->assertStatus(500);
    }

    public function test_updatePermissionInvalid(){
        $response= $this->put('api/permissions/56', ['method' => 'delete']);
      $response->assertStatus(200)->assertJson([
        "id"=> 56,
    "url"=> "pie-ingredient",
    "method"=> "delete",
      ]);
      }

    public function test_updatePermission(){
        $response= $this->put('api/permissions/7', ['method' => 'delete']);
      $response->assertStatus(404)->assertJson([
        
        "message"=> "Not found"
      
    ]);
      }


      public function test_deletePermissionInvalid(){
        $response= $this->delete('api/permissions/58');
      $response->assertStatus(404)->assertJson(["message"=> "Not found"]);
      }
      public function test_deletePermission(){
        $response= $this->delete('api/permissions/7');
      $response->assertStatus(404);
      }
}
