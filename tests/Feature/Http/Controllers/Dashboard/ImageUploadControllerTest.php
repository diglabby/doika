<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ImageUploadControllerTest extends TestCase
{
    /** @test */
    public function it_uploads_image()
    {
        $image = UploadedFile::fake()->image('my-cool-image.jpg');

        $response = $this
            ->withoutMiddleware([\App\Http\Middleware\Authenticate::class])
            ->post(route('dashboard.images.store'), ['image' => $image]);

        $response->assertOk();
        $url = $response->baseResponse->content();
        $this->assertContains('my-cool-image.jpg', $url);
    }

    /** @test */
    public function it_forbids_to_upload_not_an_image()
    {
        $nonImage = UploadedFile::fake()->create('my-cool-document.txt', 20);

        $response = $this
            ->withoutMiddleware([\App\Http\Middleware\Authenticate::class])
            ->postJson(route('dashboard.images.store'), ['image' => $nonImage]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors('image');
    }
}
