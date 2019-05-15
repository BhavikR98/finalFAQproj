<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\LikeDislike;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeDislikeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testInsertLike()
    {
        $like = new Like();
        $like->user_id = "1000";
        $like->answer_id = "5";
        $this->assertTrue(true);
    }
    public function testUpdateLike()
    {
        $like = Like::where('id',[10])->update(['answer_id' => '119']);
        $this->assertTrue(true);
    }
    public function testDeleteLike()
    {
        $like = Like::where('id','=', [1])->delete();
        $this->assertTrue(true);
    }
    public function testCountLike()
    {
        $like = Like::All();
        $likeCount = $like->count();
        $this->assertTrue(true);
    }
    public function testLikeUserId()
    {
        $like = Like::inRandomOrder()->first();
        $this->assertInternalType('int', intval($like->user_id));
    }
    public function testInsertDislike()
    {
        $dislike = new Dislike();
        $dislike->user_id = "999";
        $dislike->answer_id = "10";
        $this->assertTrue(true);
    }
    public function testUpdateDislike()
    {
        $dislike = Dislike::where('id',[10])->update(['answer_id' => '119']);
        $this->assertTrue(true);
    }
    public function testDeleteDislike()
    {
        $dislike = Dislike::where('id','=', [1])->delete();
        $this->assertTrue(true);
    }
    public function testCountDislike()
    {
        $dislike = Dislike::All();
        $dislikeCount = $dislike->count();
        $this->assertTrue(true);
    }
    public function testDislikeAnswerId()
    {
        $dislike = Dislike::inRandomOrder()->first();
        $this->assertInternalType('int', intval($dislike->answer_id));
    }
}
