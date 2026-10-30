<?php

namespace Tests\Feature;

use App\Mail\TicketConfirmationMail;
use App\Models\TicketRegistration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class TicketRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_for_concert_and_receives_email(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Alexander Pratama',
            'email' => 'alexander.once@gmail.com',
            'phone' => '+6281298765432',
            'once_id' => 'ONCE-984210',
            'ticket_tier' => 'vip',
            'quantity' => 2,
            'payment_method' => 'Credit Card',
            'currency' => 'IDR',
        ];

        $response = $this->postJson('/register-ticket', $payload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'email_sent' => true,
            ]);

        $this->assertDatabaseHas('ticket_registrations', [
            'name' => 'Alexander Pratama',
            'email' => 'alexander.once@gmail.com',
            'ticket_tier' => 'vip',
            'quantity' => 2,
        ]);

        Mail::assertSent(TicketConfirmationMail::class, function ($mail) {
            return $mail->hasTo('alexander.once@gmail.com')
                && str_contains($mail->envelope()->subject, 'READY TO BE');
        });
    }

    public function test_email_template_renders_without_errors(): void
    {
        $ticket = TicketRegistration::create([
            'booking_reference' => 'TWICE-JIS-2026-9999',
            'name' => 'Hirai Momo',
            'email' => 'momo@twice.com',
            'phone' => '+821012345678',
            'once_id' => 'ONCE-640192',
            'ticket_tier' => 'vip',
            'tier_label' => 'VIP Soundcheck Package',
            'quantity' => 1,
            'total_price' => 4746000,
            'currency' => 'IDR',
            'gate' => 'GATE VIP-1',
            'section' => 'PIT A',
            'seats' => 'ROW A: 12',
            'payment_method' => 'Credit Card',
        ]);

        $mailable = new TicketConfirmationMail($ticket);
        $rendered = $mailable->render();

        $this->assertStringContainsString('TWICE 5', $rendered);
        $this->assertStringContainsString('Hirai Momo', $rendered);
        $this->assertStringContainsString('TWICE-JIS-2026-9999', $rendered);
    }
}

