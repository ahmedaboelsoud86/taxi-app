<template>
    <div>
        <div class="container mt-3">
            <h2>Login form</h2>
            <keep-alive>
                <component :is="LoginStore.currentStep" />
            </keep-alive>
            <Router-link to="/signup">Sign up</Router-link>
            <hr>
            <button type="submit" class="btn btn-secondary">SignUp With Google</button>

        </div>
    </div>
</template>
<script setup>
import Step1 from './login/Step1Login.vue'
import Step2 from './login/Step2Login.vue'
import { onMounted } from "vue";
import { useLoginStore } from '../../store/login-store'
const LoginStore = useLoginStore()
onMounted(() => {
    LoginStore.currentStep = Step1
    LoginStore.step1 = Step1
    LoginStore.step2 = Step2
})
</script>
