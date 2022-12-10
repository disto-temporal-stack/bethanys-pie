<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Permission_RolTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_Permissions()
    {
        $response = $this->get('api/permission_roles');
 
        $response->assertStatus(200)
            ->assertJson([[
                "id"=> 1,
        "role_id"=> 2,
        "permission_id"=> 61,
        "created_at"=> "2022-12-10T03:30:19.000000Z",
        "updated_at"=> "2022-12-10T03:30:19.000000Z"
            ],
        [
            "id"=> 2,
            "role_id"=> 2,
            "permission_id"=> 62,
            "created_at"=> "2022-12-10T03:30:19.000000Z",
            "updated_at"=> "2022-12-10T03:30:19.000000Z"
        ]]);
    }
    public function test_index()
    {
        $response = $this->get('api/permission_roles/5');
 
        $response->assertStatus(200)
            ->assertJson([
                "id"=> 5,
    "role_id"=> 2,
    "permission_id"=> 26,
    "created_at"=> "2022-12-10T03:30:19.000000Z",
    "updated_at"=> "2022-12-10T03:30:19.000000Z"
               ]);
    }

    public function test_storePermission(){
      $response= $this->post('api/permission_roles', ['role_id' => 1]);
    $response->assertStatus(500);
    }

    public function test_updatePermissionInvalid(){
        $response= $this->put('api/permission_roles/100', ['role_id' => 5]);
      $response->assertStatus(404)->assertJson(["message"=> "Not found"]);
      }

    public function test_updatePermission(){
        $response= $this->put('api/permission_roles/7', ['role_id' => 8]);
      $response->assertStatus(404);
      }


      public function test_deletePermissionInvalid(){
        $response= $this->delete('api/permission_roles/100');
      $response->assertStatus(404)->assertJson(["message"=> "Not found"]);
      }
      public function test_deletePermission(){
        $response= $this->delete('api/permission_roles/7');
      $response->assertStatus(404);
      }
}
