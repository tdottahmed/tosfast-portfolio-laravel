<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserVisit;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Symfony\Component\HttpFoundation\Response;

class TrackUserVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();

        if ($ipAddress === '127.0.0.1' || $ipAddress === '::1') {
            $location = (object) [
                'country' => 'Localhost',
                'region' => 'Local',
                'city' => 'Localhost',
                'lat' => 0.0000,
                'lon' => 0.0000,
            ];
        } else {
            $location = GeoIP::getLocation($ipAddress);
        }

        UserVisit::updateOrCreate(
            ['ip_address' => $ipAddress], // Unique condition
            [
                'iso_code' => $location->iso_code ?? 'Unknown',
                'country' => $location->country ?? 'Unknown',
                'city' => $location->city ?? 'Unknown',
                'latitude' => $location->lat ?? 0.0000,
                'longitude' => $location->lon ?? 0.0000,
                'postal_code' => $location->postal_code ?? 0,
                'visited_at' => now(),
            ]
        )->increment('visits');

        return $next($request);
    }
}
