{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>

        <!-- Validation Errors -->

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" /></br>

                <x-input id="email" class="form-label" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="form-label"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<style>
    .mask-custom {
      background: rgba(24, 24, 16, 0.2);
      border-radius: 2em;
      backdrop-filter: blur(25px);
      border: 2px solid rgba(255, 255, 255, 0.05);
      background-clip: padding-box;
      box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
    }

    * {
        color: #000;
    }

    body {
      background-color: #f8f9fa;
    }

    .task-form-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        border-radius: 5px;
    }
    .btn-primary {
        width: 100%;
        border-radius: 5px;
    }
    .gap-15 {
        gap: 15px;
    }

    @media(max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }
    }
</style>

@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- <div class="container">
    <div class="task-form-container">
        <h2 class="text-center">Create a New Task</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Task Title</label>
                <input type="text" wire:model="name" class="form-control" required placeholder="Enter task title">
            </div>
            
            <button wire:click.prevent="createTask" class="btn btn-primary">Create Task</button>
    </div>
</div> --}}

<div class="container">
    <div class="task-form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <x-label for="name" :value="__('Name')" /></br>

                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus /></br></br>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" /></br>

                <x-input id="email" class="form-label" type="email" name="email" :value="old('email')" required /></br></br>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" /></br>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" /></br></br>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" /></br>

                <x-input id="password_confirmation" class="form-label"
                                type="password"
                                name="password_confirmation" required /></br></br>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>
</div>