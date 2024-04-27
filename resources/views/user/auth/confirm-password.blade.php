<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="w-32">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            次に進む前にパスワードを確認してください。
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('確認する') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
