<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>

            <a href="/" style="background-color: #7c3aed; color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                Back to QrazCart
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 style="font-size: 22px; font-weight: bold; margin-bottom: 10px;">
                        Welcome to your account
                    </h3>

                    <p style="margin-bottom: 20px;">
                        You are successfully logged in. You can return to QrazCart homepage or browse products.
                    </p>

                    <a href="/" style="background-color: #7c3aed; color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold; margin-right: 10px;">
                        Home Page
                    </a>

                    <a href="/products" style="background-color: #f59e0b; color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                        View Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
