<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnoControllerTest1 extends TestCase
{
    use RefreshDatabase; // Refresca la base de datos después de cada prueba
    public function puede_crear_un_alumno()
    {
        $response = $this->post('/alumnos', [
            'name' => 'Juan',
            'surname' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'age' => 20,
        ]);
        $response->assertRedirect('/alumnos'); // Verifica que redirija a la lista de alumnos
        $this->assertDatabaseHas('alumnos', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'edad' => 20,
        ]);
    }
}
