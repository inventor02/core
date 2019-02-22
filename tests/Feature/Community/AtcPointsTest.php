<?php

namespace Tests\Feature\Community;

use App\Events\NetworkData\AtcSessionEnded;
use App\Models\NetworkData\Atc;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class AtcPointsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test * */
    public function it_dispatches_an_event_when_an_atc_session_finishes()
    {
        Event::fake();

        $session = factory(Atc::class)->create();
        $session->disconnectAt($this->knownDate);

        Event::assertDispatched(AtcSessionEnded::class);
    }

    /** @test */
    public function it_does_not_issue_points_for_an_atc_session_under_30_minutes()
    {
        $session = factory(Atc::class)->create([
            'connected_at' => $this->knownDate->subMinutes(29)
        ]);

        $this->assertEquals(0, $session->account->points);

        $session->disconnectAt($this->knownDate);

        $this->assertEquals(0, $session->account->fresh()->points);
    }

    /** @test */
    public function it_issues_5_points_to_a_user_for_controlling_over_half_an_hour_but_under_one_hour()
    {
        $session = factory(Atc::class)->create([
            'connected_at' => $this->knownDate->subMinutes(45)
        ]);

        $this->assertEquals(0, $session->account->points);

        $session->disconnectAt($this->knownDate);

        $this->assertEquals(5, $session->account->fresh()->points);
    }

    /** @test */
    public function it_issues_10_points_to_a_user_for_controlling_over_one_hour_but_under_an_hour_and_a_half()
    {
        $session = factory(Atc::class)->create([
            'connected_at' => $this->knownDate->subMinutes(85)
        ]);

        $this->assertEquals(0, $session->account->points);

        $session->disconnectAt($this->knownDate);

        $this->assertEquals(10, $session->account->fresh()->points);
    }
}
