<section>
    <header  class="mb-4">
        <h2 class="text-lg font-medium text-gray-900 font-secondary">
            {{ __('Sicurezza') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Modifica la password di accesso all\'area riservata') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input class="mt-1 form-control" type="password" name="current_password" id="current_password" autocomplete="current-password" placeholder="name@example.com">
            <label for="current_password">{{__('Password Corrente')}}</label>
            @error('current_password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
            </span>
            @enderror
          </div>
{{-- 
        <div class="mb-2">
            <label for="current_password">{{__('Current Password')}}</label>
            <input class="mt-1 form-control" type="password" name="current_password" id="current_password" autocomplete="current-password">
            @error('current_password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
            </span>
            @enderror
        </div> --}}

        <div class="form-floating mb-3">
            <input class="mt-1 form-control" type="password" name="password" id="password" autocomplete="new-password" placeholder="new-password">
            <label for="password">{{__('Nuova Password')}}</label>
            @error('password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password')}}</strong>
            </span>
            @enderror
          </div>

        {{-- <div class="mb-2">
            <label for="password">{{__('New Password')}}</label>
            <input class="mt-1 form-control" type="password" name="password" id="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password')}}</strong>
            </span>
            @enderror
        </div> --}}

        <div class="form-floating mb-3">
            <input class="mt-2 form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" placeholder="new-password-confirm">
            <label for="password_confirmation">{{__('Conferma Password')}}</label>
            @error('password_confirmation')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
            </span>
            @enderror
          </div>

        {{-- <div class="mb-2">

            <label for="password_confirmation">{{__('Confirm Password')}}</label>
            <input class="mt-2 form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
            @error('password_confirmation')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
            </span>
            @enderror
        </div> --}}

        <div class="row mt-4">
           <div class="col">
            <button type="submit" class="btn ms-btn ms-btn-primary btn-sm">
                <i class="fa-solid fa-floppy-disk me-1"></i>
                {{ __('Salva') }}
            </button>
           </div>
           <div class="col">
            @if (session('status') === 'password-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>

            <span id='status' class="text-success align-middle">{{ __('Modifiche salvate') }}</span>
            @endif
           </div>

          
        </div>
    </form>
</section>
