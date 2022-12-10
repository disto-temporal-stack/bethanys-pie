<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_rols()
    {
        $response = $this->get('api/roles');
 
        $response->assertStatus(200);
    }
    public function test_index()
    {
        $response = $this->get('api/roles/2');
 
        $response->assertStatus(200)
            ->assertJson([
                "id"=> 2,
        "rol_name"=> "OtroNombre",
       
               ]);
    }

    public function test_storeRol(){
      $response= $this->post('api/roles', ['rol_name' => 'NUEVO ROL']);
    $response->assertStatus(201)->assertJson([
        "rol_name"=> "NUEVO ROL"
    ]);
    }

    public function test_updateRolInvalid(){
        $response= $this->put('api/roles/7', ['rol_name' => 'Rolmodificado']);
      $response->assertStatus(200)->assertJson([ "id"=> 7,
      "rol_name"=> "Rolmodificado",
     ]);
      }

    public function test_updateRol(){
        $response= $this->put('api/roles/2', ['rol_name' => 'OtroNombre']);
      $response->assertStatus(200)->assertJson([
        
        "rol_name"=> "OtroNombre"
      
    ]);
      }


      public function test_deleteRolInvalid(){
        $response= $this->delete('api/roles/5');
      $response->assertStatus(404)->assertJson(["message"=> "Not found"]);
      }
}
