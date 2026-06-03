@extends('layouts.shop')

@section('title', 'My Dashboard - QrazCart')

@section('content')
    <div class="dashboard-wrapper" style="display: flex; flex-wrap: wrap; gap: 30px; margin: 40px auto; max-width: 1200px; padding: 0 20px;">

        <aside class="admin-box" style="flex: 1; min-width: 280px; max-width: 350px; height: fit-content;">
            <h2 style="margin-top: 0;">My Profile</h2>
            <p>Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>

            <hr style="margin: 15px 0; border: 0; border-top: 1px solid #eee;">

            <div class="account-details" style="margin-bottom: 25px; line-height: 1.6;">
                <p style="margin: 5px 0;"><strong>Email:</strong><br> {{ auth()->user()->email }}</p>
                <p style="margin: 5px 0;"><strong>Account Type:</strong><br>
                    @if(auth()->user()->hasRole('admin'))
                        <span style="color: #4CAF50; font-weight: bold;">Admin User</span>
                    @else
                        Standard User
                    @endif
                </p>
            </div>

            <div class="profile-actions" style="display: flex; flex-direction: column; gap: 10px;">
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary" style="text-align: center;">Edit Profile</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary" style="text-align: center;">Change Password</a>
            </div>

            @if(auth()->user()->hasRole('admin'))
                <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
                <a href="/admin" class="btn" style="display: block; text-align: center;">Go to Admin Panel</a>
            @endif
        </aside>

        <main class="dashboard-content" style="flex: 2; min-width: 300px; display: flex; flex-direction: column; gap: 30px;">

            <section class="admin-box" style="margin-top: 0;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0;">Recent Orders</h3>
                </div>

                @php
                    $recentOrders = auth()->user()->orders()->latest()->take(3)->get();
                @endphp

                @if($recentOrders->count() > 0)
                    <div class="table-wrapper">
                        <table>
                            <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($recentOrders as $order)
                                <tr>
                                    <td><strong>#{{ $order->id }}</strong></td>
                                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                    <td>${{ number_format($order->total_price, 2) }}</td>
                                    <td>
                            <span class="status-badge status-completed">
                                {{ ucfirst($order->status) }}
                            </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p style="color: #666; font-style: italic;">
                        You haven't placed any orders yet.
                        <a href="/products" style="color: #6a5acd; text-decoration: underline;">Start shopping!</a>
                    </p>
                @endif
            </section>

            <section class="admin-box">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0;">Address Book</h3>
                    <span class="btn btn-secondary" style="padding: 5px 15px; font-size: 0.9em; opacity: 0.7; cursor: not-allowed;">
    Coming Soon
</span>                </div>

                <p style="color: #666; font-style: italic;">No addresses saved. Add one for faster checkout.</p>

            </section>

        </main>
    </div>
@endsection
