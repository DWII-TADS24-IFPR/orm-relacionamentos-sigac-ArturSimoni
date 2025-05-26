<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark fw-semibold">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container max-w-7xl mx-auto px-3">
            <div class="row g-4">

                <div class="col-12">
                    <div class="card shadow-sm rounded">
                        <div class="card-body">
                            <div class="mx-auto" style="max-width: 600px;">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow-sm rounded">
                        <div class="card-body">
                            <div class="mx-auto" style="max-width: 600px;">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow-sm rounded">
                        <div class="card-body">
                            <div class="mx-auto" style="max-width: 600px;">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
