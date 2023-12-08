<template>
  <Head title="Login" />
  <!-- <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-800">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="login">
        <div class="px-10 py-12">
          <h1 class="text-center text-3xl font-bold">Welcome Back!</h1>
          <div class="mt-6 mx-auto w-24 border-b-2" />
          <text-input v-model="form.email" :error="form.errors.email" class="mt-10" label="Email" type="email" autofocus autocapitalize="off" />
          <text-input v-model="form.password" :error="form.errors.password" class="mt-6" label="Password" type="password" />
          <label class="flex items-center mt-6 select-none" for="remember">
            <input id="remember" v-model="form.remember" class="mr-1" type="checkbox" />
            <span class="text-sm">Remember Me</span>
          </label>
        </div>
        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Login</loading-button>
        </div>
      </form>
    </div>
  </div> -->
 <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-800">
  <div class="container">
    <div class="user-data-form modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="text-center">
        <h2>Hi, Welcome Back!</h2>
        <p>Still don't have an account? <a href="signup.html">Sign up</a></p>
      </div>
      <div class="form-wrapper m-auto">
        <form class="" @submit.prevent="login">
          <div class="row">
            <div class="col-12">
              <div class="input-group-meta position-relative mb-25">
                <label for="email">Email*</label>
                <text-input v-model="form.email" :error="form.errors.email" class="mt-10" id="email" type="email" autofocus autocapitalize="off" />
              </div>
            </div>
            <div class="col-12">
              <div class="input-group-meta position-relative mb-20">
                <label for="password">Password*</label>
                <text-input v-model="form.password" :error="form.errors.password" class="mt-6" id="password" type="password" />
                <span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_60.svg" alt="" /></span></span>
              </div>
            </div>
            <div class="col-12">
              <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                <div>
                  <input id="remember" v-model="form.remember" class="mr-1" type="checkbox" />
                  <label for="remember">Keep me logged in</label>
                </div>
                <a href="#">Forget Password?</a>
              </div>
            </div>
            <div class="col-12">
              <!-- <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Login</loading-button> -->
              <loading-button :loading="form.processing" class="btn-eleven fw-500 tran3s d-block mt-20" type="submit">Login</loading-button>

            
            </div>
          </div>
        </form>

        <p class="text-center mt-10">Don't have an account? <a href="signup.html" class="fw-500">Sign up</a></p>
      </div>
    </div>
  </div>
</div>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Logo from '@/Shared/Logo'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    Head,
    LoadingButton,
    Logo,
    TextInput,
  },
  data() {
    return {
      form: this.$inertia.form({
        email: 'johndoe@example.com',
        password: 'secret',
        remember: false,
      }),
    }
  },
  methods: {
    login() {
      this.form.post('/login')
    },
  },
}
</script>
