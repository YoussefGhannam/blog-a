<x-guest-layout>
    <section class="featured-articles section section-header-offset">
        <div class="login-container">
            <a href="#"><img src="" alt=""></a>
            <h2>Welcome Back</h2>


        <form class="form-login" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->

                <input class="form-input" id="email" type="email"  placeholder="Enter your email address" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" /></br>

            <!-- Password -->
            <div class="password">
                <input id="password"
                class="form-input"
                                type="password"
                                placeholder="Enter your password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" /></br>
                    <button class="btn form-btn" type="submit">
                        <i class="ri-mail-send-line"></i>
                    </button>
            </div>
        </form></br></br></br></br>
        <a href="/register" class="text-primary">First Time? Register Now!</a>
        </div>


</section>




</x-guest-layout>
