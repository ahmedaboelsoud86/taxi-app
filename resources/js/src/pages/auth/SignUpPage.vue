<template>
    <div>
        <div class="container mt-3">
            <h2>Sigin Up</h2>
            <keep-alive>
                <component :is="SiginupStore.currentStep" />
            </keep-alive>
            <Router-link to="/login">Sign in</Router-link>
            <hr>
            <button type="submit" class="btn btn-secondary">SignUp With Google</button>

        </div>
    </div>
</template>
<script setup>
import Step1 from './siginup/Step1Siginup.vue'
import Step2 from './siginup/Step2Siginup.vue'
import Step3 from './siginup/Step3Siginup.vue'
import { onMounted } from "vue";
import { useSiginUpStore } from '../../store/siginup-store'
import { RouterLink } from 'vue-router';
const SiginupStore = useSiginUpStore()
onMounted(() => {
    SiginupStore.currentStep = Step1
    SiginupStore.step1 = Step1
    SiginupStore.step2 = Step2
    SiginupStore.step3 = Step3
})
</script>
