<?php

namespace App\Http\Controllers;

use App\Mail\VendorRegistrationNotification;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;


class VendorController extends Controller
{
    public function showRegister()
    {
        return view('frontend.auth.signup-vendor');
    }

    public function store(Request $request)
    {
        // Validate vendor application
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'shop_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:vendors,email',
            'phone' => 'required|string|max:20|unique:vendors,phone',
            'pan_no' => 'required|string|max:50|unique:vendors,pan_no',
            'address' => 'nullable|string|max:1000',
            'terms' => 'required|accepted',
        ]);

        // Generate a unique slug
        $baseSlug = \Illuminate\Support\Str::slug(
            $request->shop_name ?: $request->name
        );

        $slug = $baseSlug;
        $counter = 1;

        while (Vendor::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }


        // Create vendor application
        $vendor = Vendor::create([
            'name' => $validated['name'],
            'shop_name' => $validated['shop_name'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'pan_no' => $validated['pan_no'],
            'address' => $validated['address'] ?? null,

            'slug' => $slug,

            // Vendor has not been approved yet
            'status' => 'pending',

            // These are generated only after admin approval
            'username' => null,
            'password' => null,
            'approved_at' => null,
        ]);


        // Send notification to admin, but do not crash if no admin row exists yet.
        $adminEmail = Admin::value('email') ?? config('mail.from.address');

        if (! empty($adminEmail)) {
            Mail::to($adminEmail)
                ->send(new VendorRegistrationNotification($vendor));
        } else {
            Log::warning('No admin email is available for vendor registration notification.');
        }

        // Return vendor to signup page
        return redirect()
            ->route('vendor.register')
            ->with(
                'success',
                'Your vendor application has been submitted successfully. Our admin team will review your application and contact you by email.'
            );
    }
}
