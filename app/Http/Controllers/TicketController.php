<?php

namespace App\Http\Controllers;

use App\Mail\TicketConfirmationMail;
use App\Models\TicketRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Tier configuration mapping.
     */
    protected array $tierDetails = [
        'vip' => [
            'name' => 'VIP Soundcheck Package',
            'base_price' => 4200000,
            'gate' => 'GATE VIP-1',
            'section' => 'PIT A (Front Stage)',
        ],
        'cat1' => [
            'name' => 'CAT 1 - Ground Floor Ready Zone',
            'base_price' => 2850000,
            'gate' => 'GATE 2 (Floor South)',
            'section' => 'SECTOR 102 (Center Floor)',
        ],
        'cat2' => [
            'name' => 'CAT 2 - Lower Tier (Feel Special)',
            'base_price' => 2250000,
            'gate' => 'GATE 4 (Lower West)',
            'section' => 'SECTOR 208 (Lower Elevated)',
        ],
        'cat3' => [
            'name' => 'CAT 3 - Upper Tier (The Feels)',
            'base_price' => 1550000,
            'gate' => 'GATE 6 (Upper East)',
            'section' => 'SECTOR 314 (Upper Bowl)',
        ],
        'cat4' => [
            'name' => 'CAT 4 - General Bleachers',
            'base_price' => 950000,
            'gate' => 'GATE 8 (General North)',
            'section' => 'SECTOR 420 (Skyline Bleachers)',
        ],
    ];

    /**
     * Handle ticket registration and send confirmation email.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'once_id' => 'required|string|max:50',
            'ticket_tier' => 'required|string|in:vip,cat1,cat2,cat3,cat4',
            'quantity' => 'required|integer|min:1|max:4',
            'payment_method' => 'nullable|string|max:100',
            'currency' => 'nullable|string|max:10',
        ]);

        $tierKey = $validated['ticket_tier'];
        $tierConfig = $this->tierDetails[$tierKey];

        // Generate unique booking reference
        do {
            $bookingRef = 'TWICE-JIS-2026-' . random_int(1000, 9999);
        } while (TicketRegistration::where('booking_reference', $bookingRef)->exists());

        // Allocate seat rows and numbers
        $rowLetter = ['A', 'B', 'C', 'D', 'E'][random_int(0, 4)];
        $seatStart = random_int(1, 30);
        $qty = (int) $validated['quantity'];
        $seatsStr = $qty > 1
            ? "ROW {$rowLetter}: {$seatStart} - " . ($seatStart + $qty - 1)
            : "ROW {$rowLetter}: {$seatStart}";

        // Calculate pricing
        $baseSubtotal = $tierConfig['base_price'] * $qty;
        $fee = (int) round($baseSubtotal * 0.03);
        $tax = (int) round($baseSubtotal * 0.10);
        $grandTotal = $baseSubtotal + $fee + $tax;

        // Create registration record
        $ticket = TicketRegistration::create([
            'booking_reference' => $bookingRef,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'once_id' => $validated['once_id'],
            'ticket_tier' => $tierKey,
            'tier_label' => $tierConfig['name'],
            'quantity' => $qty,
            'total_price' => $grandTotal,
            'currency' => $validated['currency'] ?? 'IDR',
            'gate' => $tierConfig['gate'],
            'section' => $tierConfig['section'],
            'seats' => $seatsStr,
            'payment_method' => $validated['payment_method'] ?? 'Credit Card',
        ]);

        // Send confirmation email using Laravel Mail
        $emailSent = true;
        $emailError = null;
        try {
            Mail::to($ticket->email)->send(new TicketConfirmationMail($ticket));
        } catch (\Throwable $e) {
            $emailSent = false;
            $emailError = $e->getMessage();
            Log::error('Failed to send TWICE concert ticket confirmation email: ' . $e->getMessage(), [
                'ticket_id' => $ticket->id,
                'email' => $ticket->email,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => $emailSent
                ? 'Concert registration successful! An official E-Ticket confirmation email has been sent to ' . $ticket->email . '.'
                : 'Registration successful! (Note: Email delivery failed or logged. Check log file).',
            'email_sent' => $emailSent,
            'email_error' => $emailError,
            'ticket' => $ticket,
        ]);
    }
}

