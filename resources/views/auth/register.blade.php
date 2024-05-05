<x-guest-layout>
    <section class="featured-articles section section-header-offset">
        <div class="login-container" style="width: 500px; /* Adjust the width as needed */">
            <a href="#"><img src="" alt=""></a>
            <h2>Welcome Back</h2>

            <form class="form-login" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <!-- Email Address -->
                <input class="form-input small-input" id="email" type="email" placeholder="Email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" /></br>

                <!-- Password -->
                <input id="password" class="form-input small-input" type="password" placeholder="Password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" /></br>

                <!-- Confirm Password -->
                <input id="password_confirmation" class="form-input small-input" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" /></br>

                <!-- Image Upload -->
                <input type="file" name="image" accept="image/*">
                <x-input-error :messages="$errors->get('image')" /></br>

                <div class="password">
                    <button class="btn form-btn" type="submit">
                        <i class="ri-mail-send-line"></i>
                    </button>
                </div>
            </form></br>
            <a href="/login" class="text-primary">Already Registered?</a>
        </div>
    </section>
</x-guest-layout>

<style>
    .small-input {
        width: 370px;
        margin-left: 20px;
        border: 2px solid #afb6cd;
    }
</style>
